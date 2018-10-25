<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package matx
 */

 
 get_header();

 ?>

 
<!-- start blog content -->
<div class="section-main">
    <div class="section-common-space">
        <div class="container">
            <div class="row">
                <!-- start all blog post  -->

                <?php 
                    $prefix = '_matx_sidebar_';

                    global $post;

                    $sidebar_is = get_post_meta( $post->ID, $prefix.'is', true );
                    $sidebar_position = get_post_meta( $post->ID, $prefix.'_position', true );

                    if( $sidebar_is != 'no_sidebar') {

                        if ( $sidebar_position == 'left' ) {
                            get_sidebar();
                        }

                        echo '<div class="col-xs-12 col-sm-8">';
                        

                    } else {

                        echo '<div class="col-sm-12">';
                    }

                 ?>

                    <div class="main-post post-groups">

                        <?php  while( have_posts() ) : the_post(); ?>

						<article class="single-post-content">

                            <?php if( has_post_thumbnail(get_the_id())) : ?>
							    <!-- start post thumbnail -->
							    <div class="post-header">
                                    <?php the_post_thumbnail('full'); ?>
							    </div>
							    <!-- end post thumbnail -->
                            <?php endif; ?>

						    <div class="post-entry">
						    
						        <?php the_content(); ?>

						    </div>
						    <!-- end .post-entry -->

                            <?php if( comments_open( get_the_id() )) : ?>
                            <!-- start comment section -->
                            <div class="white-box comments-section">
                                <h2 class="comment-reply-title"><?php comments_number(); ?></h2>
                                <?php  ?>
                                <?php comments_template( ); ?>
                            </div>
                            <!-- end comment section -->
                            <?php endif; ?>

						</article> 
						<?php endwhile; ?>

                    </div> <!-- end .main-post.post-groups --> 

                </div> <!-- end all blog post  --> 

                <?php

                    if( $sidebar_is != 'no_sidebar' && $sidebar_position == 'right' ) {
                        get_sidebar();
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- end blog content --> 

<?php get_footer();
