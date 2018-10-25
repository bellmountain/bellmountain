<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package matx
 */

    $header_logo   = get_theme_mod('matx_logo_dark');
    $footer_logo   = get_theme_mod('matx_logo_footer');
    $copyright     = get_theme_mod('matx_copyright','');

    $src = ($footer_logo) ? $footer_logo : $header_logo;  ?>

    </main>
    <!-- end main wrapper   -->
    
    <footer class="main-footer">
        <div class="footer-top">
            <div class="section">
                <div class="section-common-space">
                    <div class="container">
                        <div class="row">
                            <div class="text-center ft-content-start">
                                <a href="<?php esc_url( site_url('/') ); ?>" class="footer-logo wow fadeIn" data-wow-duration="1s">
                                    <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
                                </a>

                            	<?php echo matx_display_social_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="text-center">
            	<?php if ( $copyright ) { echo '<p>'.esc_html( do_shortcode($copyright) ).'</p>'; } ?>
            </div>
        </div>
    </footer>
    

    <?php 
        //back to top button
    	if( is_front_page() ) { ?>
		    <button id="backToTop" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect btn-highlight back-to-top shade-on hide-bottom">
		        <i class="zmdi zmdi-chevron-down"></i>
		    </button>
    	<?php } else { ?>
        <button id="backToTop" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect btn-highlight back-to-top hide-bottom">
            <i class="zmdi zmdi-chevron-up"></i>
        </button>
        
    	<?php } ?>

	<?php wp_footer(); ?>

	</body>
</html>
