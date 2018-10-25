<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package matx
 */

 get_header();

 $sidebar_position   = get_theme_mod( 'sb_position','right' );

  ?> 

<!-- start blog content -->
<div class="section-main">
    <div class="section-common-space">
        <div class="container">
            <div class="row">
                <!-- start all blog post  -->

                <?php 
                    $single_sidebar = get_theme_mod('cz_show_singlepage_sidebar', 'yes' );

                    if( $single_sidebar != 'yes') : ?>

                    <div class="col-sm-12">

                <?php else : ?>

                    <?php
                        if( $sidebar_position == 'left') {
                            get_sidebar();
                        }
                    ?>

                    <div class="col-xs-12 col-sm-8">

                <?php endif; ?>

                    <div class="main-post post-groups">

                        <?php  while( have_posts() ) : the_post(); ?>

							<?php get_template_part('template-parts/content-post-single-page');  ?>

                            <?php if( comments_open( get_the_id() )) : ?>
                            <!-- start comment section -->
                            <div class="white-box comments-section">
                                <h2 class="comment-reply-title"><?php comments_number(); ?></h2>
                                <?php comments_template( ); ?>
                            </div>
                            <!-- end comment section -->
                            
                            <?php endif; ?>

						<?php endwhile; ?>

                    </div> <!-- end .main-post.post-groups --> 

                </div> <!-- end all blog post  --> 

                <?php
                    if( $single_sidebar == 'yes' && $sidebar_position != 'left' ) {

                        get_sidebar();

                    } 
                ?>
            </div>
        </div>
    </div>
</div>
<!-- end blog content --> 

<?php get_footer();
