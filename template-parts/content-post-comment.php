<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package matx
 */

if( function_exists('matx_random_id')) {
    $randomID = matx_random_id(4);
}

?>

<div class="clearfix mdl-card__actions mdl-card--border">

    <!-- blog post comment number -->
    <a href="<?php echo esc_url( get_permalink() ); ?>#comments" class="blog-comments"><?php comments_number( ); ?></a>

    <div class="blog-share-wrap clearfix">
        
        <!-- <a class="blog-share"><i class="zmdi zmdi-share"></i></a> -->
        <a class="blog-share" id="blog-post-share-<?php the_ID(); ?>"><i class="zmdi zmdi-share"></i></a>

        <!-- start blog post social icons -->
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect post-share-media js-post-share-media" data-for="blog-post-share-<?php the_ID(); ?>">
            <li class="fb fb-share">
                <a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-facebook-box"></i> <span>Facebook</span></a>
            </li>

            <li class="tw tw-share">
                <a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-twitter-box"></i> <span>Twitter</span></a>
            </li>

            <li class="gplus gplus-share">
                <a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-google-plus-box"></i> <span>Google plus</span></a>
            </li>

            <li class="lin in-share">
                <a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-linkedin-box"></i> <span>Linked In</span></a>
            </li>
        </ul>

        <!-- end blog post social icons -->
    </div>

</div>
