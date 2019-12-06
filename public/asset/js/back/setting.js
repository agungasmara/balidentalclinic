(function ($) {

var ajaxOptions = {
		type: 'POST',
		dataType: 'json',
		beforeSubmit: showPreloader,
		success: ajaxFormResponse,
		error: ajaxError
	}

$('#form-edit-setting').ajaxForm(ajaxOptions);

$('#site_logo').fileinput({
	showCaption: false,
	showUpload: false,
	showRemove: false,
	maxFileCount: 1,
	maxFileSize: 1024,
	showClose: false,
	browseLabel: 'Pilih Gambar',
	browseClass: 'btn btn-default',
	browseIcon: '<i class="icons icon-folder mr-2"></i>',
	initialPreviewAsData: true,
	initialPreview: [
		$('#data_site_logo').text()
	],
	initialPreviewConfig: [
		{caption: $('#data_site_logo').attr('data-filename'), size: $('#data_site_logo').attr('data-filesize')}
	],
	initialPreviewShowDelete: false,
	allowedFileExtensions: ['png']
});

$('#default_avatar').fileinput({
	showCaption: false,
	showUpload: false,
	showRemove: false,
	maxFileCount: 1,
	maxFileSize: 1024,
	showClose: false,
	browseLabel: 'Pilih Gambar',
	browseClass: 'btn btn-default',
	browseIcon: '<i class="icons icon-folder mr-2"></i>',
	initialPreviewAsData: true,
	initialPreview: [
		$('#data_default_avatar').text()
	],
	initialPreviewConfig: [
		{caption: $('#data_default_avatar').attr('data-filename'), size: $('#data_default_avatar').attr('data-filesize')}
	],
	initialPreviewShowDelete: false,
	allowedFileExtensions: ['png']
});

}).apply(this, [jQuery]);