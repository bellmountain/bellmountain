<?php

/**
 * Template Name: Blog
 *
 * @package matx
 */

get_header(); 
 

    global $post;

    $prefix = '_matx_blogpage_';


    $num_post           = get_theme_mod( 'cz_blog_numpost' );
    $sidebar_position   = get_post_meta( $post->ID, '_matx_sidebar__position', true );
    $ajax_load_post     = get_theme_mod( 'cz_blog_loadpost' );
    $style_from_page    = get_post_meta( $post->ID, $prefix.'style', true );
 
    if( $style_from_page ) {

        $blog_style = $style_from_page;

    } else {
        
        $blog_style = get_theme_mod( 'cz_blog_style' );
    }


    if( empty($ajax_load_post) ) {
        $ajax_load_post = 3;
    }

    $blogposts = array(
        'post_type'                 => 'post',
        'post_status'               => 'publish', 
        'order'                     => 'DESC',
        'orderby'                   => 'date',
        'posts_per_page'            => ( empty($num_post) ) ? 5 : $num_post,
    );

    $bpquery = new WP_Query( $blogposts );
    $current_query_obj = $bpquery->query; ?>

    
<!-- start blog content -->
<div class="section-main">
    <div class="section-common-space">
        <div class="container">
            <div class="row">
                <!-- start all blog post  -->
                <?php 

                    if( $blog_style !== 'full_width' ) {

                        if( $sidebar_position == 'left') {
                            get_sidebar();
                        }

                        echo '<div class="col-xs-12 col-sm-8">';

                    } else {

                        echo '<div class="col-sm-12">';
                    }

                    $is_masonry = '';

                    if( $blog_style !== 'standard') {

                        $is_masonry = 'id="blog-posts-mesonary"';

                    }

                    $wrapper_class = "class='row main-post post-groups bs-".esc_attr( $blog_style )."'";

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
                    
                    ?>

                    <div <?php echo $is_masonry; ?> data-query='<?php echo json_encode( $current_query_obj ); ?>' data-ajaxpost="<?php echo esc_attr( $ajax_load_post ); ?>" <?php echo $wrapper_class; ?> data-blog-style="<?php echo esc_attr( $blog_style ); ?>">

                        <?php
                            if( $bpquery->have_posts() ){

                                while( $bpquery->have_posts() ) : $bpquery->the_post();

                                    get_template_part( $path );

                                endwhile;

                            } else {
                                
                                echo '<h2 class="content-not-found">'.esc_html__("No results found", "matx").'</h2>';
                                
                            } ?>
                    </div> <!-- end .main-post.post-groups -->

                    <?php if( $bpquery->have_posts() ) : ?>
                
                        <div id="ajaxPostLoad" class="text-center post-loader">
                            <button><img src="<?php echo get_template_directory_uri(); ?>/img/loadar.png" alt="Loader"></button>
                            <span class="info-message"><?php echo esc_html__("No more posts", "matx"); ?></span>
                        </div>  <!-- end post loader -->

                        <div data-action="blogPostInitItem" class="ajax-hidden-div" style="height: 1px; overflow: hidden;"></div>
                    
                    <?php endif; wp_reset_postdata(); ?>

                </div> <!-- end all blog post  -->
                
                <?php if( $blog_style !== 'full_width' && $sidebar_position != 'left') : ?> 
                    <?php get_sidebar(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- end blog content --> 

<?php get_footer();
