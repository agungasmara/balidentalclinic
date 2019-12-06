<?php
$imgLink = base_url($this->config->item('siteAssetDir') . 'doctor-check-patient.jpg');
$link = 'tel:6281337398840';
?>

<section class="section section-default mb-0">
	<div class="container">
		<div class="row d-flex align-items-center justify-content-between">
			<div class="col-lg-6 mb-5 mb-lg-0">
				<img class="img-fluid"
				    data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}"
				    data-original="<?php echo $imgLink; ?>"
				    alt="confident-dental-care">
			</div>
			<div class="col-lg-5">
				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How It Works ?</h2>
				<p>
					Our service is <span class="text-tertiary font-weight-semibold">for urgent cases that do not need emergency or ambulance services</span>. If your situation seems like an emergency, please call your hotel staff as soon as possible.
				</p>
				<p>
					Our booking lines are open from 9AM - 10 PM from Monday to Sunday. The on duty doctor will be notified, contacted you back and make an initial assessment by telephone or other electronic media <em>(if telephone access is not possible)</em>. Our target time is 1 hour after notification. If you want a particular doctor, the appointment time will be adjusted to the availability of doctor.
				</p>
				<p>
					The top urgent medical conditions we are currently treating include:
				</p>
				<div class="row mb-4">
					<div class="col-6">
						<ul class="list list-icons mb-0">
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Gastrointestinal Problem
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Ear Problem
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Eye Problem
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Severe Cold and Flu
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Urinary Tract Infections
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Severe Migraine and Headaches
							</li>
						</ul>
					</div>
					<div class="col-6">
						<ul class="list list-icons mb-0">
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Food Poisoning
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Skin Infections
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Respiratory Issues, including Asthma
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								High Temp with Infants
							</li>
							<li class="text-primary mb-0">
								<i class="fas fa-arrow-right"></i>
								Back and Joint Pain
							</li>
						</ul>
					</div>
				</div>
				<a href="<?php echo $link; ?>" class="btn btn-outline btn-primary font-weight-semibold px-3">
					UNDERSTAND & I NEED HELP
					<i class="icons icon-phone ml-2"></i>
				</a>
			</div>
		</div>
	</div>
</section>