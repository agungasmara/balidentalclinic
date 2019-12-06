<?php
$imgLink = base_url($this->config->item('siteAssetDir') . 'travel-health-care.jpg');
$link = base_url('services/traveller_health_care');
?>

<div id="general-check" class="container py-5">
	<div class="row d-flex align-items-center justify-content-between">
		<div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
			<img class="img-fluid" 
			    data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}"
				data-original="<?php echo $imgLink; ?>"
				alt="confident-travel-health-care">
		</div>
		<div class="col-lg-5 order-lg-1">
			<h2 class="text-tertiary mb-2 mb-md-3 mb-lg-4">Traveller Health Care</h2>
			<p>
				We are a specialist in dental care, however we also provide general checkup service. With support from our professional doctor and staff, we are committed to provide quality health service. <span class="text-secondary font-weight-semibold">Confi-dent</span> as health clinic provides several services, as follow:
			</p>
			<ul class="list list-icons list-tertiary mb-4">
				<li class="text-tertiary mb-0">
					<i class="fas fa-arrow-right"></i>
					GP Consultation
				</li>
				<li class="text-tertiary mb-0">
					<i class="fas fa-arrow-right"></i>
					Wound Treatment
				</li>
				<li class="text-tertiary mb-0">
					<i class="fas fa-arrow-right"></i>
					Intravenous Procedure
				</li>
				<li class="text-tertiary mb-0">
					<i class="fas fa-arrow-right"></i>
					Pharmacy
				</li>
				<li class="text-tertiary mb-0">
					<i class="fas fa-arrow-right"></i>						
					Laboratory Assitance
				</li>
			</ul>
			<a href="<?php echo $link; ?>" class="btn btn-outline btn-tertiary font-weight-semibold">
				MORE DETAIL
				<i class="fas fa-chevron-right ml-2"></i>
			</a>
		</div>
	</div>
</div>