function validateEmail(email) { 
  // http://stackoverflow.com/a/46181/11236
  
    var re = /^([^<]*<)?(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))(>?)$/;
    return re.test(email);
}

function toggleDeleted() {
	if ($('input#toggle-deleted').is(':checked')) {
		$('.deleted').show();
	}
	else {
		$('.deleted').hide();
	}
}

$(document).ready(function(){
	
	$('.pull-down').each(function() {
    	$(this).css('margin-top', $(this).parent().height()-$(this).height())
	});
	// Drag and drop
	/*$(document).bind('pageinit', function() {
		$( "#sortable" ).nestedSortable();
		$( "#sortable" ).disableSelection();
		//Refresh list to the end of sort to have a correct display
		$( "#sortable" ).bind( "sortstop", function(event, ui) {
			$('#sortable').listview('refresh');
		});
	});*/
	
	// Table of contents toggles
	$( ".table-of-contents ul li ul" ).hide();
	
	//$(".table-of-contents .toggle").on("click", function(e){
	//$(".table-of-contents .toggle").on("tap", function(){
	//$( ".table-of-contents .toggle" ).click(function(){
	$(document).on("touchstart click", ".table-of-contents .toggle", function(e){
		e.preventDefault();
		var parentItem = $( this ).parent().parent().get( 0 ).id;
		if( $( "#" + parentItem + " ul" ).length ){
			if( $( this ).hasClass( "fa-chevron-right" ) ){
				// hide all others
				//$( ".table-of-contents .toggle.fa-chevron-down" ).addClass( "fa-chevron-right" );
				//$( ".table-of-contents .toggle" ).removeClass( "fa-chevron-down" );
				//$( ".table-of-contents ul li ul" ).hide();
				
				$( this ).removeClass( "fa-chevron-right" );
				$( this ).addClass( "fa-chevron-down" );
				$( "#" + parentItem + " ul" ).show();
				
			} else {
				$( this ).removeClass( "fa-chevron-down" );
				$( this ).addClass( "fa-chevron-right" );
				$( "#" + parentItem + " ul" ).hide();
			}
		}
	});
	
    var group = $("ul#sortable").sortable({
		handle: "span.fa-bars",
	    afterMove: function ($placeholder, container, $closestItemOrContainer) {
		    //console.log('afterMove');
		    //console.log($placeholder, container, $closestItemOrContainer);
		},
		onDrop: function ($item, container, _super) {
			var data = group.sortable("serialize").get();
			var jsonString = JSON.stringify(data, null, ' ');
			//console.log('onDrop');
			//console.log(jsonString);
			$('#json_toc').val(jsonString);
			//$('#serialize_output').html("<PRE>"+jsonString+"</pre>");
			_super($item, container);
			$('#toc-form').submit();
		},
		isValidTarget: function ($item, container) {
			var item_count =  $('i.fa',$item).length;
			var container_count = $('i.fa',container.el).length
		    //console.log('container', $('i.fa',container.el).length);
		    //console.log('item', $('i.fa',$item).length);
			console.log('item', item_count);
			console.log('container', container_count);
		    
		    if (item_count == 1 && container_count == 0) {
			    return false;
		    }
		    return true;
		},
		//tolerance: 6,
		//distance: 10,
		exclude: ".new-component",
		nested: true
    });

});
