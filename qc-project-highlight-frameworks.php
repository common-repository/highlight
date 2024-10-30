<?php
 defined('ABSPATH') or die("No direct script access!");
//Setting options page
/*******************************
 * Callback function to add the menu
 *******************************/
if ( ! function_exists( 'qcld_highlight_show_settngs_page_callback_func' ) ) {
	function qcld_highlight_show_settngs_page_callback_func(){

		add_menu_page(
			        esc_html('Highlight', 'qcld-highlight'),
			        esc_html('Highlight', 'qcld-highlight'),
			        'manage_options',
			        'qcld-highlight',
			        'qcld_highlight_settings_page_callback_func',
			        'dashicons-editor-code',
			        20
	    );

		add_submenu_page( 	
					'qcld-highlight',  
					esc_html('Highlight Contents'),  
					esc_html('Highlight Contents'), 
					'manage_options', 
					'qcld-highlight',
					'qcld_highlight_settings_page_callback_func' 
		);

		add_submenu_page( 	
					'qcld-highlight',  
					esc_html('Highlight Notice'),  
					esc_html('Highlight Notice'), 
					'manage_options', 
					'qcld-notice-settings',
					'qcld_notice_settings_page' 
		);

		add_submenu_page( 	
					'qcld-highlight',  
					esc_html('Highlight Menu'),  
					esc_html('Highlight Menu'), 
					'manage_options', 
					'qcld-btn-menu-settings',
					'qcld_menu_page_callback' 
		);


		add_action( 'admin_init', 'qcld_highlight_register_plugin_settings' );

	} //show_settings_page_callback_func
	
}
add_action( 'admin_menu', 'qcld_highlight_show_settngs_page_callback_func');

if ( ! function_exists( 'qcld_highlight_register_plugin_settings' ) ) {
	function qcld_highlight_register_plugin_settings() {
		//register our settings
		//general Section
		$args = array(
			'type' => 'string', 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => NULL,
		);
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_enable', $args );

		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_enable_highlight_scroll', $args );
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_enable_highlight_scroll_val', $args );
		
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_enable_white_hover', $args );
		
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_enable_twitter_share', $args );
		
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_enable_vertical_hover', $args );
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_enable_horizontal_hover', $args );


		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_hover_bg_color', $args );
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_vertical_underline_color', $args );
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_highlight_horizontal_underline_color', $args );

		//RTL enable section
		register_setting( 'qc-highlight-plugin-settings-group', 'qcld_rtl_support_enable', $args );

		//custom css section
		register_setting( 'qc-highlight-plugin-settings-group', 'highlight_custom_style', $args );

		
	}
}


if ( ! function_exists( 'qcld_highlight_settings_page_callback_func' ) ) {
function qcld_highlight_settings_page_callback_func(){
	
	?>
	<div class="wrap swpm-admin-menu-wrap">
		<h1><?php esc_html_e( 'Highlight Settings', 'qcld-highlight' ); ?></h1>
	
		<h2 class="nav-tab-wrapper highlight_nav_container">
			<a class="nav-tab highlight_click_handle nav-tab-active" href="#general_settings"> Settings</a>
			<a class="nav-tab highlight_click_handle" href="#color_settings"><?php esc_html_e( 'Color Settings', 'qcld-highlight' ); ?></a>
			<a class="nav-tab highlight_click_handle" href="#custom_css"><?php esc_html_e( 'Custom CSS', 'qcld-highlight' ); ?></a>
			<a class="nav-tab highlight_click_handle" href="#rtl_support"><?php esc_html_e( 'RTL Support', 'qcld-highlight' ); ?></a>
			<a class="nav-tab highlight_click_handle" href="#help"><?php esc_html_e( 'Help', 'qcld-highlight' ); ?></a>
		</h2>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'qc-highlight-plugin-settings-group' ); ?>
			<?php do_settings_sections( 'qc-highlight-plugin-settings-group' ); ?>
			<div id="general_settings">
				<table class="form-table">
				
					<div class="card">
							<input type="checkbox" name="qcld_highlight_enable" value="on" <?php echo (esc_attr( get_option('qcld_highlight_enable') )=='on'?'checked="checked"':''); ?> />
							
							<i><?php esc_html_e( 'If enabled highlight you can display highlight on content.', 'qcld-highlight' ); ?></i></br>
						
							<h5><?php esc_html_e( 'Highlight on Scroll effect Style', 'qcld-highlight' ); ?></h5>
							<select name="qcld_highlight_enable_highlight_scroll_val">
							<option value="background" <?php echo (esc_attr( get_option('qcld_highlight_enable_highlight_scroll_val') )=='background'?'selected="selected"':''); ?>> <?php esc_html_e( 'Background', 'qcld-highlight' ); ?></option>
							<option value="half" <?php echo (esc_attr( get_option('qcld_highlight_enable_highlight_scroll_val') )=='half'?'selected="selected"':''); ?>><?php esc_html_e( 'Half', 'qcld-highlight' ); ?></option>
							<option value="underline" <?php echo (esc_attr( get_option('qcld_highlight_enable_highlight_scroll_val') )=='underline'?'selected="selected"':''); ?>><?php esc_html_e( 'Underline', 'qcld-highlight' ); ?></option>
							</select></br>
							<i><?php esc_html_e( 'Highlight on Scroll Style effect when Scroll on text', 'qcld-highlight' ); ?></i>
					
					</div>
					
					<tr valign="top">
						<div class="card">
							<h5><?php esc_html_e( 'Highlight on Scroll on text shortcode:', 'qcld-highlight' ); ?></h5>
							
							<div class="dn88shortcode-clip">
								<input id="srtcde-clp" type="text" value="<?php esc_html_e( '[h-s] your expected text here [/h-s]', 'qcld-highlight' ); ?>">
									<span class="input-group-button">
									<button class="btn" type="button" data-clipboard-demo="" data-clipboard-target="#srtcde-clp">
										<img class="clippy" src="https://clipboardjs.com/assets/images/clippy.svg" width="13" alt="Copy to clipboard">
									</button>
									</span>
							</div>
							<h5><?php esc_html_e( 'Highlight on Scroll on text HTML tag:', 'qcld-highlight' ); ?></h5>
							<div class="dn88shortcode-clip">
								<div class="input-group">
									<input id="srtcde-clp1" type="text" value="<?php esc_html_e( '<mark class="highlight-scroll-effect">Flatland prime number concept of the number one Euclid the carbon in our apple pies bits of moving fluff</mark>', 'qcld-highlight' ); ?>">
										<span class="input-group-button">
										<button class="btn" type="button" data-clipboard-demo="" data-clipboard-target="#srtcde-clp1">
											<img class="clippy" src="https://clipboardjs.com/assets/images/clippy.svg" width="13" alt="Copy to clipboard">
										</button>
										</span>
								</div>
							</div>
							
						</div>

					</tr>
					
					<tr valign="top">
						
					</tr>
					
					<tr valign="">
					<div class="card">
						<h5><?php esc_html_e( 'Hover effect on text Shortcode:', 'qcld-highlight' ); ?></h5>
							<div class="dn88shortcode-clip">
								<div class="input-group">
									<input id="srtcde-clp2" type="text" value="<?php esc_html_e( '[h-h] your expected text here [/h-h]', 'qcld-highlight' ); ?>">
										<span class="input-group-button">
										<button class="btn" type="button" data-clipboard-demo="" data-clipboard-target="#srtcde-clp2">
											<img class="clippy" src="https://clipboardjs.com/assets/images/clippy.svg" width="13" alt="Copy to clipboard">
										</button>
										</span>
								</div>
							</div>
						
					</div>
						
					</tr>
					
					<tr valign="">
						<div class="card">
							<h5><?php esc_html_e( 'Vertical Text highlight effect Shortcode:', 'qcld-highlight' ); ?></h5>
							<div class="dn88shortcode-clip">
								<div class="input-group">
									<input id="srtcde-clp3" type="text" value="<?php esc_html_e( '[h-u-v] your expected text here [/h-u-v]', 'qcld-highlight' ); ?>">
										<span class="input-group-button">
										<button class="btn" type="button" data-clipboard-demo="" data-clipboard-target="#srtcde-clp3">
											<img class="clippy" src="https://clipboardjs.com/assets/images/clippy.svg" width="13" alt="Copy to clipboard">
										</button>
										</span>
								</div>
							</div>
						</div>
					</tr>
					
					<tr valign="">
						<div class="card">
							<h5><?php esc_html_e( 'Horizontal Text highlight effect Shortcode:', 'qcld-highlight' ); ?></h5>
							<div class="dn88shortcode-clip">
								<div class="input-group">
									<input id="srtcde-clp4" type="text" value="<?php esc_html_e( '[h-u-h] your expected text here [/h-u-h]', 'qcld-highlight' ); ?>">
										<span class="input-group-button">
										<button class="btn" type="button" data-clipboard-demo="" data-clipboard-target="#srtcde-clp4">
											<img class="clippy" src="https://clipboardjs.com/assets/images/clippy.svg" width="13" alt="Copy to clipboard">
										</button>
										</span>
								</div>
							</div>
							

						</div>
					</tr>
					
				
				</table>
			</div>
			
			
			<div id="color_settings" style="display:none">
				<table class="form-table">

					<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Hover Background Color', 'qcld-highlight' ); ?></th>
						<td>
							<input type="text" name="qcld_highlight_hover_bg_color" value="<?php echo get_option('qcld_highlight_hover_bg_color'); ?>"
                               class="qcld_highlight-color"/>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Vertical Underline Color', 'qcld-highlight' ); ?></th>
						<td>
							<input type="text" name="qcld_highlight_vertical_underline_color" value="<?php echo get_option('qcld_highlight_vertical_underline_color'); ?>"
                               class="qcld_highlight-color"/>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Horigontal Underline Color', 'qcld-highlight' ); ?></th>
						<td>
							<input type="text" name="qcld_highlight_horizontal_underline_color" value="<?php echo get_option('qcld_highlight_horizontal_underline_color'); ?>"
                               class="qcld_highlight-color"/>
						</td>
					</tr>
				</table>
			</div>
			
			
			<div id="custom_css" style="display:none">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Custom css', 'qcld-highlight' ); ?></th>
						<td>
							<textarea name="highlight_custom_style" rows="10" cols="100"><?php echo esc_attr( get_option('highlight_custom_style') ); ?></textarea>
							<br>
							<i> <?php esc_html_e( 'Write your custom CSS here. Please do not use', 'qcld-highlight' ); ?><b> <?php esc_html_e( 'style', 'qcld-highlight' ); ?></b> <?php esc_html_e( 'tag in this textarea.', 'qcld-highlight' ); ?></i>
						</td>
					</tr>

				</table>
			</div>


			<div id="rtl_support" style="display:none">
				

				<div class="card">
					<input type="checkbox" name="qcld_rtl_support_enable" value="on" <?php echo (esc_attr( get_option('qcld_rtl_support_enable') )=='on'?'checked="checked"':''); ?> />
				   <i><?php esc_html_e( 'Enable RTL (right to left text)', 'qcld-highlight' ); ?></i></br>
					
					

		       	</div>
              </div>


			
			<div id="help" style="display:none">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php esc_html_e( 'Help', 'qcld-highlight' ); ?></th>
						<td>
							<div>
							<h1><?php esc_html_e( 'Welcome to the Highlight! You are ', 'qcld-highlight' ); ?> <strong><?php esc_html_e( 'awesome', 'qcld-highlight' ); ?></strong>, <?php esc_html_e( 'by the way', 'qcld-highlight' ); ?> <img draggable="false" class="emoji" alt="🙂" src="<?php echo esc_url(QCLD_Highlight_IMG_URL1); ?>/1f642.svg"></h1>
							<h3><?php esc_html_e( 'Getting Started', 'qcld-highlight' ); ?></h3>
															
							<p> <?php esc_html_e( 'In principle, Highlight text on page content or blog post.', 'qcld-highlight' ); ?></p>
							<br>
							
							<p><b> <?php esc_html_e( '1. Highlight on Scroll  on text', 'qcld-highlight' ); ?></b></p>
							<br>
							<p><b> <?php esc_html_e( 'HTML', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html">&lt;mark class="highlight-scroll-effect"&gt;Flatland prime number concept of the number one Euclid the carbon in our apple pies bits of moving fluff&lt;/mark&gt;.
								</code>
							</pre>
							<p><b> <?php esc_html_e( 'Shortcode', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html"><?php esc_html_e( '[highlight-scroll] your expected text here [/highlight-scroll]', 'qcld-highlight' ); ?>
								</code>
							</pre>
							<p><b><?php esc_html_e( 'Highlight on Scroll Demo', 'qcld-highlight' ); ?></b></p>
							<br>
							<p><?php esc_html_e( 'Quasar intelligent beings cosmic ocean realm of the galaxies Jean-Fran&ccedil;ois Champollion descended from astronomers?', 'qcld-highlight' ); ?><mark class="highlight-scroll-effect"> <?php esc_html_e( 'Flatland prime number concept of the number one Euclid the carbon in our apple pies bits of moving fluff', 'qcld-highlight' ); ?></mark>. <?php esc_html_e( 'Star stuff harvesting star light inconspicuous motes of rock and gas the ash of stellar alchemy encyclopaedia galactica bits of moving fluff the only home we have ever known. Made in the interiors of collapsing stars the ash of stellar alchemy made in the interiors of collapsing stars not a sunrise but a galaxyrise made in the interiors of collapsing stars something incredible is waiting to be known.', 'qcld-highlight' ); ?></p>

  							<p><?php esc_html_e( 'Permanence of the stars billions upon billions tingling of the spine culture realm of the galaxies corpus callosum. Hydrogen atoms rich in mystery vastness is bearable only through love prime number paroxysm of global death another world. Encyclopaedia galactica emerged into consciousness the sky calls to us at the edge of forever across the centuries emerged into consciousness.', 'qcld-highlight' ); ?><mark class="highlight-scroll-effect"><?php esc_html_e( 'At the edge of forever descended from astronomers vanquish the impossible descended from astronomers another world invent the universe', 'qcld-highlight' ); ?></mark>.</p>
							<br>
							
							<p><b><?php esc_html_e( '2. Hover effect on text', 'qcld-highlight' ); ?></b></p>
							<p><b><?php esc_html_e( 'HTML', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html">&lt;div class="highlight-hover-effect"&gt;<br />&nbsp;&nbsp;&lt;div class="highlight-hover-effect-child"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt tortor vel nunc venenatis, nec ultrices eros hendrerit. &lt;/p&gt;<br />&nbsp;&nbsp;&lt;/div&gt;<br />&lt;/div&gt;
								</code>
							</pre>
							<p><b><?php esc_html_e( 'Shortcode', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html"><?php esc_html_e( '[highlight-hover] your expected text here [/highlight-hover]', 'qcld-highlight' ); ?>
								</code>
							</pre>
							<p><b><?php esc_html_e( 'Hover Effect Demo', 'qcld-highlight' ); ?></b></p>
							<br>
							<div class="highlight-hover-effect">
							  <div class="highlight-hover-effect-child">
							    <p><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt tortor vel nunc venenatis, nec ultrices eros hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt tortor vel nunc venenatis, nec ultrices eros hendrerit.', 'qcld-highlight' ); ?>
							    	
							    </p>
							  </div>
							</div>
							<br>

							<p><b><?php esc_html_e( '3. Vertical effect on text', 'qcld-highlight' ); ?></b></p>
							<p><b> <?php esc_html_e( 'HTML', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html">&lt;div class="hightlight-verticle-wrap"&gt;<br />&nbsp;&nbsp; &lt;p class="hightlight-verticle-underline"&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt tortor vel<br /> nunc venenatis, nec ultrices eros hendrerit.&lt;/p&gt;<br />&lt;/div&gt;
								</code>
							</pre>
							<p><b> <?php esc_html_e( 'Shortcode', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html"><?php esc_html_e( '[highlight-underline-v] your expected text here [/highlight-underline-v]', 'qcld-highlight' ); ?>
								</code>
							</pre>
							<p><b><?php esc_html_e( 'Vertical effect Demo', 'qcld-highlight' ); ?></b></p>
							<br>
							<div class="hightlight-verticle-wrap">
								<p class="hightlight-verticle-underline"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'qcld-highlight' ); ?></p>
							</div>
							<div class="hightlight-verticle-wrap">
								<p class="hightlight-verticle-underline"><?php esc_html_e( 'In tincidunt tortor vel nunc venenatis, nec ultrices eros hendrerit.', 'qcld-highlight' ); ?></p>
							</div>
							<br>
							<br>
							<p><b><?php esc_html_e( '4. Horizontal effect on text', 'qcld-highlight' ); ?></b></p>
							<p><b> <?php esc_html_e( 'HTML', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html">&lt;div class="hightlight-horizontal-wrap"&gt;<br />&nbsp;&nbsp;&lt;p class="hightlight-horizontal-underline"&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt tortor vel <br> nunc venenatis, nec ultrices eros hendrerit.&lt;/p&gt;<br />&lt;/div&gt;
								</code>
							</pre>
							<p><b> <?php esc_html_e( 'Shortcode', 'qcld-highlight' ); ?></b></p>
							<pre>
								<code class="html"><?php esc_html_e( '[highlight-underline-h] your expected text here [/highlight-underline-h]', 'qcld-highlight' ); ?>
								</code>
							</pre>
							<p><b><?php esc_html_e( 'Horizontal effect Demo', 'qcld-highlight' ); ?></b></p>
							<br>
							<div class="hightlight-horizontal-wrap">
								<p class="hightlight-horizontal-underline"><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'qcld-highlight' ); ?></p>
							</div>
							<div class="hightlight-horizontal-wrap">
								<p class="hightlight-horizontal-underline"><?php esc_html_e( 'In tincidunt tortor vel nunc venenatis, nec ultrices eros hendrerit.', 'qcld-highlight' ); ?></p>
							</div>
							<br>
							<br>
							
						</div>
							
						</td>
					</tr>

				</table>
			</div>
			
			<?php submit_button(); ?>

		</form>
		
		<script>
			var clipboardDemos = new Clipboard('[data-clipboard-demo]');

				clipboardDemos.on('success', function(e) {
					e.clearSelection();

					console.info('Action:', e.action);
					console.info('Text:', e.text);
					console.info('Trigger:', e.trigger);

					showTooltip(e.trigger, 'Copied!');
				});

				clipboardDemos.on('error', function(e) {
					console.error('Action:', e.action);
					console.error('Trigger:', e.trigger);

					showTooltip(e.trigger, fallbackMessage(e.action));
				});

				// tooltips.js

				var btns = document.querySelectorAll('.btn');

				for (var i = 0; i < btns.length; i++) {
					btns[i].addEventListener('mouseleave', clearTooltip);
					btns[i].addEventListener('blur', clearTooltip);
				}

				function clearTooltip(e) {
					e.currentTarget.setAttribute('class', 'btn');
					e.currentTarget.removeAttribute('aria-label');
				}

				function showTooltip(elem, msg) {
					elem.setAttribute('class', 'btn tooltipped tooltipped-s');
					elem.setAttribute('aria-label', msg);
				}
		</script>
	</div>
	
	
	<?php
	
}
}