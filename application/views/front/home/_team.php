<?php
$doctorLink = base_url('professional_medical_team');
?>

<div id="doctor" class="container mt-5 mb-5 pt-sm-5">
	<div class="row">
		<div class="col-12 text-center mb-5">
			<h3 class="font-weight-normal text-grey" style="text-transform: none;">
				Meet <span class="font-weight-semibold text-secondary">our Doctor</span> and their <span class="font-weight-semibold text-secondary">professional staff</span>
			</h3>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<p>
						<span class="text-secondary font-weight-semibold">Confi-dent</span> are committed to provide quality service. Hence we only employ experienced professional doctor. Aside from our doctors, we also recruited staffs who are professional, friendly, and always ready to help.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row team-list">

		<?php
		$teamLink = base_url('page/show/doctor');
		foreach ($teams as $team) :
			$name = $team->name;
			$position = $team->position;
			$desc = $team->description;
			$img = base_url($this->config->item('teamDir') . $team->img);
		?>

		<div class="col-12 col-sm-6 col-lg-4 isotope-item">
			<span class="thumb-info thumb-info-hide-wrapper-bg mb-4">
				<span class="thumb-info-wrapper">
					<a href="<?php echo $teamLink; ?>">
						<img class="img-fluid"
						    data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}"
        				    data-original="<?php echo $img; ?>"
        				    alt="<?php echo $name; ?>">
						<span class="thumb-info-title">
							<span class="thumb-info-inner"><?php echo $name; ?></span>
							<span class="thumb-info-type text-uppercase"><?php echo $position; ?></span>
						</span>
					</a>
				</span>
				<span class="thumb-info-caption">
					<span class="thumb-info-caption-text"><?php echo $desc; ?></span>
				</span>
			</span>
		</div>

		<?php endforeach; ?>

	</div>

	<div class="row">
		<div class="col-12 text-center">
			<a href="<?php echo $doctorLink; ?>"
				class="btn btn-default p-3 font-weight-semibold">
				MORE INFORMATION ABOUT OUR DOCTOR
				<i class="icons icon-arrow-right ml-2"></i>
			</a>
		</div>
	</div>

</div>
