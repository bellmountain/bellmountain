<?php
/**
 * matx functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package matx
 */


if ( ! function_exists( 'matx_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function matx_setup() {

	add_image_size('matx-column-thumb', 35, 35, true);
	add_image_size('matx-specialty-accordion', 450, 330, true);
	add_image_size('matx-service-thumb', 455, 270, true);
	add_image_size('matx-standard-thumb', 750, 420, true);

	add_image_size('matx-team-3col', 360, 330, true );

	add_image_size('matx-team-4col', 260, 270, true );

	add_image_size('matx-portfolio-thumbnail', 630, 420, true );

	add_image_size('matx-portfolio-popup', 840, 560 );

	add_image_size('matx-popup-attachment', 120, 90, true );

	add_image_size('matx-attachment-previewbar', 50, 40, true );

	add_image_size('matx-brief-slider', 650, 350 , true );

	add_image_size('matx-brand-slider', 150, 110 );

	add_image_size('matx-post-banner', 70, 35, true );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on matx, use a find and replace
	 * to change 'matx' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'matx', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 		=> esc_html__( 'Primary Menu', 'matx' ),
		'blog-menu' 	=> esc_html__( 'Blog Menu', 'matx' ),
		'extra-menu-1' 	=> esc_html__( 'Extra Menu 1', 'matx' ),
		'extra-menu-2' 	=> esc_html__( 'Extra Menu 2', 'matx' ),
		'extra-menu-3' 	=> esc_html__( 'Extra Menu 3', 'matx' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array( 
		'gallery',
		'video',
		'audio',
		'quote'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'matx_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'matx_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function matx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'matx_content_width', 2000 );
}
add_action( 'after_setup_theme', 'matx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function matx_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'matx' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__("Should be displayed for blog related page\'s like Main blog, Single post, Category, Archive, Search etc.. But you can use it anywhere", "matx"),
		'before_widget' => '<aside id="%1$s" class="white-box widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'matx' ),
		'id'            => 'sidebar-page',
		'description'   => esc_html__("Should be displayed for any custom made page\'s. But you can use it anywhere", 'matx'),
		'before_widget' => '<aside id="%1$s" class="white-box widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'matx_widgets_init' );

 
global $inc_dir;
global $lib_dir;

$inc_dir 	= get_template_directory() . '/inc/';
$lib_dir 	= get_template_directory() . '/libs/';

 
/**
* Include the TGM_Plugin_Activation class.
*/
require_once ( $lib_dir. 'tgm-plugin-activation/class-tgm-plugin-activation.php' );
require_once ( $inc_dir. 'tgm_plugin.php' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/color-css.php';




/* Load visual composer customization file. */
function matx_include_visual_composer() {
	global $inc_dir;
	require $inc_dir. '/matx-extend-vc.php';
}

if( class_exists('Vc_Manager')) {
	add_action( 'init', 'matx_include_visual_composer', 99 );
}

/* Include CMB 2 metabox */
function matx_include_cmb2_fields() {
	global $inc_dir;
	require $inc_dir.'/matx-meta-fileds.php';
	require $lib_dir.'/cmb2/cmb2-icon-picker/cmb2-icon-picker.php';
}

add_action( 'widgets_init', 'matx_include_cmb2_fields' );

/* prevent http error while image uploading */
add_filter( 'wp_image_editors', 'matx_image_upload_cb' );

function matx_image_upload_cb($array) {
	return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}


function matx_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'matx_excerpt_length', 999 );

function matx_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'matx_excerpt_more', 999 );



/**
 * Google Font Loader
 */
function matx_fonts_url( $font_arrays = array() ) {

	$fonts_url 			= '';
	$all_font_families 	= array();
	$fonts 				= array();

	if ( $font_arrays ) {

		foreach ( $font_arrays as $font ) {

			extract( $font );
			
			$font['x_val'] = _x( 'on', $font_title.': on or off', 'matx' );

			array_push( $fonts, $font );

		}

		foreach ($fonts as $font) {

			 
			if ( 'off' !== $font['x_val'] ) {
				$all_font_families[] = $font['font_families'];
			}
			 
		}

		if ( $all_font_families ) {
			
			$query_args = array(
				'family' => urlencode( implode( '|', $all_font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' )
			);
				 
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		}

	}
 
	return esc_url_raw( $fonts_url );
}



/**
 * Enqueue scripts and styles.
 */

function matx_scripts() {

    $template_directory = get_template_directory_uri();

    $matx_css 		= $template_directory.'/assets/css/';
    $matx_js 		= $template_directory.'/assets/js/';
    $matx_libs 		= $template_directory.'/assets/libs/';
	$fa_font 		= $matx_libs .'font-awesome/css/font-awesome.min.css';
	$mdl_font		= $matx_libs .'material-design-iconic-font/css/material-design-iconic-font.min.css';
	$ionicon_font 	= $matx_libs .'ionicons/css/ionicons.min.css';

	wp_register_style( 'mdi-font', $mdl_font , array(), '2.0' );
	wp_register_style( 'ion-icon', $ionicon_font , array(), '2.0' );
	wp_register_style( 'font-awesome', $fa_font , array(), '2.0' );
	wp_register_style( 'bootstrap-min', $matx_libs .'bootstrap/bootstrap.min.css', array(), '2.0' );
	wp_register_style( 'mdl', $matx_libs .'mdl/material.min.css', array(), '2.0' ); 
	wp_register_style( 'owl-main', $matx_libs .'owl-carousel/owl.carousel.css', array(), '2.0' );
	wp_register_style( 'owl-theme', $matx_libs .'owl-carousel/owl.theme.css', array(), '2.0' );
	wp_register_style( 'owl-transition', $matx_libs .'owl-carousel/owl.transitions.css', array(), '2.0' );
	wp_register_style( 'mfp', $matx_libs .'magnific-popup/magnific-popup.css', array(), '2.0' );
	wp_register_style( 'sweetalert', $matx_libs .'sweetalert/sweet-alert.min.css', array(), '2.0' );
	wp_register_style( 'sweetalert-ie9', $matx_libs .'sweetalert/ie9.css', array(), '2.0' );
	wp_register_style( 'animate', $matx_css .'animate.css', array(), '2.0' );
	wp_register_style( 'matx-common', $matx_css .'common.css', array(), '2.0' );
	wp_register_style( 'main', $matx_css .'main.css', array(), '2.0' );
	wp_register_style( 'blog', $matx_css .'blog.css', array(), '2.0' );
	wp_register_style( 'portfolio', $matx_css .'portfolio.css', array(), '2.0' );
	wp_register_style( 'responsive', $matx_css .'responsive.css', array(), '2.0' );
	wp_register_style( 'matx-404', $matx_css .'404.css', array(), '2.0' );
	
	/* visual composer styles */
	wp_register_style( 'vc', $matx_css .'js_composer.min.css', array(), '2.0' );

	/* visual composer custom styles */
	wp_register_style( 'vc_custom', $matx_css .'vc_custom.css', array(), '2.0' );

	/* Enqueue Matx styles */

	wp_enqueue_style('mdi-font');
	wp_enqueue_style('ion-icon');
	wp_enqueue_style('font-awesome');

	if( ! is_admin() ){
		
		if( is_single() ) {

			wp_enqueue_style('google-fonts', matx_fonts_url(
				array(
					array(
						'font_name'		=> 'roboto',
						'font_title'	=> 'Roboto font',
						'font_families' => 'Roboto:400,400italic,500,700italic,700,500italic,900'
					),

					array(
						'font_name'		=> 'droid_sans',
						'font_title'	=> 'Droid Sans font',
						'font_families' => 'Droid Sans Mono'
					)
				)
			));

		} else {

			wp_enqueue_style('google-fonts', matx_fonts_url(
				array(
					array(
						'font_name'		=> 'roboto',
						'font_title'	=> 'Roboto font',
						'font_families' => 'Roboto:400,400italic,500,700italic,700,500italic,900'
					)
				)
			));

		}


		wp_enqueue_style('bootstrap-min');
		wp_enqueue_style('mdl');
		wp_enqueue_style('owl-main');
		wp_enqueue_style('owl-theme');
		wp_enqueue_style('owl-transition');
		wp_enqueue_style('mfp');
		wp_enqueue_style('sweetalert');
		wp_enqueue_style('sweetalert-ie9');
		wp_enqueue_style('animate');
		wp_enqueue_style('matx-common');
		wp_enqueue_style('vc');
		wp_enqueue_style('vc_custom');

		// disable main.css for all blog related pages
		if( ! ( is_search() || is_single() || is_category() || is_archive() || is_author() || is_tag() || is_page_template('template-blog.php') ) ) {
			wp_enqueue_style('main');
		}

		// disable blog.css for just front_page
		if( ! is_front_page() || is_home() ){
			wp_enqueue_style('blog');
		} 

		if( is_singular('matx-portfolio' ) ) {
			wp_enqueue_style('portfolio');
		}

		wp_enqueue_style('responsive');

		wp_enqueue_style( 'matx-style', get_stylesheet_uri() ); // main style.css


		// wp_enqueue_style('matx-color');

	} // not is_admin

	/* Register Matx scripts*/

	wp_register_script('html5shiv', $matx_js. 'vendor/html5shiv.js', array(), '2.0', false);
	wp_register_script('jquery', $matx_js. 'vendor/jquery-1.10.2.min.js', array(), '2.0', true);
	wp_register_script('twitter-widget', '//platform.twitter.com/widgets.js', array(), '2.0', true);
	wp_register_script('mdl', $matx_libs. 'mdl/material.min.js', array('jquery'), '2.0', true);
	wp_register_script('all-plugins', $matx_js. 'all-plugins.js', array('jquery'), '2.0', true);
	wp_register_script('common-plugins', $matx_js. 'common-plugins.js', array('jquery'), '2.0', true);
	wp_register_script('owl', $matx_libs. 'owl-carousel/owl.carousel.min.js', array('jquery'), '2.0', true);
	wp_register_script('sweet-alert', $matx_libs. 'sweetalert/sweet-alert.min.js', array(), '2.0', true);
	wp_register_script('mfp', $matx_libs. 'magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '2.0', true);
	wp_register_script('js-common', $matx_js. 'common.js', array('jquery'), '2.0', true);
	wp_register_script('all-components', $matx_js. 'all-components.js', array('jquery'), '2.0', true);
	wp_register_script('js-blog', $matx_js. 'blog.js', array('jquery'), '2.0' , true);
	wp_register_script('matx-section-scroll', $matx_js. 'custom/section-scroll.js', array('jquery'), '2.0', true);
	wp_register_script('header-style', $matx_js. 'custom/header-style.js', array('jquery'), '2.0', true);
	wp_register_script('js-main', $matx_js. 'main.js', array('jquery'), '2.0' , true);
	wp_register_script('ajax-like', $matx_js. 'custom/ajax-like.js', array('jquery'), '2.0', true);
	wp_register_script('matx-colors', $matx_js. 'color.js', array('jquery'), '2.0', true);

	if( !is_admin() ){

		/* Enqueue Matx scripts */

		wp_enqueue_script('html5shiv'); // enqueue in header 
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' ); // enqueue if IE version is less then 9

		wp_enqueue_script('jquery');
		wp_enqueue_script('twitter-widget');
		wp_enqueue_script('mdl');
		wp_enqueue_script('all-plugins');
		wp_enqueue_script('common-plugins');
		wp_enqueue_script('owl');
		wp_enqueue_script('sweet-alert');
		wp_enqueue_script('mfp');
		wp_enqueue_script('js-common');
		wp_enqueue_script('all-components');
		wp_enqueue_script('ajax-like');
		

		/* enqueue comment scripts*/

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if( !is_front_page() ){

			wp_enqueue_script('js-blog');
		}

		if( is_front_page() ) {
			wp_enqueue_script('matx-section-scroll');
			wp_localize_script( 'matx-section-scroll', 'menuAttr', array( 'menuprefix'	=> site_url('/') ) );
		}

		wp_enqueue_script('header-style' );

		wp_enqueue_script('js-main' );

		if( is_404()) { 

			wp_enqueue_style('matx-404');  

			// dequeue style for 404 pge 
			
			wp_dequeue_style('owl-main');
			wp_dequeue_style('owl-theme');
			wp_dequeue_style('owl-transition');
			wp_dequeue_style('mfp');
			wp_dequeue_style('sweetalert');
			wp_dequeue_style('sweetalert-ie9');
			wp_dequeue_style('main');

			// dequeue script for 404 pge 

			wp_dequeue_script('owl');
			wp_dequeue_script('sweet-alert'); 
			wp_dequeue_script('twitter-widget');  
		}

	} // not is_admin

}

add_action( 'wp_enqueue_scripts', 'matx_scripts' );
add_action( 'wp', 'matx_scripts' );



/**
 * admin scripts
 */

add_action( 'admin_enqueue_scripts', 'matx_enqueue_admin_scripts' );

function matx_enqueue_admin_scripts($hook){

	global $post;

	if(  $hook == 'post-new.php' || $hook == 'post.php' ){
		if( $post->post_type === 'post'){
			wp_enqueue_script('matxpf-script', get_template_directory_uri().'/assets/admin/js/matx-post-format.js', array('jquery'), '1', true );
			wp_enqueue_style('matxpf-style', get_template_directory_uri().'/assets/admin/css/matx-post-format.css', array() );
		}
	}

	wp_register_style( 'matx-admin', get_template_directory_uri().'/assets/admin/css/matx-admin.css', array('cmb2-styles'), '1' ); 
	wp_register_script( 'matx-admin-js', get_template_directory_uri().'/assets/admin/js/matx-admin.js', array('jquery'), true ); 

	/*admin style and scripts */

	wp_enqueue_style( 'matx-admin');
	wp_enqueue_script( 'matx-admin-js');
}



/**
 * localize header style setting into header-style.js
 */
add_action('wp', 'matx_header_style' );

function matx_header_style(){
	global $post;

	$prefix = '_matx_page_header';

	$global_header_style = get_theme_mod( 'cz_header_style', 'animated_header' );

	if ( $post ) {
		$header_style = get_post_meta( $post->ID, $prefix.'style', true );
	} else {
		$header_style = $global_header_style;
	}

	if ( !$header_style ) {
		$header_style = $global_header_style;
	}
 
	if ( $header_style == 'global_header' ) {
		$header_style = $global_header_style;
	}

	$st_arr = array(
		'style' => $header_style
	);

	return $header_style;
}




function matx_header_color(){

	global $post;

	$prefix = '_matx_page_header';

	$global_header_color = get_theme_mod( 'cz_header_color', 'header_scheme_dark' );

	$header_color = ( $post ) ? get_post_meta( $post->ID, $prefix.'color_scheme', true ) : $global_header_color;

	if ( !$header_color ) {
		$header_color = $global_header_color;
	}
 
	if ( $header_color == 'global_scheme' ) {
		$header_color = $global_header_color;
	}

	return $header_color;
}



add_filter('body_class', 'matx_add_header_color_scheme_bodyclass');

function matx_add_header_color_scheme_bodyclass($classes){

	$color_scheme = matx_header_color();

	$classes[] = ( $color_scheme == 'header_scheme_dark' ) ? 'header-scheme-dark' : 'header-scheme-light';

	return $classes;
}


 

/**
 * Filter navigation menu for scrolling purpose
 */

add_filter( 'nav_menu_link_attributes', 'matx_filter_nav_menu', 10, 3 );

function matx_filter_nav_menu( $atts, $item, $args ) {

	$href = $atts['href'];
	
	$site_url = site_url('/');

	$url = parse_url( $href );

	$par_site_url = parse_url( $site_url );

	if ( is_array($url) && array_key_exists( 'fragment', $url ) ) {

		$str = $url["fragment"];

		if ( strpos($href, $site_url ) !== false ) {
			 
		  	$atts['class'] = 'menu-smooth-scroll'; 
		  	$atts['data-target'] = '#'.$str;
		}
	}

 	return $atts;
}

/* for generating a random ID */

function matx_random_id($l) {
	return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstubwxyz',$l)),0,$l);
}

/* get terms  */
function get_matx_terms($taxonomy) {

	global $post; // global post object for retrieve the post ID

	$terms = get_the_terms( $post->ID, $taxonomy );

	if ( $terms && ! is_wp_error( $terms ) ) {

		$terms_stack = array();

		foreach ( $terms as $term ) {
			$terms_stack[] = $term->slug;
		}

		return $term_class = join( " ", $terms_stack );
	}

	return false;
}


/* add sticky class in post class */
function matx_filter_post_class( $classes ) {

	if( !is_front_page() ) {
	    if( is_sticky( get_the_id() )) { 
	     	$classes[] = 'sticky';
	    }
	}

    return $classes;
}
add_filter( 'post_class', 'matx_filter_post_class' );


// Get Portfolio category ID
function get_taxonomy_cat_ID( $cat_name) {
	$cat = get_term_by( 'name', $cat_name, 'portfolio-category' );
	if ( $cat ) {
		return $cat->term_id;
	} else {
		return 0;
	}
}



/**
 * ajax handling for portfolio details popup
 */
add_action( 'wp_ajax_matx_portfolio_details', 'matx_ajax_portfolio_details_init' );
add_action( 'wp_ajax_nopriv_matx_portfolio_details', 'matx_ajax_portfolio_details_init' );
function matx_ajax_portfolio_details_init() {
	get_template_part( 'template-parts/content-popup-details');
	die();
}


/**
 * ajax handling for portfolio attachment popup
 */
add_action( 'wp_ajax_matx_portfolio_attachment', 'matx_ajax_portfolio_attachment_init' );
add_action( 'wp_ajax_nopriv_matx_portfolio_attachment', 'matx_ajax_portfolio_attachment_init' );

function matx_ajax_portfolio_attachment_init() {
	get_template_part( 'template-parts/content-popup-attachment');
	die();
}


/**
 * ajax handling for portfolio attachment popup
 */
add_action( 'wp_ajax_matx_portfolio_more', 'matx_load_more_portfolio_item' );
add_action( 'wp_ajax_nopriv_matx_portfolio_more', 'matx_load_more_portfolio_item' );

function matx_load_more_portfolio_item() {

	$offset = isset($_POST['offset']) ? $_POST['offset'] : '';
	$limit = isset($_POST['limit']) ? $_POST['limit'] : '';
	$matx_portfolio_cols = isset($_POST['pStyle']) ? $_POST['pStyle'] : 'col_3';
	$filter_by = isset($_POST['term']) ? $_POST['term'] : '';
	$ptaxonomy = 'portfolio-category';

	global $loaded_portfolio_box_classes;
	global $post;

	$loaded_portfolio_box_classes = array('col-xs-6', 'col-sm-4');

	switch ($matx_portfolio_cols) {

		case 'col_4':
			$loaded_portfolio_box_classes[] = 'col_4 col-md-3';
		break;

		case 'col_4_lessspec':
			$loaded_portfolio_box_classes[] = 'col_4_lessspec col-md-3';
		break;

		case 'col_4_nospec':
			$loaded_portfolio_box_classes[] = 'col_4_nospec col-md-3';
		break;

		case 'col_3_lessspec':
			$loaded_portfolio_box_classes[] = 'col_3_lessspec';
		break;

		case 'col_3_nospec':
			$loaded_portfolio_box_classes[] = 'col_3_nospec';
		break;
		
		default:
			$loaded_portfolio_box_classes[] = 'col_3';
		break;
	}

	$loaded_portfolio_box_classes[] = 'single-portfolio';

	$args = array(
		'post_type'        	=> 'matx-portfolio',
		'posts_per_page'   	=> $limit,
		'orderby'          	=> 'date',
		'order'            	=> 'DESC',
		'post_status'      	=> 'publish',
		'offset'			=> $offset,
		'tax_query' 		=> array(
			'relation' => 'AND',
			array(
				'taxonomy' 			=> $ptaxonomy,
				'field' 			=> 'slug',
				'terms' 			=> $filter_by,
				'include_children' 	=> true,
				'operator' 			=> 'IN'
			)
		),
	);

	$portfolios = get_posts( $args );

	echo "<div class='ajax-portfolio-parent'>";
	
	foreach ($portfolios as $post) {
		setup_postdata( $post );
		get_template_part( 'template-parts/content-portfolio' );
	}

	echo "</div>";

	wp_reset_postdata();

	die();
}


/**
 * return portfolio-category all assign terms
 */
function matx_portfolio_terms(){

	$portfolio_terms = get_terms('portfolio-category');

	$pterms_arr = array();

	if( $portfolio_terms && ! is_wp_error($portfolio_terms )){

		foreach($portfolio_terms as $pterm) {
			$pterms_arr[$pterm->name] = $pterm->term_id;
		}
	}

	return $pterms_arr;
}


/* conditionally display blog post media according to the post format.*/
 
function matx_blog_posts_media( $post_format, $postid ) {

	$prefix = '_matx_post_format_';

	$html = '';

    $randomID = '';

    if(function_exists('matx_random_id')) {
        $randomID = matx_random_id(4);   
    }

	if( $post_format == 'gallery' ) { 

    	$files = get_post_meta( $postid , $prefix.'slider_imgs', 1 );

	    $post_slide_img= array();

	    if( has_post_thumbnail( $postid) ){
	    	$post_slide_img[]= get_the_post_thumbnail( $postid,'matx-standard-thumb', array('class' => 'activator') );
	    }

	    foreach ( (array) $files as $attachment_id => $attachment_url ) {
	    	$post_slide_img[] = wp_get_attachment_image( $attachment_id, 'matx-standard-thumb', false, array( 'class' => 'activator' ));
	    } 

		$thwrap_class = ( count(array_filter( $post_slide_img )) > 1 ) ? 'thumb-slides-container' : 'gallery-slider-disable';

	    $html .=  '<div class="'.$thwrap_class.'">';

	    	foreach ($post_slide_img as $img) {
	    		$html .= $img;
	    	}

	    $html .= '</div>';

		    $html .= '<div class="post-meta-info">';

		    if( ! is_single()) {
		    	$html .= '<span class="post-meta-date">'.get_the_date('F j, Y').'</span>';
		    }
			    
		    $html .= '</div>';

	} else if( $post_format == 'audio') {

		$uploaded_audio = esc_url( get_post_meta( $postid, $prefix.'audio_url', 1 ) );
		$embedded_audio = esc_url( get_post_meta( $postid, $prefix.'audio_oembed', 1 ) );
		$audio_type = get_post_meta( $postid, $prefix.'audio_type', 1 );

		if( $audio_type == 'uploaded_audio') {

        	$html .= '<div class="blog-post-thumb matx-audiopost uploaded-audio">';
		} else {

        	$html .= '<div class="blog-post-thumb matx-audiopost">';
		}
		
    	if( $audio_type ){

    		if( $audio_type == 'uploaded_audio' && $uploaded_audio ) {

        		$html .= '<div class="player" id="audio-post-'.get_the_id().'-'.$randomID.'" data-file-sec="'.$uploaded_audio.'" data-height="30"></div>';

    		} else {

    			if( $embedded_audio ){

					$initial_audio = wp_oembed_get( $embedded_audio ,  array( 'height' => 200 ) ); 

					$mod_audio = str_replace('scrolling="no"', '', $initial_audio);
					$mod_audio = str_replace('frameborder="no"', '', $mod_audio); 
    				$mod_audio = str_replace('webkitallowfullscreen', '', $mod_audio);
    				$mod_audio = str_replace('mozallowfullscreen', '', $mod_audio);

					$html .= $mod_audio;
    			}
    		}
    	}

        $html .= '</div>';

	} else if( $post_format == 'video') {

		$uploaded_video = esc_url( get_post_meta( $postid, $prefix.'video_url', 1 )); 
		$embedded_video = esc_url( get_post_meta( $postid, $prefix.'video_oembed', 1 )); 
		$video_type 	= get_post_meta( $postid, $prefix.'video_type', 1 );

		$uplodead_video_status = ( ($uploaded_video == '') && ( $embedded_video == '' )) ? 'hide' : ''; 
		
		$html .= '<div class="blog-post-thumb embed-responsive embed-responsive-16by9 '.$uplodead_video_status.'">';
			$html .= '<div class="embed-responsive-item">';

	    	if( $video_type ){

	    		if( $video_type == 'uploaded_video' && $uploaded_video ) {

	    			if( has_post_thumbnail( $postid )) {

	    				$video_thumb = get_the_post_thumbnail_url( $postid, 'matx-standard-thumb' );
						$html .= '<div class="player" id="video-'.$randomID.'" data-file-sec="'.$uploaded_video.'" data-image-src="'.$video_thumb.'"></div>';
	    			} else {
	    				
						$html .= '<div class="player" id="video-'.$randomID.'" data-file-sec="'.$uploaded_video.'"></div>';
	    			}

	    		} else {

	    			if( $embedded_video ){

	    				$initial_video = wp_oembed_get( $embedded_video );

	    				$mod_video = str_replace('frameborder="0"', '', $initial_video);
	    				$mod_video = str_replace('webkitallowfullscreen', '', $mod_video);
	    				$mod_video = str_replace('mozallowfullscreen', '', $mod_video);

						$html .= $mod_video;
	    			}
	    		}
	    	}

			$html .= '</div>';
		$html .= '</div>';

 
	} else if( $post_format == 'quote'){

        $quote_text = get_post_meta( get_the_id(), $prefix.'quote_text', true );
        $quote_author = get_post_meta( get_the_id(), $prefix.'quote_author', true );

        ?>

        <div class="format-quote">
            <div class="post-content-wrap">
                <div class="mdl-card__supporting-text">
                	<?php if( $quote_text ) : ?>
                    	<p><?php echo wp_kses_post( $quote_text ); ?></p>
                	<?php else: ?>
                    	<?php the_content(); ?>
                    <?php endif; ?>

                    <?php echo is_sticky() ? '<i class="fa fa-thumb-tack sticky-icon" title="Sticky post"></i>' : ''; ?>
                    <i class="zmdi zmdi-quote"></i>
                    <div class="post-meta-info">
	                    <?php if( $quote_author ) : ?>
	                        <span class="post-meta-date"><?php echo esc_html( $quote_author ); ?></span>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } else {

		if(has_post_thumbnail( $postid )) {
        	$thumb_id = get_post_thumbnail_id( get_the_id() );
        	$html .= '<a href="'.get_the_permalink($postid).'">'.wp_get_attachment_image( $thumb_id, 'matx-standard-thumb');
	        $html .= '<div class="post-meta-info">';
	            $html .= '<span class="post-meta-date">'.get_the_date('F j, Y').'</span>';
	        $html .= '</div></a>';
		}
	}

	return $html;
}



/**
 * Blog post ajax load
 */

add_action( 'wp_enqueue_scripts', 'matx_send_data_to_blog_js' );

function matx_send_data_to_blog_js(){

	$count_posts = wp_count_posts('post');
	$published_posts = $count_posts->publish;

	$bpdata = array(
		'admin_url' => admin_url( 'admin-ajax.php' ),
		'all_post'	=> $published_posts
	);
	wp_localize_script('js-blog', 'BlogPostData', $bpdata );
}


add_action('wp_ajax_matx_ajax_post','matx_blog_post_ajax_load' );
add_action('wp_ajax_nopriv_matx_ajax_post','matx_blog_post_ajax_load' );

function matx_blog_post_ajax_load(){

	$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
	$blog_style = (isset($_GET['blogstyle'])) ? $_GET['blogstyle'] : 'standard';
	$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
	$query = (isset($_GET['query'])) ? $_GET['query'] : false;

    $query_obj = array(
        'posts_per_page'	=> $numPosts,
        'offset'			=> $offset
    );

    $remove = array('posts_per_page');

    if ( $query ) {
    	foreach ($query as $key => $value) {
    		if ( !in_array( $key, $remove ) ) {
    			$query_obj[$key] = $value;
    		}
    	}
    }

	switch ( $blog_style ) {

		case 'full_width':
			$path = 'template-parts/content-post-fullwidth';
			break;

		case 'masonry_sidebar':
			$path = 'template-parts/content-post-masonry';
			break;

		default:
			$path = 'template-parts/content-post-standard';
	}

	global $post;

	$blog_posts = get_posts( $query_obj );

	foreach ( $blog_posts as $post ) {
		setup_postdata( $post );

    	echo "<div class='ajax-post-parent'>";
    		get_template_part( $path );
    	echo "</div>";
	}

    wp_reset_postdata();

    die();
}


/* customizing comment form fields */
add_filter( 'comment_form_fields', 'matx_reordaring_comment_form_fields' );
function matx_reordaring_comment_form_fields( $fields ) {

	$comment_field = $fields['comment'];
	
	unset( $fields['comment'] );

	$fields['comment'] = $comment_field;

	return $fields;
}



/* * matx comment list */
function matx_comment_walker($comment, $args, $depth){

	$userId = $comment->user_id;
	$author_website = $comment->comment_author_url;
	$comment_author = $comment->comment_author;
	$comment_content = get_comment_text( );
	$comment_date = $comment->comment_date; ?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="clearfix single-comment mdl-shadow--2dp jumbo-shadow">
		    <div class="clearfix comment-thumb">

		        <a href="<?php echo $author_website ? esc_url($author_website) : 'javascript:;'; ?>" target="_blank" class="pull-left ctwr">
		        	<?php echo get_avatar( $comment ); ?>
		        </a>
		        <?php 
					comment_reply_link(
						array_merge($args, 
							array(
								'add_below' 	=> "comment",
								'depth' 		=> $depth,
								'max_depth' 	=> $args['max_depth']
							)
						)
					);
		         ?>
		        <div class="comment-meta">
		            <a href="<?php echo $author_website ? esc_url($author_website) : 'javascript:;'; ?>" target="_blank"><?php echo esc_html($comment_author).' '.esc_html__('says:', 'matx');  ?> </a>
		            <div class="date"><?php echo get_comment_date().' at '.get_comment_time(); ?></div>
		        </div>
		    </div>
		    <div class="comment-content">
		        <div class="comment-text">
					<?php 
						if( $comment_content ){
							echo wpautop( $comment_content );
						}
					 ?>
		        </div>
		    </div>
		</div>

	<?php
}

add_filter('comment_reply_link', 'matx_replace_reply_link_class');

function matx_replace_reply_link_class($class){

    $class = str_replace("class='comment-reply-link", "class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-default btn-black pull-right comment-reply", $class);
    return $class;
}
 

/*  display category on single page */
function matx_display_category_terms(){   
	$all_cat = wp_get_post_categories(get_the_id() );

	if ( empty( $all_cat ) ) {
		return;
	}

	$cat = array();

	foreach ($all_cat as $cats) {
		$cat[] = get_term_by('id', $cats, 'category' );
	}

	echo '<span class="post-cats-link">';

	echo esc_html__("In ", "matx");

	foreach ($cat as $c) {
		echo '<a href="'.esc_url( get_term_link( $c->term_id, "category" ) ).'">'.esc_html( $c->name ).'</a>';
	}
	echo '</span>';
}

/* modify wordpress default search form */
add_action('get_search_form', 'matx_modify_search_form_for_widget' );
function matx_modify_search_form_for_widget($form){
	$form = '<form role="search" method="get" id="searchform" class="search-form" action="'.esc_url(home_url('/')).'" ><input type="hidden" name="post_type" value="post" /><div class="mdl-textfield mdl-js-textfield"><input type="text" name="s" id="searchform-field" class="mdl-textfield__input" value="'.esc_attr( get_search_query( ) ).'"><label class="mdl-textfield__label" for="searchform-field">'.esc_html__('Search', 'matx').'</label><button class="mdl-js-button mdl-button--fab mdl-js-ripple-effect search-submit"><i class="zmdi zmdi-search"></i></button></div></form>';

	return $form;
}

/* display matx social links */
function matx_display_social_links(){

	$html = '';

	$url_prefix = 'matx_';

	$display_prefix = 'show_';

	$socials = array('facebook','twitter','gplus','instagram','youtube','linkedin','dribble','behance','pinterest','flickr','reddit');

	$social_links = array();

	foreach ($socials as $value) {

		if( get_theme_mod($url_prefix.$value, '') && get_theme_mod($display_prefix.$value, '') ) {
			$social_links[$value] = get_theme_mod( $url_prefix.$value, '' );
		}
	}

	if( !empty($social_links) ) :

		$html .= '<ul class="clearfix social footer-social hover-round">';

			/*facebook*/
			if( array_key_exists('facebook',$social_links) && $social_links['facebook'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['facebook'] ).'" target="_blank" ><i class="zmdi zmdi-facebook"></i></a></li>';

			endif;

			/*twitter*/
			if( array_key_exists('twitter',$social_links) && $social_links['twitter'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['twitter'] ).'" target="_blank" ><i class="zmdi zmdi-twitter"></i></a></li>'; 

			endif;

			/*gplus*/
			if( array_key_exists('gplus',$social_links) && $social_links['gplus'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['gplus'] ).'" target="_blank" ><i class="zmdi zmdi-google-plus"></i></a></li>'; 

			endif;

			/*instagram*/
			if( array_key_exists('instagram',$social_links) && $social_links['instagram'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['instagram'] ).'" target="_blank" ><i class="zmdi zmdi-instagram"></i></a></li>'; 

			endif;

			/*youtube*/
			if( array_key_exists('youtube',$social_links) && $social_links['youtube'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['youtube'] ).'" target="_blank" ><i class="zmdi zmdi-youtube"></i></a></li>'; 

			endif;

			/*linkedin*/
			if( array_key_exists('linkedin',$social_links) && $social_links['linkedin'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['linkedin'] ).'" target="_blank" ><i class="zmdi zmdi-linkedin"></i></a></li>'; 

			endif;

			/*dribble*/
			if( array_key_exists('dribble',$social_links) && $social_links['dribble'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['dribble'] ).'" target="_blank" ><i class="zmdi zmdi-dribbble"></i></a></li>'; 

			endif;

			/*behance*/
			if( array_key_exists('behance',$social_links) && $social_links['behance'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['behance'] ).'" target="_blank" ><i class="zmdi zmdi-behance"></i></a></li>'; 
	        
			endif;

			/*pinterest*/
			if( array_key_exists('pinterest',$social_links) && $social_links['pinterest'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['pinterest'] ).'" target="_blank" ><i class="zmdi zmdi-pinterest"></i></a></li>';
	         
			endif;

			/*flickr*/
			if( array_key_exists('flickr',$social_links) && $social_links['flickr'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['flickr'] ).'" target="_blank" ><i class="zmdi zmdi-flickr"></i></a></li>';
	         
			endif;

			/*reddit*/
			if( array_key_exists('reddit',$social_links) && $social_links['reddit'] ) :

	        	$html .= '<li><a href="'.esc_url( $social_links['reddit'] ).'" target="_blank" ><i class="zmdi zmdi-reddit"></i></a></li>'; 

			endif;

	    $html .= '</ul>';

    endif;

    return $html;
}




/* portfolio social share */
function matx_share_portfolio_item($id){

	$html = ''; ob_start(); ?>

    <ul class="clearfix social share-social portfolio-share matx-post-share-js">
		<li class="fb-share" data-title="<?php echo get_the_title($id); ?>" title="Share on Facebook">
			<a href="<?php the_permalink($id); ?>"><i class="zmdi zmdi-facebook"></i></a>
		</li>
		<li class="tw-share" data-title="<?php echo get_the_title($id); ?>" title="Share on Twitter">
			<a href="<?php the_permalink($id); ?>"><i class="zmdi zmdi-twitter"></i></a>
		</li>
		<li class="gplus-share" data-title="<?php echo get_the_title($id); ?>" title="Share on Google Plus">
			<a href="<?php the_permalink($id); ?>"><i class="zmdi zmdi-google-plus"></i></a>
		</li>
		<li class="in-share" data-title="<?php echo get_the_title($id); ?>" title="Share on Linked In">
			<a href="<?php the_permalink($id); ?>"><i class="zmdi zmdi-linkedin-box"></i></a>
		</li>
	</ul>

    <?php

    $result = ob_get_contents(); $html .= $result; ob_get_clean();

    return $html;
}

add_image_size('holal-s', 600, 336, true );

/* portfolio single page image */
function matx_portfolio_single_page_media( $extra_iamges, $page_style ) {

	$html = '';

    $html .= '<div class="single-pf-images">';

    $img_wrapper_class = ( ! empty( $page_style ) && $page_style !== 'style_one' ) ? '' : 'thumb-slides-container bullet-overlaped-center'; 

        if( !empty($extra_iamges) ) {
	    	$html .= '<div class="pf-attachment-img-group '.$img_wrapper_class.'">';

	            foreach ( (array) $extra_iamges as $attachment_id => $attachment_url ){

	                $alt_text = (get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) ? get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : get_bloginfo('name');


	                $portfolio_thumb = wp_get_attachment_image_src($attachment_id,'matx-standard-thumb' );

	                if($page_style == 'style_three') {
	                	$portfolio_thumb = wp_get_attachment_image_src($attachment_id,'full' );
	                }

	                $html .= '<img src="'.esc_url( $portfolio_thumb[0] ).'" alt="'.esc_attr( $alt_text ).'">';
	      
	            } 
        	$html .= '</div>';
        }
     
    $html .= '</div>';

    return $html;
}

function matx_portfolio_pagination( $post_id ){

	$args = array(
		'posts_per_page'   => -1,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'post_type'        => 'matx-portfolio',
	);

	$portfolios = get_posts( $args );

	$portfolio_IDs = array();

	foreach ($portfolios as $portfolio ) {
		$portfolio_IDs[] = $portfolio->ID; // populate array with all portfolio ID's
	}

	$post_count = count($portfolio_IDs); // get total portfolio number

	$cur_post_id_pos = array_search( $post_id, $portfolio_IDs); // get current post id position of the array

	$prev_post_id_pos = $cur_post_id_pos - 1; // go previous portfolio by decrementing ID
	$next_post_id_pos = $cur_post_id_pos + 1; // go previous portfolio by incrementing ID
		
	$curr_post_id 	= $portfolio_IDs[$cur_post_id_pos]; // get current portfolio item ID

	$prev_post_id =  ( $cur_post_id_pos == 0) ? null : $portfolio_IDs[$prev_post_id_pos]; // check whether there has more previous item  

	$next_post_id = (  ( $post_count -1 ) == $cur_post_id_pos) ? null : $portfolio_IDs[$next_post_id_pos]; // check whether there has more next item  
	return array(
		'previous_ID' 	=> $prev_post_id,
		'current_ID' 	=> $curr_post_id,
		'next_ID' 		=> $next_post_id
	);
}


function matx_render_portfolio_banner_pagination( $post_id, $context = null ){

	$IDs = matx_portfolio_pagination($post_id);

 	extract($IDs);

	$html = '';

	$common_class 	= 'mdl-button mdl-js-button mdl-js-ripple-effect round-nav-btn';

	$left_arrow = $right_arrow = '';

	if( $context == 'banner' ){
		$left_arrow 	= 'class="'.$common_class.' left-arrow"';
		$right_arrow 	= 'class="'.$common_class.' right-arrow"';
	}

	if( $context == 'banner'){

		$html .= '<div class="banner-pagination portfolio-pagination">';
		
	} elseif( $context == 'footer'){

		$html .= '<div class="text-center fullwidth-pagination portfolio-pagination">';

	} else {
		
		$html .= '<div class="pagination">';
	}

	if( $previous_ID !== null ){

		$html .= '<a href="'.esc_url( get_permalink( $previous_ID ) ).'" '.$left_arrow.'>';
		
	} else {
		
		$html .= '<a href="#" '.$left_arrow.' title="'.esc_html__('No more portfolio', 'matx').'" disabled>';
	}

	$html .= '<i class="zmdi zmdi-chevron-left"></i>';
	$html .= '</a>';

	if( $context == 'footer') {
		$html .= '<a href="'.site_url('/').'"><i class="zmdi zmdi-view-comfy"></i></a>';
	}

	if( $next_ID !== null ){
		$html .= '<a href="'.esc_url( get_permalink( $next_ID ) ).'" '.$right_arrow.'>';
	} else {
		$html .= '<a href="#" '.$right_arrow.' title="No more portfolio" disabled>';
	}

	$html .= '<i class="zmdi zmdi-chevron-right"></i>';
	$html .= '</a>';
	$html .= '</div>';  

	return $html;
}


function matx_get_navmenu_locations(){

	$menus = get_registered_nav_menus();

	$nav_data = array();

	foreach ( $menus as $location => $description ) {
		$nav_data[$location] = $description;
	}

	return $nav_data;
}

function matx_get_portfolio_attachment($id){
	
	$prefix = '_matx_portfolio_';
	$src 	= get_post_meta( $id, $prefix.'attached_images', true );

	return $src;
}

function matx_get_favicon(){

	$matx_wp_version = substr( get_bloginfo('version'), 0, 3);

	if($matx_wp_version < 4.3) {

		$fav = get_theme_mod('matx_favicon', '');
		$html = '';

	    if( !empty($fav)) {
	        $html .= '<link rel="icon" type="image/x-icon" href="'.esc_url( $fav ).'">';
	        $html .= '<link rel="shortcut icon" type="image/x-icon" href="'.esc_url( $fav ).'">';
	    }

	    return $html;
	}

	return false;
}
/* allow svg upload */
function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//add meta boxes
function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce"); ?>
            <label for="meta-box-h1">h1</label>
            <input name="meta-box-h1" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-h1", true); ?>"><br>
            <label for="meta-box-sub">sub</label>
            <input name="meta-box-sub" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-sub", true); ?>">
    <?php  
}
function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_h1_value = "";
    $meta_box_h2_value = "";

    if(isset($_POST["meta-box-h1"]))
    {
        $meta_box_h1_value = $_POST["meta-box-h1"];
    }   
    update_post_meta($post_id, "meta-box-h1", $meta_box_h1_value);

    if(isset($_POST["meta-box-sub"]))
    {
        $meta_box_h2_value = $_POST["meta-box-sub"];
    }   
    update_post_meta($post_id, "meta-box-sub", $meta_box_h2_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);
function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Headlines", "custom_meta_box_markup", "page", "normal", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");