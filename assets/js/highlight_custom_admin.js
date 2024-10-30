jQuery(document).ready(function($){


    $('.qcld_highlight-color').wpColorPicker();

    hljs.initHighlightingOnLoad();

    document.addEventListener('DOMContentLoaded', (event) => {
	  document.querySelectorAll('pre code').forEach((block) => {
	    hljs.highlightBlock(block);
	  });
	});

	/*
	$( "#tinymce" ).select(function() {
		alert("Something was selected");
	  $( "div" ).text( "Something was selected" ).show().fadeOut( 1000 );
	});
	*/


});


jQuery(document).ready(function($){
	$('.highlight_click_handle').on('click', function(e){
		e.preventDefault();
		var obj = $(this);
		container_id = obj.attr('href');
		$('.highlight_click_handle').each(function(){
			$(this).removeClass('nav-tab-active');
			$($(this).attr('href')).hide();
		})
		obj.addClass('nav-tab-active');
		$(container_id).show();
	})
	var hash = window.location.hash;
	if(hash!=''){
		$('.highlight_click_handle').each(function(){
			
			$($(this).attr('href')).hide();
			if($(this).attr('href')==hash){
				$(this).removeClass('nav-tab-active').addClass('nav-tab-active');
			}else{
				$(this).removeClass('nav-tab-active');
			}
		})
		$(hash).show();
	}
	
})