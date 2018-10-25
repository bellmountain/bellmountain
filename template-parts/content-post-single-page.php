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
<article class="single-post-content">

    <!-- start post thumbnail or quote text if post formate is quote--> 
    <div class="post-header clearfix">
        <div class="post-thumb-wrap">
            <?php echo matx_blog_posts_media( $post_format, get_the_id() ); ?>
        </div>
    </div>
    <!-- end post thumbnail -->

    <!-- start single post content -->
    <div class="post-entry clearfix">
    
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



    <!-- start post tags -->
    <div class="clearfix post-tags-wrapper">
        <?php $posttags = get_the_tags(); if ($posttags) : ?>

        <ul class="tagcloud clearfix">
            <?php foreach($posttags as $tag): ?>

            <a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a>

            <?php endforeach; ?>
        </ul>

        <?php endif;
        ?>
    </div>
    <!-- end post tags -->

    <!-- start share post -->
    <div class="clearfix tab-histry post-share">
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