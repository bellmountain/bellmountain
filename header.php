<?php
/**
 * The header for our blog pages.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package matx
 */

global $post;

$header_logo    = get_theme_mod('matx_logo_dark');

$page_body_class = array('blog-page');

$page_body_class[] = is_singular('post') ? 'single-post-page' : '';

$page_nav= ($post) ? get_post_meta( $post->ID, '_matx_page_header_page_nav', 1 ) : '';

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="matx">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo matx_get_favicon(); // display favicon with wp version 4.2 and less ?>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> 
        <?php wp_head(); ?>
    </head>


    <body <?php body_class(implode(' ', $page_body_class)); ?>>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience.</p>
        <![endif]-->

        <!-- loder -->
        <div id="loader" class="loader-wrapper">
            <div class="matx-preloader"></div>
        </div>

        <div class="nav-overlay-bg"></div>
 
        <!-- start banner -->
        <div class="banner-header section-main">

            <?php if( ! is_404()) : ?>

                <?php
                    global $post;

                    $banner_bg = ""; 
                    
                    if ( $post ) {
                        //$banner_bg = get_post_meta( $post->ID, '_matx_page_banner_background', true );
                        //$banner_bg = get_post_meta( $post->ID, '_matx_page_banner_background', true );
                        $banner_bg = get_the_post_thumbnail_url( $post->id, 'full');
                    }

                    if( $banner_bg ){

                        echo '<div class="banner-bg bg-image" data-top="transform: translate3d(0px, 0px, 0px)" data-top-bottom="transform: translate3d(0px, 250px, 0px)" style="background-image: url('.$banner_bg.');"></div>';
                        
                    } else {

                        echo '<div class="banner-bg banner-bg-color"></div>';
                    } 
                ?>
        
                <?php get_template_part('template-parts/content-blog-title' );  ?>

            <?php endif; // is_404(); ?>

            <?php

                $header_style       = matx_header_style();
                $header_Classes     = "main-header hide-init-animation";
                
                if ( $header_style == "sticky_header" ) {
                    $header_Classes     = "main-header hide-init-animation is-sticky";
                } else if( $header_style == "non_sticky_header" ) {
                    $header_Classes     = "main-header hide-init-animation basic-header";
                } else {
                    $header_Classes     = "main-header hide-init-animation animated-header";
                }

            ?>

            <!-- start site main header -->
            <header class="<?php echo $header_Classes; ?>" data-header-style="<?php echo esc_attr( $header_style ); ?>">
 
                <!-- start logo -->
                <a href="<?php echo site_url('/'); ?>" class="logo matx-logo logo-initial">
                    <?php if( $header_logo ) : ?>
                        <img class="logo-dark" src="<?php echo esc_url($header_logo ); ?>" alt="<?php esc_attr( get_bloginfo('name') ); ?>">
                        <img class="logo-lite" src="<?php echo esc_url($header_logo ); ?>" alt="<?php esc_attr( get_bloginfo('name') ); ?>">
                    <?php else: ?>
                        <span class="matx-null-logo"><?php echo esc_attr( get_bloginfo('name') ); ?></span>
                    <?php endif; ?>
                </a>
                <!-- end logo -->
                
                <?php if(is_page_template('template-blog.php') || is_search() || is_category() || is_singular('post') || is_tag() || is_author() || is_archive() ) : ?>
                <!-- search button -->
                <div class="right-nav-sec">
                    <div class="group-btn">
                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect search-open">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </div>
                </div> 
                <?php endif; ?>

                <?php
                    // top nav
                    $nav_args = array();

                    $nav_args['container'] = 'nav';
                    $nav_args['container_class'] = 'nav-typo main-nav';

                    $nav_args['theme_location'] = ( $page_nav ) ? $page_nav : 'blog-menu';

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

        </div>
        <!-- end banner -->

        <main class="main-wrapper container-fluid">
