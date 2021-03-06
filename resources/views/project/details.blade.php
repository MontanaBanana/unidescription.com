@extends('layouts.app')

@section('title', $project->title . ' Details')

@section('header')

@endsection

@section('content')

<?php

// if adding new, user has permission
$editable = 1;

if(isset($project) && $project->id > 0){
	// check if user has permission to edit
	
	$c = DB::select('SELECT can_edit FROM project_user WHERE project_id=:projectid AND user_id=:userid LIMIT 1', ['projectid'=>$project->id, 'userid'=>Auth::user()->id]);
	$c = array_shift($c);
	
	$editable = 0;
	if($c){
		$editable = $c->can_edit;
	}
	
	if($project->user_id == Auth::user()->id){
		$editable = 1;
	}
}

?>

<!-- Page Heading/Breadcrumbs -->
<div class="row">
	<div class="container">
		<div class="col-lg-12">
			<h1 class="page-header">
					@if ($project->id)
						{{ $project->title }}
					@else
						Create New Project
					@endif
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{ SITEROOT }}/">Home</a></li>
				<li><a href="{{ SITEROOT }}/account">Account</a></li>
				<li><a href="{{ SITEROOT }}/account/project">My Projects</a></li>
				<li class="active">
					@if ($project->id)
						{{ $project->title }}
					@else
						Create New Project
					@endif
				</li>
			</ol>
		</div>
		<div class="col-lg-12">
			<nav class="navbar navbar-default" style="border-radius: 4px;">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-project-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!--<span class="navbar-brand">My Project:</span>-->
					</div>
	
					<!-- Collect the nav links, forms, and other content for toggling -->
					<?php
					if ($project->id > 0) {
					?> 
					<div class="collapse navbar-collapse" id="bs-project-navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="/account/project/details/{{ $project->id }}/{{ strtolower(preg_replace('%[^a-z0-9_-]%six','-', $project->title)) }}">Backstage <span class="sr-only">(current)</span></a></li>
							<!--<li><a href="/account/project/assets/{{ $project->id }}/{{ strtolower(preg_replace('%[^a-z0-9_-]%six','-', $project->title)) }}">Media Assets</a></li>-->
							<li><a href="/account/project/toc/{{ $project->id }}/{{ strtolower(preg_replace('%[^a-z0-9_-]%six','-', $project->title)) }}">Frontstage</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
					<?php
					}
					?>
				</div><!-- /.container-fluid -->
			</nav>
		</div>
		
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="text/javascript">
function onSubmit(token) {
    document.getElementById("project_details_form").submit();
}
</script>
		
		<div class="row project">
				<form id="project_details_form" method="POST" action="/account/project/details" enctype="multipart/form-data">
					
					@if($editable)
					{!! csrf_field() !!}
					<input type="hidden" name="id" id="id" value="{{ $project->id }}" />			
					@endif
					
						<div class="col-md-8 edit-column">
							<div class="">
											
								<!-- project details -->
								@if (!$project->id)
								@if($editable)
								<input type="hidden" id="chosen_template" name="chosen_template" value="template-none" />
								@endif
								
								<div class="panel panel-default">
									<div class="panel-heading">Project Template:</div>
									<div class="panel-body">
										<div class="select-template selected" style="float: left;" data-template="template-none">
											<img class="thumbnail" src="/images/placeholder.png" style="height: 182px;" alt="No Template placeholder">
											<p>No Template</p>
										</div>
										<div class="select-template" style="float: right;" data-template="template-nps">
											<input type="hidden" id="template-nps" value="0" />
											<img class="thumbnail" src="{{ SITEROOT }}/images/campfires_and_candlelight.jpg" alt="NPS Campfires and Candlelight">
											<p>NPS Unigrid Brochure</p>
										</div>
									</div>
								</div>
								@endif
				
								<div class="panel panel-default">
									<div class="panel-heading" id="project-name-label">
										Project Name:
									</div>
									<div class="panel-body form-element">
										<input aria-labelledby="project-name-label" type="text" class="large" name="title" value="{{ $project->title }}" <?php if(!$editable){echo ' disabled';}?> />
									</div>
								</div>
<?php
if ($project->id > 0):
?>
<!--
								
								<div class="panel panel-default">
									<div class="panel-heading" id="app-store-description-label">
										App Store Description:
									</div>
									<div class="panel-body form-element">
										<textarea aria-labelledby="app-store-description-label" name="description" <?php if(!$editable){echo ' disabled';}?>>{{ $project->description }}</textarea>
									</div>
								</div>
-->
								
								<!--<div class="panel panel-default">
									<div class="panel-heading" id="gpo-label">
										GPO #:
									</div>
									<div class="panel-body form-element">
										<input aria-labelledby="gpo-label" type="text" class="large" name="gpo" value="{{ $project->gpo }}" <?php if(!$editable){echo ' disabled';}?> />
									</div>
								</div>-->
	
								<div class="panel panel-default">
									<div class="panel-heading" id="version-label">
										Version / Version Notes:
									</div>
									<div class="panel-body form-element">
										<textarea aria-labelledby="version-label" name="version" <?php if(!$editable){echo ' disabled';}?>>{{ $project->version }}</textarea>
									</div>
								</div>

                <div class="panel panel-default">
                    <div class="panel-heading" style="height: 57px;">
                        Geolocation Tag @if($editable)<span class="pull-right" style="padding-right: 5px;"><a class="btn btn-sm btn-primary" style="position: relative; top: -5px;" onclick="FillOutCoords()"><span id="location-arrow" class="fa fa-map-marker" style="font-size: 2em;" title="Click or tap to grab your current GPS coordinates"></span></a></span>@endif
                    </div>
                    <div class="panel-body">
                        This GPS coordinate is used to display how far away a person is from this location while in the UniD app. You can click the map marker icon above to get your current GPS coordinates or fill them in manually below.    
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Latitude:
                        <input type="text" id="latitude" class="large" name="latitude" value="{{ $project->latitude }}" style="color:#000; width:100%; padding:0 5px">
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Longitude:
                        <input type="text" id="longitude" class="large" name="longitude" value="{{ $project->longitude }}" style="color:#000; width:100%; padding:0 5px">
                    </div>
                </div>
	
<!--
								<div class="panel panel-default">
									<div class="panel-heading" id="metatags-label">
										Metatags: (comma separated list. i.e.: National Historial Site, Oregon, bison, Midwest.)
									</div>
									<div class="panel-body form-element">
										<textarea aria-labelledby="metatags-label" name="metatags" <?php if(!$editable){echo ' disabled';}?>>{{ $project->metatags }}</textarea>
									</div>
								</div>
-->
								
<!--
								<div class="panel panel-default">
									<div class="panel-heading" id="author-label">
										Author:
									</div>
									<div class="panel-body form-element">
										<input aria-labelledby="author-label" type="text" class="large" name="author" value="{{ $project->author }}" <?php if(!$editable){echo ' disabled';}?> />
									</div>
								</div>
-->
								
<!--
								<div class="panel panel-default">
									<div class="panel-heading" id="publication-label">
										Publication year of brochure:
									</div>
									<div class="panel-body form-element">
										<input aria-labelledby="publication-label" type="text" class="large" name="publication_date" value="{{ $project->publication_date }}" <?php if(!$editable){echo ' disabled';}?> />
									</div>
								</div>
-->
																																				
								<div class="panel panel-default">
									<div class="panel-heading">Project Photo:</div>
									<div class="panel-body white">
										<div class="col-md-6">
											@if ($project->image_url)
												<img src="{{ $project->image_url }}?ts=<?php echo time(); ?>" style="width: 100%;" class="thumbnail" />
												@if($editable)
												<button type="button" class="btn btn-primary btn-lg btn-icon label-danger" id="deleteProjectImage" style="width: 100%;">
														<span class="far fa-trash"></span> Delete photo
												</button>
												@endif
											@endif
										</div>
										@if($editable)
										<div class="col-md-6">
											<p>Uploaded image should be at least 800x600 pixels.</p>
											<input type="file" id="project_image" name="project_image">
											<!--<a href="#" class="btn btn-primary btn-icon"><span class="fa fa-camera-retro"></span> Upload Photo</a>-->
										</div>
										@endif
									</div>
								</div>
	
                                @include('project.shared.assets')

<?php endif; ?>
								@if($editable)
								<div class="wrapper-footer">
									<button class="g-recaptcha btn btn-lg btn-primary btn-icon @if ($project->id) save-details @endif" data-sitekey="6LdbV4oUAAAAAIxVY3G5nUu2fb_8RUOA3CFZ6NwT" data-callback='onSubmit'><span class="fa fa-save"></span> Save Details</button>
									<!--<a href="#" class="btn btn-lg btn-success btn-icon"><span class="fa fa-check"></span> Project Details Saved</a>-->
								</div>
								@endif
							</div>
	
						</div>
						<div class="col-md-4 tips-column">
							
							
<!--
							<div class="help">
								<span class="fa fa-question-circle"></span>
								<p>Need to learn more about best practices for audio descriptions? <a href="/unid-academy">Read our guide</a> for more details!</p>
							</div>
-->
	
							@include('project.shared.export')

							@include('project.shared.owner')

							@include('project.shared.version')
						</div>
					<!-- /.row -->
				</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myDeleteModalLabel">Delete Photo</h4>
      </div>
      <div class="modal-body col-md-12">
        Are you sure you want to delete the component photo?
      </div>
      <div class="modal-footer">
        <button id="deleteModalClose" type="button" class="btn btn-default" data-dismiss="modal">No, Close</button>
        <button type="button" class="btn btn-primary label-danger" id="deleteImage">Yes, Delete Photo</button>
<!--       result = $image.cropper(data.method, data.option, data.secondOption);-->
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')

<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript">
	@if($editable)
	$(document).ready(function() {
		
		$('.select-template').on('click', function(e) {
			$('.select-template').removeClass('selected');
			$(this).addClass('selected');
			
			console.log( $(e.currentTarget).data('template') );
			$('#chosen_template').val( $(e.currentTarget).data('template') );
			//console.log( $(e).data() );
		});

        $("#project_details_form").data("changed",false);
        $("#project_details_form :input").change(function() {
            $("#project_details_form").data("changed",true);
        });


        @if ($project->id)
            /*
            $(window).on('beforeunload', function(){
                if ($("#project_details_form").data("changed")) {

                    $('.modal-title').html('Please wait');
                    $('.modal-body').html('Uploading data...&nbsp;&nbsp;&nbsp;<img src="/images/ajax-loader.gif" style="border: 0;">');
                    $('.modal-footer').html('');

                    $('#deleteModal').modal({show: true});
                    $("#project_details_form").ajaxSubmit({url: '/account/project/details', type: 'post', async: false});
                }
            });
             */
        @endif


        @if ($project->id)
        window.onunload = function saveAndPostData() {
                if ($("#project_details_form").data("changed")) {
                    var formData = new FormData(document.getElementById("project_details_form"));
                    console.log('sending beacon');
                    console.log(formData);
                    formData.set('was_autosave', 0);
                    navigator.sendBeacon("/account/project/details", formData);
                    console.log('sent');
                }
        };
        @endif


        $('#project_image').on('change', function() {
                $('.modal-title').html('Please wait');
                $('.modal-body').html('Uploading data...&nbsp;&nbsp;&nbsp;<img src="/images/ajax-loader.gif" style="border: 0;">');
                $('.modal-footer').html('');
                $('#deleteModal').modal({show: true});
                setTimeout(function() { $("#project_details_form").submit(); }, 1000);

        });

        $('.save-details').on('change', function() {
                $('.modal-title').html('Please wait');
                $('.modal-body').html('Uploading data...&nbsp;&nbsp;&nbsp;<img src="/images/ajax-loader.gif" style="border: 0;">');
                $('.modal-footer').html('');
                $('#deleteModal').modal({show: true});
                setTimeout(function() { $("#project_details_form").submit(); }, 500);

        });
		
		$('#deleteProjectImage').click(function() {
			$.ajax({
				method: 'POST',
				headers: { 'X-CSRF-TOKEN' : $('input[name="_token"]').val()  },
				url: '/account/project/deleteProjectImage',
				data: {
					project_id: $('#id').val(),
				},
				dataType: "json",
				success: function(response) {
					location.reload();
					//$('#deleteModalClose').click();
					//$('#save-page').click();
					//$('#was_autosave').val(0);
					//$("#section_form").ajaxSubmit({url: '/account/project/section', type: 'post'});

				}
			});
		});		//$(":file").filestyle({buttonBefore: true, placeHolder: 'Project Photo', buttonText: '&nbsp;Project photo', size: 'md', input: false, iconName: "fa fa-camera-retro"});

	});
	@endif
    function FillOutCoords() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                 var latitude  = position.coords.latitude;
                 var longitude = position.coords.longitude;

                 $('#latitude').val( latitude );
                 $('#longitude').val( longitude );
            });
        } else {
              /* geolocation IS NOT available */
            alert('Couldn\'t access GPS coordinates');
        }
    }


</script>

@endsection
