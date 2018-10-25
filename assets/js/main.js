"use strict";

jQuery(window).load(function(){

	// Initial Animation when Site loaded
	var handler = setTimeout(function(){
		jQuery('.init-animation').addClass('animated').css({
			"visibility": "visible",
			"animation-duration": "1s",
			"animation-name": "fadeIn"
		});
		clearTimeout(handler);
	}, 500);

});

doneResize(function(){
	
	// Update Google Map Positions
	if ( typeof map != 'undefined'  ) {
		map.setCenter({
			lat: mapOps.lat,
			lng: mapOps.lng
		});

		map.panBy(mapOps.panBy.x, mapOps.panBy.y);
	}
});
var $ = jQuery;
$(document).ready(function($){
	// Revolution Slider
	var matxRevSlider = $('[data-action="matx_revslider"]'),
		matxRevSliderArrow = {
			style : '',
			enable : false,
		};

		var matxRevSliderBullet = {
			enable : true
		};


		matxRevSlider.each(function () {

			var revSliderWrapID = $(this);

			if( revSliderWrapID.attr('id') == 'matx_revslider_2' ) {
				matxRevSliderArrow = {
					style : 'matx-revslider-2-arrow',
					enable : true,
				}
			}
			if( revSliderWrapID.attr('id') == 'matx_revslider_2' ) {
				matxRevSliderArrow = {
					style : 'matx-revslider-2-arrow',
					enable : true,
				}
			}
			if( revSliderWrapID.attr('id') == 'matx_revslider_3' ) {
				matxRevSliderBullet = {
					enable : false,
				}
			}

		    if( revSliderWrapID.revolution == undefined ){
		        revslider_showDoubleJqueryError(revSliderWrapID);
		    } else {

		        bannerRevSlider = revSliderWrapID.show().revolution({
		            sliderType:"standard",
		            jsFileLocation:"assets/libs/revolution/js/",
		            sliderLayout:"fullscreen",
		            responsiveLevels: [1240,1024,778,485],
		            gridwidth: [1400,1170,778,480],
		            gridheight: [800,700,1050,500],
		            delay: 6000,
		            shuffle: "off",

		            navigation: {
		                keyboardNavigation: "on",
		                onHoverStop: "off",
						arrows:{
							style: matxRevSliderArrow.style,
							enable: matxRevSliderArrow.enable,
							rtl:false,
							hide_onmobile:false,
							hide_onleave:true,
							hide_delay:200,
							hide_delay_mobile:1200,
							hide_under:0,
							hide_over:9999,
							tmp:'',
							left:{
								container:"slider",
								h_align:"left",
								v_align:"center",
								h_offset:30,
								v_offset:0
							},
							right:{
								container:"slider",
								h_align:"right",
								v_align:"center",
								h_offset:30,
								v_offset:0
							}
						},
		                bullets: {
		                    style: "",
		                    enable: matxRevSliderBullet.enable,
		                    hide_onmobile: false,
		                    hide_onleave: false,
		                    hide_delay: 200,
		                    hide_delay_mobile: 1200,
		                    hide_under: 0,
		                    hide_over: 9999,
		                    tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>', 
		                    direction: "horizontal",
		                    space: 10,       
		                    h_align: "center",
		                    v_align: "middle",
		                    h_offset: 0,
		                    v_offset: 50
		                }
		            },

		            lazyType: "none",
		            parallax: {
		                type: "mouse+scroll",
		                origo: "slidercenter",
		                speed: 2000,
		                levels: [1,2,3,20,25,30,35,40,45,50],
		                disable_onmobile: "on"
		            },
		            shadow: 0,
		            spinner: "spinner2",
		            autoHeight: "on",
		            disableProgressBar: "off",
		            hideThumbsOnMobile: "off",
		            hideSliderAtLimit: 0,
		            hideCaptionAtLimit: 0,
		            hideAllCaptionAtLilmit: 0,
		            debugMode: false,
		            fallbacks: {
		                simplifyAll: "off",
		                nextSlideOnWindowFocus: 'off',
		                disableFocusListener: false
		            }
		        });

				revSliderWrapID.bind("revolution.slide.onchange",function (e,data) {

					if( data.currentslide.hasClass('slider-color-schema-white') ) {

						$('body').removeClass('color-schema-white').addClass('color-schema-dark');

					} else if( data.currentslide.hasClass('slider-color-schema-dark') ) {

						$('body').removeClass('color-schema-dark').addClass('color-schema-white');

					}

				});
		    }
		});

})