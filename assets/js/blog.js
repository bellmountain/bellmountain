"use strict";

// -- After the document is ready

jQuery(function() {

	// Find all YouTube and Vimeo videos
	var $allVideos = jQuery("iframe[src*='www.youtube.com'], iframe[src*='player.vimeo.com'], iframe[src*='www.dailymotion.com'], iframe[src*='www.google.com/maps'], iframe[src*='instagram.com'], iframe[src*='vine.co'], iframe[src*='embed.gettyimages.com'], iframe[src*='alistapart.com']");

	// Figure out and save aspect ratio for each video
	$allVideos.each(function( index, item ) {
		
		var $el = $(item);

		if ( this.height && this.width ) {
			$el.data( 'aspectRatio', this.height / this.width ).removeAttr('width height');
		} else {
			$el.data( 'aspectRatio', $el.height() / $el.width() ).removeAttr('width height');
		}

	});

	// When the window is resized
	$(window).resize(function() {
		// Resize all videos according to their own aspect ratio
		$allVideos.each(function( index, item ) {
			var $el = $(item);
			// Get parent width of this video
			var newWidth = $el.width();
			$el.height(newWidth * $el.data('aspectRatio'));
		});

		// Kick off one resize to fix all videos on page load
	}).resize();

});

function ajax_post_slider_active() {

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
	}
}

function ajax_post_player_active() {

	jQuery('.player').each(function(){

		jQuery(this).cp_jw_player();

	});
}

function updatePostScripts( postWraper ) {

	if( componentHandler ) { componentHandler.upgradeAllRegistered(); }

	var handler = setTimeout(function(){

		ajax_post_slider_active();

		if ( postWraper.data('isotope') ) {
			postWraper.isotope('layout');
		}

		clearTimeout( handler );

	}, 50);

	ajax_post_player_active();

}

var $ajaxItemsDiv = jQuery('[data-action="blogPostInitItem"]');
var loadMore = true;
function loadData(data, postWraper, $btn) {
	var lists, loadedIds = [];

	postWraper.children().each(function(){
		loadedIds.push(jQuery(this).attr('id'));
	});

	lists = jQuery( data ).find('.single-blog-post');

	loadMore = ( lists.length < 1 ) ? false : true;

	if ( loadMore === true ) {

		if ( postWraper.data('isotope') ) {

			$ajaxItemsDiv.html(lists).imagesLoaded().then(function(){

				lists.each(function(){

					blogMsnry.isotope( 'insert', jQuery(this) );

					$btn.removeAttr('disabled').parent().removeClass('loading');
					updatePostScripts( postWraper );

				});

			});

		} else {

			$ajaxItemsDiv.html(lists).imagesLoaded().then(function(){

				lists.each(function(){

					postWraper.append( jQuery(this) );
					$btn.removeAttr('disabled').parent().removeClass('loading');
					updatePostScripts( postWraper );

				});

			});

		}

	} else {

		$btn.parent().removeClass('loading').addClass('no-post-found');

	}
}

jQuery(document).ready(function(){

	// Gallery Post

	jQuery('.gallery-item a').magnificPopup({
		disableOn: 400,
		type: 'ajax',
		gallery: {
			enabled: true
		},
		callbacks: {
			parseAjax: function( mfpResponse ) {
				var $data = $('<div class="matx-post-content matx-post-gallery"></div>');
				$data.append( $(mfpResponse.data).find('.single-post-content') );

				mfpResponse.data = $data;
			}
		},
		mainClass: 'mfp-fade'

	});

	/* blog Mesonary */

	(function(){
		if ( jQuery('#blog-posts-mesonary').length > 0 ) {
			window.blogMsnry = jQuery('#blog-posts-mesonary').isotope({
				itemSelector: '.single-blog-post',
				layoutMode: 'masonry'
			});
		}
	}());

	/* Search */
	(function(){

		var sCon = jQuery('#fullSearch');
		jQuery('.search-open').on('click', function(e){

			var scale = jQuery(window).width() * 2 / 45;
			
			sCon.find('.search-bg').css({
				'transform': 'scale('+scale+')',
				'top': e.pageY+'px',
				'left': e.pageX+'px'
			});

			sCon.addClass('show').removeClass('hide-bg');

			var handler = setTimeout(function(){
				sCon.addClass('show-contents');
				clearTimeout(handler);

				jQuery("#search-blog" ).focus();
			}, 600);
		});

		jQuery('.search-close').on('click', function(e){
			if( sCon.hasClass('show')){
				sCon.addClass('hide-bg').removeClass('show-contents');
				var handler = setTimeout(function(){
					sCon.removeClass('show');
					clearTimeout(handler);
				}, 600);
			}
		});
		
	}());


	/* BackToTop */
	window.backToTop = {

		button : jQuery('#backToTop'),

		show : function() {
			var self = this;
			if ( self.button.hasClass('hide-bottom') ) {
				self.button.removeClass('hide-bottom');

				var handler = setTimeout(function(){
					self.button.removeClass('shade-on');
					clearTimeout(handler);
				}, 800);
			}
		},

		hide : function() {
			var self = this;
			if ( !self.button.hasClass('hide-bottom') ) {
				self.button.addClass('shade-on').addClass('hide-bottom');
			}
		}
	};

	backToTop.button.on('click', function(){

		jQuery('html, body').stop(true, true).animate({
			'scrollTop' : '0px'
		}, 600, 'easeOutQuad');

	});


	// Ajax Post Load
	var loadButton = jQuery('#ajaxPostLoad button');
	var offset;
	var postWraper = jQuery('.main-post.post-groups');
	var totalPost = window.BlogPostData.all_post;
	var blogstyle = postWraper.data('blog-style');
	var numPosts = ( postWraper.length > 0 ) ? postWraper.data('ajaxpost') : 3;
	var currentQueryObj = ( postWraper.length > 0 ) ? postWraper.data('query') : false;
	var scroll = 0;
	var direction = 'down';
	var btnParent = loadButton.parent();

	if( loadButton.length > 0 ) {
		loadButton.on('click', function (e) {

			e.preventDefault();
			var currentBtn = jQuery(this);
			
			offset = jQuery('.single-blog-post:visible').length;

			jQuery.ajax({
				url 	: window.BlogPostData.admin_url,
				cache 	: false,
				type 	: "GET",
				data 	: {
					action 		: 'matx_ajax_post',
					offset 		: offset,
					blogstyle   : blogstyle,
					numPosts 	: numPosts,
					query 		: currentQueryObj
				},
				beforeSend : function () {

					currentBtn.attr('disabled', 'disabled').parent().addClass('loading');

				},
				success : function (data, textStatus, jqXHR ) {

					loadData( data, postWraper, currentBtn );

				},
				error : function (jqXHR, textStatus, errorThrown ) {

					console.log('error');

				}
			});
		});

		/* disabled scrolltotop button
		jQuery(window).on('scroll', function(e) {
			var newScroll = jQuery(this).scrollTop();
			var winHeight = jQuery(window).height();
			direction = ( newScroll > scroll ) ? 'down' : 'up';
			scroll = newScroll;

			if ( direction == 'down' ) {
				var btnTop = btnParent.offset().top - ( winHeight - (winHeight / 100 * 10) );
				if( scroll >= btnTop ) {
					if ( !btnParent.hasClass('no-post-found') ) {
						if ( !btnParent.hasClass('loading') ) {
							loadButton.click();
						}
					}
				}
			}

		});
		*/
	} // endif

});

jQuery(window).load(function(){

	/* Blog masonry re layout */

	if ( typeof blogMsnry !== "undefined" ) {
		blogMsnry.isotope('layout');
	}

});
/* scrolltotop disabled
jQuery(window).on('scroll', function(e){
	if ( e.currentTarget.scrollY > jQuery(window).height() ) {
		backToTop.show();
	} else {
		backToTop.hide();
	}
});
*/