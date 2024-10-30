<?php 
defined('ABSPATH') or die("No direct script access!");

//Simple list assets

if ( ! function_exists( 'qcld_highlight_admin_style_script' ) ) {
    function qcld_highlight_admin_style_script($hook){

    	wp_enqueue_style( 'admin-fontawesome-css', QCLD_Highlight_ASSETS_URL1 . '/css/font-awesome.css');
    	wp_enqueue_style( 'highlight-admin-css',   QCLD_Highlight_ASSETS_URL1 . '/css/highlight_admin.css');
    	wp_enqueue_style( 'highlight-style-css',   QCLD_Highlight_ASSETS_URL1 . '/css/highlight.min.css' );
        wp_enqueue_style( 'rtl-css',   QCLD_Highlight_ASSETS_URL1 . '/css/rtl.css' );
        wp_enqueue_script( 'highlight-script-js',  QCLD_Highlight_ASSETS_URL1 . '/js/highlight.min.js', array( 'jquery' ));
        wp_enqueue_script( 'highlight-scripts-min-js',   QCLD_Highlight_ASSETS_URL1 . '/js/highlight-scripts.min.js');
    	wp_enqueue_script( 'highlight-admin-script-01', QCLD_Highlight_ASSETS_URL1 . '/js/highlight_custom_admin.js', array('jquery') );

        if (false !== strstr($hook, 'qcld-highlight')){
            wp_enqueue_script( 'highlight-clipboard', QCLD_Highlight_ASSETS_URL1 . '/js/admin-clipboard.js', array('jquery') );
        }
        
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker');

      

        wp_enqueue_style( 'highlight-hover-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-hover.css');

        $qcld_highlight_hover_bg_color = get_option('qcld_highlight_hover_bg_color') ? get_option('qcld_highlight_hover_bg_color'): '#f5f5f5';
        
        $qcld_highlight_hover = ".pad-white p {
                background-image: linear-gradient(to bottom, ".$qcld_highlight_hover_bg_color." 0%, ".$qcld_highlight_hover_bg_color." 100%) !important;
            }
            .pad-white:hover p {
                box-shadow: calc(20px - 0.32em) 0 0 ".$qcld_highlight_hover_bg_color.", -20px 0 0 ".$qcld_highlight_hover_bg_color." !important;
            }";

        wp_add_inline_style( 'highlight-hover-style', $qcld_highlight_hover );
        

        wp_enqueue_style( 'highlight-vertical-underline-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-vertical-underline.css');

        $qcld_highlight_vertical_underline_color = get_option('qcld_highlight_vertical_underline_color') ? get_option('qcld_highlight_vertical_underline_color'): '#ffa500';
        
        $vertical_underline_style = "div.qcld_hightlight_hover .vertical:before{
                background: ".$qcld_highlight_vertical_underline_color." !important;
            }";

        wp_add_inline_style( 'highlight-vertical-underline-style', $vertical_underline_style );
        
        
        

        wp_enqueue_style( 'highlight-horizontal-underline-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-horizontal-underline.css');

        $qcld_highlight_horizontal_underline_color = get_option('qcld_highlight_horizontal_underline_color') ? get_option('qcld_highlight_horizontal_underline_color'): '#ffa500';
        
        $horizontal_underline_style = "div.qcld_hightlight_hover .horizontal:before{
                background: ".$qcld_highlight_horizontal_underline_color." !important;
            }";

        wp_add_inline_style( 'highlight-horizontal-underline-style', $horizontal_underline_style );
    


        wp_enqueue_style( 'highlight-scroll-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-scroll.css');

        wp_enqueue_script( 'highlight-scroll-script-js', QCLD_Highlight_ASSETS_URL1 . '/js/withinviewport.js', array('jquery') );

        wp_enqueue_script( 'highlight-scroll-scroll-trigger-js', QCLD_Highlight_ASSETS_URL1 . '/js/jquery.withinviewport.js', array('jquery') );

        wp_enqueue_script( 'highlight-scroll-custom-js', QCLD_Highlight_ASSETS_URL1 . '/js/scroll-custom.js', array('jquery') );


        $qcld_highlight_ajax        = array(
            'admin_url'             => admin_url( 'admin-ajax.php', is_ssl() ? 'https' : 'http' ),
            'qcld_ajax_nonce'       => wp_create_nonce( 'qcld-highlight' ),
            'highlight_scroll_val'  => get_option( 'qcld_highlight_enable_highlight_scroll_val' ),
        );

        wp_localize_script( 'highlight-scroll-custom-js', 'qcld_highlight_ajax', $qcld_highlight_ajax );
    	
    }

}
add_action( 'admin_enqueue_scripts', 'qcld_highlight_admin_style_script' );


// Loading frontend style & scripts based on the above condition.
if ( ! function_exists( 'qcld_highlight_load_front_scripts' ) ) {
    function qcld_highlight_load_front_scripts($qcld_express_template=null){
        //Styles

        wp_enqueue_style( 'qcld_highlight_front_css', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-style.css');
        $highlight_custom_style = get_option('highlight_custom_style');
        wp_add_inline_style( 'qcld_highlight_front_css', $highlight_custom_style );
    
        
        wp_enqueue_style( 'highlight-hover-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-hover.css');

            $qcld_highlight_hover_bg_color = get_option('qcld_highlight_hover_bg_color') ? get_option('qcld_highlight_hover_bg_color'): '#f5f5f5';
            
            $qcld_highlight_hover = ".highlight-hover-effect p {
                    background-image: linear-gradient(to bottom, ".$qcld_highlight_hover_bg_color." 0%, ".$qcld_highlight_hover_bg_color." 100%) !important;
                }
                .highlight-hover-effect:hover p {
                    box-shadow: calc(20px - 0.32em) 0 0 ".$qcld_highlight_hover_bg_color.", -20px 0 0 ".$qcld_highlight_hover_bg_color." !important;
                }";               
           
    
        wp_enqueue_style( 'highlight-vertical-underline-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-vertical-underline.css');

            $qcld_highlight_vertical_underline_color = get_option('qcld_highlight_vertical_underline_color') ? get_option('qcld_highlight_vertical_underline_color'): '#ffa500';
            
            $vertical_underline_style = "div.hightlight-verticle-wrap .hightlight-verticle-underline{
                    background-image: linear-gradient(".$qcld_highlight_vertical_underline_color."21, ".$qcld_highlight_vertical_underline_color."7a, ".$qcld_highlight_vertical_underline_color.")  !important;
                }
                div.hightlight-verticle-wrap .hightlight-verticle-underline:hover{
                    background-image: linear-gradient(".$qcld_highlight_vertical_underline_color."21, ".$qcld_highlight_vertical_underline_color."7a, ".$qcld_highlight_vertical_underline_color.")  !important;
                }";

            wp_add_inline_style( 'highlight-vertical-underline-style', $vertical_underline_style );
      
        wp_enqueue_style( 'highlight-horizontal-underline-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-horizontal-underline.css');

            $qcld_highlight_horizontal_underline_color = get_option('qcld_highlight_horizontal_underline_color') ? get_option('qcld_highlight_horizontal_underline_color'): '#ffa500';
            
            $horizontal_underline_style = "div.hightlight-horizontal-wrap .hightlight-horizontal-underline:hover{
                    background-image: linear-gradient(".$qcld_highlight_horizontal_underline_color."7a, ".$qcld_highlight_horizontal_underline_color."9a, ".$qcld_highlight_horizontal_underline_color.");
                }";

            wp_add_inline_style( 'highlight-horizontal-underline-style', $horizontal_underline_style );
 
         
            $qcld_rtl_support_enable = get_option('qcld_rtl_support_enable');

            $qcld_rtl_effect ='';

            if ( $qcld_rtl_support_enable == 'on') {  
                
                $qcld_rtl_effect .= ".highlight-hover-effect:hover p {
                    background-position-x: right;
                }";

                $qcld_rtl_effect .= ".highlight-scroll-effect.highlight_scroll_active {
                     background-position-x: right;
                  }";


                 $qcld_rtl_effect .= "div.hightlight-horizontal-wrap .hightlight-horizontal-underline:hover {
                           background-position-x: right !important;
                    }";
                
             }
            wp_add_inline_style( 'highlight-hover-style', $qcld_rtl_effect ); 


            wp_enqueue_style( 'highlight-scroll-style', QCLD_Highlight_ASSETS_URL1 . '/css/highlight-scroll.css');

            wp_enqueue_script( 'highlight-scroll-script-js', QCLD_Highlight_ASSETS_URL1 . '/js/withinviewport.js', array('jquery') );

            wp_enqueue_script( 'highlight-scroll-scroll-trigger-js', QCLD_Highlight_ASSETS_URL1 . '/js/jquery.withinviewport.js', array('jquery') );

            wp_enqueue_script( 'highlight-scroll-custom-js', QCLD_Highlight_ASSETS_URL1 . '/js/scroll-custom.js', array('jquery') );


            $qcld_highlight_ajaxs      = array(
                'admin_url'       => admin_url( 'admin-ajax.php', is_ssl() ? 'https' : 'http' ),
                'highlight_scroll_val' => get_option( 'qcld_highlight_enable_highlight_scroll_val' ),
                'qcld_ajax_nonce' => wp_create_nonce( 'qcld-highlight' ),
            );

            wp_localize_script( 'highlight-scroll-custom-js', 'qcld_highlight_ajax', $qcld_highlight_ajaxs );
        

        
        // qcld_highlight_enable_twitter_share
        if(get_option('qcld_highlight_enable_twitter_share')!=''){

            wp_enqueue_style( 'highlight-tooltip-style', QCLD_Highlight_ASSETS_URL1 .'/css/highlight-tooltip-jquery-ui.css');

            wp_enqueue_script( 'highlight-tooltip-custom-js', QCLD_Highlight_ASSETS_URL1 .'/js/highlight-follow-custom.js', array('jquery','jquery-ui-core') );

            $hightlight_tooltip_style = ".ui-widget.ui-widget-content {background: rgb(41, 41, 41);border: 0px !important;} .ui-widget.ui-widget-content a{ color: white !important;} ";

            wp_add_inline_style( 'highlight-tooltip-style', $hightlight_tooltip_style );

                $qcld_highlight_ajax_tooltip      = array(
                    'admin_url'       => admin_url( 'admin-ajax.php', is_ssl() ? 'https' : 'http' ),
                    'QCLD_Highlight_IMG_URL1' => QCLD_Highlight_IMG_URL1,
                    'qcld_ajax_nonce' => wp_create_nonce( 'qcld-highlight' ),
                );

                wp_localize_script( 'highlight-tooltip-custom-js', 'qcld_highlight_ajax_tooltip', $qcld_highlight_ajax_tooltip );

            // QCLD_Highlight_IMG_URL1

        }


    }
}

if(get_option('qcld_highlight_enable')!=''){

    add_action('wp_enqueue_scripts', 'qcld_highlight_load_front_scripts');

}





