<?php
/**
 * Template part for displaying matx blog posts
 *
 * @package matx
 */


    $randomID = '';
    if(function_exists('matx_random_id')) {
        $randomID = matx_random_id(4);   
    }

    $classes = '';
    $post_format = get_post_format( get_the_id() );
 ?>



<!-- start single page post start -->
<article class="single-post-content clearfix">

    <!-- start post thumbnail or quote text if post formate is quote--> 
        <div class="post-header">
            <div class="post-thumb-wrap">
            <?php
                echo wp_get_attachment_image( get_the_ID(), 'matx-standard-thumb' );
            ?>
            </div>
        </div>
    <!-- end post thumbnail -->

    <!-- start single post content -->
    <div class="post-entry clearfix">
    
        <?php the_post_thumbnail( ); ?>
        <?php the_excerpt(); ?>
        <?php the_content(); ?>
        
        <?php
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'matx' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'matx' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
        ?>

    </div>
    <!-- end single post content -->

    <!-- start share post -->
    <div class="clearfix tab-histry post-share clearfix">
        <span><?php echo esc_html__("Social Share", "matx"); ?></span>

        <ul class="pull-right clearfix social share-social js-post-share-media">
            <li class="fb fb-share"><a href="<?php echo esc_url( the_permalink() ); ?>"><i class="zmdi zmdi-facebook"></i></a></li>
            <li class="tw tw-share"><a href="<?php echo esc_url( the_permalink() ); ?>"><i class="zmdi zmdi-twitter"></i></a></li>
            <li class="gplus gplus-share"><a href="<?php echo esc_url( the_permalink() ); ?>"><i class="zmdi zmdi-google-plus"></i></a></li>
            <li class="lin in-share"><a href="<?php echo esc_url( the_permalink() ); ?>"><i class="zmdi zmdi-linkedin"></i></a></li>
        </ul>
    </div>
    <!-- end share post -->

</article>
<!-- end single page post start -->