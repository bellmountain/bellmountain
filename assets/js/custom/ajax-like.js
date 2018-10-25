'use strict';

jQuery(document).ready(function(){
	jQuery(document).delegate('.cp-like-button', 'click', function(e) {
		e.preventDefault();
		var button = jQuery(this);
		var post_id = button.attr('data-post-id');
		var security = button.attr('data-nonce');
		var iscomment = button.attr('data-iscomment');
		var allbuttons;
		if ( iscomment === '1' ) { /* Comments can have same id */
			allbuttons = jQuery('.sl-comment-button-'+post_id);
		} else {
			allbuttons = jQuery('.sl-button-'+post_id);
		}
		var loader = allbuttons.next('#sl-loader');
		if (post_id !== '') {
			jQuery.ajax({
				type: 'POST',
				url: simpleLikes.ajaxurl,
				data : {
					action : 'process_simple_like',
					post_id : post_id,
					nonce : security,
					is_comment : iscomment
				},
				beforeSend:function(){
					loader.html('&nbsp;<div class="loader">Loading...</div>');
				},	
				success: function(response){
					var icon = response.icon;
					var count = response.count;
					allbuttons.html(icon+count);
					if(response.status === 'unliked') {
						var like_text = simpleLikes.like;
						allbuttons.prop('title', like_text);
						allbuttons.removeClass('favorited');
					} else {
						var unlike_text = simpleLikes.unlike;
						allbuttons.prop('title', unlike_text);
						allbuttons.addClass('favorited');
					}
					loader.empty();					
				}
			});
			
		}
		return false;
	});

});
