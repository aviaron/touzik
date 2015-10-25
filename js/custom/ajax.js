$(function() {
	var $list = $('.homepage-box-list');

	$list.sortable({ placeholder: 'placeholder', handle: '.handle' })
		.on('sortupdate', function(ev, ui) {
			var data = $list.find('li').toArray().map(function(item){
				return $(item).data('post-id');
			});

			$.post(Touzik.admin_url, { list: data, action: 'homepage-shuffle' });
		});

	$list.on('click', 'li .remove', function() {
		$item = $(this).closest('li');

		$.post(Touzik.admin_url, { postId: $item.data('post-id'),
															 action: 'homepage-remove' })
			.done(function() { $item.fadeOut(function() { $(this).remove(); }); });
	});

	var $spinner = $('<div>').addClass('loading-spinner').appendTo('body');
	$(document)
		.ajaxStart(function() { $spinner.fadeIn('fast'); })
		.ajaxStop(function() { $spinner.fadeOut('fast'); });

	$.ajaxPrefilter(function(options, originalOptions, jqXHR) {
		jqXHR.setRequestHeader('X-Touzik-Nonce', Touzik.nonce);
	});
});
