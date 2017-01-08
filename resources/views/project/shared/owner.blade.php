@if ($project->id)
<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Owner: {{ $project->user->name }}</h3></div>
    <div class="panel-body">
        <strong>Shared with:</strong>
        @if (count($project->users))
            <ul class="list-group share-list-group">
                @foreach ($project->users as $user)
                    <li class="list-group-item">
                        @if ($project->is_owner())
                            <span class="glyphicon glyphicon-trash pull-right" style="cursor: pointer;" aria-hidden="true" data-email="{{ $user->email }}"></span>
                        @endif
                        <span class="email">{{ $user->email }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
        @if ($project->is_owner())
                <div class="input-group" id="share-input-group">
                    <input type="text" class="form-control" id="share-email" placeholder="Name / Email" aria-describedby="share-button" />
                    <span class="btn btn-sm btn-primary btn-inline" id="share-button"><i id="share-icon" class="fa fa-plus fa-fw"></i> Share</span>
                </div>
                
                <span class="btn btn-lg btn-warning btn-wide btn-icon googleContactsButton"><span class="fa fa-google"></span> Authorize Contacts</span>
                <p id="googleContactSuccess" style="display: none;">Alright! Now, you can just start typing email addresses or names of your contacts.</p>
                
                <p>&nbsp;</p>
                
                <strong>Change owner:</strong>
                <div class="input-group" id="owner-input-group">
                    <input type="text" class="form-control" id="change-owner" placeholder="Name / Email" aria-describedby="owner-button" />
                    <span class="btn btn-sm btn-primary btn-inline" id="owner-button"><i id="owner-icon" class="fa fa-user fa-fw"></i> </span>
                </div><small>Must already have an account</small>
        @endif

    </div>
</div>

    <script type="text/javascript">
        var clientId = '{{config('services.google')['clientId']}}';
        var apiKey = '{{config('services.google')['apiKey']}}';
        var scopes = 'https://www.googleapis.com/auth/contacts.readonly';

		window.name_email = [];
        window.potential_owners = [
            <?php
                foreach (App\User::all() as $u) {
                    echo "'".$u->name . " <".$u->email.">',";
                }
            ?>
        ];
		  
		Array.prototype.findReg = function(match) {
			var reg = new RegExp(match);

			return this.filter(function(item){
				//console.log(item);
				return typeof item == 'string' && item.match(reg);
			});
		}

		$(document).ready(function() {

          $("#change-owner").autocomplete({
            source: window.potential_owners
          });
		
          $(document).on("click",".googleContactsButton", function(){
            gapi.client.setApiKey(apiKey);
            window.setTimeout(authorize);
          });
		  
		  $(document).on("click" ,"#email_search", function() {
		    search_list = name_email.findReg( $('#email_search').val() );
		  });
          
		  function authorize() {
            gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);
          }
		  
          function handleAuthorization(authorizationResult) {
            if (authorizationResult && !authorizationResult.error) {
              $.get("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=100000&v=3.0",
                function(result){
				    $.each( result.feed.entry, function( i, entry ){
						var name = 'undefined';
						if (typeof entry.gd$name !== 'undefined' && typeof entry.gd$name.gd$fullName.$t !== 'undefined') {
							var name = entry.gd$name.gd$fullName.$t;
						}
						
						//console.log( entry );
						if (typeof entry.gd$email !== 'undefined') {
							$.each( entry.gd$email, function( j, address ){
								console.log(name + ' = ' + address.address);
								window.name_email.push( name + ' <' + address.address + '>' );
							});
						}
					});
					
					$( "#share-email" ).autocomplete({
					  source: window.name_email
					});
					
					$( '#googleContactSuccess' ).show();
                });
            }
          }
		});
    </script>
    <script src="https://apis.google.com/js/client.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('.share-list-group').on('click', 'span.glyphicon-trash', function(event) {
           console.log($(event.currentTarget).data('email'));
            $('#share-input-group').removeClass('has-error');

            $('#share-icon').removeClass("fa fa-plus fa-fw");
            $('#share-icon').addClass("fa fa-spinner fa-spin");

            var formData = {
                _token: $('input[name=_token]').val(),
                project_id: $('#id').val(),
                email: $(event.currentTarget).data('email'),
                add_or_del: 'del'
            };

            $.ajax({
                url : "/account/project/share",
                type: "POST",
                data : formData,
                success: function(data, textStatus, jqXHR)
                {
                    if (data.status) {
                        $('ul.share-list-group').empty();
                        for (var i = 0; i < data.users.length; i++) {
                            $('ul.share-list-group').append(
                                '<li class="list-group-item"><span class="glyphicon glyphicon-trash pull-right" style="cursor: pointer;" aria-hidden="true" data-email="'+ data.users[i].email +'"></span><span class="email">'+ data.users[i].email +'</span></li>'
                            );
                        }
                        $('#share-icon').removeClass("fa fa-spinner fa-spin");
                        $('#share-icon').addClass("fa fa-plus fa-fw");

                    }
                    else {

                    }
                }
            });
        });

        $('#owner-button').click(function(event) {
            var email = $('#change-owner').val();

            if (validateEmail(email)) {
                $('#owner-input-group').removeClass('has-error');

                $('#owner-icon').removeClass("fa fa-plus fa-fw");
                $('#owner-icon').addClass("fa fa-spinner fa-spin");

                var formData = {
                    _token: $('input[name=_token]').val(),
                    project_id: $('#id').val(),
                    email: email
                };

                $.ajax({
                    url : "/account/project/change_owner",
                    type: "POST",
                    data : formData,
                    success: function(data, textStatus, jqXHR)
                    {
                        if (data.status) {
                            location.reload();
                        }
                    }
                });
            }
            else {
                $('#owner-input-group').addClass('has-error');
            }
        });

        $('#share-button').click(function(event) {
            var email = $('#share-email').val();

            if (validateEmail(email)) {
                $('#share-input-group').removeClass('has-error');

                $('#share-icon').removeClass("fa fa-plus fa-fw");
                $('#share-icon').addClass("fa fa-spinner fa-spin");

                var formData = {
                    _token: $('input[name=_token]').val(),
                    project_id: $('#id').val(),
                    email: email,
                    add_or_del: 'add'
                };

                $.ajax({
                    url : "/account/project/share",
                    type: "POST",
                    data : formData,
                    success: function(data, textStatus, jqXHR)
                    {
                        if (data.status) {
                            $('ul.share-list-group').empty();
                            for (var i = 0; i < data.users.length; i++) {
                                $('ul.share-list-group').append(
                                    '<li class="list-group-item"><span class="glyphicon glyphicon-trash pull-right" style="cursor: pointer;" aria-hidden="true" data-email="'+ data.users[i].email +'"></span><span class="email">'+ data.users[i].email +'</span></li>'
                                );
                            }
                            $('#share-icon').removeClass("fa fa-spinner fa-spin");
                            $('#share-icon').addClass("fa fa-plus fa-fw");

                            $('#share-email').val('');
                        }
                        else {

                        }
                    }
                });
            }
            else {
                $('#share-input-group').addClass('has-error');
            }
        });
    });

</script>

@endif
