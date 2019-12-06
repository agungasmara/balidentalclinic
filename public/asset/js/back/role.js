(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-add-role').ajaxForm(ajaxOptions);
$('#form-edit-role').ajaxForm(ajaxOptions);
$('#form-permitted-role').ajaxForm(ajaxOptions);

$('#search-permission').on('keyup', function () {
	var keyword = $(this).val();

	if (keyword == '') {
		$('.permission-item').removeClass('hide');
		return;
	}
	
	$('.permission-item').addClass('hide');
	$('[data-permission-keyword*=' + keyword + ']').removeClass('hide');
});

$('.btn-check-uncheck').on('click', function () {
	var checkValue = $(this).attr('data-check-status');

	if (checkValue == 'on') {
		$(this).attr('data-check-status', 'off');
		$(this).text('BATALKAN SEMUA');
		$('input[name^=permissions]').prop('checked', true);
		return;
	}

	$(this).attr('data-check-status', 'on');
	$(this).text('PILIH SEMUA');
	$('input[name^=permissions]').prop('checked', false);
});

}).apply(this, [jQuery]);