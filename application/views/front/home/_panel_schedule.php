<div class="row" style="margin-left: 0; margin-right: 0;">
	<div class="col-lg-7 schedule-section-left">
		<div class="px-2 py-5">
			<h5 class="font-weight-semibold text-dark text-uppercase mb-4"
				style="font-size: 16px;">
				Need Dental & Health Care
			</h5>
			<p class="text-grey mb-3">
				If you are a traveler currently exploring Bali and in need of dental care service or general health service, you can directly visit <span class="text-secondary font-weight-semibold">Confi-dent</span> clinic located at:
			</p>
			<div class="pl-4 mb-3 d-flex align-items-center">
				<i class="icons icon-location-pin mr-3" style="font-size: 24px;"></i>
				<div class="text-grey">
					Jl. Padma Utara No.4, Legian, Kuta, Bali 80361<br>
					<span class="font-italic">( Next to Y Sports Bar Legian )</span>
				</div>
			</div>
			<p class="text-grey">
				With modern equipment and professional doctors, we are ready to provide the best service.
			</p>
			<ul class="list list-icons list-tertiary">
				<li class="mb-1 text-tertiary font-weight-semibold">
					<i class="fas fa-check"></i>
					Modern equipment and technology
				</li>
				<li class="mb-1 text-tertiary font-weight-semibold">
					<i class="fas fa-check"></i></i>
					Experienced and professional doctor
				</li>
				<li class="mb-1 text-tertiary font-weight-semibold">
					<i class="fas fa-check"></i></i>
					No additional commission for treatment
				</li>
			</ul>
		</div>
	</div>
	<div class="col-lg-5 schedule-section-right">
		<div class="px-2 pt-5 text-dark">
			<h5 class="font-weight-semibold text-dark text-uppercase mb-4"
				style="font-size: 16px;">
				{{title}}
			</h5>
		</div>
		<div class="pb-4">

			<?php 
			foreach ($schedules as $schedule) :
				if ($schedule->type == 'dental') :
					echo '<div id="dental-schedule"
							v-if="isDental">';
				else :
					echo '<div id="health-schedule"
							v-else>';
				endif;
				foreach ($schedule->times as $timing) :
			?>

			<div class="row schedule-detail">
				<div class="col-4 background-color-dark-grey">
					<div class="font-weight-semibold p-2"><?php echo $timing->day; ?></div>
				</div>
				<div class="col-8 background-color-light-grey">
					<div class="font-weight-semibold p-2"><?php echo $timing->time; ?></div>
				</div>
			</div>

			<?php 
				endforeach; 
				echo '</div>';
			endforeach; 
			?>

		</div>
		<div class="px-2 pb-4">
			<p class="text-grey mb-2" style="font-size: 13px; line-height: 18px;">
				Schedule maybe change during public holiday<br>
				Please contact us first to confirm your attedance and reservation
			</p>
			<p class="text-grey mb-0" style="font-size: 14px;">
				<i class="icons icon-phone mr-2"></i> +62 813 3739 8840<br>
				<i class="icons icon-envelope mr-2"></i> admin@balidentalclinic.com
			</p>
		</div>
	</div>
</div>