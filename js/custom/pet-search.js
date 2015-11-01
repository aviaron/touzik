$(function(){

	var $form = $('#pet-search-form'),
			$container = $('.homepage-box-list');

	$form.on('submit', function(e) {
		e.preventDefault();

		var action = $(this).attr('action'),
				params = $(this).serialize();

		$.get(action, params).then(function(output){
			$container.fadeOut('fast', function(){
				$(this).html(output).fadeIn('fast');
			});
		});
	});

	$form.on('change', ':input', function() {
		$form.submit();
	});

});
