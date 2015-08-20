$(document).ready(function() {
	$( "#type1-1" ).draggable({
		revert: true,
		//containment: $("#playarea"),
	});
	$( "#type1-2" ).draggable({
		revert: true,
		//containment: $("#playarea"),
	});

	// Getter
	var disabled = $( "#type1-1" ).draggable( "option", "disabled" );
	var revert = $( "#type1-1" ).draggable( "option", "revert" );

	$( "#mannequin" ).droppable({
      drop: function() {
      	$( "#type1-1" ).draggable( "option", "revert", false );
      	$( "#type1-1" ).draggable( "option", "disabled", true );
	    $( "#type1-1" ).position({
			of: $( "#mannequin" ),
			my: "center center",
			at: "center center",
			collision: "none none" 
		});
      }
    });
});