(function($) {
	$(document).ready(function() {
		// Style form controls
		$( type="select" ).addClass('form-control input-sm');
		$('#submit').addClass('btn btn-default');
		// Tables
		$('table').addClass('table');

		if(alienship_js_vars.featured_content === 'true') {
			// Activate the Featured Content carousel
			$('.carousel-inner .item:first, .carousel-indicators li:first').addClass('active');
			$('.carousel').carousel({
				interval: 7000
			});
		}
	});
})(jQuery);
