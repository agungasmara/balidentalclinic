<?php
$imgLink = base_url($this->config->item('siteAssetDir') . 'dental-care.jpg');
$link = base_url('services/dental_care');
?>

<section id="dental-care" class="section section-default mb-0">
	<div class="container">
		<div class="row d-flex align-items-center justify-content-between">
			<div class="col-lg-6 mb-5 mb-lg-0">
				<img class="img-fluid"
				    data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}"
				    data-original="<?php echo $imgLink; ?>"
				    alt="confident-dental-care">
			</div>
			<div class="col-lg-5">
				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">Dental Care</h2>
				<p>
					We realize how important it is to maintain dental health because how it closely relates to the nervous system in our brain. Current dental care had developed to become better. Not only there is a method to relieve pain, prevention and reconstruction method are also started to be developed. <span class="text-secondary font-weight-semibold">Confi-dent</span> as dental care center provides several services, as follow:
				</p>
				<div class="row mb-4">
					<div class="col-6">
						<ul class="list list-icons mb-0">
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Dental Check Up
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Teeth Whitening
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Dental Filling
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Extraction
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Periodontal Disease
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Teeth Grinding
							</li>
						</ul>
					</div>
					<div class="col-6">
						<ul class="list list-icons mb-0">
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Dental veneers 
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Denture
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Dental Crown
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Root Canal Therapy
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Dental Implant
							</li>
						</ul>
					</div>
				</div>
				<a href="<?php echo $link; ?>" class="btn btn-outline btn-primary font-weight-semibold">
					MORE DETAIL
					<i class="fas fa-chevron-right ml-2"></i>
				</a>
			</div>
		</div>
	</div>
</section>