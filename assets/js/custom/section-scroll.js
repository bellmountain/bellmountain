"use strict";

function getNextSection(section) {
	var nextSec = section.next();
	if ( nextSec.hasClass('section-scroll') ) {
		return nextSec;
	} else {
		return getNextSection( nextSec );
	}
}

function getActiveSectionLength(section, sections) {
	return sections.index(section);
}
	
jQuery(document).ready(function() {
	
	backButton = jQuery('#backToTop');
	header = jQuery('header.main-header');

	// BackToTop
	var backToTop = {

		button : backButton,

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
		},

		enableBackToTop : function() {
			var self = this;
			if ( !self.button.hasClass('rotate') ) {
				self.button.addClass('rotate').data('action', 'top');
			}
		},

		enableSectionCall : function() {
			var self = this;
			if ( self.button.hasClass('rotate') ) {
				self.button.removeClass('rotate').data('action', 'bottom');
			}
		}
	};

	backButton.on('click', function(){

		if ( jQuery(this).data('action') && jQuery(this).data('action') == 'top' ) {

			jQuery('html, body').stop(true, true).animate({
				'scrollTop' : '0px'
			}, 1500, 'easeOutQuad');

		} else {
			var currentSection = jQuery('.section-scroll.section-active');
			var nextSection = getNextSection( currentSection );

			jQuery('html, body').stop(true, true).animate({
				'scrollTop' : ( nextSection.offset().top - header.outerHeight() )+'px'
			}, 800, 'easeOutQuad');
		}

	});

});