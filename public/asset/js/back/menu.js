(function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-add-menu').ajaxForm(ajaxOptions);
$('#form-edit-menu').ajaxForm(ajaxOptions);

$('#form-order-menu').on('submit', function (e) {
	var nestables = $('#nestable').nestable('toArray');
	options = {
		type: 'POST',
		data: {nestables: nestables},
		dataType: 'json',
		beforeSubmit: showPreloader,
		success: ajaxFormResponse,
		error: ajaxError
	}

	$(this).ajaxSubmit(options);
	return false;
})

if ( $('#switch-login').prop('checked') ) {
	$('#permission_selectbox').hide();
}

$('#switch-login').on('click', function () {
	var checked = $(this).prop('checked');
	
	if (checked) {
		$('#permission_selectbox').hide();
		$('[name=permission_id]').val('0').trigger('change');
		return;
	}

	$('#permission_selectbox').show();
});

$('#menu-order').on('change', function (e) {
	var selectBox = this,
		url = $(this).attr('data-url') + $(this).val();

	$.get(url, function (response) {
		
		$('.alert').addClass('hidden');
		$('#row-nestable').addClass('hidden');

		if (response.status == 'success') {
			$('#row-nestable').removeClass('hidden');
			$('#panel-nestable').html(response.nestable);
			$('#nestable').nestable({
				'maxDepth': 2
			});
			return;
		}

		var form = $(selectBox).closest('form'),
			targetError = $('#' + $(form).attr('data-target-error'));

		$('.message-body', targetError).html( response.message );
		targetError.removeClass('hidden');
		scrollToElem(targetError);

	}, 'json');
});

}).apply(this, [jQuery]);