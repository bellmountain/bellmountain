<?php 


add_action( 'tgmpa_register', 'matx_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function matx_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'                  => 'Matx Post types', // The plugin name
			'version'				=> '1.0',
			'slug'                  => 'matx-posttypes', // The plugin slug (typically the folder name)
			'source'                => get_template_directory_uri() . '/plugins/matx-posttypes.zip', // The plugin source 
			'required'              => true, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'                  => 'Matx Shortcodes', // The plugin name
			'version'				=> '1.0',
			'slug'                  => 'matx-shortcodes', // The plugin slug (typically the folder name)
			'source'                => get_template_directory_uri() . '/plugins/matx-shortcodes.zip', // The plugin source
			'required'              => true, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'                  => 'WPBakery Visual Composer', // The plugin name
			'version'				=> '5.0.1',
			'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
			'source'                => get_template_directory_uri() . '/plugins/js_composer.zip', // The plugin source
			'required'              => true, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'                  => 'Revolution Slider', // The plugin name
			'version'				=> '5.2.4.1',
			'slug'                  => 'revslider', // The plugin slug (typically the folder name)
			'source'                => get_template_directory_uri() . '/plugins/revslider.zip', // The plugin source
			'required'              => true, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'                  => 'Matx Twitter Auth', // The plugin name
			'version'				=> '1.0',
			'slug'                  => 'matx-twitter-auth', // The plugin slug (typically the folder name)
			'source'                => get_template_directory_uri() . '/plugins/matx-twitter-auth.zip', // The plugin source
			'required'              => true, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name' 					=> 'Contact Form 7',
			'slug' 					=> 'contact-form-7',
			'version'				=> '',
			'required' 				=> false
		),
		array(
			'name' 					=> 'MailChimp for WordPress',
			'slug' 					=> 'mailchimp-for-wp',
			'version'				=> '',
			'required' 				=> false
		)
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	
	$config = array(
		'domain'       		=> 'matx',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',							// Default absolute path to pre-packaged plugins
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> esc_html__( 'Install Required Plugins', 'matx' ),

			'menu_title'                       			=> esc_html__( 'Install Plugins', 'matx' ),

			'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'matx' ), // %1$s = plugin name

			'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'matx' ),

			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','matx' ), // %1$s = plugin name(s)

			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ,'matx'), // %1$s = plugin name(s)

			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ,'matx'), // %1$s = plugin name(s)

			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ,'matx'), // %1$s = plugin name(s)

			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ,'matx'), // %1$s = plugin name(s)

			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ,'matx'), // %1$s = plugin name(s)

			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ,'matx'), // %1$s = plugin name(s)

			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ,'matx'), // %1$s = plugin name(s)

			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins','matx' ),

			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins','matx' ),

			'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'matx' ),

			'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'matx' ),

			'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'matx' ), // %1$s = dashboard link
			
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}










































