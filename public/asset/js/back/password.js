(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};
	
$('#form-change-password').ajaxForm(ajaxOptions);

}).apply(this, [jQuery])