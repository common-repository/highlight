jQuery(document).ready(function($){

	var highlight = qcld_highlight_ajax.highlight_scroll_val;


  	document.body.setAttribute("data-highlight", highlight);

  	$(window).bind("scroll", function() {

    	// clear all active class
	   	$('.highlight-scroll-effect').removeClass('highlight_scroll_active');

	    //add active class to 
	    $(".highlight-scroll-effect").withinviewport().each(function() {
		
			if( ! $(this).hasClass('highlight_scroll_active') ){
				$(this).addClass('highlight_scroll_active');
			}
	    });


	});

	var check_wp_color = $('.qcld-wp-color').length;

	    if( check_wp_color > 0)
	    	$('.qcld-wp-color').wpColorPicker();

	    

})