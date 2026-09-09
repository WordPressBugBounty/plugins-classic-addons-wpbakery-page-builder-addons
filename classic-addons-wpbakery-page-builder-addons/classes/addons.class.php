<?php
/**
* Classic Addons - Main Class
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }

class CAWPB_Classic_Addons_WPBakery {
	
	function __construct(){

		add_action('vc_before_init', array($this, 'addons_init'));
		add_action('vc_load_default_params', array($this, 'load_extra_admin_settings'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_front_scripts'));
		add_action('admin_enqueue_scripts', array($this, 'load_admin_scripts'));

		add_action( 'admin_menu', array( $this, 'menu_page' ) );
	 	add_action( 'wp_ajax_caw_settings_action', array($this,'save_settings') );
	 	add_action( 'init', array( $this, 'check_if_wpb_is_installed' ) );
	}

	function check_if_wpb_is_installed(){
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'display_wpb_install_notice' ));
            return;
        }
	}

	function display_wpb_install_notice(){
        echo '
        <div class="notice notice-warning is-dismissible">
          <p><strong>Classic Addons</strong> requires <strong><a href="https://1.envato.market/gbGbzO" target="_blank">WPBakery Page Builder</a></strong> plugin to be installed and activated on your site.</p>
        </div>';
	}

	function enqueue_front_scripts(){

		$post = get_post();
		if ( $post && strpos( $post->post_content, '[vc_row' ) !== false ) {
	    	wp_enqueue_style( 'caw-icon-component', CAWPB_URL. '/css/icon-component.css');
		}

		/**
		 * Fires inside the free plugin's wp_enqueue_scripts callback so that
		 * external plugins (e.g. Classic Addons Pro) can register their own
		 * on-demand front-end assets through the same loader path.
		 *
		 * @since 4.2
		 *
		 * @param WP_Post|null $post Current post (may be null on archives).
		 */
		do_action( 'cawpb_enqueue_front_scripts', $post );
	}

	function menu_page() {
		add_menu_page(
	        __( 'Classic Addons', 'classic-addons-wpbakery-page-builder' ),
	        __( 'Classic Addons', 'classic-addons-wpbakery-page-builder' ),
	        'manage_options',
	        'caw-settings',
	        array( $this, 'page_callback' ),
	        $this->get_menu_icon(),
	        '58.6'
	    );
	}

	/**
	 * Resolve the admin-menu icon.
	 *
	 * Prefers a site-supplied PNG so the exact brand logo can be dropped in at
	 * assets/images/menu-icon.png without touching code, then the bundled SVG,
	 * and finally a Dashicon so the menu never shows a broken image.
	 *
	 * @since 4.2
	 * @return string Icon URL or a dashicons-* handle.
	 */
	function get_menu_icon() {
		foreach ( array( 'menu-icon.png', 'menu-icon.svg' ) as $file ) {
			if ( file_exists( CAWPB_PATH . '/assets/images/' . $file ) ) {
				return CAWPB_URL . '/assets/images/' . $file;
			}
		}
		return 'dashicons-screenoptions';
	}

	function page_callback(){

		$template_vars = array();

	    cawpb_load_templates('admin/settings.php', $template_vars);	    
	}

	function load_admin_scripts(){

		wp_enqueue_style( 'classic-addons', CAWPB_URL.'/css/caw-admin.css');

		// Read-only admin page check for asset gating; no state change, so no nonce.
		if ( isset( $_GET['page'] ) && 'caw-settings' === sanitize_key( wp_unslash( $_GET['page'] ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			wp_enqueue_style( 'caw-settings', CAWPB_URL.'/css/settings.css', array(), CAWPB_VERSION );
			wp_enqueue_script( 'caw-settings', CAWPB_URL. '/js/settings.js', array('jquery'), CAWPB_VERSION, true );
		}

		/**
		 * Fires inside admin_enqueue_scripts so external plugins can
		 * register admin-side assets through the same callback.
		 *
		 * @since 4.2
		 */
		do_action( 'cawpb_admin_enqueue_scripts' );
	}

	function load_extra_admin_settings(){

		$script_url = CAWPB_URL . '/js/admin-scripts.js';

		vc_add_shortcode_param( 'caw_section', array($this,'caw_section_display') );
		vc_add_shortcode_param( 'cawpb_border_style', array($this,'caw_border_inputs'), $script_url );
		vc_add_shortcode_param( 'caw_margin_style', array($this,'caw_margin_inputs'), $script_url );
		vc_add_shortcode_param( 'caw_padding_style', array($this,'caw_padding_inputs'), $script_url );

		/**
		 * Fires after the built-in vc_add_shortcode_param() calls so external
		 * plugins can register their own custom param types through the same
		 * vc_load_default_params loader.
		 *
		 * @since 4.2
		 */
		do_action( 'cawpb_register_components' );
	}

	function addons_init(){

		/**
		 * Fires before any addon is registered with WPBakery. Lets
		 * external plugins register their addon include paths just in time.
		 *
		 * @since 4.2
		 */
		do_action( 'cawpb_before_addons_init' );

		$addons = cawpb_get_addons_meta();

		foreach ($addons as $slug => $settings) {

			$addons_settings  = get_option('caw_settings');
			$enable_key       = str_replace( "-item", "", $slug );

			if (isset($addons_settings[ $enable_key ])) {

				/**
				 * Filter the on-disk location of an addon's shortcode class
				 * and settings files. External plugins use this to point
				 * the loader at files inside their own plugin directory.
				 *
				 * @since 4.2
				 *
				 * @param array  $paths    {
				 *     @type string $file     Absolute path to the shortcode class PHP file.
				 *     @type string $settings Absolute path to the params settings.php file.
				 * }
				 * @param string $slug     Addon slug.
				 * @param array  $settings Addon meta from cawpb_get_addons_meta().
				 */
				$paths = apply_filters( 'cawpb_module_paths', array(
					'file'     => CAWPB_PATH . '/addons/' . sanitize_file_name( $slug ) . '/' . sanitize_file_name( $slug ) . '.php',
					'settings' => CAWPB_PATH . '/addons/' . sanitize_file_name( $slug ) . '/settings.php',
				), $slug, $settings );

				if ( ! empty( $paths['file'] ) && file_exists( $paths['file'] ) ) {
					include( $paths['file'] );
				}

				$settings['icon']     = 'caw-icon-' . esc_attr( $slug );
				$settings['category'] = 'Classic Addons';
				$settings['params']   = $this->get_element_params( $slug, $settings, $paths );

				/**
				 * Filter the final vc_map() settings for an addon.
				 *
				 * @since 4.2
				 *
				 * @param array  $settings vc_map settings array.
				 * @param string $slug     Addon slug.
				 */
				$settings = apply_filters( 'cawpb_module_settings', $settings, $slug );

				vc_map( $settings );
			}
		}

		/**
		 * Fires after every enabled addon has been registered with
		 * WPBakery. Useful for late-binding work that depends on vc_map.
		 *
		 * @since 4.2
		 */
		do_action( 'cawpb_init' );
	}

	function caw_section_display( $settings, $value ) {
	 	
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$param_type = isset( $settings['type'] ) ? $settings['type'] : '';
		$class      = isset( $settings['class'] ) ? ' ' . $settings['class'] : '';
		$heading    = isset( $settings['section_title'] ) ? $settings['section_title'] : '';

		$output     = '<h3 class="caw-section-title ' . esc_attr( $class ) . '">' . esc_html( $heading ) . '</h3>';
		$output    .= '<input type="hidden" name="' . esc_attr( $param_name ) . '" class="wpb_vc_param_value ' . esc_attr( $param_name ) . ' ' . esc_attr( $param_type ) . '_field" value="' . esc_attr( $value ) . '"/>';

		return $output;
	}

	function caw_border_inputs( $settings, $value ) {
	 	
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$param_type = isset( $settings['type'] ) ? $settings['type'] : '';
		$class      = isset( $settings['class'] ) ? ' ' . $settings['class'] : '';
		$heading    = isset( $settings['section_title'] ) ? $settings['section_title'] : '';

		
		$template_vars = array();
	    $template_vars = array('settings' => $settings, 'value' => $value);

	    ob_start();
	        cawpb_load_templates('admin/border.php', $template_vars);
	    $content = ob_get_clean();		

		return $content;
	}

	function caw_margin_inputs( $settings, $value ) {
	 	
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$param_type = isset( $settings['type'] ) ? $settings['type'] : '';
		$class      = isset( $settings['class'] ) ? ' ' . $settings['class'] : '';
		$heading    = isset( $settings['section_title'] ) ? $settings['section_title'] : '';
		
		$template_vars = array();
	    $template_vars = array('settings' => $settings, 'value' => $value);

	    ob_start();
	        cawpb_load_templates('admin/margin.php', $template_vars);
	    $content = ob_get_clean();		

		return $content;
	}

	function caw_padding_inputs( $settings, $value ) {
	 	
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$param_type = isset( $settings['type'] ) ? $settings['type'] : '';
		$class      = isset( $settings['class'] ) ? ' ' . $settings['class'] : '';
		$heading    = isset( $settings['section_title'] ) ? $settings['section_title'] : '';
		
		$template_vars = array();
	    $template_vars = array('settings' => $settings, 'value' => $value);

	    ob_start();
	        cawpb_load_templates('admin/padding.php', $template_vars);
	    $content = ob_get_clean();		

		return $content;
	}

	function get_element_params( $slug, $settings, $paths = array() ){

		$cawpb_params = array();
		$params       = array(); // Legacy name, still populated by older companion settings files.
		$safe_slug    = sanitize_file_name( $slug );

		$settings_path = isset( $paths['settings'] ) ? $paths['settings'] : ( CAWPB_PATH . '/addons/' . $safe_slug . '/settings.php' );
		if ( file_exists( $settings_path ) ) {
			include( $settings_path );
		}

		// Back-compat: settings files written before 4.3 set $params.
		if ( empty( $cawpb_params ) && ! empty( $params ) ) {
			$cawpb_params = $params;
		}

		if ( isset( $settings['support'] ) && is_array( $settings['support'] ) ) {
			foreach ( $settings['support'] as $key => $data ) {
				$callback = array( $this, 'get_params_' . $key );
				if ( is_callable( $callback ) ) {
					$additional_params = call_user_func( $callback, $data );
					$cawpb_params = array_merge( $cawpb_params, $additional_params );
				}
			}
		}

		$base = isset( $settings['base'] ) ? $settings['base'] : '';

		/**
		 * Filter the params for a specific addon by shortcode base.
		 *
		 * External plugins (e.g. Classic Addons Pro) use this filter to
		 * inject additional params into existing free widgets — for
		 * example cawpb_params_caw_post_grid adds AJAX Load More options.
		 *
		 * Implementations MUST gate any Pro-only behaviour behind
		 * cawpb_can() so the free widget keeps working when Pro is absent.
		 *
		 * @since 4.2
		 *
		 * @param array  $cawpb_params Param array passed to vc_map().
		 * @param string $slug         Addon slug.
		 */
		if ( $base !== '' ) {
			$cawpb_params = apply_filters( 'cawpb_params_' . $base, $cawpb_params, $slug );
		}

		/**
		 * Generic catch-all filter for cross-cutting param injection
		 * (e.g. tooltip / sticky params added to every addon).
		 *
		 * @since 4.2
		 *
		 * @param array  $cawpb_params Param array.
		 * @param string $base         Shortcode base.
		 * @param string $slug         Addon slug.
		 */
		$cawpb_params = apply_filters( 'cawpb_params', $cawpb_params, $base, $slug );

		return $cawpb_params;
	}

	function get_params_typo($settings){
		$cawpb_typo_params = array();
			include( CAWPB_PATH.'/inc/settings/typography.php' );
		return $cawpb_typo_params;
	}

	function get_params_button($settings){
		$cawpb_btn_params = array();
			include( CAWPB_PATH.'/inc/settings/button.php' );
		return $cawpb_btn_params;
	}

	function get_params_icon($settings){
		$cawpb_icon_params = array();
			include( CAWPB_PATH.'/inc/settings/icon.php' );
		return $cawpb_icon_params;
	}

	function get_params_ribbon($settings){
		$cawpb_ribbon_params = array();
			include( CAWPB_PATH.'/inc/settings/ribbon.php' );
		return $cawpb_ribbon_params;
	}

	function get_params_csseditor($settings){
		$cawpb_css_params = array();
			include( CAWPB_PATH.'/inc/settings/csseditor.php' );
		return $cawpb_css_params;
	}


	function save_settings(){
    	
    	$response = array();

        if ( current_user_can( 'manage_options' )
            && isset( $_REQUEST['caw_settings'], $_REQUEST['cawp_admin_settings_nonce'] )
            && wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['cawp_admin_settings_nonce'] ) ), 'cawp_admin_settings' ) ) {

        	$settings_meta = array_map( 'sanitize_text_field', wp_unslash( (array) $_REQUEST['caw_settings'] ) );

            update_option('caw_settings', $settings_meta);
            
            $response = array(
            	'status'  => 'success', 
            	'message' => __('Settings saved successfully.', 'classic-addons-wpbakery-page-builder')
        	);
           
        }else{
            $response = array(
            	'status'  => 'error' , 
            	'message' => __('Settings saved error.', 'classic-addons-wpbakery-page-builder')
        	);
        }
        
        wp_send_json($response);
    }
}