<?php 

/**
* remove unwanted fields from vc_row editor
*/
 
 
vc_remove_param('vc_row', 'parallax_image');

/**
* [$attributes description]
* @var array create $attribute for overwrite base vc_row
*/

$vc_row_attributes = array(
	array(
		'type' 			=> 'el_id',
		'heading' 		=> esc_html__( 'Row ID', 'matx' ),
		'param_name' 	=> 'el_id',
		"weight" 		=> 10,
		'description' 	=> wp_kses( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="http://www.w3schools.com/tags/att_global_id.asp" target="_blank">w3c specification</a>).', 'matx' ), array(
				'a' => array(
			        'href' 		=> array(),
			        'target' 	=> array()
			    )
			))
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__( 'Extra class name', 'matx' ),
		'param_name' 	=> 'el_class',
		"weight" 		=> 10,
		'description' 	=> esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'matx' ),
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> esc_html__( 'Row stretch', 'matx' ),
		'param_name' 	=> 'full_width',
		"weight" 		=> 10,
		'value' 		=> array(
			esc_html__( 'Default', 'matx' ) => '',
			esc_html__( 'Stretch row', 'matx' ) => 'stretch_row',
			esc_html__( 'Stretch row and content', 'matx' ) => 'stretch_row_content',
			esc_html__( 'Stretch row and content (no paddings)', 'matx' ) => 'stretch_row_content_no_spaces',
		),
		'description' 	=> esc_html__( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'matx' ),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> esc_html__( 'Full width Row ?', 'matx' ),
		'param_name' 	=> 'is_container',
		"weight" 		=> 10,
        'value' 		=> array( esc_html__( 'Yes', 'matx' ) => 'fw_yes' ),
		'description' 	=> esc_html__( 'IF checked row will set to full width (100%). Default: Content wrapped with 1170px container', 'matx' ),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> esc_html__( 'Enable section navigation ?', 'matx' ),
		'param_name' 	=> 'is_menu_navigate',
		"weight" 		=> 10,
        'value' 		=> array( esc_html__( 'Yes', 'matx' ) => 'fw_yes' ),
		'description' 	=> esc_html__( 'If checked you can navigate this section by clicking related menu item', 'matx' ),
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> esc_html__( 'Parallax', 'matx' ),
		'param_name' 	=> 'parallax',
		"weight" 		=> 10,
		'value' 		=> array(
			esc_html__( 'None', 'matx' ) 		=> '',
			esc_html__( 'Simple', 'matx' ) 		=> 'content-moving',
			esc_html__( 'With fade', 'matx' ) 	=> 'content-moving-fade',
		),
		'description' 	=> esc_html__( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'matx' ),
		'dependency' 	=> array(
			'element' 		=> 'video_bg',
			'is_empty' 		=> true,
		),
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> esc_html__('Background image overlay', 'matx'),
		"param_name" 	=> "matx_sec_overlay",
		"weight" 		=> 10,
		"description" 	=> esc_html__("You can set a color over the background image. You can make it more or less opaque, by using the next setting. Default: white ", "matx")
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__( 'Parallax speed', 'matx' ),
		'param_name' 	=> 'parallax_speed_bg',
		"weight" 		=> 10,
		'value' 		=> '1.5',
		'description' 	=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'matx'),
		'dependency' 	=> array(
			'element' 		=> 'parallax',
			'not_empty' 	=> true,
		),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> esc_html__( 'Use video background?', 'matx' ),
		'param_name' 	=> 'video_bg',
		"weight" 		=> 10,
		'description' 	=> esc_html__( 'If checked, video will be used as row background.', 'matx' ),
		'value' 		=> array( esc_html__( 'Yes', 'matx' ) => 'yes' ),
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__( 'YouTube link', 'matx' ),
		'param_name' 	=> 'video_bg_url',
		"weight" 		=> 10,
		'value' 		=> 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
		// default video url
		'description' 	=> esc_html__( 'Add YouTube link.', 'matx' ),
		'dependency' 	=> array(
			'element' 		=> 'video_bg',
			'not_empty' 	=> true,
		),
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> esc_html__( 'Parallax', 'matx' ),
		'param_name' 	=> 'video_bg_parallax',
		"weight" 		=> 10,
		'value' 		=> array(
			esc_html__( 'None', 'matx' ) 		=> '',
			esc_html__( 'Simple', 'matx' ) 		=> 'content-moving',
			esc_html__( 'With fade', 'matx' ) 	=> 'content-moving-fade',
		),
		'description' 	=> esc_html__( 'Add parallax type background for row.', 'matx' ),
		'dependency' 	=> array(
			'element' 		=> 'video_bg',
			'not_empty' 	=> true,
		),
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__( 'Parallax speed', 'matx' ),
		'param_name' 	=> 'parallax_speed_video',
		"weight" 		=> 10,
		'value' 		=> '1.5',
		'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'matx' ),
		'dependency' 	=> array(
			'element' 		=> 'video_bg_parallax',
			'not_empty' 	=> true,
		),
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> esc_html__( 'Columns gap', 'matx' ),
		'param_name' 	=> 'gap',
		"weight" 		=> 10,
		'value' 		=> array(
			'0px' => '0',
			'1px' => '1',
			'2px' => '2',
			'3px' => '3',
			'4px' => '4',
			'5px' => '5',
			'10px' => '10',
			'15px' => '15',
			'20px' => '20',
			'25px' => '25',
			'30px' => '30',
			'35px' => '35',
		),
		'std' 			=> '0px',
		'description' 	=> esc_html__( 'Select gap between columns in row.', 'matx' ),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> esc_html__( 'Full height row?', 'matx' ),
		'param_name' 	=> 'full_height',
		"weight" 		=> 10,
		'description' 	=> esc_html__( 'If checked row will be set to full height.', 'matx' ),
		'value' 		=> array( esc_html__( 'Yes', 'matx' ) => 'yes' ),
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> esc_html__( 'Columns position', 'matx' ),
		'param_name' 	=> 'columns_placement',
		"weight" 		=> 10,
		'value' 		=> array(
			esc_html__( 'Middle', 'matx' ) 	=> 'middle',
			esc_html__( 'Top', 'matx' ) 	=> 'top',
			esc_html__( 'Bottom', 'matx' ) 	=> 'bottom',
			esc_html__( 'Stretch', 'matx' ) => 'stretch',
		),
		'description' 	=> esc_html__( 'Select columns position within row.', 'matx' ),
		'dependency' 	=> array(
			'element' 		=> 'full_height',
			'not_empty' 	=> true,
		),
	),
	array(
		'type' 			=> 'checkbox',
		'heading' 		=> esc_html__( 'Equal height', 'matx' ),
		'param_name' 	=> 'equal_height',
		"weight" 		=> 10,
		'description' 	=> esc_html__( 'If checked columns will be set to equal height.', 'matx' ),
		'value' 		=> array( esc_html__( 'Yes', 'matx' ) => 'yes' )
	),
	array(
		'type' 			=> 'dropdown',
		'heading' 		=> esc_html__( 'Content position', 'matx' ),
		'param_name' 	=> 'content_placement',
		"weight" 		=> 10,
		'value' 		=> array(
			esc_html__( 'Default', 'matx' ) => '',
			esc_html__( 'Top', 'matx' ) => 'top',
			esc_html__( 'Middle', 'matx' ) => 'middle',
			esc_html__( 'Bottom', 'matx' ) => 'bottom',
		),
		'description' 	=> esc_html__( 'Select content position within columns.', 'matx' ),
	),
);

vc_add_params( 'vc_row', $vc_row_attributes );


// print_r(vc_map_add_css_animation());

vc_remove_param('vc_column', 'css_animation');

$vc_coloumn_attributes = array(
	array(
		"type" 			=> "dropdown",
		"param_name" 	=> "animation",
		"admin_label" 	=> true,
		"heading" 		=> esc_html__( "Animation", "matx" ),
		'weight' 		=> 10,
		"value" 		=> array(
			esc_html__("None", 'matx') 					=> '',
			esc_html__("Fade In ", 'matx') 				=> 'fadeIn',
			esc_html__("Fade In Up", 'matx') 			=> 'fadeInUp',
			esc_html__("Fade In Up Small", 'matx') 		=> 'fadeInUpSmall',
			esc_html__("Fade In Right ", 'matx') 		=> 'fadeInRight',
			esc_html__("Fade In Right Small", 'matx') 	=> 'fadeInRightSmall',
			esc_html__("Fade In Left Small", 'matx') 	=> 'fadeInLeftSmall',
			esc_html__("Fade In Down", 'matx') 			=> 'fadeInDown',
		),
	),
	array(
		"type" 			=> "textfield",
		"heading" 		=> esc_html__( "Animation Duration", "matx" ),

		'weight' 		=> 10,
		"param_name" 	=> "duration",
		"description" 	=> esc_html__("Animation duration in Seconds. Default 1s", "matx"),
		"admin_label" 	=> true,
		'dependency' 	=> array(
			'element' 				=> 'animation',
			'value_not_equal_to' 	=> array(''),
		),
	),
	array(
		"type" 			=> "textfield",
		"heading" 		=> esc_html__( "Animation Delay", "matx" ),
		'weight' 		=> 10,
		"admin_label" 	=> true,
		"param_name" 	=> "delay",
		"description" 	=> esc_html__("Animation delay in Seconds. ( e.g .1s )", "matx"),
		'dependency' 	=> array(
			'element' 				=> 'animation',
			'value_not_equal_to' 	=> array(''),
		),
	),
);

vc_add_params( 'vc_column', $vc_coloumn_attributes );



/* Section Title */
function matx_section_title_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Section Title", "matx"),
		"base" 			=> "matx-section-title",
		"icon" 			=> get_template_directory_uri(). '/img/vc_icons/title.png',
		"description" 	=> esc_html__("Section heading",'matx'),
		"class" 		=> "section-heading",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Title", "matx" ),
				"param_name" 	=> "section_title_content"
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Title Tag', 'matx'),
				"description" 	=> esc_html__("Choo section background. Default H3 ( 25px )", "matx"),
				"param_name" 	=> "matx_sec_title_tag",
				"weight" 		=> 9,
				"value" 		=> array(
					"H2" 	=> 'h2',        
					"H3" 	=> 'h3',
					"H4" 	=> 'h4',
				),
				"std"         	=> 'h3'
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> esc_html__('Title color', 'matx'),
				"param_name" 	=> "matx_sec_title_color",
				"weight" 		=> 9,
				"description" 	=> esc_html__("Choose a color according to your section background ( default #333333 )", "matx")
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 9,
				"heading" 		=> esc_html__( "Subtitle", "matx" ),
				"param_name" 	=> "section_subtitle_content"
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> esc_html__('Title color', 'matx'),
				"param_name" 	=> "matx_sec_subtitle_color",
				"weight" 		=> 9,
				"description" 	=> esc_html__("Choose subtitle color. ( default color #777777 )", "matx")
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Alignment', 'matx'),
				"param_name" 	=> "matx_sec_title_alignment",
				"weight" 		=> 8,
				"value" 		=> array(
					esc_html__("Center", 'matx') 	=> 'center',        
					esc_html__("Left", 'matx') 		=> 'left',
					esc_html__('Right', 'matx') 	=> 'right',
				)    
			),
			array(
	            'type' 			=> 'textfield',
				"admin_label" 	=> true,
	            'heading' 		=> esc_html__( 'Bottom space', 'matx' ),
				"description" 	=> esc_html__("Override the default bottom space. Ex: 75px ( Default 75px )", "matx"),
	            'param_name' 	=> 'matx_sec_title_mb',
				"weight" 		=> 7
	        ),
		)
	) );
}
matx_section_title_vc();



/* Primary button */
function matx_primary_btns_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Matx Button", "matx"),
		"base" 			=> "matx-btn",
		"icon" 			=> get_template_directory_uri(). '/img/vc_icons/btn.png',
		"description" 	=> esc_html__("Matx primary button", "matx"),
		"class" 		=> "matx-primary-btn",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				'type' 			=> "textfield",
				'admin_label' 	=> true,
				'weight' 		=> 10,
				'heading' 		=> esc_html__( "Button Text", "matx" ),
				'param_name' 	=> "text"
			),
			array(
				'type' 				=> 'vc_link',
				'heading' 			=> esc_html__( 'URL (Link)', 'matx' ),
				'param_name' 		=> 'link',
				'description' 		=> esc_html__( 'Add link to button.', 'matx' ),
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Color', 'matx' ),
				'param_name' 	=> 'color',
				'description' 	=> esc_html__( 'Use predefined button by color.', 'matx' ),
				'value' 		=> array(
					esc_html__( 'Default', 'matx' ) 	=> '',
					esc_html__( 'Black', 'matx' ) 		=> 'black',
					esc_html__( 'Cyan', 'matx' ) 		=> 'cyan',
					esc_html__( 'Indigo', 'matx' ) 		=> 'indigo',
					esc_html__( 'Orange', 'matx' ) 		=> 'orange',
					esc_html__( 'Blue', 'matx' ) 		=> 'blue',
					esc_html__( 'Pink', 'matx' ) 		=> 'pink',
					esc_html__( 'Green', 'matx' ) 		=> 'green',
					esc_html__( 'Purple', 'matx' ) 		=> 'purple',
					esc_html__( 'Deep Purple', 'matx' ) => 'deeppurple',
				),
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Alignment', 'matx' ),
				'param_name' 		=> 'alignment',
				'description' 		=> esc_html__( 'Select button alignment.', 'matx' ),
				'value' 			=> array(
					esc_html__( 'Inline', 'matx' ) 	=> 'inline',
					esc_html__( 'Left', 'matx' ) 	=> 'left',
					esc_html__( 'Right', 'matx' ) 	=> 'right',
					esc_html__( 'Center', 'matx' ) 	=> 'center',
				),
			),
			array(
				'type' 				=> 'checkbox',
				'heading' 			=> esc_html__( 'Set full width button?', 'matx' ),
				'param_name' 		=> 'button_fullwidth',
				'value' 			=> array(
		            esc_html__( 'Yes', 'matx' ) => 'yes',
		        ),
				'dependency' 		=> array(
					'element' 				=> 'alignment',
					'value_not_equal_to' 	=> 'inline',
				),
			),
			array(
				'type' 			=> "textfield",
				'admin_label' 	=> true,
				'weight' 		=> 6,
				'heading' 		=> esc_html__( "Custom Attributes", "matx" ),
				'description' 	=> esc_html__( 'Provide custom attribute if you have. e.g data-action=lightbox ( without quote ). ', 'matx' ),
				'param_name' 	=> "attributes"
			),
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "animation",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Animation", "matx" ),
				"value" 		=> array(
					esc_html__("None", 'matx') 					=> '',
					esc_html__("Fade In ", 'matx') 				=> 'fadeIn',
					esc_html__("Fade In Up", 'matx') 			=> 'fadeInUp',
					esc_html__("Fade In Up Small", 'matx') 		=> 'fadeInUpSmall',
					esc_html__("Fade In Right ", 'matx') 		=> 'fadeInRight',
					esc_html__("Fade In Right Small", 'matx') 	=> 'fadeInRightSmall',
					esc_html__("Fade In Left Small", 'matx') 	=> 'fadeInLeftSmall',
					esc_html__("Fade In Down", 'matx') 			=> 'fadeInDown',
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Duration", "matx" ),
				"param_name" 	=> "duration",
				"description" 	=> esc_html__("Animation duration in Seconds. Default 1s", "matx"),
				"admin_label" 	=> true,
				'dependency' 	=> array(
					'element' 				=> 'animation',
					'value_not_equal_to' 	=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Delay", "matx" ),
				"admin_label" 	=> true,
				"param_name" 	=> "delay",
				"description" 	=> esc_html__("Animation delay in Seconds. ( e.g .1s )", "matx"),
				'dependency' 	=> array(
					'element' 				=> 'animation',
					'value_not_equal_to' 	=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				'type' 			=> 'css_editor',
				'heading' 		=> esc_html__( 'Css', 'matx' ),
				'param_name' 	=> 'css',
				'group' 		=> esc_html__( 'Design options', 'matx' ),
			),
	        array(
	            "type"          => "textfield",
	            "heading"       => esc_html__("Extra class name", "matx"),
	            "param_name"    => "el_class",
	            "description"   => esc_html__("Extensible card element container", "matx")
	        ),
		)
	) );
}
matx_primary_btns_vc();



/* Icon box */
function matx_icon_box_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Icon Box", "matx"),
		"base" 			=> "matx-icon-module",
		"icon" 			=> get_template_directory_uri(). '/img/vc_icons/icon-box.png',
		"description" 	=> esc_html__("Display icon box module", "matx"),
		"class" 		=> "matx-icon-box-module",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "ib_style",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Icon Box Style", "matx" ),
				"value" 		=> array(      
					esc_html__("Style One (Horizontal)", 'matx') 					=> 'style_one',
					esc_html__("Style Two (Vertical)", 'matx') 						=> 'style_two',
					esc_html__("Style Three (background and hover effect)", 'matx') => 'style_three',
					esc_html__("Style Four (Bordered)", 'matx') 					=> 'style_four',
					esc_html__("Style Five (xxl icon)", 'matx') 					=> 'style_five',
				),
				"std"         	=> 'Style One'
			),
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "ib_alignment",
				"admin_label" 	=> true,
				"description" 	=> esc_html__("Use Dark color scheme for lighter background and Light for dark background.", "matx"),
				"heading" 		=> esc_html__( "Box Alignment", "matx" ),
				"value" 		=> array(
					esc_html__("Left", 'matx') 	=> 'left',        
					esc_html__("Center", 'matx')=> 'center',
					esc_html__("Right", 'matx') => 'right',
				),
				"std"         	=> 'Left'
			),
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "ib_colorschem",
				"admin_label" 	=> true,
				"description" 	=> esc_html__("Use Dark color scheme for lighter background and Light for dark background.", "matx"),
				"heading" 		=> esc_html__( "Color scheme", "matx" ),
				"value" 		=> array(
					esc_html__("Dark", 'matx') 	=> 'dark',        
					esc_html__("Light", 'matx') => 'light',
				)
			),
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "ib_title_tag",
				"admin_label" 	=> true,
				"description" 	=> esc_html__("Select a tag for icon box title.", "matx"),
				"heading" 		=> esc_html__("Tag Title", "matx" ),
				"value" 		=> array(
					"H1"	=> 'h1',
					"H2"	=> 'h2',
					"H3"	=> 'h3',
					"H4"	=> 'h4',
					"H5"	=> 'h5',
					"H6"	=> 'h6',
				),
				"std"         	=> 'h5'
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Title", "matx" ),
				"param_name" 	=> "icon_module_title",
				'group' 		=> esc_html__( 'Content', 'matx' )
			),
			array(
				"type" 			=> "textarea",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Description", "matx" ),
				"param_name" 	=> "icon_module_des",
				'group' 		=> esc_html__( 'Content', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Icon Class", "matx" ),
				"description" 	=> esc_html__("Provide Font Awesome or Material Design Icon Font icon class ( e.g. fa fa-facebook or zmdi zmdi-facebook )", "matx"),
				"param_name" 	=> "icon_module_iconclass",
				'group' 		=> esc_html__( 'Content', 'matx' )
			),
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "animation",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Animation", "matx" ),
				"value" 		=> array(
					esc_html__("None", 'matx') 					=> '',
					esc_html__("Fade In ", 'matx') 				=> 'fadeIn',
					esc_html__("Fade In Up", 'matx') 			=> 'fadeInUp',
					esc_html__("Fade In Up Small", 'matx') 		=> 'fadeInUpSmall',
					esc_html__("Fade In Right ", 'matx') 		=> 'fadeInRight',
					esc_html__("Fade In Right Small", 'matx') 	=> 'fadeInRightSmall',
					esc_html__("Fade In Left Small", 'matx') 	=> 'fadeInLeftSmall',
					esc_html__("Fade In Down", 'matx') 			=> 'fadeInDown',
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Duration", "matx" ),
				"param_name" 	=> "duration",
				"description" 	=> esc_html__("Animation duration in Seconds. Default 1s", "matx"),
				"admin_label" 	=> true,
				'dependency' 	=> array(
					'element' 				=> 'animation',
					'value_not_equal_to' 	=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Delay", "matx" ),
				"admin_label" 	=> true,
				"param_name" 	=> "delay",
				"description" 	=> esc_html__("Animation delay in Seconds. ( e.g .1s )", "matx"),
				'dependency' 	=> array(
					'element' 			=> 'animation',
					'value_not_equal_to'=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				'type' 			=> 'css_editor',
				'heading' 		=> esc_html__( 'Css', 'matx' ),
				'param_name' 	=> 'css',
				'group' 		=> esc_html__( 'Design options', 'matx' ),
			),
		)
	) );
}
matx_icon_box_vc();



/* Skill progress bar */
function matx_progress_bar_vc(){
	vc_map( array(
		"name"			=> esc_html__("Skill Bar", "matx"),
		"base" 			=> "matx-skill-progressbar",
		"icon" 			=> get_template_directory_uri(). '/img/vc_icons/skill-bar.png',
		"description"	=> esc_html__("Skill progress bar", "matx"),
		"class" 		=> "matx-skill-bar",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Skill", "matx"),
				"description" 	=> esc_html__("Title of your skill.", "matx"),
				"param_name" 	=> "skill_name"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Skill Level", "matx"),
				"description" 	=> esc_html__("Provide your skill level at percent. Ex: 90%", "matx"),
				"param_name" 	=> "skill_count"
			)
		)
	));
}
matx_progress_bar_vc();



/* Blog Post Grid */
function matx_blog_post_grid_vc(){

	$post_cats 		= get_terms('category');
	$post_formats 	= get_terms('post_format');

	$cat_lists = array();
	$post_format_lists = array( 'Standard'	=> 'post-format-standard' );


	foreach( $post_cats as $cat ) {
	   $cat_lists[$cat->name] = $cat->term_id;
	}


	foreach( $post_formats as $format ) {
	   $post_format_lists[$format->name] = $format->slug;
	}

	vc_map( array(
		"name"			=> esc_html__("Blog posts", "matx"),
		"base" 			=> "matx-blogpost-grid",
		"icon" 			=> get_template_directory_uri(). '/img/vc_icons/blog-post.png',
		"description"	=> esc_html__("Display blog post as grid", "matx"),
		"class" 		=> "matx-blog-posts",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Post's For Display", "matx"),
				"description" 	=> esc_html__("Number of Blog Posts to Display. Use '-1' to include all post. ( Default: 3 post )", "matx"),
				"param_name" 	=> "matx_blog_numpost"
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> esc_html__("Post category", "matx"),
				"param_name" 	=> "matx_post_catlist",
				"admin_label" 	=> true,
				"value" 		=> $cat_lists,
				"description" 	=> esc_html__("Select categories to display their post's.( Default : All )", "matx")    
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__("Grid Style", "matx"),
				"param_name" 	=> "matx_blog_grid_style",
				"admin_label" 	=> true,
				"value" 		=> array(
					esc_html__("Basic Grid", 'matx') 	=> 'style_one',
					esc_html__("Masonry Grid", 'matx') 	=> 'style_two',
				),
				"description" 	=> esc_html__("Select categories to display their post's.( Default : All )", "matx")    
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> esc_html__("Post format", "matx"),
				"param_name" 	=> "matx_post_formatlists",
				"admin_label" 	=> true,
				"value" 		=> $post_format_lists,
				"description" 	=> esc_html__("Select post format's to display certain format's post.( Default : All )", "matx")
			)
		)
	));
}
matx_blog_post_grid_vc();



/* Pricing table */
function matx_pricing_table_vc(){
	vc_map( array(
		"name"			=> esc_html__("Pricing Table", "matx"),
		"base" 			=> "matx-pricingtable",
		"icon" 			=> get_template_directory_uri() . '/img/vc_icons/pricing-table.png',
		"description"	=> esc_html__("Display Skill Level", "matx"),
		"class" 		=> "matx-pricing-table",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Plan Title", "matx"),
				"description" 	=> esc_html__("Provide plan type. Ex: Standard, Basic, Pro", "matx"),
				"param_name" 	=> "matx_pt_licence"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Price", "matx"),
				"param_name" 	=> "matx_pt_price"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Currency", "matx"),
				"description" 	=> esc_html__("Provide currency symbol. ( Default: $ )", "matx"),
				"param_name" 	=> "matx_pt_currency"
			),
			array(
				"type" 			=> "textarea",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Content", "matx"),
				"description" 	=> esc_html__("Provide plan details separated by new line. Each line will be count as each item", "matx"),
				"param_name" 	=> "matx_pt_content"
			),
			array(
				'type' 			=> "textfield",
				'admin_label' 	=> true,
				'weight' 		=> 10,
				'heading' 		=> esc_html__( "Button Text", "matx" ),
				'param_name' 	=> "matx_pt_btntext"
			),
			array(
				'type' 				=> 'vc_link',
				'heading' 			=> esc_html__( 'Btn Attributes', 'matx' ),
				'param_name' 		=> 'link',
				'description' 		=> esc_html__( 'Add link to button.', 'matx' ),
			),
			array(
				"type" 			=> "checkbox",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Recommended This Package ?", "matx"),
				"param_name" 	=> "matx_pt_recommended",
				'value' 		=> array(
		            esc_html__( 'Yes', 'matx' ) => 'pt_rec_yes',
		        ),
				'description' 	=> esc_html__( 'Check to recommend this plan.', 'matx' ),
			),
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "animation",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Animation", "matx" ),
				"value" 		=> array(
					esc_html__("None", 'matx') 					=> '',
					esc_html__("Fade In ", 'matx') 				=> 'fadeIn',
					esc_html__("Fade In Up", 'matx') 			=> 'fadeInUp',
					esc_html__("Fade In Up Small", 'matx') 		=> 'fadeInUpSmall',
					esc_html__("Fade In Right ", 'matx') 		=> 'fadeInRight',
					esc_html__("Fade In Right Small", 'matx') 	=> 'fadeInRightSmall',
					esc_html__("Fade In Left Small", 'matx') 	=> 'fadeInLeftSmall',
					
					esc_html__("Fade In Down", 'matx') 			=> 'fadeInDown',
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Duration", "matx" ),
				"param_name" 	=> "duration",
				"description" 	=> esc_html__("Animation duration in Seconds. Default 1s", "matx"),
				"admin_label" 	=> true,
				'dependency' 	=> array(
					'element' 				=> 'animation',
					'value_not_equal_to' 	=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Delay", "matx" ),
				"admin_label" 	=> true,
				"param_name" 	=> "delay",
				"description" 	=> esc_html__("Animation delay in Seconds. ( e.g .1s )", "matx"),
				'dependency' 	=> array(
					'element' 				=> 'animation',
					'value_not_equal_to' 	=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
		)
	));
}
matx_pricing_table_vc();



/* Team Slider */
function matx_team_slider_vc(){
	$teams_list = get_posts(array('post_type' => 'matx-team', 'posts_per_page'=> -1, 'post_status' => 'publish'));
	$teams_array = array();

	foreach($teams_list as $team) {
	   $teams_array[$team->post_title] = $team->ID;
	}

	vc_map( array(
		"name" 			=> esc_html__("Team Slider", "matx"),
		"base" 			=> "matx-teams",
		"icon" 			=> get_template_directory_uri() . '/img/vc_icons/team.png',
		"description" 	=> esc_html__("Display team members as a carousel", "matx"),
		"class" 		=> "matx-team-v1",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "checkbox",
				"heading" 		=> esc_html__("Select Team Members", "matx"),
				"param_name" 	=> "matx_team_member_ids",
				"weight" 		=> 10,
				"admin_label" 	=> true,
				"value" 		=> $teams_array,
				"description" 	=> esc_html__("Select which member you want to display on the carousel.", "matx")    
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Team style', 'matx'),
				"param_name" 	=> "matx_team_style",
				"weight" 		=> 9,
				"value" 		=> array(
					esc_html__("Style One", 'matx') 	=> 'style_one',
					esc_html__("Style Two", 'matx') 	=> 'style_two',
					esc_html__("Style Three", 'matx') 	=> 'style_three',
				)    
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Team Column', 'matx'),
				"param_name" 	=> "matx_team_column_grid",
				"weight" 		=> 9,
				"value" 		=> array(
					esc_html__("Column 3", 'matx') 	=> 'column_3',
					esc_html__("Column 4", 'matx') 	=> 'column_4'
				),
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Slider Autoplay', 'matx'),
				"param_name" 	=> "autoplay",
				"weight" 		=> 9,
				"value" 		=> array(
					esc_html__("On", 'matx') 	=> 'on',
					esc_html__("Off", 'matx') 	=> 'off'
				),
			),
		)
	));
}
matx_team_slider_vc();



/* Testimonial Slider */
function matx_testimonial_slider_vc(){
	$test_list = get_posts(array('post_type' => 'matx-testimonial', 'posts_per_page'=> -1, 'post_status' => 'publish'));
	$test_array = array();

	foreach($test_list as $testimonial) {
	   $test_array[$testimonial->post_title] = $testimonial->ID;
	}
	vc_map( array(
		"name" 			=> esc_html__("Testimonials", "matx"),
		"base" 			=> "matx-testimonials",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/testimonial.png',
		"description" 	=> esc_html__("Display testimonials as a carousel", "matx"),
		"class" 		=> "matx-vc-testimonial",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "checkbox",
				"heading" 		=> esc_html__("Select Testimonials", "matx"),
				"param_name" 	=> "matx_testimonial_ids",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"value" 		=> $test_array,
				"description" 	=> esc_html__("Select which testimonial you want to display on the carousel.", "matx")    
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Color scheme', 'matx'),
				"param_name" 	=> "matx_testimonail_color",
				"description" 	=> esc_html__("Select color scheme white if you have dark background and black for light background", "matx"),
				"weight" 		=> 9,
				"value" 		=> array(
					esc_html__("White", 'matx') => 'test_color_white',        
					esc_html__("Black", 'matx') => 'test_color_black',
				)    
			),
			array(
				"type" 			=> "checkbox",
				"param_name" 	=> "matx_testimonail_thumb",
				"description" 	=> esc_html__("Check if you want to hide client image", "matx"),
				"weight" 		=> 8,
				"value" 		=> array(
					esc_html__("Hide Thumbnail", 'matx') 	=> 'image_disable'
				)    
			),
			array(
				"type" 			=> "checkbox",
				"param_name" 	=> "matx_testimonail_nav",
				"description" 	=> esc_html__("Check if you want to disable slider pagination", "matx"),
				"weight" 		=> 8,
				"value" 		=> array(
					esc_html__("Disable Navigation", 'matx') 	=> 'navigation_disable'
				),
			),
			array(
				"type" 			=> "checkbox",
				"param_name" 	=> "matx_testimonail_page",
				"description" 	=> esc_html__("Check if you want to disable slider pagination", "matx"),
				"weight" 		=> 8,
				"value" 		=> array(
					esc_html__("Disable Pagination", 'matx') 	=> 'pagination_disable'
				),
			),
			array(
				"type" 			=> "dropdown",
				"param_name" 	=> "animation",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Animation", "matx" ),
				"value" 		=> array(
					esc_html__("None", 'matx') 					=> '',
					esc_html__("Fade In ", 'matx') 				=> 'fadeIn',
					esc_html__("Fade In Up", 'matx') 			=> 'fadeInUp',
					esc_html__("Fade In Up Small", 'matx') 		=> 'fadeInUpSmall',
					esc_html__("Fade In Right ", 'matx') 		=> 'fadeInRight',
					esc_html__("Fade In Right Small", 'matx') 	=> 'fadeInRightSmall',
					esc_html__("Fade In Left Small", 'matx') 	=> 'fadeInLeftSmall',
					esc_html__("Fade In Down", 'matx') 			=> 'fadeInDown',
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Duration", "matx" ),
				"param_name" 	=> "duration",
				"description" 	=> esc_html__("Animation duration in Seconds. Default 1s", "matx"),
				"admin_label" 	=> true,
				'dependency' 	=> array(
					'element' 				=> 'animation',
					'value_not_equal_to' 	=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> esc_html__( "Animation Delay", "matx" ),
				"admin_label" 	=> true,
				"param_name" 	=> "delay",
				"description" 	=> esc_html__("Animation delay in Seconds. ( e.g .1s )", "matx"),
				'dependency' 	=> array(
					'element' 				=> 'animation',
					'value_not_equal_to' 	=> array(''),
				),
				'group' 		=> esc_html__( 'Animation', 'matx' )
			),
		)
	) );
}
matx_testimonial_slider_vc();



/* Service Tabs */
function matx_service_tabs_vc(){
	$service_lists = get_posts(array('post_type' => 'matx-service', 'posts_per_page'=> -1, 'post_status' => 'publish'));
	$service_array = array();

	foreach($service_lists as $service) {
	   $service_array[$service->post_title] = $service->ID;
	}
	vc_map( array(
		"name" 			=> esc_html__("Service", "matx"),
		"base" 			=> "matx-service-tab",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/service.png',
		"description" 	=> esc_html__("Service Tab", "matx"),
		"class" 		=> "matx-vc-servicetab",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array(
			array(
				"type" 			=> "checkbox",
				"heading" 		=> esc_html__("Select Services", "matx"),
				"param_name" 	=> "matx_service_ids",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"value" 		=> $service_array,
				"description" 	=> esc_html__("Select which services you want to display on the tab.", "matx")    
			),
			array(
				"type" 			=> "checkbox",
				"heading" 		=> esc_html__("Alter Image Position", "matx"),
				"param_name" 	=> "matx_service_thumb_pos",
				"admin_label" 	=> true,
				"weight" 		=> 9,
				"value" 		=> array( esc_html__("Yes", 'matx') => 'yes' ),
				"description" 	=> esc_html__("Check if you want to move featured image right from left.", "matx")    
			),
		)
	) );
}
matx_service_tabs_vc();



/* Specialty Accordion */
function matx_speciality_accordion_vc(){
	$specialty_lists = get_posts(array('post_type' => 'matx-specialty', 'posts_per_page'=> -1, 'post_status' => 'publish'));
	$specialty_array = array();

	foreach($specialty_lists as $specialty) {
		$specialty_array[$specialty->post_title] = $specialty->ID;
	}
	vc_map( array(
		"name" 			=> esc_html__("Specialties", "matx"),
		"base" 			=> "matx-specialty",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/accordion.png',
		"description" 	=> esc_html__("Display specialties as accordion or carousel.", "matx"),
		"class" 		=> "matx-specialty-accordion-carousel",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array(
			array(
				"type" 			=> "checkbox",
				"heading" 		=> esc_html__("Select Specialties", "matx"),
				"param_name" 	=> "matx_sppost_ids",
				"admin_label" 	=> true, 
				"value" 		=> $specialty_array,
				"description" 	=> esc_html__("Select which specialties you want to display", "matx")
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Specialties style', 'matx'),
				"param_name" 	=> "matx_sp_style",
				"description" 	=> esc_html__("Choose specialties style. ( Default: Accordion )", "matx"),
				"value" 		=> array(
					esc_html__("Accordion", 'matx') => 'accordion',        
					esc_html__("Carousel", 'matx') 	=> 'carousal',
				),
				'std'			=> esc_html__("Accordion", 'matx')
			),
		)
	) );
}
matx_speciality_accordion_vc();



/* Video Shortcode */ 
function matx_video_popup_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Video Pop up", "matx"),
		"base" 			=> "matx-social-video",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/popup.png',
		"description" 	=> esc_html__("Display social video pop up.", "matx"),
		"class" 		=> "matx-social-video",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__("Text before play button", "matx" ),
				"description" 	=> esc_html__("This text placed at the left side of play icon.", "matx"),
				"param_name" 	=> "matx_video_text_before"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Text after play button", "matx" ),
				"description" 	=> esc_html__("This text placed at the right side of play icon.", "matx"),
				"param_name" 	=> "matx_video_text_after"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Video URL", "matx" ),
				"description" 	=> esc_html__("Provide URL of the Youtube or Vimeo video.", "matx"),
				"param_name" 	=> "matx_video_url"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Play Button Icon", "matx" ),
				"description" 	=> esc_html__("Provide Font Awesome or Material Design Icon class. Ex: fa fa-play ( Default : zmdi zmdi-play )", "matx"),
				"param_name" 	=> "matx_video_icon"
			),
		)
	) );
}
matx_video_popup_vc();



/* Newsletter Form */
function matx_newsletter_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Email Subscription", "matx"),
		"base" 			=> "matx-newsletter",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/subscription.png',
		"description" 	=> esc_html__("MailChimp email subscription form.", "matx"),
		"class" 		=> "matx-newsletter-section",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Form Title", "matx" ),
				"param_name" 	=> "nl_from_title"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__("Form Shortcode", "matx"),
				"description" 	=> esc_html__('Provide MailChimp for WP\'s form shortcode ID. If shortcode will be [mc4wp_form id="100"], use just 100 only.', "matx"),
				"param_name" 	=> "nl_shortcode"
			),
		)
	) );
}
matx_newsletter_vc();



/* Brand Logo Slider */
function matx_brand_logo_slider_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Brand Slider", "matx"),
		"base" 			=> "matx-brand-logo",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/brand-slider.png',
		"description" 	=> esc_html__("Display partners logo as a slider.", "matx"),
		"class" 		=> "matx-brand-logo-section",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "attach_images",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Upload Images", "matx" ),
				"description" 	=> esc_html__("Uploaded images will be used in carousel.", "matx"),
				"param_name" 	=> "matx_brand_slider_img"
			),
		)
	) );
}
matx_brand_logo_slider_vc();



/* Twitter Slider */
function matx_twitter_slider_vc(){
	vc_map( array(
		"name"			=> esc_html__("Twitter Slider", "matx"),
		"base" 			=> "matx-twitter-slider",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/twitter-slider.png',
		"description"	=> esc_html__("Display tweets as a slider", "matx"),
		"class" 		=> "matx-tweet-slider",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Tweet Number", "matx"),
				"description" 	=> esc_html__("Number of tweet for slider. Note that, this slider will be work if it is properly configured via customizer setting.", "matx"),
				"param_name" 	=> "num_tweet"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Slide duration", "matx"),
				"description" 	=> esc_html__("Each stay time in milliseconds. Default 500.", "matx"),
				"param_name" 	=> "ts_duration"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__("Paginate duration", "matx"),
				"description" 	=> esc_html__("Transition time between each slider in milliseconds. Default 300.", "matx"),
				"param_name" 	=> "ts_page_duration"
			),
			array(
				"type" 			=> "dropdown",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Transition style", "matx" ),
				"description" 	=> esc_html__("How the transition will be happen.", "matx"),
				"value"       	=> array(
					esc_html__('Slide','matx')	=> 'ts_slider',
					esc_html__('Fade','matx')	=> 'ts_fade',
			    ),
				"param_name" 	=> "tslider_tstyle"
			),
			array(
				"type" 			=> "dropdown",
				"admin_label" 	=> true,
				"heading" 		=> esc_html__( "Color Scheme", "matx" ),
				"description" 	=> esc_html__("Transition style", "matx"),
				"value"       	=> array(
					esc_html__('White', 'matx' )	=> 'ts_ch_white',
					esc_html__('Black', 'matx' )	=> 'ts_ch_black',
			    ),
				"description" 	=> esc_html__("Select color scheme white if you have light background and black for dark background", "matx"),
				"param_name" 	=> "ts_color_scheme"
			),
		)
	));
}
matx_twitter_slider_vc();



/* Google Maps */
function matx_gmaps_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Map", "matx"),
		"base" 			=> "matx-map",
		"icon" 			=> get_template_directory_uri() . '/img/vc_icons/map.png',
		"description" 	=> esc_html__("Google Map", "matx"),
		"class" 		=> "matx-map-section",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Button Open Text", "matx" ),
				"param_name" 	=> "map_button_text"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Button Close Text", "matx" ),
				"param_name" 	=> "map_button_close"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Latitude", "matx" ),
				"param_name" 	=> "map_latitude"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Longitude", "matx" ),
				"param_name" 	=> "map_longitude"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__("Zoom", "matx" ),
				"description" 	=> esc_html__("Default zoom level 16", "matx"),
				"param_name" 	=> "map_zoom_lavel"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__("Pin Title", "matx" ),
				"description" 	=> esc_html__("Map marker pop up title", "matx"),
				"param_name" 	=> "map_marker_title"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__("Pin Content", "matx" ),
				"description" 	=> esc_html__("Map marker pop up content", "matx"),
				"param_name" 	=> "map_marker_text"
			),
		)
	) );
}
matx_gmaps_vc();



/* Portfolio Grids */
function matx_portfolio_grids_vc(){
	vc_map( array(
		"name" 			=> esc_html__("Portfolio", "matx"),
		"base" 			=> "matx-portfolio",
		"icon" 			=> get_template_directory_uri() . '/img/vc_icons/portfolio-grid.png',
		"description" 	=> esc_html__("Display portfolio as a grid", "matx"),
		"class" 		=> "matx-portfolio-section",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "checkbox",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Portfolio categories", "matx" ),
				"description" 	=> esc_html__( "Check which categories portfolio you want to show in front-end. Default : All", "matx"),
				"value" 		=>  matx_portfolio_terms(), // define on functions.php
				"param_name" 	=> "matx_pf_cat",
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 9,
				"heading" 		=> esc_html__("Initial Item", "matx" ),
				"description" 	=> esc_html__("How many portfolio item you want to show initially. Default: 6", "matx"),
				"param_name" 	=> "matx_pf_numpost"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 8,
				"heading" 		=> esc_html__("Load More", "matx" ),
				"description" 	=> esc_html__("How many portfolio item you want to load by clicking load more button. Default: 3", "matx"),
				"param_name" 	=> "matx_pf_ajax_numpost"
			),
			array(
				"type" 			=> "dropdown",
				"admin_label" 	=> true,
				"weight" 		=> 7,
				"heading" 		=> esc_html__("Box Style", "matx" ),
				"description" 	=> esc_html__("Portfolio box style", "matx"),
				"value"       	=> array(
					esc_html__('Style one', 'matx' )   	=> 'pf_box_1',
					esc_html__('Style two', 'matx' ) 	=> 'pf_box_2',
					esc_html__('Style three', 'matx' ) 	=> 'pf_box_3',
			    ),
				"param_name" 	=> "matx_portfolio_box"
			),
			array(
				"type" 			=> "dropdown",
				"admin_label" 	=> true,
				"weight" 		=> 6,
				"heading" 		=> esc_html__("Grid Style", "matx" ),
				"description" 	=> esc_html__("Portfolio grid style", "matx"),
				"value"       	=> array(
					esc_html__('Column Three', 'matx' )   				=> 'col_3',
					esc_html__('Column Three - less spacing', 'matx' ) 	=> 'col_3_lessspec',
					esc_html__('Column Three - no spacing', 'matx' ) 	=> 'col_3_nospec',
					esc_html__('Column Four', 'matx' )   				=> 'col_4',
					esc_html__('Column four - less spacing', 'matx' ) 	=> 'col_4_lessspec',
					esc_html__('Column four - no spacing', 'matx' ) 	=> 'col_4_nospec'
			    ),
				"param_name" 	=> "matx_portfolio_cols",
				"std"         	=> esc_html__('Column Three', 'matx' )
			),
			// array(
			// 	'type' 			=> 'checkbox',
			// 	'heading' 		=> esc_html__('Disable Filtering', 'matx' ),
			// 	'param_name' 	=> 'matx_portfolio_filter',
			// 	"weight" 		=> 4,
		 //        'value' 		=> array( esc_html__( 'Yes', 'matx' ) => 'yes' ),
			// 	'description' 	=> esc_html__('IF checked, portfolio category wise filtering will be disable.', 'matx' ),
			// ),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 5,
				"heading" 		=> esc_html__("'All' Filter Text", "matx" ),
				"description" 	=> esc_html__("You can edit the default 'All' keyword  text.", "matx"),
				"param_name" 	=> "matx_all_edit"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 5,
				"heading" 		=> esc_html__("Load more button text", "matx" ),
				"param_name" 	=> "btn_text"
			),
		)
	) );
}
matx_portfolio_grids_vc();



/* Fun Fact */
function matx_funfact_counter_vc(){
	vc_map( array(
		"name" 			=> esc_html__("FunFact", "matx"),
		"base" 			=> "matx-funfact-count",
		"icon" 			=> get_template_directory_uri() .'/img/vc_icons/fun-facts.png',
		"description" 	=> esc_html__("MailChimp email subscription form.", "matx"),
		"class" 		=> "matx-funfact-count-section",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"params" 		=> array( 
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__("Value", "matx"),
				"description" 	=> esc_html__('Provide value for count.', "matx"),
				"param_name" 	=> "matx_ff_value"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__( "Funfact Title", "matx" ),
				"param_name" 	=> "matx_ff_title"
			),
			array(
				"type" 			=> "textfield",
				"admin_label" 	=> true,
				"weight" 		=> 10,
				"heading" 		=> esc_html__("Count Speed", "matx"),
				"description" 	=> esc_html__('Provide value for count.', "matx"),
				"param_name" 	=> "matx_ff_speed"
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__('Color scheme', 'matx'),
				"param_name" 	=> "matx_ff_color",
				"description" 	=> esc_html__("Select color scheme white if you have dark background and black for light background", "matx"),
				"weight" 		=> 9,
				"value" 		=> array(
					esc_html__("White", 'matx') => 'ff_color_white',        
					esc_html__("Black", 'matx') => 'ff_color_black',
				)    
			)
		)
	) );
}
matx_funfact_counter_vc();



/* Space */
function matx_element_space_vc(){
    vc_map( array(
        "name"          => esc_html__("Responsive Space", "matx"),
        "base"          => "matx_space",
        "icon"          => get_template_directory_uri(). "/img/vc_icons/spacing.png",
		"category" 		=> esc_html__("Matx Component", "matx"),
		"description"   => esc_html__("Matx responsive spacing elements. Set different spacing according media query", "matx"),
        "params"        => array( 
            array(
                "type"          => "textfield",
                "admin_label"   => true,
                "heading"       => esc_html__("Spacing on Large Desktop", "matx"),
				"description"   => esc_html__( "Visible on 1200px and high. Provide positive number with px. ( e.g. 120px ) . Default empty", "matx" ),
                "param_name"    => "desktop",
            ),
            array(
                "type"          => "textfield",
                "admin_label"   => true,
                "heading"       => esc_html__("Spacing on Small Desktop", "matx"),
				"description"   => esc_html__( "Visible on 1024px and less. Provide positive number with px. ( e.g. 80px ) . Default empty", "matx" ),
                "param_name"    => "notebook",
            ),
            array(
                "type"          => "textfield",
                "admin_label"   => true,
                "heading"       => esc_html__("Spacing on Tablet", "matx"),
				"description"   => esc_html__( "Visible on 991px and less. Provide positive number with px. ( e.g. 60px ) . Default empty", "matx" ),
                "param_name"    => "tablet",
            ),
            array(
                "type"          => "textfield",
                "admin_label"   => true,
                "heading"       => esc_html__("Spacing on Phone", "matx"),
				"description"   => esc_html__( "Visible on 600px and less. Provide positive number with px. ( e.g. 30px ) . Default empty", 'matx' ),
                "param_name"    => "phone",
            ),
        )
    ));
}
matx_element_space_vc();



/* Image Carousel */
function matx_image_carousel_vc(){
    vc_map( array(
        "name"          => esc_html__("Image Carousel", "matx"),
        "base"          => "matx_image_carousel",
        "icon"          => get_template_directory_uri(). "/img/vc_icons/carousel.png",
		"category" 		=> esc_html__("Matx Component", "matx"),
        "params"        => array(
			array(
				"type" 					=> "attach_images",
				"admin_label" 			=> true,
				"heading" 				=> esc_html__( "Upload Image.", "matx" ),
				"param_name" 			=> "images"
			),
            array(
                "type"                  => "dropdown",
                "heading"               => esc_html__("Pagination Style", "matx"),
                "param_name"            => "pagination",
                "value"                 => array(
                    esc_html__("Pagination Bullet", "matx")      => "",
                    esc_html__("Navigation Arrow", "matx")       => "n",
                    esc_html__("Both Bullet and Arrow", "matx")  => "bn",
                ),
                "description"           => esc_html__("Select Pagination option", "matx")
            ),
            array(
                "type"                  => "dropdown",
                "heading"               => esc_html__("Pagination's Color Scheme", "matx"),
                "param_name"            => "color",
                "value"                 => array(
                    esc_html__("Brand Color", "matx")    => "",
                    esc_html__("White", "matx")          => "white",
                ),
                "description"           => esc_html__("Pagination bullet and arrow's color", "matx"),
            ),
			array(
				"type" 					=> "checkbox",
				"heading" 				=> esc_html__('Stop Slider Autoplay', 'matx'),
				"param_name" 			=> "autoplay",
				"value" 				=> array( esc_html__("Yes", 'matx')	=> 'off' ),
			),
            array(
                "type"                  => "textfield",
                "heading"               => esc_html__("Extra class name", "matx"),
                "param_name"            => "el_class",
                "description"           => esc_html__("Extensible card element container", "matx")
            ),
        )
    ));
}
matx_image_carousel_vc();



/* Common Slider */
function matx_common_slider_vc(){
	vc_map( array(
	    "name" 					=> esc_html__("Your Gallery", "matx"),
	    "base" 					=> "matx_common_slider",
	    "content_element" 		=> true,
	    "show_settings_on_create" => false,
	    "is_container" 			=> true,
	    "params" 				=> array(
	        array(
	            "type" 				=> "dropdown",
	            "heading" 			=> esc_html__("Style", "matx"),
	            "param_name" 		=> "slider_style",
	            "description" 		=> esc_html__("Choose slider style.", "matx"),
				'value' 			=> array(
					esc_html__( 'Style 1', 'matx' ) => 'style_1',
					esc_html__( 'Style 2', 'matx' ) => 'style_2',
					esc_html__( 'Style 3', 'matx' ) => 'style_3',
					esc_html__( 'Style 4', 'matx' ) => 'style_4',
				),
	        ),
	        array(
	            "type" 				=> "checkbox",
	            "heading" 			=> esc_html__("Single Item", "matx"),
	            "param_name" 		=> "single_item",
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
	            "value"				=> array(
	            	esc_html__( 'Yes', 'matx' ) 	=> 'yes',
	            ),
	        ),
	        array(
	            "type" 				=> "textfield",
	            "heading" 			=> esc_html__("Desktop :", "matx"),
	            "param_name" 		=> "desktop",
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
				'dependency' 		=> array(
					'element' 				=> 'single_item',
					'value_not_equal_to' 	=> array( 'yes' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
	        ),
	        array(
	            "type" 				=> "textfield",
	            "heading" 			=> esc_html__("Small Desktop :", "matx"),
	            "param_name" 		=> "small_desktop",
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
				'dependency' 		=> array(
					'element' 				=> 'single_item',
					'value_not_equal_to' 	=> array( 'yes' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
	        ),
	        array(
	            "type" 				=> "textfield",
	            "heading" 			=> esc_html__("Tablet :", "matx"),
	            "param_name" 		=> "tablet",
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
				'dependency' 		=> array(
					'element' 				=> 'single_item',
					'value_not_equal_to' 	=> array( 'yes' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
	        ),
	        array(
	            "type" 				=> "textfield",
	            "heading" 			=> esc_html__("Small Tablet :", "matx"),
	            "param_name" 		=> "small_tablet",
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
				'dependency' 		=> array(
					'element' 				=> 'single_item',
					'value_not_equal_to' 	=> array( 'yes' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
	        ),
	        array(
	            "type" 				=> "textfield",
	            "heading" 			=> esc_html__("Mobile :", "matx"),
	            "param_name" 		=> "mobile",
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
				'dependency' 		=> array(
					'element' 				=> 'single_item',
					'value_not_equal_to' 	=> array( 'yes' ),
				),
	        ),
	        array(
	            "type" 				=> "checkbox",
	            "heading" 			=> esc_html__("Auto play", "matx"),
	            "param_name" 		=> "auto_play",
	            "value"				=> array( esc_html__( 'Off', 'matx' ) => 'off' ),
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
				'edit_field_class' => 'vc_col-sm-6',
	        ),
	        array(
	            "type" 				=> "checkbox",
	            "heading" 			=> esc_html__("Stop On Hover", "matx"),
	            "param_name" 		=> "stop_on_hover",
	            "value"				=> array( esc_html__( 'Yes', 'matx' ) => 'yes' ),
	            "description" 		=> esc_html__("Custom CSS class.", "matx"),
				'edit_field_class' => 'vc_col-sm-6',
	        ),
	        array(
	            "type" 				=> "textfield",
	            "heading" 			=> esc_html__("Extra class name", "matx"),
	            "param_name" 		=> "el_class",
	            "description" 		=> esc_html__("Custom CSS class.", "matx")
	        ),

	    ),
	    "js_view" => 'VcColumnView'
	) );
}
matx_common_slider_vc();



//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Matx_Common_Slider extends WPBakeryShortCodesContainer {}
}