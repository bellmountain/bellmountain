<?php
/**
 * @var $this WPBakeryShortCode_VC_Column
 */

$output = $font_color = $el_class = $css_animation = $width = $offset = $animation = $duration = $delay = '' ;


extract(shortcode_atts(array(
	'font_color'	=> '',
    'el_class' 		=> '',
    'width' 		=> '1/1',
    'css' 			=> '',
	'offset' 		=> '',
	'css_animation' => '',
	'animation'		=> '',
	'duration'		=> '',
	'delay'			=> '',
), $atts));

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);
$width = vc_column_offset_class_merge($offset, $width);
$el_class .= ' wpb_column vc_column_container';
$style = $this->buildStyle( $font_color );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

// box animation
$animation = ($animation) ? $animation : false;


if($animation != false ) {
	$css_class 	.= ' wow '.$animation;
	$duration 	= $duration ? 'data-wow-duration="'.$duration.'"' : 'data-wow-duration="1s"';
	$delay 		= $delay ? 'data-wow-delay="'.$delay.'"' : '';
} else {
	$duration = $delay = '';
}

// $css_class .= $this->getCSSAnimation($css_animation);
$output .= "\n\t".'<div class="'.$css_class.'" '.$duration.' '.$delay.' '.$style.'>';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class)."\n";

echo $output;