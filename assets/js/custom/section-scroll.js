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

	var sections = jQuery(".section-scroll");


	if ( sections.length > 0 ) {

		sections.waypoint({

			handler: function(event, direction) {

				var active_section, active_section_index, prev_section_index;

				active_section = jQuery(this);
				active_section_index = getActiveSectionLength(jQuery(this), sections);
				prev_section_index = ( active_section_index - 1 );

				if (direction === "up") {
					active_section = sections.eq(prev_section_index);
				}

				// Updating the section active class
				sections.removeClass('section-active');
				active_section.addClass('section-active');

				// BackToTop on click button functions
				if ( active_section.attr('id') == 'contact' ) {
					jQuery('.menu-smooth-scroll').parent('li').removeClass('active');
					backToTop.enableBackToTop();
				} else {
					backToTop.enableSectionCall();
				}

				// BackToTop show hide
				if ( active_section.attr('id') == 'home' ) {
					backToTop.hide();
				} else {
					backToTop.show();
				}

				/* get site url */
				var MenuData = window.menuAttr;

				// Menu link active class update
				window.active_link = jQuery('.menu-smooth-scroll[href="'+MenuData.menuprefix+'#' + active_section.attr("id") + '"]');

				active_link.parent('li').addClass("active").siblings().removeClass("active");

				if ( active_section.attr('id') == 'home' ) {
					jQuery('.menu-smooth-scroll').parent('li').removeClass('active');
				}

			},

			offset: '35%'
		});
	}

});