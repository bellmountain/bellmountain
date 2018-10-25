<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package matx
 */
 
get_header('home');  ?>


<div class="row">
    <!-- start banner -->
    <div class="defalut-page-banner"></div>
    
    <!-- start blog content -->
    <div class="section-main">
        <div class="section-common-space">
            <div class="container">
                <div class="row">
                    <!-- start all blog post  -->
                    <div class="col-xs-12 col-sm-8">

                        <?php if( have_posts() ) : ?>

                            <div class="row main-post post-groups">

                            <?php while( have_posts() ) : the_post(); ?>

                                <?php get_template_part('template-parts/content-post-standard'); ?>

                            <?php endwhile; ?>

                            </div>
                            <!-- end .main-post.post-groups -->

                        <?php endif; ?>
                        
                        <div class="matx-pb-pagination">
                            
                            <?php
                                global $wp_query;

                                $big = 999999999; // need an unlikely integer

                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages
                                ) ); 
                            ?>
                        </div>

                    </div> <!-- end all blog post  -->
                    
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end blog content --> 
</div>

<?php get_footer();
