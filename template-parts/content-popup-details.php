<?php

/**
 * Template part for displaying portfolio details popup content
 *
 * @package matx
 */

$pid = isset($_GET['pid']) ? $_GET['pid'] : '';

$args = array(
	'p'   				=> $pid,
	'posts_per_page'   	=> 1,
	'post_type'        	=> 'matx-portfolio',
	'post_status'      	=> 'publish'
);

$portfolios = get_posts( $args ); 

foreach ($portfolios as $post) :

	setup_postdata( $post ); 

	$prefix = '_matx_portfolio_';

	$popup_title 			= get_post_meta( $post->ID, $prefix.'popup_title', true );
	$subtitle 				= get_post_meta( $post->ID, $prefix.'popup_stitle', true );
	$preview_url 			= get_post_meta( $post->ID, $prefix.'preview_url', true );
	$attached_images 		= get_post_meta( $post->ID, $prefix.'attached_images', true );
	$description 			= get_post_meta( $post->ID, $prefix.'description', true );
	$social_share_group 	= get_post_meta( $post->ID, $prefix.'sm_share_group', true );

?>

<div class="matx-popup-start ">
    
    <div class="popup-header">
    
        <!-- Popup Header -->
        <div class="clearfix popup-meta">
            <div class="pull-left item-description">
                <h3><?php echo ! empty( $popup_title ) ? $popup_title : $post->post_title; ?></h3> 
                <?php if( !empty($subtitle)){ echo '<div>'.esc_html( $subtitle ).'</div>'; } ?>
            </div>
			<?php
				if( !empty($preview_url)) {
		            echo '<a href="'.esc_url( $preview_url ).'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect pull-right btn-default btn-black" target="_blank">'. esc_html__( 'Live preview', 'matx' ) .'</a>';
		            echo '<div class="clearfix"></div>';
				} ?>
        </div>
        <div class="item-screenshot">
            <?php has_post_thumbnail( $post->ID ) ? the_post_thumbnail('matx-portfolio-popup') : ''; ?>
        </div>
    </div>

    <div class="popup-body">
    	<div class="row">
	    	<div class="col-sm-8">
                <div class="popup-left">
            		<?php

                	$extra_iamges = get_post_meta( $post->ID, $prefix.'attached_images', true );

                	if( $extra_iamges ) : ?>

                    <div class="screenshot-module screenshot-preview">
                        <h4 class="title-third"> <?php echo count($extra_iamges).' '. esc_html__( 'SCREENSHOT' ,'matx' ); ?></h4>
                        <div class="clearfix screenshots-list">
                        <?php 
                        	foreach ( (array) $extra_iamges as $attachment_id => $attachment_url ){
                        		
	                            echo '<a href="'.admin_url('admin-ajax.php' ).'?action=matx_portfolio_attachment&pid='.$pid.'&attachment_id='.$attachment_id.'" class="ajax-portfolio-details">'.wp_get_attachment_image($attachment_id, 'matx-popup-attachment').'</a>';
						    } 
                         ?>
                        </div>
                    </div>

            		<?php endif; ?>

            		<?php if( !empty($description)) :  ?>
	                    <article class="screenshot-module popup-description">
	                        <?php if( $description ) { echo wp_kses_post( wpautop( $description ) ); } ?>
	                    </article>
            		<?php endif; ?>
                </div>
	    	</div>
			<div class="col-sm-4">
				<div class="popup-right">
					<div class="text-left screenshot-module">
						<h4 class="title-third">SHARE WITH</h4>
						<ul class="clearfix social popup-social hover-round matx-post-share-js">
							<li class="fb-share" data-title="<?php echo get_the_title($post->ID); ?>" title="Share on Facebook">
								<a href="<?php the_permalink($post->ID); ?>"><i class="zmdi zmdi-facebook"></i></a>
							</li>
							<li class="tw-share" data-title="<?php echo get_the_title($post->ID); ?>" title="Share on Twitter">
								<a href="<?php the_permalink($post->ID); ?>"><i class="zmdi zmdi-twitter"></i></a>
							</li>
							<li class="gplus-share" data-title="<?php echo get_the_title($post->ID); ?>" title="Share on Google Plus">
								<a href="<?php the_permalink($post->ID); ?>"><i class="zmdi zmdi-google-plus"></i></a>
							</li>
							<li class="in-share" data-title="<?php echo get_the_title($post->ID); ?>" title="Share on Linked In">
								<a href="<?php the_permalink($post->ID); ?>"><i class="zmdi zmdi-linkedin-box"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
    	</div>
    </div>

	<?php if( !empty($preview_url)) : ?>

    <div class="popup-footer">
        <div class="text-right">
            <!-- Preview link -->
            <a href="<?php echo esc_url( $preview_url ); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-default btn-black" target="_blank"><?php echo esc_html__( 'Live preview', 'matx' ); ?></a>
        </div>
    </div>
	<?php endif; ?>

</div>

<?php endforeach; wp_reset_postdata(); ?>



