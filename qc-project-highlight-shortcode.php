<?php 

defined('ABSPATH') or die("No direct script access!");

//For highlight scroll effect
add_shortcode('h-s', 'qcld_highlight_scroll_effect_shortcode');
add_shortcode('highlight-scroll', 'qcld_highlight_scroll_effect_shortcode');
if ( ! function_exists( 'qcld_highlight_scroll_effect_shortcode' ) ) {
    function qcld_highlight_scroll_effect_shortcode( $atts, $content = null){

        ob_start();
        extract( 
        	shortcode_atts( array(
            	'highlight_scroll_effect'  => '',
        	), $atts ) 
        );

        $html = '<mark class="highlight-scroll-effect">'.$content .'</mark>.';
        
        ob_get_clean();
        return $html;

    }
}

//For Hover effect on text
add_shortcode('h-h', 'qcld_highlight_hover_effect_shortcode');
add_shortcode('highlight-hover', 'qcld_highlight_hover_effect_shortcode');
if ( ! function_exists( 'qcld_highlight_hover_effect_shortcode' ) ) {
    function qcld_highlight_hover_effect_shortcode( $atts, $content = null){

        ob_start();
        extract( 
        	shortcode_atts( array(
            	'highlight_hover_effect'  => '',
        	), $atts ) 
        );

        $html = '<div class="highlight-hover-effect">
    			  <div class="highlight-hover-effect-child">
    			    <p>'. $content .'</p>
    			  </div>
    			</div>';
        
        ob_get_clean();
        return $html;

    }
}


//For verticle effect on text
add_shortcode('h-u-v', 'qcld_hightlight_verticle_underline_shortcode');
add_shortcode('highlight-underline-v', 'qcld_hightlight_verticle_underline_shortcode');
if ( ! function_exists( 'qcld_hightlight_verticle_underline_shortcode' ) ) {
    function qcld_hightlight_verticle_underline_shortcode( $atts, $content = null){

        ob_start();
        extract( 
        	shortcode_atts( array(
            	'hightlight_v_underline'  => '',
        	), $atts ) 
        );

        $html = '<div class="hightlight-verticle-wrap">
    			   <p class="hightlight-verticle-underline">'. $content .'</p>
    			</div>';
        
        ob_get_clean();
        return $html;

    }
}

//For Horizontal effect on text
add_shortcode('h-u-h', 'qcld_hightlight_horizontal_underline_shortcode');
add_shortcode('highlight-underline-h', 'qcld_hightlight_horizontal_underline_shortcode');
if ( ! function_exists( 'qcld_hightlight_horizontal_underline_shortcode' ) ) {
    function qcld_hightlight_horizontal_underline_shortcode( $atts, $content = null){

        ob_start();
        extract( 
        	shortcode_atts( array(
            	'hightlight_h_underline'  => '',
        	), $atts ) 
        );

        $html = '<div class="hightlight-horizontal-wrap">
    			  <span class="hightlight-horizontal-underline">'. $content .'</span>
    			</div>';
        
        ob_get_clean();
        return $html;

    }
}