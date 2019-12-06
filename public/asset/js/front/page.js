(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-appointment').ajaxForm(ajaxOptions);

$('.popup-with-zoom-anim').magnificPopup({
	type: 'inline',
	fixedContentPos: false,
	fixedBgPos: true,
	overflowY: 'auto',
	closeBtnInside: true,
	preloader: false,
	midClick: true,
	removalDelay: 300,
	mainClass: 'my-mfp-slide-bottom',
	callbacks: {
		open: function () {
			$('#modal-appointment .alert').addClass('hidden');
		}
	}
});

}).apply(this, [jQuery]);