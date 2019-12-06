( function ($) {

var ajaxOptions = {
	type: 'POST',
	dataType: 'json',
	beforeSubmit: showPreloader,
	success: ajaxFormResponse,
	error: ajaxError
};

$('#form-add-product').on('submit', function () {
	let prices = productPrices.getFormatedValue(),
		attributes = productAttributes.getFormatedValue();
	
	ajaxOptions.data = {
		prices: prices,
		attributes: attributes
	}
	tinyMCE.triggerSave();
	$(this).ajaxSubmit(ajaxOptions);

	return false;
});

$('#form-edit-product').on('submit', function () {
	let prices = productPrices.getFormatedValue(),
		attributes = productAttributes.getFormatedValue();
	
	ajaxOptions.data = {
		prices: prices,
		attributes: attributes
	}
	tinyMCE.triggerSave();
	$(this).ajaxSubmit(ajaxOptions);

	return false;
});

tinyMCE.init({
	selector: '.tinymce',
	entity_encoding: 'raw',
	verify_html: false,
	plugins: [
		'fullscreen code autoresize visualblocks',
		'advlist autolink lists link anchor',
		'contextMenu table textcolor'
	],
	toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | link',
	autoresize_bottom_margin: 10,
	remove_script_host : false,
	convert_urls : false
});

// setup photo uploader
var pic = $('#data-pic').text();
if (pic.trim() == '') {
	initalizeEmptyUploader('pic', 'Pilih Gambar');
} else {
	let options = {
			type: 'image'
		};
	initializeCurrentUploader('pic', 'Pilih Gambar', options);
}

$('#minimum-order').on('keyup', function () {
	productPrices.resetFirstPrice();
});

}).apply(this, [jQuery]);