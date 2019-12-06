
<section id="schedule" class="parallax section section-text-light section-parallax mb-0"
	data-plugin-parallax data-plugin-options="{'speed': 1.5}" 
	data-image-src="public/asset/images/schedule.jpg">
	<div class="container schedule"
		id="panel-schedule"
		v-cloak>
		<div class="row">
			<div class="col-12">
				<div class="schedule-header-item"
					v-bind:class="{active : isDental}"
					v-on:click="changeSchedule(true)">
					DENTAL CARE
				</div>
				<div class="schedule-header-item"
					v-bind:class="{active : ! isDental}"
					v-on:click="changeSchedule(false)">
					TRAVELLER HEALTH CARE
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<?php
		$this->load->view('front/home/_panel_schedule');
		?>

	</div>
</section>