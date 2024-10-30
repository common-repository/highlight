(function($){
	"use strict";

	jQuery(document).ready(function($){


		if( qcld_notice_set_cookie == 1 ){

		    if( Cookies.get('qcld_hide_banner_cookie') != undefined ) {
		        $('.qcld_notice_banner').hide();
		    }

		    $('#qcld_notice_close_button_link').click(function(){
		        Cookies.set('qcld_hide_banner_cookie', 1, { expires: 1, path: '/' }); 

		        $('.qcld_notice_banner').hide();
		    });

		}else{

		    $('#qcld_notice_close_button_link').click(function(){

		        $('.qcld_notice_banner').hide();
		    });


		}




	});


})(jQuery);

           