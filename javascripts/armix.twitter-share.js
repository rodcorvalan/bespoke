jQuery(document).ready(function($) {
	
	jQuery('.twitter-share').click(function(event) {
	
		event.preventDefault();

		var url = jQuery(this).attr('href');
		var title = jQuery(this).data('title');

		window.open("https://twitter.com/share?url="+escape(url)+"&text="+title, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');

	});

});