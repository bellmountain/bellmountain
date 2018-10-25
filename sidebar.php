<?php

/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package matx
 */

$prefix             = '_matx_sidebar_';
$global_sidebar_position = get_theme_mod( 'sb_position','right' );

global $post;

if ( $post ) {
    $sidebar_is = get_post_meta( $post->ID, $prefix.'is', true );
	$sidebar_position = get_post_meta( $post->ID, $prefix.'_position', true );
} else {
    $sidebar_is = 'blog-sidebar';
	$sidebar_position = $global_sidebar_position;
}

if ( !$sidebar_is ) {
    $sidebar_is = 'blog-sidebar';
}

if ( !$sidebar_position ) {
    $sidebar_position = 'right';
}


$sb_class =  $sidebar_position == 'left' ? 'sidebar-area sb-position-left' : 'sidebar-area'; ?>


<div class="col-xs-12 col-sm-4 primary-sidebar">
    
    <div class="<?php echo esc_attr( $sb_class ); ?>">

    <?php
        if( $sidebar_is == 'no_sidebar') {
            dynamic_sidebar( 'blog-sidebar' );
        } else {
            dynamic_sidebar( $sidebar_is );
        }
    ?>
        
    </div>

</div>