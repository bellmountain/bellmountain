"use strict";

jQuery(document).ready(function($) {
	
	var header = jQuery('header.main-header');
	var headerstyle = header.data('header-style');

	if( headerstyle == 'sticky_header' ){
		
		header.addClass('is-sticky');

	} else if( headerstyle == 'animated_header' ) {

		jQuery(window).load(function(){

			if( jQuery(window).scrollTop() > 0 ) {
				header.addClass('is-sticky');
			}

		});

		jQuery(window).on('scroll', function(e){

			if ( jQuery(this).scrollTop() > 0 ) {
				header.addClass('is-sticky');
			} else {
				header.removeClass('is-sticky');
			}

		});

	}
});
