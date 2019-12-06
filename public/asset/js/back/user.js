(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-add-user').ajaxForm(ajaxOptions);
$('#form-edit-user').ajaxForm(ajaxOptions);

$('[name=password_needed]').on('click', function () {
	if ( $(this).is(':checked') ) {
		$('[name=password]').removeAttr('disabled');
		$('[name=password_confirmation]').removeAttr('disabled');
	} else {
		$('[name=password]').attr('disabled', 'disabled').val('');
		$('[name=password_confirmation]').attr('disabled', 'disabled').val('');
	}
});

}).apply(this, [jQuery]);