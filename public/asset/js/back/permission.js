(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-add-permission').ajaxForm(ajaxOptions);
$('#form-edit-permission').ajaxForm(ajaxOptions);

}).apply(this, [jQuery]);