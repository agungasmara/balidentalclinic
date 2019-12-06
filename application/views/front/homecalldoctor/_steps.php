<div class="container mt-5">
	<div class="row">
		<div class="col-12 text-center">
			<h3 class="font-weight-normal text-grey mb-3 mb-sm-5" style="text-transform: none; line-height: 30px;">
				<span class="text-tertiary font-weight-semibold">Six Steps</span> in Our Services
			</h3>
			<div class="row d-flex align-items-stretch justify-content-center">

				<?php
				foreach ($steps as $step) : 
					$icon = $step->icon;
					$title = $step->title;
					$desc = $step->description;
				?>

				<div class="col-lg-4 col-sm-6 mb-2 mb-sm-0 d-block">
					<div class="py-3 mb-3">
						<h3 class="d-inline rounded-circle py-3 text-light" style="padding-right: 20px; padding-left: 20px; background-color: #bd336d;">
							<i class="<?php echo $icon; ?>"></i>
						</h3>
					</div>
					<div>
						<h4 class="heading-tertiary mb-1 mb-sm-3"><?php echo $title; ?></h4>
						<p class="mb-4"><?php echo $desc; ?></p>
					</div>
				</div>

				<?php endforeach; ?>
				
			</div>
		</div>
	</div>
</div>