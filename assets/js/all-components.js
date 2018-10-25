"use strict";

var backButton, header;

function whyChoseUsHeightFix() {

	var $context = jQuery('.what-we-do-content-start');

	$context.each(function(){
		var whatWeNeedItems = jQuery(this).find('.why-chose-us-cards');
		var whatWeNeedHeight = whatWeNeedItems.removeAttr('style').getMaxHeight();
		whatWeNeedItems.css('height', whatWeNeedHeight+'px');
	});

}

jQuery(document).ready(function(){


	jQuery('.menu-smooth-scroll').scrollingTo({
		easing : 'easeOutQuad',
		extraSpace : 60,
		callbackBeforeTransition : function(){
			menuFun.hide();
		}
	});


	// progressbar animation

	jQuery('[data-action="progress-bar"]').waypoint({

		handler: function(event, direction) {

			jQuery('[data-action="progress-bar"]').find('.progress-bar-L1').each(function(){
				var width = jQuery(this).data('width');
				jQuery(this).css('width', width);
			});
			
		},
		
		offset: '90%'

	});

	// accordion js

	var accordions = jQuery('[data-action="accordionWithImage"]');

	if ( accordions.length > 0 ) {
		accordions.each(function(){

			var $this = jQuery(this);
			var $thumbWrap = $this.find('.acc-thumb-area');

			$this.find('.single-acc-item .collapse-label').on('click', function(){
				var $parent = jQuery(this).parent();

				if ( $this.find('.collapse-content:animated').length < 1 ) {
					if( !$parent.hasClass('collapse-open') ) {

						$parent.addClass('init-color').removeClass('init-remove-color');
						jQuery(this).siblings('.collapse-content').slideDown(function(){
							$parent.addClass('collapse-open');
						});

						$parent.siblings('.collapse-open').removeClass('init-color').addClass('init-remove-color').find('.collapse-content').slideUp(function(){
							jQuery(this).parent().removeClass('collapse-open');
						});

						var image = $thumbWrap.find('img');

						if ( image.length > 0 && $parent.data('image-src') ) {

							image.animate({
								'opacity': '0'
							}, 100, function(){
								jQuery(this).attr( 'src', $parent.data('image-src') );
								jQuery(this).attr( 'alt', $parent.data('image-alt') );
							});
							
							image.one('load', function(){
								image.animate({
									'opacity': '1'
								}, 200);
							});
						}
					}
				}

			});

		});
	}


	/* why Chose Us Slider */

	var whyChoseUsSlider = jQuery('[data-action="whyChoseUsSlider"]');

	if ( whyChoseUsSlider.length > 0 ) {

		whyChoseUsSlider.owlCarousel({
			slideSpeed : 500,
			itemsCustom : [
				[0, 1],
				[540, 2],
				[992, 3],
				[1200, 4]
			],
			itemsMobile : false,
			pagination : false
		});

		whyChoseUsHeightFix();

		var whyChoseUsSliderController = jQuery('.wcu-slider-wrap .slider-cntrl a');

		if ( whyChoseUsSliderController.length > 0 ) {

			whyChoseUsSliderController.on('click', function(e){

				e.preventDefault();

				var whyChoseUsSliderData = jQuery(this).closest('.wcu-slider-wrap').find('[data-action="whyChoseUsSlider"]').data('owlCarousel');

				jQuery(this).hasClass('left-arrow') ? whyChoseUsSliderData.prev() : whyChoseUsSliderData.next();

			});
		}
	}




	/* team slider */

	function matxTeamSlider () {
		
		var teamSlider = $('[data-action="teamSlider"]');


		if ( teamSlider.length > 0 ) {

			teamSlider.each(function() {

				var self = $(this),
					settings = self.data('settings');

				var teamSliderItem = 4;

				if( settings.item && settings.item > 0 ) {
					teamSliderItem = settings.item;
				}

				$(this).owlCarousel({
					itemsCustom : [
						[0, 1],
						[400, 1],
						[540, 1],
						[603, 2],
						[768, 2],
						[992, teamSliderItem],
						[1200, teamSliderItem]
					],
					autoPlay : settings.autoplay,
					stopOnHover : true,
					itemsMobile : false,
					pagination : true
				});
			});
		}
	}

	matxTeamSlider();
	


	/* testimonial slider */

	function matxTestimonialSlider() {

		var testimonialSlider = $('[data-action="testimonialSlider"]');

		if ( testimonialSlider.length > 0 ) {
			testimonialSlider.owlCarousel({
				singleItem : true,
				pagination : true,
				autoPlay : false, 
			});
		}

		if( testimonialSlider.hasClass('js-nav-arrow-enabled')) { 

			$('.ts-slider-nav').on('click', function (e) {
				e.preventDefault();

				var tsData = $(this).closest('.wpb_wrapper').find(testimonialSlider).data('owlCarousel');

				if( $(this).hasClass('right-arrow')) {
					tsData.next();
				} else {
					
					tsData.prev();
				}
			});
		}
	}
	
	matxTestimonialSlider();



	/* clients slider */

	var clientSlider = jQuery('[data-action="clientSlider"]');

	if ( clientSlider.length > 0 ) {
		clientSlider.owlCarousel({
			items : 4,
			itemsDesktop : [1000,4],
			itemsDesktopSmall : [900,4],
			itemsTablet: [600,2],
			itemsMobile : false,
			pagination : false,
			autoPlay : true
		});
	}


	/* show video popup  */
	jQuery('.show-video').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false
	});

});

jQuery(window).load(function(){
	// Why Chose Us Height Fix
	whyChoseUsHeightFix();

}(jQuery));


doneResize(function(){

	// Why Chose Us Height Fix
	whyChoseUsHeightFix();
});