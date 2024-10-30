<?php 
/*
* Plugin Name: Highlight
* Plugin URI: https://wordpress.org/plugins/highlight
* Description: Highlight text on page content or blog post.
* Version: 2.0.2
* Author: dn88
* Author URI: https://www.dna88.com/
* Text Domain: qcld-highlight
* Requires at least: 4.6
* Tested up to: 6.5
* Domain Path: /lang/
* License: GPL2
*/


defined('ABSPATH') or die("No direct script access!");
 
 //Custom Constants
if ( ! defined( 'QCLD_Highlight_URL1' ) )
    define('QCLD_Highlight_URL1', plugin_dir_url(__FILE__));

if ( ! defined( 'QCLD_Highlight_IMG_URL1' ) )
    define('QCLD_Highlight_IMG_URL1', QCLD_Highlight_URL1 . "/assets/images");

if ( ! defined( 'QCLD_Highlight_ASSETS_URL1' ) )
    define('QCLD_Highlight_ASSETS_URL1', QCLD_Highlight_URL1 . "/assets");

if ( ! defined( 'QCLD_Highlight_DIR1' ) )
    define('QCLD_Highlight_DIR1', dirname(__FILE__));

if ( ! defined( 'QCLD_Highlight_INC_DIR1' ) )
    define('QCLD_Highlight_INC_DIR1', QCLD_Highlight_DIR1 . "/inc");


require_once( 'qc-project-highlight-frameworks.php' );
require_once( 'qc-project-highlight-asset.php' );
require_once( 'qc-project-highlight-shortcode.php' );
require_once( 'qc-free-plugin-upgrade-notice.php');
require_once( 'inc/notice/qcld-project-notification.php');
require_once( 'inc/button-menu/qcld-button-menu.php');

require_once( 'qc-support-promo-page/class-qc-support-promo-page.php' );


//add_action( 'admin_notices', 'qcld_highlight_promotion_notice');
if ( ! function_exists( 'qcld_highlight_promotion_notice' ) ) {
    function qcld_highlight_promotion_notice(){

        $screen = get_current_screen();

        // var_dump( $screen->base );
        // wp_die();

        if( isset($screen->base) && (  $screen->base == 'toplevel_page_qcld-highlight' ||
            $screen->base == 'highlight_page_qcld-notice-settings' ||
            $screen->base == 'highlight_page_qcld-btn-menu-settings' || 
            $screen->base == 'highlight_page_qcld-highlight-supports' ) ){

            $promotion_img = QCLD_Highlight_IMG_URL1 . "/eid-24.gif";
            ?>
            <div data-dismiss-type="qcbot-feedback-notice" class="notice is-dismissible qcbot-feedback" style="background: #C13825">
                <div class="">
                    
                    <div class="qc-review-text" >
                    <a href="<?php echo esc_url( 'https://www.dna88.com/product/highlight/' ); ?>" target="_blank">
                        <img src="<?php echo esc_url($promotion_img); ?>" alt=""></a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'qcld_highlight_activation_redirect' ) ) {
	function qcld_highlight_activation_redirect( $plugin ) {

        $screen = get_current_screen();

        if( ( isset( $screen->base ) && $screen->base == 'plugins' ) && $plugin == plugin_basename( __FILE__ ) ) {
	    //if( $plugin == plugin_basename( __FILE__ ) ) {
	        exit( wp_redirect( admin_url( 'admin.php?page=qcld-highlight') ) );
	    }

	}
}
add_action( 'activated_plugin', 'qcld_highlight_activation_redirect' );


/*****************************************************
 * Plugin default data set when activation.
 *****************************************************/
register_activation_hook(__FILE__, 'qcld_wp_notification_activation_options');
if (!function_exists('qcld_wp_notification_activation_options')) {
    function qcld_wp_notification_activation_options(){
        
        if(!get_option('qcld_wp_notifications_enable')) {
            update_option('qcld_wp_notifications_enable', '');
        }
        if(!get_option('qcld_wp_notifications_action_button')) {
            update_option('qcld_wp_notifications_action_button', '');
        }
        
        if(!get_option('qcld_wp_notifications_text_align')) {
            update_option('qcld_wp_notifications_text_align', 'center');
        }
        
        if(!get_option('qcld_wp_notifications_close_icon')) {
            update_option('qcld_wp_notifications_close_icon', 'show');
        }
        
        if(!get_option('qcld_wp_notifications_banner_position')) {
            update_option('qcld_wp_notifications_banner_position', 'qcld_bottom');
        }
        
        if(!get_option('qcld_wp_notifications_banner_sticky')) {
            update_option('qcld_wp_notifications_banner_sticky', 'no');
        }
        
        if(!get_option('qcld_wp_notifications_banner_style')) {
            update_option('qcld_wp_notifications_banner_style', 'qcld_default');
        }
        
        if(!get_option('qcld_wp_notifications_bg_color')) {
            update_option('qcld_wp_notifications_bg_color', '');
        }
        
        if(!get_option('qcld_wp_notifications_font_color')) {
            update_option('qcld_wp_notifications_font_color', '');
        }
        
        if(!get_option('qcld_wp_notifications_set_cookie')) {
            update_option('qcld_wp_notifications_set_cookie', '');
        }
        
        if(!get_option('qcld_wp_notifications_call_action_btn')) {
            update_option('qcld_wp_notifications_call_action_btn', '');
        }
        
        if(!get_option('qcld_wp_notifications_call_action_text')) {
            update_option('qcld_wp_notifications_call_action_text', '');
        }
        
        if(!get_option('qcld_wp_notifications_call_action_link')) {
            update_option('qcld_wp_notifications_call_action_link', '');
        }
        
        if(!get_option('qcld_wp_notifications_button_text_align')) {
            update_option('qcld_wp_notifications_button_text_align', '');
        }
        
        if(!get_option('qcld_wp_notifications_btn_bg_color')) {
            update_option('qcld_wp_notifications_btn_bg_color', '');
        }
        
        if(!get_option('qcld_wp_notifications_btn_font_color')) {
            update_option('qcld_wp_notifications_btn_font_color', '');
        }
        
        if(!get_option('qcld_wp_notifications_close_icon_position')) {
            update_option('qcld_wp_notifications_close_icon_position', 'qcld_default');
        }
        
        if(!get_option('qcld_wp_notifications_scroll_position')) {
            update_option('qcld_wp_notifications_scroll_position', 'qcld_disable');
        }
    

    }


}
