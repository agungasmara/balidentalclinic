(function ($) {

	var activeMenu = $('[data-active-menu]').attr('data-active-menu');
		activeMenuClass = $('[data-active-menu]').attr('data-active-menu-class');
		activeMenuClass = typeof activeMenuClass !== 'undefined' ? activeMenuClass : 'nav-active';
	$('#' + activeMenu).addClass(activeMenuClass)
		.closest('.nav-parent').addClass( activeMenuClass + ' nav-expanded' );
	$('#' + activeMenu).closest('.dropdown').addClass(activeMenuClass);

	$('[data-custom-panel-action]').on('click', function () {
		var status = $(this).attr('data-custom-panel-action');
		
		if (status == 'close') {
			$(this).closest('.custom-panel').find('.custom-panel-body').hide(2000, function () {
				$(this).closest('.custom-panel').find('[data-custom-panel-action]').html('<i class="icon-arrow-down"></i>');
			});
			$(this).attr('data-custom-panel-action', 'open');
			return false;
		}

		$(this).closest('.custom-panel').find('.custom-panel-body').show(2000, function () {
			$(this).closest('.custom-panel').find('[data-custom-panel-action]').html('<i class="icon-arrow-up"></i>');
		});
		$(this).attr('data-custom-panel-action', 'close');
		return false;
	});
		
	$('[data-hide]').on('click', function () {
		var elem = $(this).attr('data-hide');
		
		if (elem == 'modal') {
			var target = $(this).closest("." + elem);
			target.modal('hide');
		} else {
			$(this).closest("." + elem).addClass('hidden');
		}
	});

	$('[data-toggle-search]').on('click', function () {
		var elem = $(this),
			formSearch = $('#' + $(this).attr('data-toggle-search'));
		if ( formSearch.is(':visible') ) {
			formSearch.animate({
				opacity: 0.25,
				height: 'toggle'
			}, 600, function () {
				elem.attr('data-original-title', 'Show search form');
			});
		} else {
			formSearch.animate({
				opacity: 1,
				height: 'toggle'
			}, 600, function () {
				elem.attr('data-original-title', 'Hide search form');
			});
		}

		return false;
	});

	$('[data-delete-confirmation]').on('click', function () {
		var name = $(this).attr('data-delete-confirmation'),
			deleteLink = $(this).attr('href'),
			deleteText = 'Anda akan menghapus data <span class="text-danger">' + name + '</span><br>Apakah anda yakin untuk menghapus data ini ?';

		if (typeof name !== 'undefined') {
			$('#modal-delete-confirmation .delete-text').html(deleteText);
		}
		$('#modal-delete-confirmation .btn-delete-action').attr('href', deleteLink);
		$('#modal-delete-confirmation').modal({
			show: true,
			backdrop: 'static'
		});

		return false;
	});

	$('.btn-delete-action').on('click', function () {
		var options = {
			type: 'GET',
			url: $(this).attr('href'),
			dataType: 'json',
			data: {},
			success: showDeleteResponse,
			error: deleteError
		}
		$(this).ajaxSubmit(options);

		return false;
	});

	$('[data-clone-add]').on('click', function () {
		var cloneElement = $('#' + $(this).attr('data-clone-add')),
			targetElement = $('#' + $(this).attr('data-clone-target')),
			fn = $(this).attr('data-clone-callback');

		cloneElement = cloneElement.html();
		targetElement.append(cloneElement);

		bindCloneDeleteButton(targetElement);
		if ( typeof fn !== 'undefined') {
			window[fn]();
		}
	});

	$('[data-clone-delete]').on('click', function () {
		var targetClass = '.' + $(this).attr('data-clone-delete'),
			cloneContainer = $('#' + $(this).attr('data-clone-target')),
			minimumClone = $(this).attr('data-clone-minimum'),
			cloneCount = $('.pool-detail-clone', cloneContainer).length;
			
		minimumClone = (typeof minimumClone === 'undefined') ? 1 : parseInt(minimumClone);
		if (cloneCount > minimumClone) {
			$(this).closest(targetClass).remove();
		}
	});

	$('.autogrow-text').autogrow();
	
	$('.select2').select2({
		width: '100%'
	});

}).apply(this, [jQuery]);


function showPreloader(data, form, options)
{
	var loaderButton = $('[data-submit-loader]', form),
		processText = $(loaderButton).attr('data-submit-loader');

	$(loaderButton).html('<i class="fa fa-spinner fa-spin mr-2"></i>' + processText);
}

function hidePreloader(form)
{
	var loaderButton = $('[data-submit-loader]', form),
		finishText = $(loaderButton).attr('data-submit-finish');

	$(loaderButton).html(finishText);
}

function ajaxFormResponse(response, status, xhr, form)
{
	var responseStatus = response.status,
		targetError = $('#' + $(form).attr('data-target-error')),
		targetSuccess = $('#' + $(form).attr('data-target-success')),
		isScroll = $(form).attr('data-scroll');

	isScroll = isScroll == '' ? true : false;
	hidePreloader(form);
	$('.alert').addClass('hidden');
	$('.alert-always-show').removeClass('hidden');

	if (responseStatus == 'success') {
		$('.message-body', targetSuccess).html(response.message);
		targetSuccess.removeClass('hidden');
		if (isScroll) scrollToElem(targetSuccess);
	} else {
		$('.message-body', targetError).html( response.message );
		targetError.removeClass('hidden');
		if (isScroll) scrollToElem(targetError);
	}

	if (response.reset === true) {
		$(form).resetForm();
	}

	if (typeof response.callback != 'undefined') {
		var fn = window[response.callback];
		if (typeof fn === 'function') fn(response);
	}

	updateCsrfToken(response);
}

function updateCsrfToken(response)
{
	if (typeof response.csrf.name != 'undefined' && typeof response.csrf.hash != 'undefined') {
		$('input[name=' + response.csrf.name + ']').val(response.csrf.hash);
	}
}

function showDeleteResponse(response, status, xhr, form)
{
	var responseStatus = response.status,
		targetError = $('#error-message'),
		targetSuccess = $('#modal-delete-success');

	$('.alert').addClass('hidden');
	$('.alert-always-show').removeClass('hidden');
	$('#modal-delete-confirmation').modal('hide');

	if (responseStatus == 'success') {
		$('.success-text', targetSuccess).html(response.message);
		$('.btn-refresh-action', targetSuccess).attr('href', response.link);
		targetSuccess.modal({
			show: true,
			backdrop: 'static'
		});
	} else {
		$('.message-body', targetError).html( response.message );
		targetError.removeClass('hidden');
		scrollToElem(targetError);
	}
} 

function ajaxError(xhr, status, err)
{
	var message = '<span class="font-weight-bold">Oh snap !</span> This process has been terminated<br>' + 'Error ' + xhr.status + ' - ' + err + '<br>Please refresh or reload this page',
		alert = $('#error-message');

	hidePreloader();

	$('.alert').addClass('hidden');
	$('.alert-always-show').removeClass('hidden');
	$('.message-body', alert).html(message);
	alert.removeClass('hidden');
	scrollToElem(alert);
}

function deleteError(xhr, status, err)
{
	var message = '<span class="font-weight-bold">Oh snap !</span> This process has been terminated<br>' + 'Error ' + xhr.status + ' - ' + err,
		alert = $('#error-message');

	$('#modal-delete-confirmation').modal('hide');
	$('.alert').addClass('hidden');
	$('.alert-always-show').removeClass('hidden');
	$('.message-body', alert).html(message);
	alert.removeClass('hidden');
	scrollToElem(alert);
}

function scrollToElem(target) 
{
	$('html, body').animate({
		scrollTop: $(target).offset().top - 130
	}, 800);
}

function bindCloneDeleteButton(cloneContainer)
{
	var lastCloneDeleteButton = $('[data-clone-delete]:last', cloneContainer);

	$(lastCloneDeleteButton).on('click', function () {
		var targetClass = '.' + $(this).attr('data-clone-delete'),
			cloneContainer = $('#' + $(this).attr('data-clone-target')),
			minimumClone = $(this).attr('data-clone-minimum'),
			cloneCount = $(targetClass, cloneContainer).length;

		minimumClone = (typeof minimumClone === 'undefined') ? 1 : parseInt(minimumClone);
		if (cloneCount > minimumClone) {
			$(this).closest(targetClass).remove();
		}
	});
}



/**
 * bootstrap file input setup
 * setup for empty selector
 * setup for non empty selector
 */
function initalizeEmptyUploader(id, alias)
{
	var	maxFilesize = $('#' + id).attr('data-max-filesize'),
		fileFormats = ($('#' + id).attr('data-file-format'));

	fileFormats = typeof fileFormats != 'undefined' ? fileFormats.split('-') : ''; 
	$('#' + id).fileinput({
		showCaption: false,
		showUpload: false,
		maxFileCount: 1,
		maxFileSize: parseInt(maxFilesize),
		showClose: false,
		showRemove: false,
		browseLabel: alias,
		browseClass: 'btn btn-default',
		browseIcon: '<i class="icons icon-folder mr-2"></i>',
		allowedFileExtensions: fileFormats
	});
}

function initializeCurrentUploader(id, alias, options)
{
	var maxFilesize = $('#' + id).attr('data-max-filesize'),
		fileFormats = ($('#' + id).attr('data-file-format')).split('-');

	$('#' + id).fileinput({
		showCaption: false,
		showUpload: false,
		maxFileCount: 1,
		maxFileSize: parseInt(maxFilesize),
		showClose: false,
		showRemove: false,
		browseLabel: alias,
		browseClass: 'btn btn-default',
		browseIcon: '<i class="icons icon-folder mr-2"></i>',
		initialPreviewAsData: true,
		initialPreview: [
			$('#data-' + id).text()
		],
		initialPreviewConfig: [{
			type: options.type,
			caption: $('#data-' + id).attr('data-filename'),
			size: $('#data-' + id).attr('data-filesize')
		}],
		initialPreviewShowDelete: true,
		allowedFileExtensions: fileFormats
	});
}



/**
 * dynamic select2
 * select2 value list based on another select2
 * @auther : Anis Uddin Ahmad <anis.programmer@gmail.com>
 */
var Select2Cascade = ( function(window, $) {

	function Select2Cascade (parent, child, url, select2Options) {
		var afterActions = [];
		var options = select2Options || {};

		// Register functions to be called after cascading data loading done
		this.then = function (callback) {
			afterActions.push(callback);
			return this;
		};


		parent.select2(select2Options).on('change', function (e) {
			child.prop("disabled", true);

			var _this = this;
			
			$.getJSON( url.replace(':parentId:', $(this).val()), function(items) {
				var newOptions = '';
				for( var id in items ) {
					newOptions += '<option value="'+ id +'">'+ items[id] +'</option>';
				}

				child.select2('destroy').html(newOptions).prop("disabled", false)
				.select2(options);

				afterActions.forEach(function (callback) {
					callback(parent, child, items);
				});
			});
		});
	}

	return Select2Cascade;

})( window, $);