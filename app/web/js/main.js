$(function() {
	$('body').on('click', '.js-login-btn', function(e) {
		e.preventDefault();
		$('.js-login-form').toggleClass('hidden');
	});

	$('body').on('click', '.js-form-toggle', function(e) {
		var $errorContainer = $('.js-errors').empty();
		var $successContainer = $('.js-success').empty();
		var $target = $('.js-forms').find($(this).data('target'));
		$('.js-forms form').not($target).addClass('hidden');
		$target.removeClass('hidden');
	});

	$('body').on('submit', '.js-forms form', function(e) {
		e.preventDefault();
		var $errorContainer = $('.js-errors').empty();
		var $successContainer = $('.js-success').empty();
		var $form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			success: function(data) {
				$form.trigger('reset');
				$successContainer.append('<p class="success">Operatsioon oli edukas</p>');
			},
			error: function(data) {
				var response = JSON.parse(data.responseText);
				for (var prop in response) {
			        if(!response.hasOwnProperty(prop)) continue;
			        $errorContainer.append('<p class="error">'+response[prop]+'</p>');
			    }
			}
		});
	});
});