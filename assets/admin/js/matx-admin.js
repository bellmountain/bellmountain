var pageTemplateBox, sideBarControl, blogPageLayoutStyleBox, blogPageLayoutBox;

function toggleBox( $box, status ) {
	( status ) ? $box.show() : $box.hide();
}

function updateMetaboxes() {

	var templateName = pageTemplateBox.val();
	var layoutStyle = blogPageLayoutBox.val();

	if ( templateName == 'template-home.php' ) {
		toggleBox( sideBarControl, false );
		toggleBox( blogPageLayoutStyleBox, false );
	}

	if ( templateName == 'template-fullwidth.php' ) {
		toggleBox( sideBarControl, false );
		toggleBox( blogPageLayoutStyleBox, false );
	}

	if ( templateName == 'default' ) {
		toggleBox( sideBarControl, true );
		toggleBox( blogPageLayoutStyleBox, false );
	}

	if ( templateName == 'template-blog.php' ) {
		toggleBox( blogPageLayoutStyleBox, true );

		if ( layoutStyle == 'full_width' ) {
			toggleBox( sideBarControl, false );
		} else {
			toggleBox( sideBarControl, true );
		}
	}

}



jQuery( 'document' ).ready(function(){

	pageTemplateBox = jQuery('#page_template');
	sideBarControl = jQuery('#_matx_sidebar_ctrl_metabox');
	blogPageLayoutStyleBox = jQuery('#_matx_blogpage_style_metabox');
	blogPageLayoutBox = jQuery('#_matx_blogpage_style');

	updateMetaboxes();


	pageTemplateBox.on('change', function(e){

		updateMetaboxes();

	});


	blogPageLayoutBox.on('change', function(e){

		updateMetaboxes();

	});

});