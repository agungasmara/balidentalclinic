Vue.use(PrettyCheckbox);

var productPrices = new Vue({
	el: '#panel-price',
	data: {
		prices: [],
		showLoader: true,
		money: {
			decimal: ',',
			thousands: '.',
			prefix: 'Rp. ',
			suffix: '',
			precision: 0,
			masked: false
		}
	},
	mounted: function () {
		this.getPrices();
	},
	methods: {
		setPrice: function () {
			let price = {
					min: '',
					max: '',
					price: 0
				};
			return price;
		},

		resetFirstPrice: function () {
			let minimumOrder = document.getElementById('minimum-order').value;
			this.prices[0].min = isNaN(parseInt(minimumOrder)) ? 0 : parseInt(minimumOrder);
		},

		addPrice: function () {
			let price = this.setPrice();
			this.prices.push(price);
			this.resetFirstPrice();
		},

		removePrice: function (index) {
			if (this.prices.length == 1) {
				return;
			}
			this.prices.splice(index, 1);
			this.resetFirstPrice();
		},

		getPrices: function () {
			let url = this.$el.getAttribute('data-price-url');
			this.$http.get(url)
				.then(
					function (response) {
						this.showLoader = false;

						let prices = response.body;
						if (prices == '') {
							this.addPrice();
							return;
						}
						this.prices = prices;
					},
					function (response) {
						this.addPrice();
						this.showLoader = false;
					}
				);
		},

		getFormatedValue: function () {
			let prices = [],
				price;

			for (let i = 0; i < this.prices.length; i++) {
				price = this.prices[i];
				if (price.price == 0 || price.price == '') continue;
				prices.push(price);
			}

			if (prices.length == 0) return '';
			return JSON.stringify(prices);
		}
	}
});


var productAttributes = new Vue({
	el: '#panel-attribute',
	data: {
		attributes: [],
		attributeTypes: [],
		showLoader: true,
		money: {
			decimal: ',',
			thousands: '.',
			prefix: 'Rp. ',
			suffix: '',
			precision: 0,
			masked: false
		}
	},
	mounted: function () {
		this.getAttributes();
	},
	methods: {
		setAttribute: function (type = 'custom') {
			let attribute = {
					type: type,
					required: false,
					selected: false,
					category: '',
					items: [],
					unselectedItems: []
				};
			return attribute;
		},

		setItem: function () {
			let item = {
					name: '',
					price: 0
				};
			return item;
		},

		findSelectedAttribute: function (attributes, id) {
			for (let i in attributes) {
				if (attributes[i].category == id &&
					attributes[i].type === 'database') {
					return attributes[i];
				}
			}
			return false;
		},

		filterUnselectedItem: function (attribute) {
			let findAttribute;
			for (let i = 0; i < attribute.items.length; i++) {
				findAttribute = attribute.unselectedItems[attribute.items[i].name];
				if (typeof findAttribute !== 'undefined') {
					delete attribute.unselectedItems[findAttribute.id];
				}
			}
		},

		addSelectedItem: function (attribute) {
			let select = 'option-' + attribute.category,
				selectVal = document.getElementById(select).value,
				item = this.setItem();
			item.name = selectVal;
			attribute.items.push(item);
			delete attribute.unselectedItems[selectVal];
		},

		addAttribute: function () {
			let attribute = this.setAttribute();
			attribute.selected = true;
			this.attributes.push(attribute);
		},

		removeAttribute: function (index) {
			this.attributes.splice(index, 1);
		},

		addAttributeItem: function (attribute) {
			let item = this.setItem();
			attribute.items.push(item);
		},

		removeAttributeItem(attribute, index) {
			if (attribute.type === 'database') {
				let deletedItem = Object.assign(
						{}, 
						this.attributeTypes[ attribute.category ]
							.attributeList[ attribute.items[index].name ]
					);
				attribute.unselectedItems[deletedItem.id] = deletedItem;			
			}			
			attribute.items.splice(index, 1);
		},

		getAttributes: function () {
			let url = this.$el.getAttribute('data-attribute-url');
			this.$http.get(url)
				.then(
					function (response) {
						this.showLoader = false;
						let productAttributes = response.body.productAttributes,
							attribute, findAttribute;

						this.attributeTypes = response.body.attributeTypes;
						for (let index in this.attributeTypes) {
							attribute = this.setAttribute('database');
							attribute.category = this.attributeTypes[index].id;
							attribute.unselectedItems = Object.assign({}, this.attributeTypes[index].attributeList);

							findAttribute = this.findSelectedAttribute(productAttributes, this.attributeTypes[index].id);
							if (findAttribute !== false) {
								attribute.selected = true;
								attribute.required = findAttribute.required;
								attribute.items = findAttribute.items;
								this.filterUnselectedItem(attribute);
							}

							this.attributes.push(attribute);
						}

						for (let index in productAttributes) {
							attribute = productAttributes[index];
							if (attribute.type === 'custom') {
								this.attributes.push(attribute);
							}
						}
					}
				);
		},

		getFormatedValue: function () {
			let attributes = [],
				attribute;

			for (let i = 0; i < this.attributes.length; i++) {
				attribute = this.attributes[i];
				if ( 
					! attribute.selected ||
					attribute.items.length <= 0 ||
					(attribute.type === 'custom' && attribute.category.trim == '')
					) continue;
				attributes.push(attribute);
			}

			if (attributes.length == 0) return '';
			return JSON.stringify(attributes);
		}
	}
});