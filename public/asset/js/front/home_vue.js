
var schedule = new Vue({
	el: '#panel-schedule',
	data: {
		isDental: true,
	},
	computed: {
		title: function () {
			if (this.isDental)
				return 'Dental Care Schedule';
			return 'Traveller Health Care'
		}
	},
	methods: {
		changeSchedule: function (val) {
			this.isDental = val;
		}
	}
});