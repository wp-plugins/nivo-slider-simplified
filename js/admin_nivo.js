	jQuery(document).ready(function($){
		console.log("loaded script");
		//sortable
		$( ".content_area ul" ).sortable({
			revert: true,
			 stop         : function(event,ui){ 
				            $all=$( ".content_area li span.wp_value" ).map(function() {	return this.id;	}).get().join();		
							$("#input_ttt").val($all);
				             }
		});
		//draggable
		$( ".content_area_small li" ).draggable({ 
			containment: "#full_content", 
			scroll: true,
			connectToSortable: ".content_area ul",
			helper: "clone",
			revert: "invalid"/*,
			stop: function(event, ui) {
										$all=$( ".content_area li span.wp_value" ).map(function() {	return this.id;	}).get().join();		
										$("#input_ttt").val($all);
											
										}*/			
			});	
			
			//delete function
			$('#wp_sort').on('click', 'li, li a, li p', function(event){
			var clicked_element_class = $(this).attr('class');
			var $item = $( this );
				$target = $( event.target );			
				if ( $target.is( "span.ui-icon-trash" ) ) {				
						 var answer = confirm("Delete slide")
						if (answer){
							$item.fadeOut(function() {$item.remove();
														$all=$( ".content_area li span.wp_value" ).map(function() {	return this.id;	}).get().join();		
														$("#input_ttt").val($all);
														});
						}else{return false;	}
				} 
			});	
		
		
			
	}); //jquery ends
	
	