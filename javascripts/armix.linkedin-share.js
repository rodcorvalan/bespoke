jQuery(document).ready(function($) {
	
	jQuery('.linkedin-share').click(function(event) {
	
		event.preventDefault();

		var url = jQuery(this).attr('href');
		var title = jQuery(this).data('title');

		window.open('http://www.linkedin.com/shareArticle?mini=true&url='+escape(url)+'&title='+title, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600')
	});

});