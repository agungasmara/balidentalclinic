<div class="container mt-5 mb-5 pt-sm-5 pb-sm-5">
	<div class="row">
		<div class="col-12 text-center">
			<h3 class="font-weight-normal text-grey" style="text-transform: none; line-height: 30px;">
				Top <span class="text-secondary font-weight-semibold">5 reasons why</span> people<br>
				Always <span class="text-secondary font-weight-semibold">choose our services</span>
			</h3>
			<hr class="dashed">
			<div class="row d-flex align-items-stretch justify-content-center">

				<?php
				foreach ($services as $service) : 
					$icon = $service->icon;
					$title = $service->title;
					$desc = $service->description;
				?>

				<div class="col-lg-4 col-sm-6 mb-2 mb-sm-0 d-block">
					<div class="py-3 mb-3">
						<h3 class="d-inline rounded-circle py-3 text-light" style="padding-right: 20px; padding-left: 20px; background-color: #3ba5bd;">
							<i class="<?php echo $icon; ?>"></i>
						</h3>
					</div>
					<div>
						<h4 class="heading-primary mb-1 mb-sm-3"><?php echo $title; ?></h4>
						<p class="mb-4"><?php echo $desc; ?></p>
					</div>
					<hr class="dashed d-block d-sm-none">
				</div>

				<?php endforeach; ?>
				
			</div>
		</div>
	</div>
</div>