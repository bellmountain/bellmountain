

jQuery(document).ready(function($) {
	
	var postFormats = jQuery('#post-formats-select [name="post_format"]'),
		formatMetaboxID = jQuery('div[id^=_matx_post_format]');


	var currentItem = jQuery('#post-formats-select [name="post_format"]:checked').attr('id');


	if(currentItem.length > 0 ){
		switch (currentItem) {
			case 'post-format-gallery':

				jQuery('#_matx_post_format_gallery_metabox').addClass('postbox-show');

				break;
			case 'post-format-video':

				jQuery('#_matx_post_format_video_metabox').addClass('postbox-show');

				break;
			case 'post-format-audio':

				jQuery('#_matx_post_format_audio_metabox').addClass('postbox-show');

				break;
			case 'post-format-quote':

				jQuery('#_matx_post_format_quote_metabox').addClass('postbox-show');

				break;
			default:
				jQuery('div[id^="_matx_post_format"]').hide();
				break;
		}
	}

	if( postFormats.length > 0 ) {
		postFormats.on('change', function (e) { 
			var currentChecked = $(this).attr('id');
			var currentVal = $(this).val();

			switch (currentChecked) {
				case 'post-format-gallery':

					var moxItem = jQuery('#_matx_post_format_gallery_metabox');

					moxItem.toggleClass('postbox-show');
					moxItem.siblings('div[id^="_matx_post_format"]').addClass('postbox-hide').removeClass('postbox-show');

					break;
				case 'post-format-video':

					var moxItem = jQuery('#_matx_post_format_video_metabox');

					moxItem.toggleClass('postbox-show');
					moxItem.siblings('div[id^="_matx_post_format"]').addClass('postbox-hide').removeClass('postbox-show');

					break;
				case 'post-format-audio':

					var moxItem = jQuery('#_matx_post_format_audio_metabox')

					moxItem.toggleClass('postbox-show');
					moxItem.siblings('div[id^="_matx_post_format"]').addClass('postbox-hide').removeClass('postbox-show');

					break;
				case 'post-format-quote':

					var moxItem = jQuery('#_matx_post_format_quote_metabox');

					moxItem.toggleClass('postbox-show');
					moxItem.siblings('div[id^="_matx_post_format"]').addClass('postbox-hide').removeClass('postbox-show');

					break;
				case 'post-format-0':

					formatMetaboxID.addClass('postbox-hide').removeClass('postbox-show');

					break;
				default:
					 
					break;
			} 

			// ajax call

			jQuery.ajax({
				url: ajaxurl,
				type: 'POST',
				data: {
					action : 'getpostformat',
					currentPostFormat : currentVal
				},
				complete : function (res) {

				},
				error: function (error) {
					
				}
			});
			



		});
	}



});

