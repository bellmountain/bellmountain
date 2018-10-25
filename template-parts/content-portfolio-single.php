<?php
/**
 * Template part for displaying matx blog posts
 *
 * @package matx
 */
    global $post;

    $post_id = ($post) ? $post->ID : '';

    $prefix = '_matx_portfolio_';

    $popup_title =  get_post_meta( $post_id, $prefix.'popup_title', true );
    $subtitle = get_post_meta( $post_id, $prefix.'popup_stitle', true );
    $attached_images = get_post_meta( $post_id, $prefix.'attached_images', true );
    $description = get_post_meta( $post_id, $prefix.'description', true );
    $more_info = get_post_meta( $post_id, $prefix.'more_info', true );
    $social_share_group = get_post_meta( $post_id, $prefix.'sm_share_group', true );

    $page_style = get_post_meta( $post_id, $prefix.'single_page_style', true );
   
    $extra_iamges = get_post_meta( $post_id, $prefix.'attached_images', true );

 
?>


<section class="section-main">
    <div class="section-common-space">
        <div class="container">
            <div class="row">
                <?php

                    if( $page_style != 'style_three' ) {

                        echo '<div class="col-sm-12 col-md-7 col-lg-8">';

                    } else {

                        echo '<div class="col-sm-12">';

                    } 
                
                    echo matx_portfolio_single_page_media( $extra_iamges, $page_style  ); 

                    echo '</div>';
                ?>

                <?php if( $page_style != 'style_three' ) :  ?>

                <!-- start portfolio details -->
                <div class="col-sm-12 col-md-5 col-lg-4">
                    <div class="single-pf-content pfc-align-left">

                        <?php 
                            if( $description ) { echo wp_kses_post( wpautop( $description ) ); }

                            if( $more_info ) { echo $more_info; }

                            echo '<h4>'.esc_html__('share', 'matx').'</h4>';
                            echo matx_share_portfolio_item($post_id); 

                        ?>
                    </div>
                </div>

                <!-- end portfolio details -->

                <?php else : ?>

                    <div class="col-sm-12">
                        <div class="single-pf-content row">
                            <div class="col-sm-8">
                                <?php if( $description ) { echo wp_kses_post( wpautop( $description ) ); } ?>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="pfc-align-left">

                                <?php 

                                    if( $more_info ) { echo $more_info; }

                                    echo '<h4>'.esc_html__('share', 'matx').'</h4>';
                                    echo matx_share_portfolio_item($post_id); 
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
    
    <?php 
        // portfolio pagination
        echo matx_render_portfolio_banner_pagination( get_the_id(), 'footer' ); 
    ?>
</section>


