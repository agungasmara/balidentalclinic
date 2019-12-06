 <?php

$imgHeaderLink = base_url($this->config->item('siteAssetDir') . 'Dental-Crown.jpg');

$image3 = base_url($this->config->item('siteAssetDir') . 'crown3.jpg');
$image1 = base_url($this->config->item('siteAssetDir') . 'crown1.jpg');
$image2 = base_url($this->config->item('siteAssetDir') . 'crown2.jpg');

$videoSrc = 'https://www.youtube.com/embed/N4aNzwXpC-4';

$instantbooking = 'https://confidentdentalhealthcare.simplybook.asia/v2/#book/service/5/';
 
$bookLink = base_url(); 

?> 



<!-- PAGEHEADER -->

<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0"

	data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%'}" data-image-src="<?php echo $imgHeaderLink; ?>">

	<div class="container">

		<div class="row justify-content-left">

			<div class="col-lg-6 text-left">

				<h2 class="text-light mb-2">Restore Your Smile &amp; with Dental Crown in Bali</h2>

				<h5 class="text-tertiary mb-5">Yes we do crown to restore your smile, here some FAQ from our client about crown</h5>

				<p class="text-light">

					<span class="text-tertiary font-weight-semibold">Dental Crown</span> is a type of restoration that covers the whole tooth after being shaved down/ prepped. The indication for dental crown includes, post root canal treatment, cracked tooth, big decay

				</p>

				<p class="text-light mb-5">

					if you are visiting Bali and try to keep your brighter smile during holiday, we strongly recommend for you to make an appointment as this procedure is at high demand.

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

				The dentist will prep the tooth small to compensate the crown (cap like shape) before taking impression mould. After which, the mould is being sent to the lab, to fabricate the crown before cementing it on to the teeth permanently.

			</p>


			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">What to Expect? ?</h2>

			<p>

				The shape and colour of the <span class="text-tertiary font-weight-semibold">crown will be as close as the adjacent teeth and looking natural</span>, and most importantly comfortable for you. At times, adjustments may be needed.
			</p>

		</div>

	</div>

</div>





<!-- BEFORE AFTER -->

<section class="section section-default mb-0 mt-0">

	<div class="container">

		<div class="row">

			<div class="col-lg-5 order-last order-lg-first">

				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How long do I need to stay ?</h2>

				<p>
					For dental crowns, we would <span class="text-tertiary font-weight-semibold">recommend about 7-10 days </span>(Saturdays and Sundays are not included) to cover lab working time and any follow ups if necessary. 

				</p>



				<hr class="tall dashed">



				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">Special treatment after crowns ?</h2>

				<p>

					<span class="text-tertiary font-weight-semibold">Dental hygiene is mandatory</span>. Make sure you brush, floss and use mouth wash to make sure your dental hygiene is at its best and to make sure to follow the instructions of your dentist.

				</p>



				<hr class="tall dashed">

				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">How long does it last ?</h2>

				<p>

					Dental crown can <span class="text-tertiary font-weight-semibold">last about 8-10 years</span>. If you take a good care of your crowns, they can last for as long as possible. 

				</p>

			</div>

			<div class="offset-lg-1 col-lg-6 mt-lg-2 mt-0 mb-5 mb-lg-0 order-first order-lg-last">

				<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10}">

					<div>

						<img alt="" class="img-fluid" src="<?php echo $image2; ?>">

					</div>

					<div>

						<img alt="" class="img-fluid" src="<?php echo $image3; ?>">

					</div>

					<div>

						<img alt="" class="img-fluid" src="<?php echo $image1; ?>">

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

				The cost for Dental Crown it self is <span class="text-secondary font-weight-semibold">Rp. 4.000.000 – Rp. 5.000.000 (about AUD 400-500) per tooth.</span> This is depending on the type of material used in the crown.  <br>

				
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

					<p class="mb-0 font-italic" style="font-size: 16px;">for dental crown service</p>

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
        'subject' => 'Dental Crown Appoitment'
    ];
$viewVar = [
        'contact' => $contact
    ];
$this->load->view('front/page/_modal_appointment', $viewVar);
?>