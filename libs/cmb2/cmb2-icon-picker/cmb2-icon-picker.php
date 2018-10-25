<?php
/*
Plugin Name: CMB2 Field Type: Icon Picker
Plugin URI: 
Description: Icon picker field type for CMB2
Version: 1.0.0
Author: Ariful Islam
Author URI: 
License: GPLv2+
*/

/**
 * Class AI_IconPicker
 */
class AI_IconPicker {

	/**
	 * Current version number
	 */
	const VERSION = '1.0.0';

	/**
	 * Initialize the plugin by hooking into CMB2
	 */
	public function __construct() {
		add_action( 'cmb2_render_ai_icon_picker', array( $this, 'render' ), 10, 5 );
		add_action( 'cmb2_sanitize_ai_icon_picker', array( $this, 'sanitize' ), 10, 2 );
	}

	/**
	 * Add a CMB custom field to allow for the selection FontAwesome Icon
	 */
	public function render( $field, $escaped_value, $object_id, $object_type, $field_type ) {

		$this->setup_admin_scripts();
    	echo $field_type->input( array( 'type' => 'text', 'class' => 'ai-icon-select regular-text' ) );

	}

	/**
	* Sanitize icon class name
	*/
	public function sanitize( $sanitized_val, $val ) {

		if ( ! empty( $val ) ) {
			
			return sanitize_text_field( $val );
		}

		return $sanitized_val;

	}

	/**
	 * Enqueue admin scripts for our font-awesome picker field type
	 */
	protected function setup_admin_scripts() {
		$dir = trailingslashit( dirname( __FILE__ ) );

		if ( 'WIN' === strtoupper( substr( PHP_OS, 0, 3 ) ) ) {
			// Windows
			$content_dir = str_replace( '/', DIRECTORY_SEPARATOR, WP_CONTENT_DIR );
			$content_url = str_replace( $content_dir, WP_CONTENT_URL, $dir );
			$url = str_replace( DIRECTORY_SEPARATOR, '/', $content_url );

		} else {
			$url = str_replace(
				array( WP_CONTENT_DIR, WP_PLUGIN_DIR ),
				array( WP_CONTENT_URL, WP_PLUGIN_URL ),
				$dir
			);
		}

		$url = set_url_scheme( $url );

		// JS files
		wp_enqueue_script( 'cmb2-icon-picker-js', $url . 'assets/js/icon-picker.min.js', array('jquery'), self::VERSION, true );
		wp_enqueue_script( 'cmb2-icon-picker-init', $url . 'assets/js/icon-picker-init.js', array('cmb2-icon-picker-js'), self::VERSION, true );

		// Font CSS Files
		wp_enqueue_style( 'cmb2-fontawesome-css', $url . 'assets/css/font-awesome.min.css', array(), self::VERSION );
		wp_enqueue_style( 'cmb2-material-design-iconic-font-css', $url . 'assets/css/material-design-iconic-font.min.css', array(), self::VERSION );
		wp_enqueue_style( 'cmb2-ion-icon-css', $url . 'assets/css/ionicons.min.css', array(), self::VERSION );

		// Plugin CSS File
		wp_enqueue_style( 'cmb2-icon-picker-css', $url . 'assets/css/icon-picker.min.css', array(
			'cmb2-fontawesome-css',
			'cmb2-material-design-iconic-font-css',
			'cmb2-ion-icon-css'
		), self::VERSION );

	}
}
new AI_IconPicker();