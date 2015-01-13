var out = false;
var speed = 500;
var tabs = new Array("projects","updates");
$( document ).ready(function() {

	$('.widget-tab').on("click", function(event) {
		event.preventDefault();

		var id = $(this).text().trim().toLowerCase();
		for( i = 0;  i < tabs.length; i++) {
			var tab = tabs[i];
			var content = $("#widget-"+tab);
			var link = $("#widget-"+tab+"-link");
			if(content.is(":visible")) 
				content.toggleClass("hidden")
			if(tab == id)
				content.toggleClass("hidden");


			if(link.hasClass("active") && tab != id) link.removeClass("active");
			if(tab == id) link.addClass("active");
			
		}
	});

	$('.widget-button').on("click", function(event) {
		event.preventDefault();
		if(out)  {
			widget_in();
			out = false;
		}
		else {
			out = true;
			widget_out();
		}
	});

});

function widget_out() {
	$('.widget').animate({
		left: '-=350'
	}, speed );

}
function widget_in() {
	$('.widget').animate({
		left: '+=350'
	}, speed );

}