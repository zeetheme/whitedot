jQuery(document).on( 'click', '.whitedot-notice .notice-dismiss', function() {

	jQuery.ajax({
		url: ajaxurl,
		data: {
			action: 'whitedot_dismiss_notice'
		}
	})
})