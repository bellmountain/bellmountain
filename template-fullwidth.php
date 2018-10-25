<?php

/**
 * Template Name: Fullwidth
 *
 * @package matx
 */

?>

<?php get_header(); ?>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?> 
        
        <?php get_template_part('pages/hosting'); ?>

        <?php the_content( ); ?>

    <?php endwhile; endif; ?>
    
<?php get_footer();
