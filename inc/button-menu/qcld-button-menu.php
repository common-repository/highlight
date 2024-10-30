<?php
defined('ABSPATH') or die("No direct script access!");

if ( ! function_exists( 'qcld_menu_page_callback' ) ) {
	function qcld_menu_page_callback(){

	//General Options
	$container_bg = get_option('qcld-highlight-menu-container-bg') ? get_option('qcld-highlight-menu-container-bg') : '#f5f5f5';
	$button_bg = get_option('qcld-highlight-menu-button-bg') ? get_option('qcld-highlight-menu-button-bg') : '#fff';
	$button_color = get_option('qcld-highlight-menu-button-color') ? get_option('qcld-highlight-menu-button-color') : '#000';
	$button_hover_bg = get_option('qcld-highlight-menu-button-hover-bg') ? get_option('qcld-highlight-menu-button-hover-bg') : '#e9e9e9';
	$button_hover_color = get_option('qcld-highlight-menu-button-hover-color') ? get_option('qcld-highlight-menu-button-hover-color') : '#000';
?>
<div class="wrap">
	<h1><?php esc_html_e('Button Menu', 'qcld-highlight'); ?></h1>
		<style>
			.btnmenu-help{width: 96%;padding: 2%; background: #fff;}
			.btnmenu-help .ans{background: #f1f1f1; width: 96%;padding: 2%; margin-bottom: 20px}
		</style>
		<div class="btnmenu-help">
			<h2><?php esc_html_e('Usage', 'qcld-highlight'); ?></h2>
			<ul class="ans">
				<li><?php esc_html_e('Button menu displays the navigation menus you created in Appearance->Menus in an intuitive and useful way.
					Place the following shortcode on your page or post where you want to show the Button menu.', 'qcld-highlight'); ?></br> 
					<?php echo esc_attr("[qc-button-menu menu='menu_name']"); ?></br> 
					<?php esc_html_e('Copy the menu name exactly as you set under Appearance->Menus->Your selected menu.
					The free version supports up to 3 levels of sub menus.', 'qcld-highlight'); ?></li>

			</ul>
		</div>
	
	<form action="options.php" method="post">
		<?php settings_fields( 'qcld_highlight_btn_menu_options' ); ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="qcld-highlight-menu-container-bg"><?php esc_html_e('Container Background:', 'qcld-highlight'); ?></label>
					</th>
					<td>
						<input type="text" id="qcld-highlight-menu-container-bg" name="qcld-highlight-menu-container-bg" value="<?php echo esc_attr($container_bg); ?>" class="qcld-wp-color" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="qcld-highlight-menu-button-bg"><?php esc_html_e('Button Background:', 'qcld-highlight'); ?></label>
					</th>
					<td>
						<input type="text" id="qcld-highlight-menu-button-bg" name="qcld-highlight-menu-button-bg" value="<?php echo esc_attr($button_bg); ?>" class="qcld-wp-color" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="qcld-highlight-menu-button-hover-bg"><?php esc_html_e('Button Hover Background:', 'qcld-highlight'); ?></label>
					</th>
					<td>
						<input type="text" id="qcld-highlight-menu-button-hover-bg" name="qcld-highlight-menu-button-hover-bg" value="<?php echo esc_attr($button_hover_bg); ?>" class="qcld-wp-color" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="qcld-highlight-menu-button-color"><?php esc_html_e('Button Color:', 'qcld-highlight'); ?></label>
					</th>
					<td>
						<input type="text" id="qcld-highlight-menu-button-color" name="qcld-highlight-menu-button-color" value="<?php echo esc_attr($button_color); ?>" class="qcld-wp-color" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="qcld-highlight-menu-button-hover-color"><?php esc_html_e('Button Hover Color:', 'qcld-highlight'); ?></label>
					</th>
					<td>
						<input type="text" id="qcld-highlight-menu-button-hover-color" name="qcld-highlight-menu-button-hover-color" value="<?php echo esc_attr($button_hover_color); ?>" class="qcld-wp-color" />
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_attr('Save Changes'); ?>">
		</p>
	</form>
</div>


<?php 
		
	}
}

if ( ! function_exists( 'qcld_highlight_button_menu_register_setting' ) ) {
	function qcld_highlight_button_menu_register_setting() {
	    register_setting( 'qcld_highlight_btn_menu_options', 'qcld-highlight-menu-container-bg' );
	    register_setting( 'qcld_highlight_btn_menu_options', 'qcld-highlight-menu-button-bg');
	    register_setting( 'qcld_highlight_btn_menu_options', 'qcld-highlight-menu-button-color');
	    register_setting( 'qcld_highlight_btn_menu_options', 'qcld-highlight-menu-button-hover-bg');
	    register_setting( 'qcld_highlight_btn_menu_options', 'qcld-highlight-menu-button-hover-color');
	}
}
add_action( 'admin_init',  'qcld_highlight_button_menu_register_setting');


add_shortcode( 'qc-button-menu', 'qcld_highlight_button_menu_shortcode' );
if ( ! function_exists( 'qcld_highlight_button_menu_shortcode' ) ) {
	function qcld_highlight_button_menu_shortcode($atts){

		$menu_list 	= wp_get_nav_menu_object($atts['menu']);
		$menu_id 	= isset( $menu_list->term_id ) ? $menu_list->term_id : '';

		$breadcrumb = ( isset($attr['breadcrumb']) && ( $attr['breadcrumb'] == 'true' ) ) ? true: true;

		$attr = array(
			'menu'					=> $menu_id,
			'container' 			=> '',
			'depth' 				=> 3,
			'show_breadcrumb' 		=> $breadcrumb,
			'breadcrumb_separator' 	=> '/',
			'menu_align' 			=> 'center',
			'menu_class' 			=> 'qcld-highlight-menu-ul',
		);

		$container_bg 				= get_option('qcld-highlight-menu-container-bg') ? get_option('qcld-highlight-menu-container-bg') : '#f5f5f5';
		$button_bg 					= get_option('qcld-highlight-menu-button-bg') ? get_option('qcld-highlight-menu-button-bg') : '#fff';
		$button_color 				= get_option('qcld-highlight-menu-button-color') ? get_option('qcld-highlight-menu-button-color') : '#000';

		$button_hover_bg 			= get_option('qcld-highlight-menu-button-hover-bg') ? get_option('qcld-highlight-menu-button-hover-bg') : '#e9e9e9';
		$button_hover_color 		= get_option('qcld-highlight-menu-button-hover-color') ? get_option('qcld-highlight-menu-button-hover-color') : '#000';
		$style = "
	            .qcld-highlight-menu-button-container {
	                    background: {$container_bg};
	            }
	            .qcld-highlight-menu-button-container li a{
	                    background: {$button_bg};
	                    color: {$button_color};
	            }
	            .qcld-highlight-menu-button-container li a:hover{
					color: {$button_hover_color};
				}
				.qcld-highlight-menu-button-container li a:before{
					background: {$button_hover_bg};
				}";

		wp_enqueue_style('qc-fontawesome-picker', QCLD_Highlight_ASSETS_URL1 . '/vendors/fontawesome/css/all.min.css', array(), '', 'all');
		wp_enqueue_style( 'qcld-highlight-menu-button',  QCLD_Highlight_ASSETS_URL1 . '/css/button-menu-style.css', array(), '', 'all');
		wp_add_inline_style( 'qcld-highlight-menu-button', $style );

		wp_enqueue_script('qcld-highlight-menu-button', QCLD_Highlight_ASSETS_URL1 . '/js/button-menu-scripts.js', array('jquery'), '', false);
		
		ob_start();
		
			$attr['echo'] = false;

			$html  = '<div class="qcld-highlight-menu-button-container">';

				if( $attr['show_breadcrumb'] == 'true' ){
					$html .= '<div class="qcld-highlight-menu-breadcrumb '.esc_attr('pd-menu-align-'.$attr['menu_align']).'" data-breadcrumb_separator="'. esc_attr($attr['breadcrumb_separator']) .'">';
					$html .= '</div>';
				}
			$html .= wp_nav_menu($attr);
			$html .= '</div>';

			echo $html;

		return ob_get_clean();
	}
}



add_action('nav_menu_link_attributes', 'qcld_nav_menu_link_attributes', 10, 4 );

if ( ! function_exists( 'qcld_nav_menu_link_attributes' ) ) {
	function qcld_nav_menu_link_attributes( $atts, $item, $args, $depth ){
			
		if( preg_match('/\bqcld-highlight-menu-ul\b/', $args->menu_class) ){
			$item_id = $item->ID;
			
			$button_icon = '';

			$submenu_icon = 'fas fa-arrow-right';

			$atts['data-link-item-id'] = $item_id;

			if (in_array('menu-item-has-children', $item->classes)) {
			    $atts['data-submenu-indicator'] = $submenu_icon;
			}

			if( $button_icon ){
				$atts['data-qc-btn-icon'] = $button_icon;
			}
			
		}


		return $atts;
	}
}