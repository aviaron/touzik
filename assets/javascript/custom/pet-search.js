$(function(){

	var $form = $('#pet-search-form'),
			$inputs = $form.find(':input'),
			$container = $('.homepage-box-list-results');

	$form.on('submit', function(e) {
		e.preventDefault();

		var action = $(this).attr('action'),
				params = $(this).serialize();

		$inputs.attr('disabled', true);

		$.get(action, params).then(function(output){
			$container.fadeOut('fast', function(){
				$(this).html(output).fadeIn('fast');
				$inputs.attr('disabled', false);
			});
		});
	});

	$form.on('change', ':input', function() {
		$form.submit();
	});

});
