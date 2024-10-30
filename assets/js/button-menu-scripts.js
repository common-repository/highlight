(function($) {
	"use strict";
	jQuery(document).ready(function(){
		jQuery('.qcld-highlight-menu-button-container .menu-item-has-children > a').on('click',function(e){
			var item_li = jQuery(this).parent('li');

			if( jQuery(this).parents('.qcld-highlight-menu-button-container').find('.qcld-highlight-menu-breadcrumb').length > 0 ){
				var breadcrumb = jQuery(this).parents('.qcld-highlight-menu-button-container').find('.qcld-highlight-menu-breadcrumb');
				var current_text = jQuery(this).text();
				var breadcrumb_separator = breadcrumb.data('breadcrumb_separator');
				var breadcrumb_length = breadcrumb.find('.qcld-highlight-menu-breadcrumb-item').length;
				var link_item_id = jQuery(this).data('link-item-id');
				
				if( breadcrumb_length > 0 ){
					breadcrumb.append('<span class="qcld-highlight-menu-breadcrumb-item">'+'<span class="qc-btn-breadcrumb-icon">'+breadcrumb_separator+'</span><a data-link-id="'+link_item_id+'" data-depth="'+breadcrumb_length+'" href="#">'+current_text+'</a></span>');			
				}else{
					breadcrumb.append('<span class="qcld-highlight-menu-breadcrumb-item"><a data-link-id="'+link_item_id+'" data-depth="'+breadcrumb_length+'" href="#"><i class="qcld-highlight-menu-submenu-indicator fas fa-arrow-left"></i></a></span>');
				}

			}

			if( item_li.children('.sub-menu').length > 0 ){
				e.preventDefault();
				item_li.siblings('li').fadeOut();
				item_li.children('a').fadeOut(400, "swing", function(){
					item_li.children('.sub-menu').fadeIn();
				});
			}
			

			setTimeout(function () {

				jQuery('.qcbm-menu-style-1  ul.sub-menu li a').each(function() {
					var li_width = jQuery(this).innerWidth();
					jQuery(this).css({'height': li_width})
				});	
				
			}, 600);
			
			
		});

		jQuery('.qcld-highlight-menu-button-container').on('click', '.qcld-highlight-menu-breadcrumb-item a', function(e){
			e.preventDefault();
			var item_link = jQuery(this).data('link-id');
			var parent_wrap = jQuery(this).closest('.qcld-highlight-menu-button-container');

			parent_wrap.find('.qcld-highlight-menu-link[data-link-item-id="'+item_link+'"]').parent().find('.sub-menu').hide();
			parent_wrap.find('.qcld-highlight-menu-link[data-link-item-id="'+item_link+'"]').parent().find('.sub-menu').find('li, li > a').show();

			parent_wrap.find('.qcld-highlight-menu-link[data-link-item-id="'+item_link+'"]').fadeIn();
			parent_wrap.find('.qcld-highlight-menu-link[data-link-item-id="'+item_link+'"]').parent().siblings('li').fadeIn();
			
			jQuery(this).parent('.qcld-highlight-menu-breadcrumb-item').nextAll('.qcld-highlight-menu-breadcrumb-item').remove();
			jQuery(this).parent('.qcld-highlight-menu-breadcrumb-item').remove();


			setTimeout(function () {

				jQuery('.qcbm-menu-style-1  ul.sub-menu li a').each(function() {
					var li_width = jQuery(this).innerWidth();
					jQuery(this).css({'height': li_width})
				});	
				
			}, 600);


		});

		jQuery('a[data-qc-btn-icon]').each(function(){
			var icon = jQuery(this).data('qc-btn-icon');
			jQuery(this).prepend('<i class="qcld-highlight-menu-icon '+icon+'"></i>');
		});
		jQuery('a[data-submenu-indicator]').each(function(){
			var icon = jQuery(this).data('submenu-indicator');
			jQuery(this).append('<i class="qcld-highlight-menu-submenu-indicator '+icon+'"></i>');
		});

		if ( jQuery.isFunction(jQuery({}).tooltipster) ) { 
			jQuery('.qcld-highlight-menu-tooltip').each(function(){
				jQuery(this).tooltipster({
					contentCloning: true,
					animation: 'grow',
					selfDestruction: true,
					theme: 'tooltipster-borderless',
					trigger: 'hover',
					zIndex: 99999999,
				});
			});
		}
		
		
		

		
	});
})(jQuery);