<?php
defined('ABSPATH') or die("No direct script access!");

if ( ! function_exists( 'qcld_notice_settings_page' ) ) {
	function qcld_notice_settings_page(){
	        
	    ?>
	    <div class="wrap">
	        <h1><?php esc_html_e('Notice Settings','qcld-highlight') ?></h1>
	        <form method="post" action="options.php">
	            <?php settings_fields( 'qcld_notice_settings_group' ); ?>
	            <?php do_settings_sections( 'qcld_notice_settings_group' ); ?>
	            <div >
	                <table class="form-table form_table_notice_wrap">
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Show Notice','qcld-highlight') ?></th>
	                        <td>
	                            <input type="checkbox" name="qcld_notice_enable" size="100" value="<?php echo (get_option('qcld_notice_enable')!=''? esc_attr( get_option('qcld_notice_enable')) : '1' ); ?>" <?php echo (get_option('qcld_notice_enable') == '' ? esc_attr( get_option('qcld_notice_enable')): esc_attr( 'checked="checked"' )); ?>  />  
	                            <i><?php esc_html_e('Enable this option to Show Notice ','qcld-highlight') ?></i>                           
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Message','qcld-highlight') ?></th>
	                        <td>
	                            <?php $settings = array('textarea_name' =>
	                                    'qcld_notice_message',
	                                    'textarea_rows' => 20,
	                                    'editor_height' => 100,
	                                    'editor_class' => 'customNotificationClass',
	                                    'media_buttons' => false
	                                );

	                                wp_editor(get_option('qcld_notice_message'), 'qcld_notice_message', $settings); ?>                           
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Background Color','qcld-highlight') ?></th>
	                        <td>
	                            <input type="text" name="qcld_notice_bg_color"
	                               value="<?php echo get_option('qcld_notice_bg_color'); ?>"
	                               class="qcld-wp-color">                          
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Font Color','qcld-highlight') ?></th>
	                        <td>          

	                            <input type="text" name="qcld_notice_font_color"
	                               value="<?php echo get_option('qcld_notice_font_color'); ?>"
	                               class="qcld-wp-color">                 
	                        </td>
	                    </tr>
	                    
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Text Align','qcld-highlight') ?></th>
	                        <td>
	                            <p>
	                                <label class="radio-inline" style="padding-right: 15px;">
	                                    <input id="qcld_notice_text_align" type="radio" name="qcld_notice_text_align" value="left" <?php echo ((get_option('qcld_notice_text_align') == 'left' || get_option('qcld_notice_text_align') == '') ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                    <?php esc_html_e('Left','qcld-highlight') ?> </label>
	                            
	                                <label class="radio-inline">
	                                    <input id="qcld_notice_text_align" type="radio" name="qcld_notice_text_align" value="center" <?php echo (get_option('qcld_notice_text_align') == 'center' ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                    <?php esc_html_e('Center ','qcld-highlight') ?>  </label>
	                            
	                                <label class="radio-inline">
	                                    <input id="qcld_notice_text_align" type="radio" name="qcld_notice_text_align" value="right" <?php echo (get_option('qcld_notice_text_align') == 'right' ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                    <?php esc_html_e('Right','qcld-highlight') ?>  </label>
	                            </p>                        
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Action Button','qcld-highlight') ?></th>
	                        <td>
	                        
	                            <label class="radio-inline">
	                                <input id="qcld_notice_call_action_btn" type="radio" name="qcld_notice_call_action_btn" value="enable" <?php echo (get_option('qcld_notice_call_action_btn') == 'enable' ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Enable ','qcld-highlight') ?>  </label>   
	                            
	                            <label class="radio-inline" style="padding-right: 15px;">
	                                <input id="qcld_notice_call_action_btn" type="radio" name="qcld_notice_call_action_btn" value="disable" <?php echo ((get_option('qcld_notice_call_action_btn') == 'disable' || get_option('qcld_notice_call_action_btn') == '') ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Disable ','qcld-highlight') ?> </label>                          
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Action Button Text','qcld-highlight') ?></th>
	                        <td>
	                        
	                            <input type="text" name="qcld_notice_call_action_text" value="<?php echo (get_option('qcld_notice_call_action_text') ? esc_attr( get_option('qcld_notice_call_action_text') ): '' ); ?>">
	                                                         
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Action Button Link','qcld-highlight') ?></th>
	                        <td>
	                            <input type="url" name="qcld_notice_call_action_link" class="qcld_lan_text" value="<?php echo (get_option('qcld_notice_call_action_link') ? esc_url( get_option('qcld_notice_call_action_link') ): '' ); ?>" >
	                                                         
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                      <th scope="qcld_row"><?php esc_html_e('Button Text Align','qcld-highlight') ?></th>
	                      <td><p>
	                          <label class="radio-inline" style="padding-right: 15px;">
	                            <input id="qcld_notice_button_text_align" type="radio" name="qcld_notice_button_text_align" value="qcld_button_left" <?php echo ( get_option('qcld_notice_button_text_align') == 'qcld_button_left' ? esc_attr( 'checked=checked' ): '' ); ?>>
	                            <?php esc_html_e('Left','qcld-highlight') ?>
	                          </label>
	                          <label class="radio-inline">
	                            <input id="qcld_notice_button_text_align" type="radio" name="qcld_notice_button_text_align" value="qcld_button_center" <?php echo  ( ( get_option('qcld_notice_button_text_align') == 'qcld_button_center' || get_option('qcld_notice_button_text_align') =='' ) ? esc_attr( 'checked=checked' ): '' ); ?>>
	                            <?php esc_html_e('Center ','qcld-highlight') ?>
	                          </label>
	                          <label class="radio-inline">
	                            <input id="qcld_notice_button_text_align" type="radio" name="qcld_notice_button_text_align" value="qcld_button_right" <?php echo ( get_option('qcld_notice_button_text_align') == 'qcld_button_right' ? esc_attr( 'checked=checked' ): '' ); ?>>
	                            <?php esc_html_e('Right','qcld-highlight') ?>
	                          </label>
	                        </p>
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Button Background Color','qcld-highlight') ?></th>
	                        <td>
	                            <input type="text" name="qcld_notice_btn_bg_color"
	                               value="<?php echo get_option('qcld_notice_btn_bg_color'); ?>"
	                               class="qcld-wp-color">                          
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Button Font Color','qcld-highlight') ?></th>
	                        <td>          

	                            <input type="text" name="qcld_notice_btn_font_color"
	                               value="<?php echo get_option('qcld_notice_btn_font_color'); ?>"
	                               class="qcld-wp-color">                 
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Open the Action Button Link','qcld-highlight') ?></th>
	                        <td>
	                            <input type="checkbox" name="qcld_notice_action_button" size="100" value="<?php echo (get_option('qcld_notice_action_button')!=''? esc_attr( get_option('qcld_notice_action_button')) : '1' ); ?>" <?php echo (get_option('qcld_notice_action_button') == '' ? esc_attr( get_option('qcld_notice_action_button')): esc_attr( 'checked="checked"' )); ?>  />  
	                            <i><?php esc_html_e('Open Link in a New Tab ','qcld-highlight') ?></i>                           
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Notice Style','qcld-highlight') ?></th>
	                        <td>
	                            <select name="qcld_notice_banner_style">
	                                <option value="<?php esc_attr_e('qcld_default','qcld-highlight') ?>"
	                                    <?php if(get_option('qcld_notice_banner_style') == '' || get_option('qcld_notice_banner_style') == 'qcld_default'){ echo 'selected="selected"'; } ?> ><?php esc_html_e('Default Style','qcld-highlight') ?></option>
	                                <option value="<?php esc_attr_e('qcld_gradiant','qcld-highlight') ?>" <?php if( get_option('qcld_notice_banner_style') == 'qcld_gradiant'){ echo 'selected="selected"'; } ?> ><?php esc_html_e('Gradient Box','qcld-highlight') ?></option>
	                            </select>                             
	                        </td>
	                    </tr>

	                    
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Show Notice Position','qcld-highlight') ?></th>
	                        <td>
	                        
	                            <label class="radio-inline" style="padding-right: 15px;">
	                                <input id="qcld_notice_banner_position" type="radio" name="qcld_notice_banner_position" value="qcld_bottom" <?php echo ((get_option('qcld_notice_banner_position') == 'qcld_bottom' || get_option('qcld_notice_banner_position') == '') ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Bottom','qcld-highlight') ?> </label>
	                        
	                            <label class="radio-inline">
	                                <input id="qcld_notice_banner_position" type="radio" name="qcld_notice_banner_position" value="qcld_top" <?php echo (get_option('qcld_notice_banner_position') == 'qcld_top' ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Top ','qcld-highlight') ?>  </label>                              
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Sticky Notice','qcld-highlight') ?></th>
	                        <td>
	                        
	                            <label class="radio-inline" style="padding-right: 15px;">
	                                <input id="qcld_notice_banner_sticky" type="radio" name="qcld_notice_banner_sticky" value="no" <?php echo ((get_option('qcld_notice_banner_sticky') == 'no' || get_option('qcld_notice_banner_sticky') == '') ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('No','qcld-highlight') ?> </label>
	                        
	                            <label class="radio-inline">
	                                <input id="qcld_notice_banner_sticky" type="radio" name="qcld_notice_banner_sticky" value="yes" <?php echo (get_option('qcld_notice_banner_sticky') == 'yes' ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Yes ','qcld-highlight') ?>  </label>                              
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Display Front Page Only','qcld-highlight') ?></th>
	                        <td>
	                            <input type="checkbox" name="qcld_notice_front_display_only" size="100" value="<?php echo (get_option('qcld_notice_front_display_only')!=''? esc_attr( get_option('qcld_notice_front_display_only')) : '1' ); ?>" <?php echo (get_option('qcld_notice_front_display_only') == '' ? esc_attr( get_option('qcld_notice_front_display_only')): esc_attr( 'checked="checked"' )); ?>  />                             
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Set cookie for 24 hours','qcld-highlight') ?></th>
	                        <td>
	                            <input type="checkbox" name="qcld_notice_set_cookie" size="100" value="<?php echo (get_option('qcld_notice_set_cookie')!=''? esc_attr( get_option('qcld_notice_set_cookie')) : '1' ); ?>" <?php echo (get_option('qcld_notice_set_cookie') == '' ? esc_attr( get_option('qcld_notice_set_cookie')): esc_attr( 'checked="checked"' )); ?>  />  
	                            <i><?php esc_html_e('If enabled, the notice will not show for 24 hours when closed','qcld-highlight') ?></i>           
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Close Icon','qcld-highlight') ?></th>
	                        <td>
	                            
	                            <label class="radio-inline" style="padding-right: 15px;">
	                                <input id="qcld_notice_close_icon" type="radio" name="qcld_notice_close_icon" value="show" <?php echo ((get_option('qcld_notice_close_icon') == 'show' || get_option('qcld_notice_close_icon') == '') ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Show','qcld-highlight') ?> </label>
	                        
	                            <label class="radio-inline">
	                                <input id="qcld_notice_close_icon" type="radio" name="qcld_notice_close_icon" value="hide" <?php echo (get_option('qcld_notice_close_icon') == 'hide' ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Hide ','qcld-highlight') ?>  </label>                             
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Close Icon Position','qcld-highlight') ?></th>
	                        <td>
	                            
	                            <label class="radio-inline" style="padding-right: 15px;">
	                                <input id="qcld_notice_close_icon_position" type="radio" name="qcld_notice_close_icon_position" value="qcld_default" <?php echo ((get_option('qcld_notice_close_icon_position') == 'qcld_default' || get_option('qcld_notice_close_icon_position') == '') ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Default','qcld-highlight') ?> </label>
	                        
	                            <label class="radio-inline">
	                                <input id="qcld_notice_close_icon_position" type="radio" name="qcld_notice_close_icon_position" value="qcld_center" <?php echo (get_option('qcld_notice_close_icon_position') == 'qcld_center' ? esc_attr( 'checked="checked"' ): '' ); ?>>
	                                <?php esc_html_e('Center ','qcld-highlight') ?>  </label>                             
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Vertical Distance from the Browser Edge','qcld-highlight') ?></th>
	                        <td>
	                            <input type="number" name="qcld_notice_scroll_top_position" value="<?php echo (get_option('qcld_notice_scroll_top_position') ? esc_attr( get_option('qcld_notice_scroll_top_position') ): '' ); ?>" style="width: 75px;">
	                                    <i><?php esc_html_e('Px. Default: 0px ','qcld-highlight') ?></i>                     
	                        </td>
	                    </tr>


	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Hide Notice For Logged-in Users','qcld-highlight') ?></th>
	                        <td>
	                            <input type="checkbox" name="qcld_notice_logged_in_users" size="100" value="<?php echo (get_option('qcld_notice_logged_in_users')!=''? esc_attr( get_option('qcld_notice_logged_in_users')) : '1' ); ?>" <?php echo (get_option('qcld_notice_logged_in_users') == '' ? esc_attr( get_option('qcld_notice_logged_in_users')): esc_attr( 'checked="checked"' )); ?>  />                             
	                        </td>
	                    </tr>
	                    
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Display Notice On Mobile ','qcld-highlight') ?></th>
	                        <td>
	                            <input type="checkbox" name="qcld_notice_mobile" size="100" value="<?php echo (get_option('qcld_notice_mobile')!=''? esc_attr( get_option('qcld_notice_mobile')) : '1' ); ?>" <?php echo (get_option('qcld_notice_mobile') == '' ? esc_attr( get_option('qcld_notice_mobile')): esc_attr( 'checked="checked"' )); ?>  />                             
	                        </td>
	                    </tr>
	                    <tr valign="top">
	                        <th scope="row"><?php esc_html_e('Custom CSS','qcld-highlight') ?></th>
	                        <td>  
	                            <textarea name="qcld_notice_custom_global_css" class=" qcld_notice_custom_global_css qcld_lan_text"  rows="5"><?php esc_html_e( str_replace('\\', '', get_option('qcld_notice_custom_global_css') ) ); ?></textarea>                         
	                        </td>
	                    </tr>

	                    
	                </table>
	            </div>
	            
	            <?php submit_button(); ?>

	        </form>
	        
	    </div>

	    <?php

	}

}

if ( ! function_exists( 'qcld_notice_register_plugin_settings' ) ) {
	function qcld_notice_register_plugin_settings(){    

	    $args = array(
	        'type' => 'string', 
	        'sanitize_callback' => 'sanitize_text_field',
	        'default' => NULL,
	    );    
	    $stripslashes = array(
	        'type' => 'string', 
	        'sanitize_callback' => 'stripslashes',
	        'default' => NULL,
	    );

	   // if( isset( $_REQUEST['page'] ) && ( $_REQUEST['page'] == 'qcld-notice-settings' ) ){
	    
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_enable', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_action_button', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_mobile', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_logged_in_users', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_banner_position', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_banner_sticky', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_bg_color', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_font_color', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_text_align', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_front_display_only', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_close_icon', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_set_cookie', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_message', $stripslashes );

		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_banner_style', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_close_icon_position', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_scroll_position', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_scroll_top_position', $args );

		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_call_action_btn', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_call_action_text', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_call_action_link', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_btn_bg_color', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_btn_font_color', $args );
		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_button_text_align', $args );

		    register_setting( 'qcld_notice_settings_group', 'qcld_notice_custom_global_css', $args );


	  // }

	}
}

add_action( 'admin_init', 'qcld_notice_register_plugin_settings' );


if ( ! function_exists( 'qcld_notice_function_view' ) ) {
function qcld_notice_function_view(){
        global $pagenow;

        $qcld_notice_enable = get_option('qcld_notice_enable');


        if ( ( $qcld_notice_enable == 1 ) && !is_admin() && ( $pagenow !== 'wp-login.php' ) ) {


            if( (get_option('qcld_notice_front_display_only') == 1) && (!is_home() || !is_front_page()) ){
                return;
            }


            $qcld_notice_banner_position = get_option('qcld_notice_banner_position');

            if($qcld_notice_banner_position == 'qcld_bottom'){
        	
                add_action( 'wp_footer', 'qcld_notice_banner_function' );
            }else{

                add_action( 'wp_head', 'qcld_notice_banner_function' );
            }

        }

    }
}

add_action( 'init', 'qcld_notice_function_view' );


if ( ! function_exists( 'qcld_notice_banner_function' ) ) {
	function qcld_notice_banner_function() {
	   $qcld_notice_logged_in_users = get_option( 'qcld_notice_logged_in_users' );
	   $qcld_notice_action_button = get_option( 'qcld_notice_action_button' ) ? '_blank':'_self';
	   $qcld_notice_button_text_align = get_option( 'qcld_notice_button_text_align' );

	    if( ( isset( $qcld_notice_logged_in_users ) && !empty( $qcld_notice_logged_in_users ) ) && is_user_logged_in() ) {
	        return;
	    }

	    ?>

	        <div class="qcld_notice_banner <?php esc_attr_e(get_option('qcld_notice_banner_style')); ?> <?php esc_attr_e(get_option('qcld_notice_banner_position')); ?>" id="qcld_notice_banner_id">
	            <p id="qcld_notice_banner_text">

	                <?php printf( esc_html__( '%s ', 'qcld-wp-notice' ), get_option( 'qcld_notice_message' ) ); ?>

	                <?php 
	                $call_action_btn = get_option( 'qcld_notice_call_action_btn' );
	                if(isset( $call_action_btn ) && ( $call_action_btn == 'enable' ) && get_option('qcld_notice_call_action_text') != '' ): 
	                ?>
	                    <p><a href="<?php echo esc_url( get_option('qcld_notice_call_action_link')); ?>" class="qcld_call_action_btn <?php esc_attr_e($qcld_notice_button_text_align); ?>" target="<?php esc_attr_e($qcld_notice_action_button); ?>">
	                        <?php esc_html_e( get_option('qcld_notice_call_action_text')); ?>
	                    </a></p>
	                <?php endif; ?>
	            </p>
	           <a id="qcld_notice_close_button_link" class="qcld_notice_close_button <?php esc_attr_e(get_option('qcld_notice_close_icon_position')); ?>"></a>
	        </div>
	    <?php 
        
	}
}

add_action( 'wp_enqueue_scripts', 'qcld_notice_frontend_enqueue_scripts' );

if ( ! function_exists( 'qcld_notice_frontend_enqueue_scripts' ) ) {
	function qcld_notice_frontend_enqueue_scripts() {
	       

	    $custom_css = '';

	    $qcld_notice_bg_color = get_option( 'qcld_notice_bg_color' ) ? get_option( 'qcld_notice_bg_color' ) : '';

	    if( isset( $qcld_notice_bg_color ) && !empty( $qcld_notice_bg_color ) ) {

	        $custom_css .= ".qcld_notice_banner,
	                        .qcld_notice_banner.qcld_default,
	                        .qcld_notice_banner.qcld_gradiant {
	                            background: ".$qcld_notice_bg_color."!important;
	                        }  ";
	    }



	    $qcld_notice_font_color = get_option( 'qcld_notice_font_color' ) ? get_option( 'qcld_notice_font_color' ) : '';

	    if( isset( $qcld_notice_font_color ) && !empty( $qcld_notice_font_color ) ) {

	        $custom_css .= " .qcld_notice_banner p ,
	                        .qcld_notice_banner.qcld_default p ,
	                        .qcld_notice_banner.qcld_gradiant p{
	                            color: ".$qcld_notice_font_color.";
	                        }";

	    }

	    $qcld_notice_text_align = get_option( 'qcld_notice_text_align' ) ? get_option( 'qcld_notice_text_align' ) : 'center';

	    if( isset( $qcld_notice_text_align ) && !empty( $qcld_notice_text_align ) ) {

	        $custom_css .= ".qcld_notice_banner p{
	                text-align: ".$qcld_notice_text_align."!important;
	            }  ";
	    }


	    $qcld_notice_banner_position = get_option('qcld_notice_banner_position');


	    if( !empty( get_option( 'qcld_notice_banner_sticky' ) ) && ( get_option('qcld_notice_banner_sticky') == 'yes' ) ) { 

	        $custom_css .= ".qcld_notice_banner { position:fixed !important; }";
	        $custom_css .= ".qcld_notice_banner.qcld_gradiant { position:fixed !important; }";

	    }
	    if(  ( get_option('qcld_notice_banner_sticky') == 'no' ) && ( get_option('qcld_notice_banner_position') == 'qcld_top' ) ) { 

	        $custom_css .= ".qcld_notice_banner { position:relative !important; }";
	        $custom_css .= ".qcld_notice_banner.qcld_gradiant { position:relative !important; }";

	    }


	    $qcld_top_position = get_option( 'qcld_notice_scroll_top_position' ) ? get_option( 'qcld_notice_scroll_top_position' ) : '0';

	    if( !empty( get_option( 'qcld_notice_scroll_top_position' ) ) ) { 


	        if($qcld_notice_banner_position == 'qcld_top'){
	            $custom_css .= ".qcld_notice_banner { top: ".$qcld_top_position."px  !important; }";
	            $custom_css .= ".qcld_notice_banner.qcld_gradiant { top: ".$qcld_top_position."px !important; }";
	        }else{
	            $custom_css .= ".qcld_notice_banner { bottom: ".$qcld_top_position."px  !important; }";
	            $custom_css .= ".qcld_notice_banner.qcld_gradiant { bottom: ".$qcld_top_position."px !important; }";
	        }

	    }

	    if ( empty( get_option( 'qcld_notice_close_icon' ) ) || ( get_option( 'qcld_notice_close_icon' ) != 'hide') ) { 

	        $custom_css .= ".qcld_notice_close_button{
	            display:block;
	        }";

	    }

	    $qcld_btn_bg_color = get_option( 'qcld_notice_btn_bg_color' ) ? get_option( 'qcld_notice_btn_bg_color' ) : '';

	    if ( isset($qcld_btn_bg_color) && !empty( $qcld_btn_bg_color ) ) { 

	        $custom_css .= " .qcld_notice_banner .qcld_call_action_btn {
	                background: ".$qcld_btn_bg_color.";
	            }";

	    }

	    $qcld_btn_font_color = get_option( 'qcld_notice_btn_font_color' ) ? get_option( 'qcld_notice_btn_font_color' ) : '';

	    if ( isset($qcld_btn_font_color) && !empty( $qcld_btn_font_color ) ) { 

	        $custom_css .= " .qcld_notice_banner .qcld_call_action_btn {
	                color: ".$qcld_btn_font_color.";
	            }";

	    }

	    if( get_option('qcld_notice_mobile') != 1 ) { 

	       $custom_css .= " @media all and (max-width: 500px){
	                    .qcld_notice_banner{
	                        display: none;
	                    }
	                }";

	    }

	    wp_enqueue_style( 'qcld-notice-front-css',  QCLD_Highlight_ASSETS_URL1 . "/css/notice-front.css" );

	    wp_add_inline_style( 'qcld-notice-front-css', $custom_css );

	    $custom_global_css   = str_replace('\\', '', get_option('qcld_notice_custom_global_css'));

	    wp_add_inline_style( 'qcld-notice-front-css', $custom_global_css );


	    wp_enqueue_script( 'qcld_notice_custom_js', QCLD_Highlight_ASSETS_URL1 . "/js/jquery.notice.min.js", array( 'jquery' ) );
	    wp_enqueue_script( 'qcld_notice_front_js', QCLD_Highlight_ASSETS_URL1 . "/js/notice-front.js", array( 'jquery', 'qcld_notice_custom_js' ) );

	    $qcld_notice_set_cookie = get_option( 'qcld_notice_set_cookie' ) ? get_option( 'qcld_notice_set_cookie' ) : '';
	    wp_add_inline_script( 'qcld_notice_front_js', "
	            var qcld_notice_set_cookie = '". $qcld_notice_set_cookie."';
	        ", 'before' );



	}
	
}