(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-add-email-template').ajaxForm(ajaxOptions);
$('#form-edit-email-template').ajaxForm(ajaxOptions);

}).apply(this, [jQuery]);