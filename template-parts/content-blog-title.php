<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package matx
 */
 
 ?>
 
<div class="section-header-search-parent section-main">
	<?php if(is_page_template('template-blog.php') || is_search() || is_category() || is_singular('post') || is_tag() || is_author() || is_archive() ) : ?>
	<!-- start search section -->
	<div id="fullSearch" class="search-bar hide-bg">
	    <div class="search-bg"></div>
	    <i class="zmdi zmdi-close search-close"></i>
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-8 col-sm-offset-2">
	                <form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>"> 
	                    <div class="mdl-textfield mdl-js-textfield">
	                        <p class="search-label"><?php echo esc_html__("Just type and press 'enter'", 'matx'); ?></p>
	                        <label class="mdl-textfield__label" for="search-blog"></label>
	                        <?php 
	                            if( is_search()) {

	                                echo '<input type="text" name="s" id="search-blog" class="mdl-textfield__input" value="'.esc_attr( get_search_query() ).'"/>';

	                            } else {
	                                
	                                echo '<input type="text" name="s" id="search-blog" class="mdl-textfield__input"/>';
	                            }
	                         ?>
	                        <input type="hidden" name="post_type" value="post" />
	                    </div>

	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end search section --> 
	<?php endif; ?>
    <div class="overlay overlay-seven">
        <!-- start banner content -->
        <div class="container">
            <div class="section-common-space">

				<?php if( is_single()) : ?>
	                <div class="clearfix banner-content">
	                    <div class="pull-left banner-content-inner">
							<?php while( have_posts() ) : the_post(); ?>
	                        <!-- single page post title -->
							<?php 
								if( is_singular( 'matx-portfolio' )) {

	                         		echo '<h2 class="portfolio-single-title">'.get_the_title( ).'</h2>';
								} else {
	                         		echo '<h2>'.get_the_title( ).'</h2>';
								}
							 ?>

                        	<?php 
                        		if( is_singular('matx-portfolio' )) {
                        			$single_page_meta_class = 'clearfix post-meta portfolio-meta';
                        		} else {
                        			
                        			$single_page_meta_class = 'clearfix post-meta';
                        		}

                        	 ?>
	                        <!-- start single page post meta -->
	                        <div class="<?php echo esc_attr( $single_page_meta_class ); ?>"> 

	                        	<span><?php echo esc_html__( 'By', 'matx' ).' '.get_the_author_posts_link(); ?></span> 
	                            <span><?php echo get_the_date('F j, Y'); ?></span>

								
								<?php 
									/* for single post page only */
									$post_commnts = get_comments_number( get_the_id() );

									if( is_singular('post')) {

										 if( $post_commnts > 0 ) {  ?>
												
			                            	<span class="cm"><a href="<?php esc_url( get_permalink() ); ?>#comments"><?php comments_number(); ?></a></span>
										<?Php 

										 } else {  ?>

			                            	<span class="cm"><?php comments_number(); ?></span>';
										<?php }

										matx_display_category_terms();
									}
								?>
	                        </div>

	                        <!-- end single page post meta -->
	                        
	                    	<?php endwhile; ?>
	                    </div>


	                    <?php if( is_singular( 'matx-portfolio' )) : ?>
	                    	
	                        <!-- start portfolio navigation top -->

	                        <?php  echo matx_render_portfolio_banner_pagination( get_the_id(), 'banner' ); ?>
 
	                        <!-- end portfolio navigation top -->
                    	<?php endif; ?>

	                    <?php if( is_singular( 'post' )) : ?>
		                    <!-- start social icons -->
		                    <ul class="pull-right clearfix social share-social js-post-share-media">
					            <li class="fb fb-share"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-facebook"></i></a></li>
					            <li class="tw tw-share"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-twitter"></i></a></li>
					            <li class="gplus gplus-share"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-google-plus"></i></a></li>
					            <li class="lin in-share"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="zmdi zmdi-linkedin"></i></a></li>
					        </ul>
		                    <!-- end social icons -->
	                	<?php endif; ?>

	                </div>

				<?php else :  ?>

	                <div class="align-middle-contentf banner-content">
					
	                	<?php if ( is_search() ) { ?>

                    		<h2 class="search-title"><?php echo esc_html__('RESULTS FOR: ', 'matx'); ?><span><?php echo get_search_query(); ?></span></h2>

                			<?php } elseif( is_page_template('template-blog.php' )) {

		                		while( have_posts()) : the_post(); ?>

			                    	<h2><?php the_title(); ?></h2>
			                    	<div><?php the_content( ); ?></div>

	                    	<?php endwhile; } elseif( is_archive()) { 

                			if( have_posts()) {

                				$post = $posts[0]; // set $psot for the_date() works

                				if( is_category( )) { ?>

                    				<h2><?php echo esc_html__('Category: ', 'matx'); ?>
                    				<span><?php single_cat_title(); ?></span></h2>

								<?php } elseif( is_author()) { ?>

                					<h2><?php echo esc_html__('Author: ', 'matx'); the_author(); ?></h2>

                				<?php } elseif(is_tag()) { ?>
		
                					<h2><?php echo esc_html__('Tag: ', 'matx'); single_cat_title(); ?></h2>

                				<?php } elseif(is_day() || is_month() || is_year()  ) { ?>

                					<h2><?php echo esc_html__('Archive: ', 'matx'); the_time(get_option('date_format')); ?></h2>
                					
                				<?php }
                			}

	                		// default page

	                		} elseif( is_page() ) { ?>
								<?php
	                         		echo '<h1>'.get_post_meta(get_the_ID(), 'meta-box-h1',true ).'</h1>';
									echo '<p>'.get_post_meta(get_the_ID(), 'meta-box-sub',true ).'</p>';
								?>
	                    <?php } ?> 
	                </div>

				<?php endif; ?>
            </div>
        </div>
        <!-- end banner content -->
    </div>
</div>

