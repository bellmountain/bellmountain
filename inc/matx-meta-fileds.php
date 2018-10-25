<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * @package  Matx Wordpress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

global $lib_dir;

if ( file_exists( $lib_dir . 'cmb2/init.php' ) ) {
	require_once $lib_dir . 'cmb2/init.php';
} elseif ( file_exists( $lib_dir . 'CMB2/init.php' ) ) {
	require_once $lib_dir . 'CMB2/init.php';
}


add_action( 'cmb2_admin_init', 'matx_custom_metafields' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function matx_custom_metafields() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_matx_team_';

	/**
	 * Team basic info Groups
	 */
	$matx_team_basicinfo = new_cmb2_box( array(
		'id'           => $prefix . 'member_basicinfo_metabox',
		'title'        => esc_html__( 'Team member\'s basic info', 'matx' ),
		'object_types' => array( 'matx-team' ),
	) );

	$matx_team_basicinfo->add_field( array(
		'type' => 'text',
		'name' => esc_html__( 'Member\'s role', 'matx' ),
		'desc' => esc_html__( 'Role of the member in your team. E.g. Web Developer or UX/UI Designer.', 'matx' ),
		'id'   => $prefix . 'mamber_role'
	) );

	/**
	 * Repeatable Field Groups
	 */

	/* start team skill group's  */
	$matx_team_skill = new_cmb2_box( array(
		'id'           => $prefix . 'skill_metabox',
		'title'        => esc_html__( 'Skill progress bar.', 'matx' ),
		'object_types' => array( 'matx-team' ),
	) );

	/* start team social group's  */
	$team_skill_group = $matx_team_skill->add_field( array(
		'id'          => $prefix . 'skill_info',
		'type'        => 'group',
		'description' => esc_html__( 'Members skill information.', 'matx' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Skill progressbar {#}', 'matx' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add progressbar', 'matx' ),
			'remove_button' => esc_html__( 'Remove progressbar', 'matx' ),
			'sortable'      => true, // beta
		),
	) );

	$matx_team_skill->add_group_field( $team_skill_group, array(
		'type'       	=> 'text',
		'name'       	=> esc_html__( 'Title', 'matx' ),
		'description' 	=> esc_html__( 'E.g. PHP or Email Marketing.', 'matx' ),
		'id'         	=> $prefix.'skill_title',
	) );

	$matx_team_skill->add_group_field( $team_skill_group, array(
		'type'       	=> 'text_small',
		'name'       	=> esc_html__( 'About skill', 'matx' ),
		'description' 	=> esc_html__( 'E.g. 70% or 90%.', 'matx' ),
		'id'         	=> $prefix.'skill_count',
	) );

	/**
	 * Repeatable Field Groups
	 */
	$matx_team_social = new_cmb2_box( array(
		'id'           => $prefix . 'social_metabox',
		'title'        => esc_html__( 'Team member\'s social info', 'matx' ),
		'object_types' => array( 'matx-team' ),
	) );


	/* start team social group's  */
	$team_social_group = $matx_team_social->add_field( array(
		'id'          => $prefix.'social_media',
		'type'        => 'group',
		'description' => esc_html__( 'Team Members social media information ( standard 3 items ) ', 'matx' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Social media {#}', 'matx' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add another social media', 'matx' ),
			'remove_button' => esc_html__( 'Remove social media', 'matx' ),
			'sortable'      => true, // beta
		),
	) );

	$matx_team_social->add_group_field( $team_social_group, array(
		'name'       => esc_html__( 'Title', 'matx' ),
		'id'         => $prefix.'social_media_title',
		'type'       => 'text',
	) );
	$matx_team_social->add_group_field( $team_social_group, array(
		'name'       => esc_html__( 'Url', 'matx' ),
		'id'         => $prefix.'social_media_url',
		'type'       => 'text',
	) );
	$matx_team_social->add_group_field( $team_social_group, array(
		'id'         => $prefix.'social_media_icon',
		'name'       => esc_html__( 'Icon class', 'matx' ),
		'type'       => 'ai_icon_picker'
	) );

	/* end start team social group's  */


	// Start with an underscore to hide fields from custom fields list

	$prefix = '_matx_specialty_';

	/**
	 * Team basic info Groups
	 */
	$matx_specialty = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Specialty carousel\' Icon', 'matx' ),
		'object_types' => array( 'matx-specialty' ),
	) );

	$matx_specialty->add_field( array(
		'type' 	=> 'ai_icon_picker',
		'name' 	=> esc_html__( 'Icon', 'matx' ),
		'des'   => esc_html__('Select a icon from icon set. It will display in specialty carousel/slider mode.', 'matx'),
		'id'   	=> $prefix . 'icon_class'
	) );



	// Start with an underscore to hide fields from custom fields list

	$prefix = '_matx_testimonial_';

	/**
	 * Team basic info Groups
	 */
	$matx_tmonial = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Testimonial Details', 'matx' ),
		'object_types' => array( 'matx-testimonial' ),
	) );

	$matx_tmonial->add_field( array(
		'name' => esc_html__( 'Testimonial Text', 'matx' ),
		'desc' => esc_html__( 'Write a testimonial into the textarea', 'matx' ),
		'id'   => $prefix . 'recom_text',
		'type' => 'textarea',
	) );

	$matx_tmonial->add_field( array(
		'name' => esc_html__( 'By Who ?', 'matx' ),
		'desc' => esc_html__( 'Name of the client who gave feedback', 'matx' ),
		'id'   => $prefix . 'recom_name',
		'type' => 'text',
	) );

	$matx_tmonial->add_field( array(
		'name' => esc_html__( 'More details about the client', 'matx' ),
		'desc' => esc_html__( 'You can add here the company he/she works in, position in the company, etc', 'matx' ),
		'id'   => $prefix . 'recom_org',
		'type' => 'text'
	) );

	

	// Start with an underscore to hide fields from custom fields list

	$prefix = '_matx_service_';

	/**
	 * service info Groups
	 */
	$matx_service = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Service Details', 'matx' ),
		'priority'     => 'high',
		'object_types' => array( 'matx-service' ),
	) );

	$matx_service->add_field( array(
		'type' => 'text',
		'name' => esc_html__( 'Service Title', 'matx' ),
		'desc' => esc_html__( 'Name of provided service. It will display on front end', 'matx' ),
		'id'   => $prefix.'title',
	) );
	$matx_service->add_field( array(
		'type' => 'ai_icon_picker',
		'name' => esc_html__( 'Tab Icon', 'matx' ),
		'desc' => esc_html__( 'Choose a icon for tab menu.', 'matx' ),
		'id'   => $prefix.'tab_icon',
	) );
	$matx_service->add_field( array(
		'type' => 'textarea',
		'name' => esc_html__( 'Service Content', 'matx' ),
		'desc' => esc_html__( 'Description about the service', 'matx' ),
		'id'   => $prefix.'content',
	) );
	$matx_service->add_field( array(
		'type' => 'textarea',
		'name' => esc_html__( 'Experience', 'matx' ),
		'desc' => esc_html__( 'About the year of your experience', 'matx' ),
		'id'   => $prefix.'year_ex',
	) );


	/* start service field  */

	$statistics_group = $matx_service->add_field( array(
		'id'          => $prefix . 'statistic',
		'type'        => 'group',
		'description' => esc_html__( 'Fun fact about us.', 'matx' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Fun fact {#}', 'matx' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add New Fun fact', 'matx' ),
			'remove_button' => esc_html__( 'Remove Fun fact', 'matx' ),
			'sortable'      => true, // beta
		),
	) );

	$matx_service->add_group_field( $statistics_group, array(
		'type'      => 'text',
		'name'      => esc_html__( 'Fun fact title', 'matx' ),
		'id'        => $prefix.'st_title',
	) );
	$matx_service->add_group_field( $statistics_group, array(
		'type'      => 'text_small',
		'name'      => esc_html__( 'Fun fact count', 'matx' ),
		'id'        => $prefix.'st_number',
	) );
	$matx_service->add_group_field( $statistics_group, array(
		'type'       => 'ai_icon_picker',
		'name'       => esc_html__( 'Icon', 'matx' ),
		'id'         => $prefix.'st_icon',
	) );


	/* portfolio */
	$prefix = '_matx_portfolio_';

    $matx_pf  = new_cmb2_box( array(
		'id'           	=> $prefix . 'content',
		'title'        	=> esc_html__( 'Portfolio Settings', 'matx' ),
		'object_types' 	=> array( 'matx-portfolio' ),
    ) );

	$matx_pf->add_field( array(
		'type' 			=> 'select',
		'name' 			=> esc_html__( 'Preview as', 'matx' ),
		'id'   			=> $prefix.'is_external_url',
	    'options'       => array(
	        'pf_ac_popup'   => esc_html__( 'Popup', 'matx' ),
	        'pf_ac_light'   => esc_html__( 'Gallery', 'matx' ),
	        'pf_ac_single' 	=> esc_html__( 'Details Page', 'matx' ),
	    )
	) );
	
	$matx_pf->add_field( array(
		'type' 			=> 'select',
		'name' 			=> esc_html__( 'Details Page Style', 'matx' ),
		'id'   			=> $prefix.'single_page_style',
	    'options'       => array(
	        'style_one'   	=> esc_html__( 'Style One', 'matx' ),
	        'style_two'   	=> esc_html__( 'Style Two', 'matx' ),
	        'style_three'   => esc_html__( 'Style Three', 'matx' ),
	        'style_vc' 		=> esc_html__( 'Visual Composer', 'matx' ),
	    )
	) );

    $matx_pf->add_field( array(
		'type' 		=> 'wysiwyg',
		'name' 		=> esc_html__( 'Description', 'matx' ),
		'id'   		=> $prefix.'description',
		'options' 	=> array(
			'wpautop' 		=> true,
			'media_buttons' => false
		),
    ) );

    $matx_pf->add_field( array(
		'type' 		=> 'text',
		'name' 		=> esc_html__( 'Popup title', 'matx' ),
		'desc' 		=> esc_html__( 'It will appear top of the popup. portfolio title will be use if it not set.', 'matx' ),
		'id'   		=> $prefix.'popup_title',
    ) ); 
    $matx_pf->add_field( array(
		'type' 		=> 'text',
		'name' 		=> esc_html__( 'Popup subtitle', 'matx' ),
		'desc' 		=> esc_html__( 'Subtitle of the popup, appear bottom of the title and portfolio style 2', 'matx' ),
		'id'   		=> $prefix.'popup_stitle',
    ) ); 
    $matx_pf->add_field( array(
		'type' 		=> 'text',
		'name' 		=> esc_html__( 'Popup preview Button URL', 'matx' ),
		'id'   		=> $prefix.'preview_url',
    ) ); 
    $matx_pf->add_field( array(
		'type' 		=> 'file_list',
		'name' 		=> esc_html__( 'Screenshot\'s', 'matx' ),
		'desc' 		=> esc_html__( 'Upload screenshot image\'s for popup', 'matx' ),
		'id'   		=> $prefix.'attached_images',
    ) );

    $matx_pf->add_field( array(
		'type' 		=> 'wysiwyg',
		'name' 		=> esc_html__( 'Details', 'matx' ),
		'desc' 		=> esc_html__( 'Extra information to show in details page.', 'matx' ),
		'id'   		=> $prefix.'more_info',
		'options' 	=> array(
			'wpautop' 			=> true,
			'media_buttons' 	=> false,
		),
    ) ); 

	/**
	 * metabox for blog post
	 */

	$prefix = '_matx_page_banner_';

	$matx_blog_post_field = new_cmb2_box( array(
		'id'           	=> $prefix . 'metabox',
		'title'        	=> esc_html__( 'Page Banner', 'matx' ),
		'object_types' 	=> array( 'post', 'page', 'matx-portfolio' ),
	) );

	$matx_blog_post_field->add_field( array(
		'type' 			=> 'file',
		'name' 			=> esc_html__( 'Upload banner image', 'matx' ),
		'desc' 			=> esc_html__( 'If upload, the image used as background-image of single post page banner, otherwise banner background remains #333333 ', 'matx' ),
		'id'   			=> $prefix . 'background',
		'allow' 		=> array( 'attachment' ),
	    'options' 		=> array(
	        'url' 		=> false, // Hide the text input for the url
	    ),
	    'text'    		=> array(
	        'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
	    ),
	) );

 	/**
 	 * Display metabox according to the post format
 	 */
	$prefix = '_matx_post_format_';

	// post format audio

	$matx_audio_post = new_cmb2_box( array(
		'id'           => $prefix . 'audio_metabox',
		'title'        => esc_html__( 'Audio', 'matx' ),
		'object_types' => array( 'post' ),
	) );

	$matx_audio_post->add_field( array(
		'name' 			=> esc_html__( 'Uploaded audio', 'matx' ),
		'desc' 			=> esc_html__( 'Description', 'matx' ),
		'id'   			=> $prefix . 'audio_url',
		'type' 			=> 'text',
	) );

	$matx_audio_post->add_field( array(
		'name' 			=> esc_html__( 'Embedded audio', 'matx' ),
		'desc' 			=> esc_html__( 'Provide url', 'matx' ),
		'id'   			=> $prefix . 'audio_oembed',
		'type' 			=> 'oembed',
	) );

	$matx_audio_post->add_field( array(
		'name' 			=> esc_html__( 'Audio type', 'matx' ),
		'desc' 			=> esc_html__( 'Select the type of your provide url.', 'matx' ),
		'id'   			=> $prefix . 'audio_type',
		'type' 			=> 'radio_inline',
		'options'       => array(
	        'uploaded_audio' 	=> esc_html__( 'Uploaded MP3', 'matx' ),
	        'oembded_audio'   	=> esc_html__( 'Embedded audio', 'matx' ),
	    ),
	) );


	// post format video 
	$matx_video_post = new_cmb2_box( array(
		'id'           => $prefix . 'video_metabox',
		'title'        => esc_html__( 'Video fields', 'matx' ),
		'object_types' => array( 'post' ),
	) );

	$matx_video_post->add_field( array(
		'name' 			=> esc_html__( 'Uploaded video', 'matx' ),
		'desc' 			=> esc_html__( 'provide uploaded video url', 'matx' ),
		'id'   			=> $prefix . 'video_url',
		'type' 			=> 'text',
	) );

	$matx_video_post->add_field( array(
		'name' 			=> esc_html__( 'Embedded video', 'matx' ),
		'desc' 			=> esc_html__( 'provide video url', 'matx' ),
		'id'   			=> $prefix . 'video_oembed',
		'type' 			=> 'oembed',
	) );

	$matx_video_post->add_field( array(
		'name' 			=> esc_html__( 'Video type', 'matx' ),
		'desc' 			=> esc_html__( 'Select the type of your provide url.', 'matx' ),
		'id'   			=> $prefix . 'video_type',
		'type' 			=> 'radio_inline',
		'options'       => array(
	        'uploaded_video' 	=> esc_html__( 'Uploaded video', 'matx' ),
	        'oembded_video'   	=> esc_html__( 'Embedded video', 'matx' ),
	    ),
	) );



	// post format gallery 

	$matx_slider_post = new_cmb2_box( array(
		'id'           => $prefix . 'gallery_metabox',
		'title'        => esc_html__( 'Slider fields', 'matx' ),
		'object_types' => array( 'post' ),
	) );

	$matx_slider_post->add_field( array(
		'name' 			=> esc_html__( 'Slider images', 'matx' ),
		'desc' 			=> esc_html__( 'Description', 'matx' ),
		'id'   			=> $prefix . 'slider_imgs',
		'type' 			=> 'file_list',
	) );


	// post format quote 

	$matx_slider_post = new_cmb2_box( array(
		'id'           => $prefix . 'quote_metabox',
		'title'        => esc_html__( 'Quote fields', 'matx' ),
		'object_types' => array( 'post' ),
	) );

	$matx_slider_post->add_field( array(
		'name' 			=> esc_html__( 'Quote', 'matx' ),
		'desc' 			=> esc_html__( 'Write quote text', 'matx' ),
		'id'   			=> $prefix . 'quote_text',
		'type' 			=> 'textarea',
	) );

	$matx_slider_post->add_field( array(
		'name' 			=> esc_html__( 'Quote Author', 'matx' ),
		'desc' 			=> esc_html__( 'The person who said.', 'matx' ),
		'id'   			=> $prefix . 'quote_author',
		'type' 			=> 'text',
	) );


	/**
	 * individual page header settings
	 */

	$prefix = '_matx_page_header';


	$matx_nav_locations = matx_get_navmenu_locations();

	$matx_page_header = new_cmb2_box( array(
		'id'           	=> $prefix . 'metabox',
		'title'        	=> esc_html__( 'Header and Navigation Setting', 'matx' ),
		'object_types' 	=> array( 'page' ),
	) );

	$matx_page_header->add_field( array(
	    'name'             => esc_html__( 'Header Style', 'matx' ),
	    'desc'             => esc_html__( 'Select header style for this page. Default: Global Header Style inherited from customizer setting.', 'matx' ),
	    'id'               => $prefix.'style',
	    'type'             => 'select',
	    'default'          => 'global_header',
	    'options'          => array(
	        'animated_header' 		=> esc_html__( 'Animated Sticky Header', 'matx' ),
	        'sticky_header'   		=> esc_html__( 'Sticky Header', 'matx' ),
	        'non_sticky_header'     => esc_html__( 'Non Sticky Header', 'matx' ),
	    ),
	));
	$matx_page_header->add_field( array(
	    'name'             => esc_html__( 'Color Scheme', 'matx' ),
	    'desc'             => esc_html__( 'Select header color scheme for this page. Default: Global Header Color Scheme inherited from customizer setting.', 'matx' ),
	    'id'               => $prefix.'color_scheme',
	    'type'             => 'select',
	    'default'          => 'global_scheme',
	    'options'          => array(
	        'global_scheme'			=> esc_html__( 'Global Color', 'matx' ),
	        'header_scheme_dark' 	=> esc_html__( 'Dark', 'matx' ),
	        'header_scheme_light' 	=> esc_html__( 'Light', 'matx' ),
	    ),
	));

	$matx_page_header->add_field( array(
	    'name'             => esc_html__('Page navigation', 'matx'),
	    'desc'             => esc_html__('Select menu for this page', 'matx'),
	    'id'               => $prefix.'_page_nav',
	    'type'             => 'select',
	    'default'          => '',
	    'options'          => $matx_nav_locations,
	));



	/**
	 * individual blog page style
	 */

	$prefix = '_matx_blogpage_';

	$matx_blog_layout = new_cmb2_box( array(
		'id'           => $prefix . 'style_metabox',
		'title'        => esc_html__( 'Change Blog Layout', 'matx' ),
		'object_types' => array( 'page' ),
	) );

	$matx_blog_layout->add_field( array(
	    'name'             => esc_html__('Blog Layout', 'matx'),
	    'desc'             => esc_html__('Select a layout for this blog page.', 'matx'),
	    'id'               => $prefix.'style',
	    'type'             => 'select',
	    'default'          => 'standard',
	    'options'          => array(
			'standard'  		=> esc_html__('Standard', 'matx' ),
			'full_width'  		=> esc_html__('Full Width Masonry', 'matx' ),
			'masonry_sidebar' 	=> esc_html__('Masonry With Sidebar', 'matx' )
	    ),
	));

	/**
	 * Control sidebar for custom pages
	 */
	$prefix = '_matx_sidebar_';

	$matx_sidebar = new_cmb2_box( array(
		'id'           => $prefix . 'ctrl_metabox',
		'title'        => esc_html__( 'Control Sidebar', 'matx' ),
		'object_types' => array( 'page' )
	) ); 

	$matx_sidebar->add_field( array(
	    'name'             => esc_html__('Choose Sidebar','matx'),
	    'desc'             => esc_html__('Choose sidebar between blog or page sidebar','matx'),
	    'id'               => $prefix.'is',
	    'type'             => 'select',
	    'default'          => 'sidebar-blog',
	    'options'          => get_all_sidebars(),
	) );

	$matx_sidebar->add_field( array(
	    'name'             => esc_html__('Choose Sidebar Position', 'matx'),
	    'desc'             => esc_html__('Choose sidebar position to left or right','matx'),
	    'id'               => $prefix.'_position',
	    'type'             => 'select',
	    'default'          => 'right',
	    'options'          => array(
	        'right'	=> esc_html__( 'Right', 'matx' ),
	        'left'	=> esc_html__( 'Left', 'matx' ),
	    ),
	) );

}


function get_all_sidebars() {

	global $wp_registered_sidebars;
	$sidebars = array();

	$sidebars['no_sidebar'] = esc_html__( 'No Sidebar', 'matx' );
	
	foreach ( $wp_registered_sidebars as $sidebar ) {

		$sidebar_id 	= $sidebar['id'];
		$sidebar_name 	= $sidebar['name'];

		$sidebars[$sidebar_id] = esc_html( $sidebar_name, 'matx' );
		
	}

	return $sidebars;
	
}





