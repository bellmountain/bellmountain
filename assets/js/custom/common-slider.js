"use strict";


jQuery(document).ready(function() {

	/* Brief Slider */

	
	var commonSlider = jQuery('[data-action="commonSlider"]');

	if ( commonSlider.length > 0 ) {

		commonSlider.each(function() {

			var Config = jQuery(this).data('slider-config');

			var Options = {};

			console.log(Config);

			var itemsCustom = [
				[479, Config.mobile],
				[768, Config.tablet],
				[600, Config.smallTablet],
				[979, Config.smallDesktop],
				[1199, Config.desktop],
			];

			if( Config.singleItem != 'yes' ) {
				Options.itemsCustom = itemsCustom;
			} else {
				Options.singleItem = true;
			}

			Options.stopOnHover = ( Config.stopOnHover == 'yes' ) ? true : false;
			Options.autoPlay = ( Config.autoPlay == 'yes' ) ? true : false;

			commonSlider.owlCarousel( Options );


		});






		// var briefSliderController = jQuery('.brief-slider-wrap .slider-cntrl a');

		// if ( briefSliderController.length > 0 ) {

		// 	briefSliderController.on('click', function(e){

		// 		e.preventDefault();

		// 		var briefSliderData = jQuery(this).closest('.brief-slider-wrap').find('[data-action="briefSlider"]').data('owlCarousel');

		// 		jQuery(this).hasClass('left-arrow') ? briefSliderData.prev() : briefSliderData.next();

		// 	});
		// }
	}
	
 
}); // end ready();

 