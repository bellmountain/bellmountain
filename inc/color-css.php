<?php 

function hex2rgba($hex, $a = '1') {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    
    return 'rgba('. implode(",", array($r, $g, $b, $a)) . ')';
}


function get_color_scheme() {

	$colorScheme 		= get_theme_mod('cz_color_schemes');
	$cuBrandColor 		= get_theme_mod('cz_color_primary');
	$cuBrandColorLight 	= get_theme_mod('cz_color_secondary');

	if ( defined( 'DEMO_COLOR' ) ) {

		if ( isset( $_GET['colorscheme'] ) && !empty( $_GET['colorscheme'] ) ) {
			$colorScheme 	= $_GET['colorscheme'];
		}

		if ( isset( $_GET['customcolor'] ) && !empty( $_GET['customcolor'] ) ) {
			$cuBrandColor 		= '#'.$_GET['customcolor'];
			$cuBrandColorLight 	= $cuBrandColor;
		}
	}

    switch ( $colorScheme ) {

        case 'color-red':
            
            $brandColor         = '#ff5252';
            $brandColorLight    = '#ff9f9f';

            break;
            
        case 'color-cyan':
            
            $brandColor         = '#00BCD4';
            $brandColorLight    = '#57e3f5';

            break;
            
        case 'color-indigo':
            
            $brandColor         = '#3F51B5';
            $brandColorLight    = '#8092f9';

            break;
            
        case 'color-deep-purple':
            
            $brandColor         = '#673AB7';
            $brandColorLight    = '#ac7dff';

            break;
            
        case 'color-pink':
            
            $brandColor         = '#E91E63';
            $brandColorLight    = '#f54782';

            break;
            
        case 'color-blue':
            
            $brandColor         = '#2196F3';
            $brandColorLight    = '#3da6f9';

            break;
            
        case 'color-green':
            
            $brandColor         = '#4CAF50';
            $brandColorLight    = '#66d66a';

            break;
            
        case 'color-deep-orange':
            
            $brandColor         = '#FF5722';
            $brandColorLight    = '#fb7348';

            break;
            
        case 'color-blue-grey':
            
            $brandColor         = '#607D8B';
            $brandColorLight    = '#97c8e0';

            break;
            
        case 'color-teal':
            
            $brandColor         = '#009688';
            $brandColorLight    = '#05d4c0';

            break;
            
        case 'color-purple':
            
            $brandColor         = '#9C27B0';
            $brandColorLight    = '#e650ff';

            break;
            
        case 'color-light-green':
            
            $brandColor         = '#8BC34A';
            $brandColorLight    = '#9ede54';

            break;
            
        case 'color-custom':
            
            $brandColor         = $cuBrandColor;
            $brandColor         = ( !empty($brandColor) ) ? $brandColor : '#ff5252';
            
            $brandColorLight    = $cuBrandColorLight;
            $brandColorLight    = ( !empty($brandColorLight) ) ? $brandColorLight : $brandColor;

            break;

        
        default:
            
            $brandColor         = '#ff5252';
            $brandColorLight    = '#ff9f9f';

            break;
    }

    return array(
		'primaryColor'		=> $brandColor,
		'secondaryColor'	=> $brandColorLight
    );
}



function my_styles_method() {

	extract( get_color_scheme() );

	wp_enqueue_style(
		'matx-custom-colors',
		get_template_directory_uri() . '/assets/css/custom_colors.css'
	);

    $custom_colors = ".main-header.is-sticky .main-nav ul li.active a,.portfolio-category li.active {border-bottom-color: {$primaryColor}}.btn-highlight,.btn-highlight:hover{background-color: {$primaryColor}}.matx-btn-wrap .matx-primary-btn.matx-btn-brand{background: {$primaryColor}}@-webkit-keyframes cpScale{0%,100%{-webkit-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}@-moz-keyframes cpScale{0%,100%{-webkit-transform:scale(1);-ms-transform:scale(1);-moz-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);-ms-transform:scale(.7);-moz-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}@-o-keyframes cpScale{0%,100%{-webkit-transform:scale(1);-ms-transform:scale(1);-o-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);-ms-transform:scale(.7);-o-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}@keyframes cpScale{0%,100%{-webkit-transform:scale(1);-ms-transform:scale(1);-moz-transform:scale(1);-o-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);-ms-transform:scale(.7);-moz-transform:scale(.7);-o-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}@-webkit-keyframes cpScaleReverse{0%,100%{-webkit-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}@-moz-keyframes cpScaleReverse{0%,100%{-webkit-transform:scale(1);-ms-transform:scale(1);-moz-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);-ms-transform:scale(.7);-moz-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}@-o-keyframes cpScaleReverse{0%,100%{-webkit-transform:scale(1);-ms-transform:scale(1);-o-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);-ms-transform:scale(.7);-o-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}@keyframes cpScaleReverse{0%,100%{-webkit-transform:scale(1);-ms-transform:scale(1);-moz-transform:scale(1);-o-transform:scale(1);transform:scale(1);background-color: {$primaryColor};color:#fff}50%{-webkit-transform:scale(.7);-ms-transform:scale(.7);-moz-transform:scale(.7);-o-transform:scale(.7);transform:scale(.7);background-color:#fff;color: {$primaryColor}}}.is-invalid .mdl-textfield__label:after,.single-imodule.rbodard-imodule:hover .icon-box{background-color: {$primaryColor}}.single-imodule.hov-white-red:hover .icon-box,.sticky .mdl-card:after,.thumb-slides-container.owl-theme .owl-controls .owl-page.active span{background: {$primaryColor}}.main-nav ul li a:hover,.main-nav ul li.active>a,.main-nav ul li:hover>a,.main-nav>ul>li ul li.menu-item-has-children:hover>a:after{color: {$primaryColor}}.main-nav ul ul li.current-menu-item a,.main-nav>ul>li ul li a:hover,.main-nav>ul>li ul li:hover>a{color: {$primaryColor}!important}.blog-page .main-nav ul li a:hover,.blog-page .main-nav ul li.active a,.color-schema-white .main-nav ul li a:hover,.color-schema-white .main-nav ul li.active a,.color-schema-white .main-nav ul li:hover a,.contact-info .ci-icons,.contact-info li a:hover,.footer-social li a:hover,.matx-service-tabbar .mdl-tabs__tab.is-active i,.mdl-card__actions.mdl-card--border a.blog-comments:hover,.mdl-card__actions.mdl-card--border a.blog-share:hover,.mdl-card__title-text a:hover,.member-social li a:hover,.portfolio-category li.active,.portfolio-meta i,.post-meta a:hover,.pricing-table.recommended-plan .plan-price span,.satistic .top i,.share-social li a:hover,.single .banner-content .share-social li a:hover>*,.single-imodule.clscheme-light .icon-box i,.single-imodule.csch-tp-red .icon-box i,.single-imodule.imodule-slide .icon-box i,.single-imodule.rbodard-imodule .icon-box i,.tab-histry span,.team-style-2 .team-member .member-info .member-role,.team-style-2 .team-member .social li a:hover,.wcu-collapse .collapse-label .icwrap,.wcu-collapse li.init-remove-color .icwrap,.why-chose-us-cards.specialty-slider-card .card-head{color: {$primaryColor}}.styled-paginantion .owl-page.active span,.styled-paginantion.colorsch-white .owl-page.active span,.tweetSlider.styled-paginantion.colorsch-black .owl-page.active span,.tweetSlider.styled-paginantion.colorsch-white .owl-page.active span{background: {$primaryColor}!important;border-color: {$primaryColor}!important}.single-imodule .icon-box i{color: {$primaryColor}}.progress-bar-L1{background-color: {$primaryColor}}.wcu-collapse li.collapse-open,.wcu-collapse li.collapse-open .collapse-label,.wcu-collapse li.init-color,.wcu-collapse li.init-color .collapse-label{background: {$primaryColor}}.matx-service-tabbar .mdl-tabs__tab.is-active:after{background: {$primaryColor}!important}.shot-count-inner .mdl-button.favorited,.shot-count-inner .mdl-button.favorited:focus{background: {$primaryColor}}.sweet-alert button.cancel{background: {$primaryColor}!important}.portfolio-box-style-2 .single-portfolio .pf-overlay,.portfolio-box-style-2 .single-portfolio .protfolio-image .pf-overlay,.portfolio-box-style-3 .single-portfolio .pf-overlay,.portfolio-box-style-3 .single-portfolio .protfolio-image .pf-overlay{background: ".hex2rgba($primaryColor,'.8')."}.map-buttons{background-color: ".hex2rgba($primaryColor, '.8')."}.map-buttons:hover{background-color: ".hex2rgba($primaryColor, '.5')."}.comment-reply:hover,.widget_calendar #wp-calendar tbody td:not(.pad):hover{background: {$primaryColor}}.comment-text ul li:before,.post-entry ul li:before,.tagcloud a:hover{background-color: {$primaryColor}}.comment-text blockquote,.post-entry blockquote{border-left:5px solid {$primaryColor}}.comment-reply-title a:hover{color: {$primaryColor}!important}.fullwidth-pagination a:hover,.logged-in-as a:hover,.single-pf-content a,.widget ul li a:hover,.widget_calendar #wp-calendar a,.widget_calendar #wp-calendar tbody td:not(.pad) a{color: {$primaryColor}}.twitter-info .tweet-text a,.twitter-info .tweet-text p a{ color: {$secondaryColor}}.search-bar > .search-bg,.matx-revslider-brand-btn{background-color: {$primaryColor}!important}.matx-option-panel-toggle:hover,matx-option-panel-toggle:focus,matx-option-panel-toggle.active,.matx-option-panel-toggle{color: {$primaryColor} !important}";

	wp_add_inline_style( 'matx-custom-colors', $custom_colors );

}

add_action( 'wp_enqueue_scripts', 'my_styles_method' );