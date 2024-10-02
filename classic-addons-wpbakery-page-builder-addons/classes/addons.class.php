<?php
/**
* Classic Addons - Main Class
*/
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

	}

	function menu_page() {
		add_menu_page(
	        __( 'Classic Addons', 'classic-addons' ),
	        __( 'Classic Addons', 'classic-addons' ),
	        'manage_options',
	        'caw-settings',
	        array( $this, 'page_callback' )
	    );
	}

	function page_callback(){

		$template_vars = array();

	    cawpb_load_templates('admin/settings.php', $template_vars);	    
	}

	function load_admin_scripts(){

		if ( class_exists('vc_backend_editor') ) {		   
			if ( vc_backend_editor()->editorEnabled() ) {			
				wp_enqueue_style( 'classic-addons', CAWPB_URL.'/css/caw-admin.css');
			}
		}

		if (isset($_GET['page']) && $_GET['page'] == 'caw-settings') {
			wp_enqueue_style( 'caw-settings', CAWPB_URL.'/css/settings.css');
			wp_enqueue_script( 'caw-settings', CAWPB_URL. '/js/settings.js', array('jquery') );
		}
	}

	function load_extra_admin_settings(){
		
		$script_url = CAWPB_URL . '/js/admin-scripts.js';

		vc_add_shortcode_param( 'caw_section', array($this,'caw_section_display') );
		vc_add_shortcode_param( 'cawpb_border_style', array($this,'caw_border_inputs'), $script_url );
		vc_add_shortcode_param( 'caw_margin_style', array($this,'caw_margin_inputs'), $script_url );
		vc_add_shortcode_param( 'caw_padding_style', array($this,'caw_padding_inputs'), $script_url );
	}

	function addons_init(){

		$addons = cawpb_get_addons_meta();
		foreach ($addons as $slug => $settings) {

			$addons_settings  = get_option('caw_settings');
			if (isset($addons_settings[str_replace("-item", "", $slug)])) {
				include( CAWPB_PATH.'/addons/'.$slug.'/'.$slug.'.php' );
				$settings['icon'] = CAWPB_URL.'/addons/'.$slug.'/'.$slug.'.png';
				$settings['category'] = 'Classic Addons';
				$settings['params'] = $this->get_element_params($slug, $settings);	
				vc_map($settings);		
			}
		}
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

	function get_element_params($slug, $settings){

		$params = array();
		if (file_exists(CAWPB_PATH.'/addons/'.$slug.'/settings.php')) {
			include( CAWPB_PATH.'/addons/'.$slug.'/settings.php' );
		}

		if (isset($settings['support']) && is_array($settings['support'])) {
			foreach ($settings['support'] as $key => $data) {
				$additional_params = call_user_func(array($this, 'get_params_'.$key), $data);
				$params = array_merge($params, $additional_params);
			}
		}

		return $params;
	}

	function get_params_typo($settings){
		$typo_params = array();
			include( CAWPB_PATH.'/inc/settings/typography.php' );
		return $typo_params;
	}

	function get_params_button($settings){
		$btn_params = array();
			include( CAWPB_PATH.'/inc/settings/button.php' );
		return $btn_params;
	}

	function get_params_icon($settings){
		$icon_params = array();
			include( CAWPB_PATH.'/inc/settings/icon.php' );
		return $icon_params;
	}

	function get_params_ribbon($settings){
		$ribbon_params = array();
			include( CAWPB_PATH.'/inc/settings/ribbon.php' );
		return $ribbon_params;
	}

	function get_params_csseditor($settings){
		$css_params = array();
			include( CAWPB_PATH.'/inc/settings/csseditor.php' );
		return $css_params;
	}


	function save_settings(){
    	
    	$response = array();
        
        if (isset($_REQUEST['caw_settings'])) {
        	
        	$settings_meta = array_map( 'sanitize_text_field', $_REQUEST['caw_settings'] );

            update_option('caw_settings', $settings_meta);
            
            $response = array(
            	'status'  => 'success', 
            	'message' => __('Settings saved successfully.', 'classic-addons')
        	);
           
        }else{
            $response = array(
            	'status'  => 'error' , 
            	'message' => __('Settings saved error.', 'classic-addons')
        	);
        }
        
        wp_send_json($response);
    }
}