<?php
	$imgHeaderLink = base_url($this->config->item('siteAssetDir') . 'night.jpg');
	$image1 = base_url($this->config->item('siteAssetDir') . 'nightgard1.jpg');
	$image2 = base_url($this->config->item('siteAssetDir') . 'nightgard2.jpg');
	$image3 = base_url($this->config->item('siteAssetDir') . 'nightgard3.jpg');
	$videoSrc = 'https://www.youtube.com/embed/SbCev8jp5Rs' ;
	$bookLink = base_url();
	$instantbooking = 'https://confidentdentalhealthcare.simplybook.asia/v2/#book/service/17/';
?>

<!-- PAGEHEADER -->
<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0"
	data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%'}" data-image-src="<?php echo $imgHeaderLink; ?>">
	<div class="container">
		<div class="row justify-content-left">
			<div class="col-lg-6 text-left">
				<h2 class="text-light mb-2">What is Night Guard?</h2>
				<p class="text-light">
					<span class="text-tertiary font-weight-semibold">Dental Night Guard is a</span> mouth guard like covering for upper or lower teeth, that can be made out of silicone, or other material and available in a few thickness to suit each individual
				</p>
				<p class="text-light mb-5">
					If you come to Bali, make a night guard could be a great choice, as it's saving cost, same quality and fit to your schedule. We will more than happy to assist you,
				</p>
				<a href="<?=$instantbooking?>" class="btn btn-tertiary py-3 px-5 p-sm-4 font-weight-semibold mb-5 ">
					<i class="icons icon-calendar mr-3"></i>
					INSTANT BOOKING
				</a>
				<a href="#modal-appointment" class="btn btn-tertiary py-3 px-5 p-sm-4 font-weight-semibold mb-5 popup-with-zoom-anim">
					<i class="icons icon-calendar mr-3"></i>
					CONTACT US NOW
				</a>
			</div>
		</div>
	</div>
</section>


<!-- HOW IT WORKS -->
<div class="container mt-5 mb-5 pt-sm-5 pb-sm-5">
	<div class="row d-flex align-items-center justify-content-between">
		<div class="col-lg-6 mt-lg-2 mt-0 mb-5 mb-lg-0">			
			<div class="embed-responsive embed-responsive-16by9">
		        <iframe class="embed-responsive-item" src="<?php echo $videoSrc ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		    </div>	
		</div>
		<div class="col-lg-5">
			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">What Is It For?</h2>
			<p>
				Night guard is specifically<span class="text-tertiary font-weight-semibold"> made for individuals who grind and/or clench their teeth during their sleep</span> Overtime, teeth will become very short and harder to restore. So the purpose is to avoid further loss of teeth structure.
			</p>
						
			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How Can I Get One Made?</h2>
			<p>
				Our dentist will take a dental impression of your teeth and make a model. The model is sent to a laboratory where the actual mouth guard is fabricated for a custom fit.
			</p>
			<p>
				
			</p>
			

		</div>
	</div>
</div>


<!-- BEFORE AFTER -->
<section class="section section-default mb-0 mt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 order-last order-lg-first">
				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How Long Does It Take?</h2>
				<p>
					Please allow about 2 days before you can pick up the night guard
				</p>

				<hr class="tall dashed">

				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How Long Does It Last?</h2>
				<p>
					How long your night guard will last all depends on the severity of your teeth grinding. Typically, <span class="text-tertiary font-weight-semibold"> they will last between 5 and 10 years, depending on stress levels</span>.
				</p>
			</div>
			<div class="offset-lg-1 col-lg-6 mt-lg-2 mt-0 mb-5 mb-lg-0 order-first order-lg-last">
				<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10}">
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image1; ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image2; ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image3; ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- PRICELIST -->
<div class="container mt-5 mb-5 pt-sm-5 pb-sm-5">
	<div class="row">
		<div class="col-md-10 col-lg-8 offset-lg-2 offset-md-1">
			<h2 class="text-secondary mb-4 text-center">How Much It Cost ?</h2>
			<p class="lead text-center">
				The cost for night guard itself is <span class="text-secondary font-weight-semibold">Rp. 900.000 (around AUD 90)</span>  Each
			</p>
		</div>
	</div>
</div>


<!-- CTA -->
<section class="section mt-0 mb-0 py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12 d-lg-flex justify-content-lg-center align-items-lg-center">
				<div class="d-block d-lg-inline-block subscribe-text">
					<h2 class="mb-0" style="color: #777; text-transform: uppercase;"><strong class="text-tertiary">Interested ?</strong></h2>
					<p class="mb-0 font-italic" style="font-size: 16px;">for creating such a Night Guard</p>
				</div>
				<a class="d-block d-lg-inline-block btn btn-tertiary font-weight-semibold text-color-light py-3 px-4 ml-lg-4 mt-3 mt-lg-0"
					href="<?=$instantbooking?>"
					style="line-height: 32px;">
					BOOK US NOW
					<i class="icons icon-calendar ml-3"></i>
				</a>
			</div>
		</div>
	</div>
</section>


<!-- MODAL APPOINTMENT -->
<?php
$contact = (object) [
        'subject' => 'Teeth Whitening Appoitment'
    ];
$viewVar = [
        'contact' => $contact
    ];
$this->load->view('front/page/_modal_appointment', $viewVar);
?>
