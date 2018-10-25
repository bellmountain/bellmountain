<?php
/**
 * Template part for displaying portfolio attachment popup content
 *
 * @package matx
 */

	$header_logo    = get_theme_mod('matx_logo_dark');
	$pid = isset($_GET['pid']) ? $_GET['pid'] : '';
	$attachment_id = isset($_GET['attachment_id']) ? $_GET['attachment_id'] : ''; // attachment image id of individual popup

	$args = array(
		'p'   				=> $pid,
		'posts_per_page'   	=> 1,
		'post_type'        	=> 'matx-portfolio',
		'post_status'      	=> 'publish'
	);

	$portfolios = get_posts( $args ); 

	foreach ($portfolios as $post) :
		
		setup_postdata($post ); 

		$prefix = '_matx_portfolio_';

		$subtitle = get_post_meta( $post->ID, $prefix.'popup_stitle', true );
		$attached_images = get_post_meta( $post->ID, $prefix.'attached_images', true ); ?>

		<div class="profolio-preview animated fadeIn lavel2Popup">
		    <div class="clearfix prev-header">
		        <div class="pull-left">

		            <!-- Logo in Attachment popup -->
		            <a href="<?php echo esc_url( site_url('/' )); ?>" class="logo p-corner right">
		            	<?php if( $header_logo ) : ?>
		                	<img src="<?php echo esc_html( $header_logo ); ?>" alt="<?php bloginfo('name'); ?>">
		            	<?php endif; ?>
		            </a>
		        </div>
		        <div class="pull-left prev-info">

		            <!-- Screenshot info -->
		            <div class="item-description">
		                <h3><?php the_title(); ?></h3>
		                <?php if($subtitle) : ?>
		                <div><?php echo esc_html( $subtitle ); ?></div>
		            	<?php endif; ?>
		            </div>
		        </div>
		        <div class="pull-right">
		            <!-- Close button -->
		            <div class="p-corner left pre-close">
		                <a href="#"><i class="zmdi zmdi-close"></i></a>
		            </div>
		        </div>
		    	<?php
	            	$extra_iamges = get_post_meta( $post->ID, $prefix.'attached_images', true );

	            	if($extra_iamges) : ?>

			        <div class="pull-right">

			            <!-- attachments screen shots list -->
			            <div class="clearfix screenshots-list">
				            <?php 
								foreach ( (array) $extra_iamges as $barpreview_attachment_id => $a_url ) {

				                	echo '<a href="'. esc_url( $a_url ) .'" class="portfolio-details-image-link" data-attachment-src="'. esc_url( $a_url ) .'" data-attachment-alt="portfolio-atm">'.wp_get_attachment_image($barpreview_attachment_id, 'matx-attachment-previewbar').'</a>';
								} 
							?>
			            </div>
			        </div>
		    	<?php endif; ?>
		    </div>
		    <div class="pre-body">
		        <div class="pre-body-inner">
		            <!-- Attachment Image -->
	                <?php echo ( $attachment_id ) ? wp_get_attachment_image($attachment_id, 'full') : ''; ?>
		        </div>
		    </div>
		</div>

	<?php endforeach; wp_reset_postdata(); ?>



