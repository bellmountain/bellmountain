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


	// Portfolio Isotop

	var portfolioArea = jQuery('[data-action="portfolio"]');

	if ( portfolioArea.length > 0 ) {

		portfolioArea.each(function(){

			var $this = jQuery(this);
			var $self = $this;

			var portfolioIsotop = $this.find('.protfolio-items');

			// init Isotope
			var loaded = 0, loadMore = true, currentFilter = '*',
				$loadMoreBtn = $this.find('[data-action="portfolioLoadItem"]'),
				$ajaxItemsDiv = $this.find('[data-action="portfolioInitItem"]'),
				loadMoreItem = $this.data('loadmore'),
				portfolioStyle = $this.data('portfolio-style');

			var portfolioMsnry = portfolioIsotop.isotope({
				isOriginLeft: !window.RTL_Enabled,
				itemSelector: '.single-portfolio',
				layoutMode: 'fitRows',
				transitionDuration: '.6s',
				hiddenStyle: {
					opacity: 0,
					transform: "scale(.85)"
				},
				visibleStyle: {
					opacity: 1,
					transform: "scale(1)"
				}
			});

			$this.find('.portfolio-category .filter').on( 'click', function(e) {

				e.preventDefault();

				if( $loadMoreBtn.length > 0 ) {
					$loadMoreBtn.removeAttr('disabled');
				}


				if ( jQuery(this).hasClass('active') ) {
					return false;
				} else {
					jQuery(this).addClass('active').siblings('li').removeClass('active');
				}

				var $this = jQuery(this);
				var filterValue = $this.data('target');

				if ( filterValue == '*' ) {
					currentFilter = '*';
				} else {
					currentFilter = $this.text();	
				}

				// set filter for Isotope
				portfolioMsnry.isotope({ filter: filterValue });

				// Refresh skrollr elements
				var handler = setTimeout(function(){
					if ( window.VC_Skrollr ) {
						window.VC_Skrollr.refresh();
					}
					clearTimeout(handler);
				}, 1500);

				return jQuery(this);
			});

			var loadData = function(data, $btn) {
				var lists, loadedIds = [], target = $this.find('.portfolio-category .filter.active').data('target');

				portfolioIsotop.children().each(function(){
					loadedIds.push(jQuery(this).attr('id'));
				});

				lists = jQuery( data ).find('.single-portfolio');

				loadMore = ( lists.length < 1 ) ? false : true;

				if ( loadMore === true ) {

					$ajaxItemsDiv.html(lists).imagesLoaded().then(function(){

						for (var i = 0; i < lists.length; i++) {

							var $this = $ajaxItemsDiv.children().first();

							if ( $this.index() > -1 ) {

								portfolioMsnry.isotope( 'insert', $this );
								
								// Refresh skrollr elements
								var handler = setTimeout(function(){
									if ( window.VC_Skrollr ) {
										window.VC_Skrollr.refresh();
									}
									clearTimeout(handler);
								}, 1500);

								$btn.removeAttr('disabled');
							}
						}
					});

				} else {

					if ( target == '*' ) {
						sweetAlert("Sorry", "There are no items", "info");
					} else {
						sweetAlert("Sorry", "There are no "+currentFilter+" items", "info");
					}

					$btn.attr('disabled', 'disabled');
				}
			};

			if ( $loadMoreBtn.length > 0 ) {

				$loadMoreBtn.on( 'click', function(e) {

					e.preventDefault();

					var $this = jQuery(this),
						offset = $this.closest('[data-action="portfolio"]').find('.protfolio-items .single-portfolio:visible').length,
						loadMore = loadMoreItem || 3,
						categories = [];

					if ( currentFilter == "*" ) {


						$self.find('.portfolio-category .filter').each(function(){

							var dataTarget = jQuery(this).data('target');
							if ( dataTarget != '*' ) {
								categories.push( dataTarget.substring(1) );
							}

						});

					} else {
						
						categories = [ $self.find('.portfolio-category .filter.active').data('target').substring(1) ];

					}

					$this.attr('disabled', 'disabled'); 
					jQuery.ajax({
						cache: false,
					    url: portfolioData.url,
					    type : "POST",
					    data : {
					    	action 	: 'matx_portfolio_more',
					    	offset 	: offset,
					    	limit 	: loadMore,
					    	term 	: categories,
					    	pStyle 	: portfolioStyle
					    },
					    
					    success: function(data) {
					    	loadData( data, $this );
					    }
					});

				});

			}

		});

	}

}); // end ready()



jQuery(window).load(function(){

	/* Portfolio masonry re layout */
	jQuery('.protfolio-items').each(function(){

		if ( jQuery(this).data('isotope') ) {
			jQuery(this).isotope('layout');
		}

	});

});