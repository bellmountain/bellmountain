<?php
/**
 * Template part for displaying matx blog posts in front page
 *
 * @package matx
 */

?>

<?php 
    $randomID = '';
    if(function_exists('matx_random_id')) {
        $randomID = matx_random_id(4);   
    }

    $classes = '';
    $post_format = get_post_format( get_the_id() );
    $post_title = get_the_title( get_the_id() );
 ?>

<article <?php post_class('single-blog-post'); ?>>
    <div class="mdl-card jumbo-shadow mdl-shadow--2dp">
        <?php 
            if( $post_format !== 'quote' ){ ?>

                <div class="post-thumb-wrap">
                    <?php echo matx_blog_posts_media( $post_format, get_the_id() ); ?>
                </div>

                <div class="post-content-wrap">
                    <!-- blog post title -->
                    <h2 class="mdl-card__title-text"><a href="<?php echo esc_url( get_permalink(get_the_id()) ); ?>"><?php echo ( strlen( $post_title) > 0 ) ? $post_title : get_the_date(); echo is_sticky( get_the_id() ) ? '<i class="fa fa-thumb-tack" title="Sticky post"></i>' : '';?></a></h2>

                    <!-- blog post content -->
                    <div class="mdl-card__supporting-text">
                        <?php 
                            $content = wp_kses_post( get_the_content() );
                            $excerptlenght = 25;
                        ?>
                        <div><?php echo wp_trim_words( $content, $excerptlenght ); ?></div>
                    </div>
                </div>

        <?php
              } else {  

            $prefix = '_matx_post_format_';
            $quote_text = get_post_meta( get_the_id(), $prefix.'quote_text', 1 );
            $quote_author = get_post_meta( get_the_id(), $prefix.'quote_author', true ); 

            ?>

            <div class="post-content-wrap">
                <h2 class="mdl-card__title-text hide"><a href="<?php echo esc_url( get_permalink( get_the_id()) ); ?>"><?php the_title(); ?></a></h2>
                <div class="mdl-card__supporting-text">
                     <?php if( $quote_text ) : ?>
                        <p><a href="<?php echo esc_url( get_permalink(get_the_id()) ) ?>"> <?php echo esc_html( $quote_text ); ?></a></p>
                    <?php endif; ?>
                    <?php echo is_sticky() ? '<i class="fa fa-thumb-tack sticky-icon" title="Sticky post"></i>' : ''; ?>
                    <i class="zmdi zmdi-quote"></i>
                    <div class="post-meta-info">
                        <?php if ( $quote_author ) : ?>
                            <span class="post-meta-date"><?php echo esc_html( $quote_author );  ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } // end if ?>

        <?php get_template_part('template-parts/content-post-comment' ); ?>

    </div>
</article>