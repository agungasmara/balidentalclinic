Vue.component('my-vue-alert', {
	props: ['alert'],
	template: '\
		<div class="alert"\
			v-bind:id="alert.id"\
			v-bind:class="alert.type"\
			v-show="alert.show">\
			<button type="button" class="close" data-hide="alert" aria-hidden="true"\
				v-on:click="$emit(\'close\')">×</button>\
			<span class="message-body" v-html="alert.message"></span>\
		</div>\
	'
});

var attributeVue = new Vue({
	el: '#panel-attribute',
	data: {
		csrfTokenName: 'csrf_ngeprint',
		addForm: {
			name: '',
			btnCaption: 'TAMBAHKAN DATA',
			btnDefaultCaption: 'TAMBAHKAN DATA',
			btnLoadingCaption: 'PROSES DATA',
			isLoading: false
		},
		alert: {
			id: 'formAlert',
			type: 'alert-danger',
			show: false,
			message: ''
		},
		modal: {
			show: false,
			message: '',
			onDelete: false,
			btnDeleteCaption: 'HAPUS DATA',
			attribute: null
		},
		attributes: []
	},
	mounted: function () {
		this.getAttributeRecords();
	},
	methods: {
		resetAddForm: function (emptyName = false) {
			this.addForm.name = ! emptyName ? this.addForm.name : '';
			this.addForm.isLoading = false;
			this.btnCaption = this.btnDefaultCaption;
		},

		loadingAddForm: function () {
			this.addForm.isLoading = true;
			this.btnCaption = this.btnLoadingCaption;
		},

		setCSRFToken: function (token) {
			let csrf = document.querySelector('input[name=' + token.name + ']');
			csrf.value = token.hash;
		},

		setInsertedData: function () {
			let form = document.getElementById('form-edit-attribute'),
				data = new FormData(form);
			return data;
		},

		setUpdatedData: function (record) {
			let data = new FormData(),
				csrfTokenValue = document.querySelector('input[name=' + this.csrfTokenName + ']').value;
			data.append(this.csrfTokenName, csrfTokenValue);
			data.append('name', record.newName);
			return data;
		},

		setAttribute: function (data) {
			let record = {
				id: data.id,
				name: data.name,
				newName: data.name,
				isEdited: false,
				onUpdate: false,
				alert: {
					id: 'attributeAlert-' + data.id,
					type: 'alert-info',
					show: false,
					message: ''
				}
			}
			return record;
		},

		setSuccessResponse: function (alert, response) {
			let status = response.body.status,
				message = response.body.message;
			alert.type = status == 'success' ? 'alert-info' : 'alert-danger';
			alert.show = true;
			alert.message =status == 'success' ? message
				: '<h5 class="font-weight-semibold">Ups proses gagal !</h5>'
					+ message;
		},

		setErrorResponse: function (alert, response) {
			let message = '<span class="font-weight-semibold">Ups proses gagal !</span> \
				Terjadi kesalahan pada saat pemrosesan data. \
				Silahkan <span class="font-weight-semibold">refresh halaman</span> dan ulangi transaksi terkahir anda.'
			alert.type = 'alert-danger';
			alert.show = true;
			alert.message = message;
		},

		getAttributeRecords: function () {
			let url = this.$el.getAttribute('data-get-url');
			this.$http.get(url)
				.then(
					function (response) {
						let records = response.body,
							record;
						this.attributes = [];
						for (let i = 0; i < records.length; i++) {
							record = this.setAttribute(records[i])
							this.attributes.push(record);
						}
					},
					function (response) {
						this.setErrorResponse(this.alert, response);
						this.scrollToAlert(this.alert);
					}
				);
		},

		scrollToAlert: function (alert) {
			let element = document.getElementById(alert.id),
				duration = 200,
				options = {
					container: 'body',
					easing: 'ease-in',
				};
			VueScrollTo.scrollTo(element, duration, options);
		},

		toggleEditForm: function (attribute) {
			attribute.isEdited = ! attribute.isEdited;
			attribute.newName = attribute.name;
		},

		insertData: function () {
			let url = this.$refs.formAddAttribute.getAttribute('action'),
				postData = this.setInsertedData();
			this.loadingAddForm();
			this.$http.post(url, postData)
				.then(
					function (response) {
						let csrf = response.body.csrf;
							status = response.body.status,
							reset = response.body.reset;
						this.setSuccessResponse(this.alert, response);
						this.scrollToAlert(this.alert);
						if (status == 'success') this.getAttributeRecords();
						this.resetAddForm(reset);
						this.setCSRFToken(csrf);
					},
					function (response) {
						this.resetAddForm(false);
						this.setErrorResponse(this.alert, response);
						this.scrollToAlert(this.alert);
					}
				);
		},

		updateData: function (attribute) {
			let url = this.$refs.formAddAttribute.getAttribute('data-edit-link') + attribute.id,
				postData = this.setUpdatedData(attribute);
			attribute.onUpdate = true;
			this.$http.post(url, postData)
				.then(
					function (response) {
						attribute.onUpdate = false;
						let csrf = response.body.csrf;
							status = response.body.status;
						this.setSuccessResponse(attribute.alert, response);
						if (status == 'success') {
							let record = response.body.record;
							attribute.id = record.id;
							attribute.name = record.name;
							attribute.newName = record.name;
							attribute.isEdited = false;
						}
						this.setCSRFToken(csrf);
					},
					function (response) {
						this.setErrorResponse(attribute.alert, response);
					}
				);
		},

		deleteConfirmation: function (attribute) {
			this.modal.show = true;
			this.modal.message = 'Atribut ' + attribute.name;
			this.modal.attribute = attribute;
		},

		deleteData: function () {
			let url =this.$refs.formAddAttribute.getAttribute('data-delete-link') + this.modal.attribute.id;
			this.modal.onDelete = true;
			this.modal.btnDeleteCaption = 'PROSES HAPUS DATA'
			this.$http.get(url)
				.then(
					function (response) {
						this.modal.onDelete = false;
						this.modal.show = false;
						this.modal.btnDeleteCaption = 'HAPUS DATA'
						this.setSuccessResponse(this.alert, response);
						this.scrollToAlert(this.alert);
						this.getAttributeRecords();
					},
					function (response) {
						this.modal.onDelete = false;
						this.modal.show = false;
						this.modal.btnDeleteCaption = 'HAPUS DATA'
						this.setErrorResponse(this.alert, response);
						this.scrollToAlert(this.alert);
					}
				);
		}

	}
});