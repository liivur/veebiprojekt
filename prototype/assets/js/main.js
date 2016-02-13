$(function() {
	$('body').on('click', '.js-login-btn', function(e) {
		e.preventDefault();
		$('.js-login-form').toggleClass('hidden');
	});
});