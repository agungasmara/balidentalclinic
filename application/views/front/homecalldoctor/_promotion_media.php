<?php
$videoSrc = base_url($this->config->item('mediaDir') . 'home call doctor.mp4');
?>


<section class="section section-default mt-0">
	<div class="container py-4">
		<div class="row">
			<div class="col-12">
				<video controls>
					<source src="<?php echo $videoSrc; ?>" type="video/mp4">
				</video>
			</div>
		</div>
	</div>
</section>
