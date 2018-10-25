jQuery(document).ready(function($) {
	jQuery('.facebook-share').click(function(event) {
		
		event.preventDefault();
		
		var url = jQuery(this).attr('href');
		FB.ui({
			method: 'share',
			mobile_iframe: true,
			href: url,
		}, function(response){});

	});
});