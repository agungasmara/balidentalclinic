(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-subscribe').ajaxForm(ajaxOptions);
$('#form-promotion').ajaxForm(ajaxOptions);
$('#form-message').ajaxForm(ajaxOptions);

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
			$('#modal-subscribe .alert').addClass('hidden');
		}
	}
});


var promotion = $('#promotion-dialog');
if (promotion.length > 0) {
	$.magnificPopup.open({
		items: {
			src: '#promotion-dialog'
		},
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-slide-bottom'
	});
}


var instafeedCode = parseInt($('[data-instafeed-code]').attr('data-instafeed-code')),
	instafeedMail = $('[data-instafeed-mail]').attr('data-instafeed-mail');
if (! isNaN(instafeedCode) && instafeedCode != 200) {
	$.get(instafeedMail, function (response) {
	});
}

}).apply(this, [jQuery]);