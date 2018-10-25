<?php
/**
 * Template part for displaying portfolio details popup content
 *
 * @package matx
 */

global $loaded_portfolio_box_classes;
$prefix = '_matx_portfolio_';


$box_category_classes = array();
$box_category_classes[] = function_exists('get_matx_terms') ? strtolower(get_matx_terms('portfolio-category')) : '';
$box_category_classes[] = 'ajax-loaded';



$portfolio_action = get_post_meta( get_the_id(), $prefix.'is_external_url', true );
$subtitle = get_post_meta( get_the_id(), $prefix.'popup_stitle', true );
$thumbnail_src = get_the_post_thumbnail_url( get_the_id(), 'full' );

?>

<div data-portfolio-id="portfolio-<?php the_ID(); ?>" class="<?php echo esc_attr(implode(' ', $loaded_portfolio_box_classes)).' '.esc_attr( implode(' ', $box_category_classes) ); ?>">
    <div class="portfolio-item">

        <a <?php if( $portfolio_action == 'pf_ac_single') {
                
                echo ' href="'.esc_url( get_permalink( get_the_id() ) ).'"';

            } elseif( $portfolio_action == 'pf_ac_light') {

                echo ' href="'.esc_url( $thumbnail_src ).'" class="portfolio-default-popup"';

            } else {

                echo ' href="'.esc_url( admin_url( 'admin-ajax.php' ).'?action=matx_portfolio_details&pid='.get_the_id() ).'" class="ajax-portfolio portfolio-custom-popup"';
            } ?>>

            <div class="protfolio-image">
                <?php echo has_post_thumbnail(get_the_id()) ? get_the_post_thumbnail( get_the_id(), 'matx-portfolio-thumbnail' ) : ''; ?>
                <div class="pf-overlay"><i class="zmdi zmdi-center-focus-strong"></i></div>
            </div>
            <div class="portfolio-meta">
                <i class="zmdi zmdi-plus-circle"></i>
                <h3 class="portfolio-title"><?php echo esc_html( get_the_title()); ?></h3>
                <div class="portfolio-subtitle"><?php echo esc_html($subtitle); ?></div>
            </div>
            <div class="pf-overlay"></div>
        </a>
    </div>
</div>