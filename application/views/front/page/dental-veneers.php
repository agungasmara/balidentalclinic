<?php
$imgHeaderLink = base_url($this->config->item('siteAssetDir') . 'veneer.jpg');
$image1 = base_url($this->config->item('siteAssetDir') . 'veneer1.jpg');
$image2 = base_url($this->config->item('siteAssetDir') . 'veneer2.jpg');
$image3 = base_url($this->config->item('siteAssetDir') . 'veneer3.jpg');
$image4 = base_url($this->config->item('siteAssetDir') . 'veneer4.jpg');
$image5 = base_url($this->config->item('siteAssetDir') . 'veneer5.jpg');
$image6 = base_url($this->config->item('siteAssetDir') . 'veneer6.jpg');

$videoSrc = 'https://www.youtube.com/embed/Wa38D-JASiE';
$bookLink = base_url();
$instantbooking = 'https://confidentdentalhealthcare.simplybook.asia/v2/#book/service/5/';
?>

<!-- PAGEHEADER -->
<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0"
	data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%'}" data-image-src="<?php echo $imgHeaderLink; ?>">
	<div class="container">
		<div class="row justify-content-left">
			<div class="col-lg-6 text-left">
				<h2 class="text-light mb-2">BETTER SMILE WITH VENEERS</h2>
				<h5 class="text-tertiary mb-5">Yes we do veneers, <span class="text-tertiary font-weight-semibold">a nearby kuta profesional dental clinic</span>. here are some freguently asked question from our clients </h5>
				<p class="text-light">
					<span class="text-tertiary font-weight-semibold">Dental Veneer</span> is a thin layer of porcelain or composite material to cover the external surface of the tooth, to correct any discoloration, mild mal-position etc. 
				</p>
				<a href="<?=$instantbooking?>" class="btn btn-tertiary py-3 px-5 p-sm-4 font-weight-semibold mb-5 ">
					<i class="icons icon-calendar mr-3"></i>
					INSTANT BOOKING
				</a>
				
				<a href="#modal-appointment" class="btn btn-tertiary py-3 px-5 p-sm-4 font-weight-semibold mb-5 popup-with-zoom-anim">
					<i class="icons icon-calendar mr-3"></i>
					JUST BOOK NOW
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
			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How It Works ?</h2>

			<p>
				<span class="text-tertiary font-weight-semibold">The dentist will shave the external surface of your teeth</span>, as minimal as possible before taking an impression mould. After which, the mould is being sent to the lab, to fabricate porcelain veneers before cementing it on to the teeth permanently.
			</p>

			<p>
				For composite veneers, the dentist will also shave down the teeth surface as needed, then using composite material, the dentist will shape and carve the composite directly on the tooth, before polishing them to make them look shinny and feel comfortable for you.
			</p>
			<p>
				<span class="text-tertiary font-weight-semibold lead">What to expect?</span> Depending on the original condition of your teeth, if your teeth are suitable for veneers. Upon completion, you will see and feel the improvement of shape or sized with using veneers. For smile test drive, please let our dentist know, because you may request for wax up model which is the blueprint of the end results for your to try (for porcelain veneers)
			</p>
		</div>
	</div>
</div>


<!-- BEFORE AFTER -->
<section class="section section-default mb-0 mt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 order-last order-lg-first">
				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How long do I need to stay?</h2>
				<p>
					<span class="text-tertiary font-weight-semibold">For the porcelain veneers</span>, we would recommend about 7 days (Saturdays and Sundays are not included) to cover lab working time and any follow ups if necessary. If wax up for smile test drive is required, additional of 2 days are required. 
				</p>
				<p>
					<span class="text-tertiary font-weight-semibold">For composite veneer</span>, it will take 30-60 minutes per tooth.

				</p>

				<hr class="tall dashed">

				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">Special treatment after veneers?</h2>
				<p>
					<span class="text-tertiary font-weight-semibold lead">Dental hygiene is mandatory</span>. Make sure you brush, floss and use mouth wash to make sure your dental hygiene is at its best and to make sure to follow the instructions of your dentist post veneers.
				</p>

				<hr class="tall dashed">
				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How long does it last ?</h2>
				<p>
					<span class="text-tertiary font-weight-semibold">Porcelain Veneers can last about 8-10 years</span>. If you take a good care of your veneers, they can last for as long as possible. Composite veneer last shorter than porcelain venners. 
				</p>
			</div>
			<div class="offset-lg-1 col-lg-6 mt-lg-2 mt-0 mb-5 mb-lg-0 order-first order-lg-last">
				<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10}">
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image3; ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image1; ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image2; ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image4; ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image5; ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="<?php echo $image6; ?>">
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
				Porcelain veneer costs about  <span class="text-secondary font-weight-semibold">Rp. 4.000.000 (around AUD 400)</span><br>
				Direct composite veneer costs about   <span class="text-secondary font-weight-semibold">Rp. 900.000 (around AUD 90)</span>
				
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
					<p class="mb-0 font-italic" style="font-size: 16px;">Dental Veneer service</p>
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
        'subject' => 'Dental Veneers Appointment'
    ];
$viewVar = [
        'contact' => $contact
    ];
$this->load->view('front/page/_modal_appointment', $viewVar);
?>