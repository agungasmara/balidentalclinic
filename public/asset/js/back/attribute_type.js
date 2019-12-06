(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-add-attribute-type').ajaxForm(ajaxOptions);
$('#form-edit-attribute-type').ajaxForm(ajaxOptions);

}).apply(this, [jQuery]);