jQuery(document).ready(function(){

	'use strict';

	// Footer logo back to top
	jQuery('.footer-logo').on('click', function(e){
		e.preventDefault();
		jQuery('html, body').stop(true, true).animate({
			'scrollTop' : '0px'
		}, 600, 'easeOutQuad');
	});

	$('body').delegate('a', 'click', function(e){
		if( $(this).attr('href') == '#' ) {
			e.preventDefault();
		}
	});
	
	// Dynamic menu side change
	jQuery('.main-nav').dynamicSubmenuSide();

	// mobile menu
	window.menuFun = {
		show: function($this){
			
			if ( !$this ) { $this = jQuery('.mobile-menu-area .active');}
			jQuery('body').addClass('active-mobile-menu');

			jQuery('#menu-back-btn').addClass('active').siblings().removeClass('active');
		},

		hide: function($this){
			if ( !$this ) { $this = jQuery('.mobile-menu-area .active'); }
			jQuery('body').removeClass('active-mobile-menu');

			jQuery('#menu-show-btn').addClass('active').siblings().removeClass('active');
		}
	};

	jQuery('.mobile-menu-area > i').on('click', function(e){
		if ( jQuery(this).attr('id') == 'menu-show-btn' ) {
			menuFun.show(jQuery(this));
		} else {
			menuFun.hide(jQuery(this));
		}
	});

	jQuery('.nav-overlay-bg').on('click', function(){
		menuFun.hide();
	});

	// jwplayer video post

	jQuery('.player').each(function(){

		jQuery(this).cp_jw_player();

	});


	// blog post slider
	(function($){

		var $blog_post_slider  = jQuery('.thumb-slides-container');

		if ( $blog_post_slider.length > 0 ) {

			$blog_post_slider.each(function(){
				jQuery(this).owlCarousel({
					singleItem : true,
				    autoPlay : true,
				    stopOnHover : true,
					slideSpeed : 800,
					pagination : true,
					transitionStyle : 'fade'
				});
			});


			jQuery('.thumb-slides-controller a').click(function(e){

				e.preventDefault();

				var blog_post_slider_data = jQuery(this).closest('.blog-post-thumb-container').children('.thumb-slides-container').data('owlCarousel');

				( jQuery(this).hasClass('left-arrow') ) ? blog_post_slider_data.prev() : blog_post_slider_data.next();
			});
		}

	}(jQuery));

	// Submit button states
	var matXForm = jQuery('.matx-form-valid');
	if ( matXForm.length > 0 ) {
		matXForm.matxSubmitValidate();	
	}


	jQuery('.sec-full').css( 'min-height',  jQuery(window).height()+'px' );


	/* mobile dropdown menu collapse */

	var submenuLiA = jQuery('.mobile-nav li.menu-item-has-children > a');
	var submenuUl = jQuery('.mobile-nav ul.sub-menu');

	submenuUl.addClass('submenu-hidden');


	if( submenuLiA.length > 0 ) {
		submenuLiA.on('click', function(e) {

			e.preventDefault();

			var submenuVisible = jQuery('.mobile-nav ul.sub-menu:not(.submenu-hidden)'),
				submenuParent = jQuery(this).closest('li.menu-item-has-children'),
				submenInner = submenuParent.children('ul.sub-menu');

			submenInner.slideToggle(200).toggleClass('submenu-hidden');

			var openULschildUL = submenInner.find('ul.sub-menu');
			var openULschildUlLi = openULschildUL.parent('li.menu-item-has-children');

			openULschildUlLi.removeClass('children-open');

			if( ! openULschildUL.hasClass('submenu-hidden') ) {
				openULschildUL.addClass('submenu-hidden').hide();
			}

			if( ! submenInner.hasClass('submenu-hidden')) {
				submenuParent.addClass('children-open');
			} else {
				submenuParent.removeClass('children-open');
			}
			
		});
	}


	/* share blog post */

	jQuery('body').delegate('.js-post-share-media li a', 'click', function(e){

		e.preventDefault();

		var $parent = jQuery(this).parent();

		if ( $parent.hasClass('fb-share') ) {
			window.open( 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(jQuery(this).attr('href')), 'facebookWindow', 'width=650,height=350');
		}

		if ( $parent.hasClass('tw-share') ) {
			window.open( 'http://twitter.com/intent/tweet?text='+ jQuery(this).closest(".mdl-card__title-text").text() +' '+ jQuery(this).attr('href'), "twitterWindow", "width=650,height=350" );
		}

		if ( $parent.hasClass('gplus-share') ) {
			window.open( 'https://plus.google.com/share?url='+encodeURIComponent(jQuery(this).attr('href')), 'googleWindow', 'width=500,height=500');
		}

		if ( $parent.hasClass('in-share') ) {
			window.open( 'http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(jQuery(this).attr('href'))+'&title='+jQuery(this).closest(".mdl-card__title-text").text(), 'linkedinWindow', 'width=650,height=450, resizable=1');
		}

	});


	jQuery('body').delegate('.matx-post-share-js li a', 'click', function(e) {

		e.preventDefault();

		var self = $(this),
			$parent = self.parent('li');

		if ( $parent.hasClass('fb-share') ) {
			window.open( 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent( self.attr('href') ), 'facebookWindow', 'width=650,height=350');
		}

		if ( $parent.hasClass('tw-share') ) {
			window.open( 'http://twitter.com/intent/tweet?text='+$parent.data('title')+'&url='+self.attr('href'), "twitterWindow", "width=650,height=350" );
		}

		if ( $parent.hasClass('gplus-share') ) {
			window.open( 'https://plus.google.com/share?url='+encodeURIComponent(self.attr('href')), 'googleWindow', 'width=500,height=500');
		}

		if ( $parent.hasClass('in-share') ) {
			window.open( 'http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent( self.attr('href') )+'&title='+$parent.data('title'), 'linkedinWindow', 'width=650,height=450, resizable=1');
		}

	});

}); // end ready()


jQuery(window).load(function(){

	// Wow init
	new WOW({
		offset: 150,
		mobile: false
	}).init();
	// Visual Composer Scroller
	setTimeout(function(){
		//if ( window.skrollr ) {
		if (false) {
			window.VC_Skrollr = window.skrollr.init();
			window.VC_Skrollr.refresh();
		}
	}, 100);


	// Hide Loader
	jQuery('#loader').fadeOut();

}());



(function(){

	function matxImageCarousel() {
		
		var CardCarousel = $('[data-action="matxImageCarousel"]');

		if ( CardCarousel.length > 0 ) {

			CardCarousel.each(function() {

				var self = $(this),
					config = self.data('settings'),
					pagination = config.p,
					autoplay = ( config.autoplay == 'false' ) ? false : true;
					nav = config.n;

				self.find('.matx-image-carousel-base').owlCarousel({
					singleItem : true,
					stopOnHover : true,
					pagination : true,
					autoPlay : autoplay 
				});

				if(nav) {

					self.find('.icon-arrow').on('click', function (e) {
						e.preventDefault();

						var Data = self.find('.matx-image-carousel-base').data('owlCarousel');

						if( $(this).hasClass('left-arrow')) {
							Data.next();
						} else {
							Data.prev();
						}
					});

				}


			});
		}
	}

	matxImageCarousel();
	


 
}());