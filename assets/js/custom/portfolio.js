"use strict";

jQuery(document).ready(function() {
	
	// Magnific Popup For Portfolio items
	jQuery('.protfolio-items').magnificPopup({
		ajax: {
			settings: {
				cache: false
			}
		},
		delegate: 'a.portfolio-custom-popup',
		type: 'ajax',
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});

	jQuery('.protfolio-items').parent().magnificPopup({
		delegate: 'a.portfolio-default-popup',
		type: 'image',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
		},
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});

	// Magnific Popup For Portfolio Details
	jQuery('body').magnificPopup({
		ajax: {
			settings: {
				cache: false
			}
		},
		delegate: 'a.ajax-portfolio-details',
		type: 'ajax',
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});

	// Portfolio Details Attachment Change
	jQuery('body').delegate('a.portfolio-details-image-link', 'click', function(e){
		e.preventDefault();
		jQuery(this).addClass('active').siblings('a').removeClass('active');
		var image = '<img src="'+ jQuery(this).data('attachment-src') +'" alt="'+jQuery(this).data('attachment-alt')+'">';
		jQuery(this).closest('.profolio-preview').find('.pre-body-inner').html(image);
	});

	// Portfolio Details Popup Close
	jQuery('body').delegate('.pre-close a', 'click', function(e){
		e.preventDefault();
		var magnificPopup = jQuery.magnificPopup.instance;
		magnificPopup.close();
	});

	// Portfolio attachment zoom
	jQuery('body').delegate('.pre-body-inner img', 'click', function(e){
		jQuery(this).closest('.profolio-preview').toggleClass('zoomed');
	});

}); // end ready()

