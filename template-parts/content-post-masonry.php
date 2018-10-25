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
    $post_title = get_the_title( get_the_id() );
?>

<article <?php post_class('col-xs-12 col-sm-6 col-lg-6 single-blog-post' ); ?>>
    <div class="mdl-card jumbo-shadow mdl-shadow--2dp">
        <?php  if( $post_format !== 'quote' ){ ?>

            <div class="post-thumb-wrap">
                <?php echo matx_blog_posts_media( $post_format, get_the_id() ); ?>
            </div>

            <div class="post-content-wrap">
                <!-- blog post title -->
                <h2 class="mdl-card__title-text"><a href="<?php echo esc_url( get_permalink(get_the_id()) ); ?>"><?php echo ( strlen( $post_title) > 0 ) ? $post_title : get_the_date(); echo is_sticky( get_the_id() ) ? '<i class="fa fa-thumb-tack" title="Sticky post"></i>' : '';?></a></h2>

                <!-- blog post content -->
                <div class="mdl-card__supporting-text">
                    <div><?php the_excerpt(); ?></div>
                </div>
            </div>

        <?php } else {  

            $prefix = '_matx_post_format_';
            $quote_text = get_post_meta( get_the_id(), $prefix.'quote_text', 1 );
            $quote_author = get_post_meta( get_the_id(), $prefix.'quote_author', true );

            ?>

            <?php echo matx_blog_posts_media( $post_format, get_the_id() ); ?>
        <?php } // end if ?> 

        <?php get_template_part('template-parts/content-post-comment' ); ?>
        
    </div> 
</article>