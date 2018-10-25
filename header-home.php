<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package matx
 */

global $post;

$header_logo_dark   = get_theme_mod( 'matx_logo_dark' );
$header_logo_light  = get_theme_mod( 'matx_logo_light' );
$hader_color_scheme = matx_header_color();

$header_style       = matx_header_style();

$header_Classes     = array('main-header hide-init-animation');


if($header_style) {

    switch ($header_style) {

        case 'sticky_header':
            $header_Classes[] = "is-sticky";
        break;

        case 'non_sticky_header':
            $header_Classes[] = "basic-header";
        break;

        default:
            $header_Classes[] = "animated-header";
        break;

    }
}

$page_nav= ($post) ? get_post_meta( $post->ID, '_matx_page_header_page_nav', 1 ) : '';


?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="matx">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo matx_get_favicon(); // display favicon with wp version 4.2 and less ?>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
        <![endif]-->

        <!-- Loader -->
        <div id="loader" class="loader-wrapper">
            <div class="matx-preloader"></div>
        </div>
        
        <div class="nav-overlay-bg"></div>

        <header class="<?php echo esc_attr(implode(' ', $header_Classes ) ); ?>" data-header-style="<?php echo esc_attr( $header_style ); ?>">

            <a href="<?php echo site_url('/'); ?>" class="logos matx-logo logo-initial">

                <?php

                    $logo_for_dark = $header_logo_dark;
                    $logo_for_white = $header_logo_light;

                    if( $hader_color_scheme == 'header_scheme_dark') {
                        $logo_1 = $logo_for_dark;
                        $logo_2 = $logo_for_dark;
                    } else {
                        $logo_1 = $logo_for_dark;
                        $logo_2 = $logo_for_white;
                    }

                    if ( !$logo_1 ) {
                        $logo_2 = "";
                    }

                    if ( $logo_1 && !$logo_2 ) {
                        $logo_2 = $logo_1;
                    }

                    if( $logo_1 ) {

                        echo '<img class="logo-dark" src="'.esc_url( $logo_1 ).'" alt="'.esc_attr( get_bloginfo('name') ).'">';
                        echo '<img class="logo-lite" src="'.esc_url( $logo_2 ).'" alt="'.esc_attr( get_bloginfo('name') ).'">';

                    } else {
                        echo '<span class="matx-logo no-logo-uploded">'.esc_attr( get_bloginfo('name') ).'</span>';
                    }

                ?>
            </a>

            <?php
                // top nav
                $nav_args = array();

                $nav_args['container'] = 'nav';
                $nav_args['container_class'] = 'nav-typo main-nav';

                $nav_args['theme_location'] = ( $page_nav ) ? $page_nav : 'primary';

                if ( has_nav_menu($nav_args['theme_location']) ) {
                    wp_nav_menu( $nav_args );
                }

            ?>
        
            <div class="mdl-layout__drawer-button mobile-menu-area">
                <i id="menu-back-btn" class="mobile-menu-ctrl zmdi zmdi-arrow-right"></i>
                <i id="menu-show-btn" class="mobile-menu-ctrl active zmdi zmdi-menu"></i>
            </div>

        </header>

        <?php
            // side nav
            $nav_args['container_class'] = 'nav-typo mobile-nav';

            if ( has_nav_menu($nav_args['theme_location']) ) {
                wp_nav_menu( $nav_args );
            }
        ?>

        <main class="main-wrapper container-fluid">