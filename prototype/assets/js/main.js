$(function() {
	$('body').on('click', '.js-login-btn', function(e) {
		e.preventDefault();
		$('.js-login-form').toggleClass('hidden');
	});

	$('body').on('click', '.js-form-toggle', function(e) {
		var $target = $('.js-forms').find($(this).data('target'));
		$('.js-forms form').not($target).addClass('hidden');
		$target.removeClass('hidden');
	});
});