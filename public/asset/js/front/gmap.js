$("#googlemapsMarkers").gMap({
	controls: {
		draggable: (($.browser.mobile) ? false : true),
		panControl: true,
		fullscreenControl : true,
		zoomControl: true,
		mapTypeControl: false,
		scaleControl: true,
		streetViewControl: false,
		overviewMapControl: false
	},
	scrollwheel: false,
	markers: [{
		address: "Jl. Padma Utara No.4, Legian, Kuta, bali, Bali 80361",
		html: "<strong>Confident Dental & Health Care</strong><br>217 Jl. Padma Utara No.4, Legian, Kuta, bali, Bali 80361",
		icon: {
			image: "public/asset/images/pin.png",
			iconsize: [26, 46],
			iconanchor: [12, 46]
		}
	}],
	latitude: -8.699769,
	longitude: 115.169261,
	zoom: 15
});