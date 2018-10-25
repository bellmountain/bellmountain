<?php
/**
 * matx Theme Customizer.
 *
 * @package matx
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


/**
 * Create Panel Matx Settings
 */
add_action( 'customize_register', 'matx_create_color_settings' );

function matx_create_color_settings( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


 	/**
 	 * add Section Blog ( matx_customize_blog ) 
 	 */

    $wp_customize->add_section( 'matx_customize_colors', array(
            'title' 		=> esc_html__('Matx Color Settings','matx'),
            'priority' 		=> 170,
        )
    );


	/* Default Color Scheme */

    $wp_customize->add_setting( 'cz_color_schemes', array(
        'default' 			=> 'color-red',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'cz_color_schemes', array(
        'label' 		=> esc_html__('Color Schemes','matx'),
        'description' 	=> esc_html__('Select from predefined color schemes','matx'),
        'section' 		=> 'matx_customize_colors',
		'type'     		=> 'select',
		'choices'  		=> array(
			'color-red'  			=> esc_html__('Color Red','matx'),
			'color-cyan'  			=> esc_html__('Color Cyan','matx'),
			'color-indigo'  		=> esc_html__('Color Indigo','matx'),
			'color-deep-purple' 	=> esc_html__('Color Deep Purple','matx'),
			'color-pink'  			=> esc_html__('Color Pink','matx'),
			'color-blue'  			=> esc_html__('Color Blue','matx'),
			'color-green'  			=> esc_html__('Color Green','matx'),
			'color-deep-orange'		=> esc_html__('Color Deep Orange','matx'),
			'color-blue-grey'  		=> esc_html__('Color Blue Grey','matx'),
			'color-teal'  			=> esc_html__('Color Teal','matx'),
			'color-purple'  		=> esc_html__('Color Purple','matx'),
			'color-light-green'  	=> esc_html__('Color Light Green','matx'),
			'color-custom'  		=> esc_html__('Custom Color','matx')
		),
	));


	/* Primary Color */

    $wp_customize->add_setting( 'cz_color_primary', array(
        'default' 			=> '#ff5252', 
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'cz_color_primary', array(
        'label' 		=> esc_html__('Primary Color','matx'),
        'description' 	=> esc_html__('Theme primary color','matx'),
        'section' 		=> 'matx_customize_colors',
		'type'     		=> 'color'
	));


	/* Secondary Color */

    $wp_customize->add_setting( 'cz_color_secondary', array(
        'default' 			=> '#ff9f9f', 
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'cz_color_secondary', array(
        'label' 		=> esc_html__('Secondary Color','matx'),
        'description' 	=> esc_html__('Theme secondary color, please provide some lighter color then primary color','matx'),
        'section' 		=> 'matx_customize_colors',
		'type'     		=> 'color'
	));

}



/**
 * Blog settings panel
 */
add_action( 'customize_register', 'matx_create_blog_settings' );

function matx_create_blog_settings( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );


 	/**
 	 * add Section Blog ( matx_customize_blog ) 
 	 */

    $wp_customize->add_section( 'matx_customize_blog', array(
            'title' 		=> esc_html__('Matx Blog Settings','matx'),
            'description' 	=> esc_html__('Configure blog.','matx'),
            'priority' 		=> 140,
        )
    );

    /* setting blog style */
    $wp_customize->add_setting( 'cz_blog_style', array(
	        'default' 			=> 'standard',
	        'sanitize_callback' => 'matx_sanitize_choices_field' 
	    )
	);

	$wp_customize->add_control( 'cz_blog_style', array(
        'label' 		=> esc_html__('Blog Page Style','matx'),
        'description' 	=> esc_html__('Global blog page layout. Default: Standard blog post with sidebar.','matx'),
        'section' 		=> 'matx_customize_blog',
		'type'     		=> 'radio',
		'choices'  		=> array(
			'standard'  		=> esc_html__('Standard','matx'),
			'full_width'  		=> esc_html__('Full width masonry','matx'),
			'masonry_sidebar' 	=> esc_html__('Masonry with sidebar','matx')
		),
	));


    /* Sidebar position */
    $wp_customize->add_setting( 'sb_position', array(
	        'default' 			=> 'right',
	        'sanitize_callback' => 'matx_sanitize_choices_field' 
	    )
	);

	$wp_customize->add_control( 'sb_position', array(
        'label' 		=> esc_html__('Sidebar position', 'matx'),
        'description' 	=> esc_html__('Global sidebar positioning. It will be applied for blog pages. Default: Right', 'matx'),
        'section' 		=> 'matx_customize_blog',
		'type'     		=> 'radio',
		'choices'  		=> array(
			'right'  		=> esc_html__('Right','matx'),
			'left'  		=> esc_html__('Left', 'matx')
		),
	));


	/* setting number of post for shown */

    $wp_customize->add_setting( 'cz_blog_numpost', array(
        'default' 			=> 5, 
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'cz_blog_numpost', array(
        'label' 		=> esc_html__('Post number','matx'),
        'description' 	=> esc_html__('Initial blog post to display rather than ajax load. Default: 5','matx'),
        'section' 		=> 'matx_customize_blog',
		'type'     		=> 'text'
	));
	
	/* setting number load post number */

    $wp_customize->add_setting( 'cz_blog_loadpost', array(
        'default' 			=> 3,
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'cz_blog_loadpost', array(
        'label' 		=> esc_html__('Load more post','matx'),
        'description' 	=> esc_html__('Ajax loaded post number. Default: 3','matx'),
        'section' 		=> 'matx_customize_blog',
		'type'     		=> 'text'
    ));
	
	/* single page sidebar setting */

    $wp_customize->add_setting( 'cz_show_singlepage_sidebar', array(
        'default' 			=> 'yes',
	    'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'cz_show_singlepage_sidebar', array(
        'label' 		=> esc_html__('Show sidebar on single post page','matx'),
        'section' 		=> 'matx_customize_blog',
		'type'     		=> 'checkbox'
    ));

}

/**
 * Create Panel Matx Theme Options
 */
add_action( 'customize_register', 'matx_create_panel_general_settings' );

function matx_create_panel_general_settings($wp_customize){

	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 130,
		'capability'     => 'edit_theme_options',
		'title'          => esc_html__('Matx Theme Options', 'matx'),
		'description'    => esc_html__('Theme\'s general settings', 'matx'),
	) );

}


/**
 * Create header settings fields
 */
add_action( 'customize_register', 'matx_header_setting_with_customizer' );

function matx_header_setting_with_customizer($wp_customize){


	$matx_wp_version = substr( get_bloginfo('version'), 0, 3);

	
	// general setting->header setting

	$wp_customize->add_section( 'header_settings', array(
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Header Settings', 'matx'),
	    'panel'  		 => 'general_settings',
	) );

	// header style 
    $wp_customize->add_setting( 'cz_header_style', array(
        'default' 			=> 'animated_header',
        'sanitize_callback' => 'matx_sanitize_choices_field'
	));

	$wp_customize->add_control( 'cz_header_style', array(
	    'label'    		=> esc_html__( 'Global Header Style', 'matx' ),
	    'description'	=> esc_html__('Choose header style.You can set page specific header style from page settings. Default: Animated header.','matx'),
	    'section'  		=> 'header_settings',
		'type'     		=> 'radio',
		'choices'  		=> array(
			'animated_header'  	=> esc_html__('Animated sticky header','matx'),
			'sticky_header'  	=> esc_html__('Sticky header','matx'),
			'non_sticky_header' => esc_html__('Non sticky header','matx')
		),
	));


	// header color scheme 
    $wp_customize->add_setting( 'cz_header_color', array(
        'default' 			=> 'header_scheme_dark',
        'sanitize_callback' => 'matx_sanitize_choices_field'
	));

	$wp_customize->add_control( 'cz_header_color', array(
	    'label'    		=> esc_html__( 'Global Header Color Scheme', 'matx' ),
	    'description'	=> esc_html__('Choose a color scheme for header. You can set page specific header color from page settings. Default: Dark.','matx'),
	    'section'  		=> 'header_settings',
		'type'     		=> 'radio',
		'choices'  		=> array(
			'header_scheme_dark'	=> esc_html__('Dark','matx'),
			'header_scheme_light'	=> esc_html__('Light','matx'),
		),
	));

	// Logo Dark
    $wp_customize->add_setting( 'matx_logo_dark', array(
    	'sanitize_callback'		=> 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'matx_logo_dark', array(
		    'label'    		=> esc_html__( 'Upload Logo for color scheme dark.', 'matx' ),
		    'description'	=> esc_html__( 'This logo show when header color scheme is dark.','matx' ),
		    'section'  		=> 'header_settings'
		)
	) );


	// logo Light
    $wp_customize->add_setting( 'matx_logo_light', array(
    	'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'matx_logo_light', array(
		    'label'    		=> esc_html__( 'Upload Logo for color scheme light.', 'matx' ),
		    'description'	=> esc_html__( 'This logo show when header color scheme is light.','matx' ),
		    'section'  		=> 'header_settings'
		)
	) );

	// theme favicon setting

	if($matx_wp_version < 4.3) {
	    $wp_customize->add_setting( 'matx_favicon', array(
	    		'sanitize_callback' => 'esc_url_raw'
		    )
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 'matx_favicon', array(
			    'label'    		=> esc_html__( 'Upload Favicon', 'matx' ),
			    'description'  	=> esc_html__('Upload 16x16 px ico or png image for favicon.','matx'),
			    'section'  		=> 'header_settings',
			)
		) );
	}
}


/**
 * Create Footer settings fields
 */

add_action( 'customize_register', 'matx_footer_setting_with_customizer' );

function matx_footer_setting_with_customizer($wp_customize){
	

	// general setting ->footer setting 

	$wp_customize->add_section( 'footer_settings', array(
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Footer Settings', 'matx'),
	    'panel'  		 => 'general_settings',
	) );

	// footer logo setting 
    $wp_customize->add_setting( 'matx_logo_footer', array(
    		'sanitize_callback' => 'esc_url_raw'
	    )
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'matx_logo_footer', array(
		    'label'    		=> esc_html__( 'Upload Logo', 'matx' ),
		    'description' 	=> esc_html__( 'This logo used on footer. Header logo will be used as default', 'matx'),
		    'section'  		=> 'footer_settings'
		)
	));

	// copyright text 
    $wp_customize->add_setting( 'matx_copyright', array(
	        'default' 			=> '',
	        'sanitize_callback' => 'matx_sanitize_textarea_field'
	    )
	);

	$wp_customize->add_control( 'matx_copyright', array(
	    'label'    		=> esc_html__( 'Footer copyright text', 'matx' ),
	    'section'  		=> 'footer_settings',
	    'type'			=> 'textarea'
	));
}

/**
 * Create social media url fields
 */
add_action( 'customize_register', 'matx_add_social_links_customizer' );

function matx_add_social_links_customizer($wp_customize){

	/**
	 * General setting panel
	 */

	// general setting->header setting
	$wp_customize->add_section( 'matx_social_fields', array( 
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Social Links', 'matx'),
	    'panel'  		 => 'general_settings',
	) );

	// social field facebook
    $wp_customize->add_setting( 'matx_facebook', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_facebook', array(
	    'label'    	=> esc_html__( 'Facebook', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_facebook', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_facebook', array(
	    'label'    	=> esc_html__( 'Show facebook ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field twitter
    $wp_customize->add_setting( 'matx_twitter', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'matx_twitter', array(
	    'label'    	=> esc_html__( 'Twitter', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_twitter', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_twitter', array(
	    'label'    	=> esc_html__( 'Show twitter ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));


	// social field Google Plus
    $wp_customize->add_setting( 'matx_gplus', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_gplus', array(
	    'label'    => esc_html__( 'Google Plus', 'matx' ),
	    'section'  => 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_gplus', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_gplus', array(
	    'label'    	=> esc_html__( 'Show google plus ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));


	// social field Youtube
    $wp_customize->add_setting( 'matx_youtube', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_youtube', array(
	    'label'    	=> esc_html__( 'Youtube', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_youtube', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_youtube', array(
	    'label'    	=> esc_html__( 'Show youtube ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field Linked In
    $wp_customize->add_setting( 'matx_linkedin', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_linkedin', array(
	    'label'    	=> esc_html__( 'Linked In', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_linkedin', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_linkedin', array(
	    'label'    	=> esc_html__( 'Show linked in ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field Dribble
    $wp_customize->add_setting( 'matx_dribble', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_dribble', array(
	    'label'    	=> esc_html__( 'Dribble', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_dribble', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_dribble', array(
	    'label'    	=> esc_html__( 'Show dribble ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field Behance
    $wp_customize->add_setting( 'matx_behance', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_behance', array(
	    'label'    	=> esc_html__( 'Behance', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_behance', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_behance', array(
	    'label'    	=> esc_html__( 'Show behance ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field Instagram
    $wp_customize->add_setting( 'matx_instagram', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_instagram', array(
	    'label'    	=> esc_html__( 'Instagram', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_instagram', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_instagram', array(
	    'label'    	=> esc_html__( 'Show instagram ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field Pinterest
    $wp_customize->add_setting( 'matx_pinterest', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_pinterest', array(
	    'label'    	=> esc_html__( 'Pinterest', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_pinterest', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_pinterest', array(
	    'label'    => esc_html__( 'Show pinterest ?', 'matx' ),
	    'section'  => 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field Flickr
    $wp_customize->add_setting( 'matx_flickr', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_flickr', array(
	    'label'    	=> esc_html__( 'Flickr', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_flikr', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_flikr', array(
	    'label'    	=> esc_html__( 'Show flikr ?', 'matx' ),
	    'section'  	=> 'matx_social_fields',
	    'type'		=> 'checkbox'
	));

	// social field Reddit
    $wp_customize->add_setting( 'matx_reddit', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'matx_reddit', array(
	    'label'    => esc_html__( 'Reddit', 'matx' ),
	    'section'  => 'matx_social_fields',
	    'type'		=> 'text'
	));

    $wp_customize->add_setting( 'show_reddit', array(
        'default' 			=> '',
        'sanitize_callback' => 'matx_sanitize_checkbox_field'
	));

	$wp_customize->add_control( 'show_reddit', array(
	    'label'    => esc_html__( 'Show reddit ?', 'matx' ),
	    'section'  => 'matx_social_fields',
	    'type'		=> 'checkbox'
	));


}


/**
 * twitter api setting
 */
add_action( 'customize_register', 'matx_twitter_api_setting' );

function matx_twitter_api_setting($wp_customize){

	// general setting->header setting
	$wp_customize->add_section( 'matx_twitterapi_fields', array( 
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Twitter API configuration', 'matx'),
	    'description'    => __("To active twitter slider and show tweets, you must have to configure those option below. Get your key from <a href='https://apps.twitter.com/'>here</a>", 'matx'),
	    'panel'  		 => 'general_settings',
	) );

	// twitter api consumer key
    $wp_customize->add_setting( 'twitter_consumer_key', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'twitter_consumer_key', array(
	    'label'    	=> esc_html__( 'Consumer key', 'matx' ),
	    'section'  	=> 'matx_twitterapi_fields',
	    'type'		=> 'text'
	)); 

	// twitter api consumer secret
    $wp_customize->add_setting( 'twitter_consumer_secret', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'twitter_consumer_secret', array(
	    'label'    	=> esc_html__( 'Consumer secret', 'matx' ),
	    'section'  	=> 'matx_twitterapi_fields',
	    'type'		=> 'text'
	)); 

	// twitter api access token
    $wp_customize->add_setting( 'twitter_access_token', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'twitter_access_token', array(
	    'label'    	=> esc_html__( 'Access token', 'matx' ),
	    'section'  	=> 'matx_twitterapi_fields',
	    'type'		=> 'text'
	)); 
	// twitter api access secret
    $wp_customize->add_setting( 'twitter_access_secret', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control( 'twitter_access_secret', array(
	    'label'    	=> esc_html__( 'Access secret', 'matx' ),
	    'section'  	=> 'matx_twitterapi_fields',
	    'type'		=> 'text'
	)); 
}



/* Instagram API setting */
add_action( 'customize_register', 'matx_gmap_api_setting' );

function matx_gmap_api_setting($wp_customize){

	$wp_customize->add_section( 'matx_gmap_api_fields', array( 
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Google Map API configuration', 'matx'),
	    'description'    => __("To use Matx Google Map Element, you have to provide your map API key.Get an API key from <a href='https://developers.google.com/maps/documentation/javascript/get-api-key' target='_blank'>here</a>.", 'matx'),
	    'panel'  		 => 'general_settings',
	) );

	// instagram user ID
    $wp_customize->add_setting( 'gmap_api_key', array(
        'default' 			=> '',
        'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control( 'gmap_api_key', array(
	    'label'    	=> esc_html__( 'API Key', 'matx' ),
	    'section'  	=> 'matx_gmap_api_fields',
	    'type'		=> 'text'
	));
}


/**
 * Callback function for sanitizing radio settings.
 * Use for PenciDesign
 *
 * @param $input , $setting
 * @return $input
 */
function matx_sanitize_choices_field( $input ) {
	return $input;
}

/**
 * Callback function for sanitizing textarea settings
 * Use for PenciDesign
 *
 * @param $input , $setting
 * @return $input
 */
function matx_sanitize_textarea_field( $input ) {
	return $input;
}

/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 * @return string default value if type is not exists
 */
function matx_sanitize_checkbox_field( $input ) {
	if ( $input == 1 ) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 * @return a number
 */
function matx_sanitize_number_field( $input ) {
	return absint( $input );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function matx_customize_preview_js() {
	wp_enqueue_script( 'matx_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'matx_customize_preview_js' );
