<?php
$imgHeaderLink = base_url($this->config->item('siteAssetDir') . 'teeth-whitening.jpg');
$prevLink = base_url($this->config->item('siteAssetDir') . 'teeth-whitening-prev.jpg');
$afterLink = base_url($this->config->item('siteAssetDir') . 'teeth-whitening-after.jpg');
$videoSrc = base_url($this->config->item('mediaDir') . 'home call doctor.mp4');
$image1 = base_url($this->config->item('siteAssetDir') . 'clean1.jpg');
$image2 = base_url($this->config->item('siteAssetDir') . 'clean2.jpg');
$videoSrc = 'https://www.youtube.com/embed/0VKIiqpDSvs' ;
$bookLink = base_url();
$instantbooking = 'https://confidentdentalhealthcare.simplybook.asia/v2/#book/service/2/';
?>

<!-- PAGEHEADER -->
<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0"
	data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%'}" data-image-src="<?php echo $imgHeaderLink; ?>">
	<div class="container">
		<div class="row justify-content-left">
			<div class="col-lg-6 text-left">
				<h2 class="text-light mb-2">Clean &amp; Fresh Smile during Holiday in Bali</h2>
				<h5 class="text-tertiary mb-5">Yes, we do teeth cleaning. Here we conclude some of our client FAQ</h5>
				<p class="text-light">
					<span class="text-tertiary font-weight-semibold">What is Teeth Clening ?</span> It is a procedure of using ultrasonic scaler to clean all plaque and tar build up without the use of dental anaesthesia.</p>
				</p>
				<p class="text-light mb-5">
					Even though you brush your teeth twice daily and floss regularly. Over time, teeth do need a thorough clean using scaler to access areas that aren’t accessible with regular tooth brush.
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

<!-- BEFORE AFTER -->
<div class="container mt-5 mb-5 pt-sm-5 pb-sm-5">
	<div class="row">
		<div class="col-lg-5 order-last order-lg-first">
			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How it works ?</h2>
			<p>
				The dentist will clean each and every single tooth from tar and plaque using <span class="text-tertiary font-weight-semibold">ultrasonic scaler</span>.
			</p>

			<hr class="tall dashed">

			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">What to expect ?</h2>
			<p>
				Once the tar and plaque have been removed, your teeth will feel fresh and clean.
			</p>

			<hr class="tall dashed">
			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">Does it hurt ?</h2>
			<p>
				Generally it wouldn’t cause any major pain. Occasionally sensitivity in some spots but if you have not done any cleaning for a very long time. Big chance that the tar has accumulated and pushing the gum to cause recession, then the chance of feeling sensitivity and pain is greater during cleaning. So make sure you do your <span class="text-tertiary font-weight-semibold">general check up and clean at least every 6 months</span>.
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
			</div>
		</div>
	</div>
</div>


<div class="container">
	<hr class="dashed tall">
</div>


<!-- PRICELIST -->

<div class="container py-4">
	<div class="row">
		<div class="col-12">
		    <div class="embed-responsive embed-responsive-16by9">
		        <iframe class="embed-responsive-item" src="<?php echo $videoSrc ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		    </div>			
		</div>
	</div>
</div>
<div class="container mt-5 mb-5 pt-sm-5 pb-sm-5">
	<div class="row">
		<div class="col-md-10 col-lg-8 offset-lg-2 offset-md-1">
			<h2 class="text-secondary mb-4 text-center">How Much It Cost ?</h2>
			<p class="lead text-center">
				The cost for for check up and dental clean is <span class="text-secondary font-weight-semibold">Rp. 600.000 (around AUD 60)</span><br>
				<span class="text-secondary font-weight-semibold">But with ongoing promo we have at the moment,</span><br>
				You can bring a friend and have both of your teeth cleaned for <span class="text-secondary font-weight-semibold">Rp. 900.000 (around AUD 90)</span>.
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
					<p class="mb-0 font-italic" style="font-size: 16px;">for teeth cleaning service</p>
				</div>
				<a class="d-block d-lg-inline-block btn btn-tertiary font-weight-semibold text-color-light  py-3 px-4 ml-lg-4 mt-3 mt-lg-0"
					href="https://confidentdentalhealthcare.simplybook.asia/v2/#book/service/2/"
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
        'subject' => 'Teeth Cleaning Appointment'
    ];
$viewVar = [
        'contact' => $contact
    ];
$this->load->view('front/page/_modal_appointment', $viewVar);
?>