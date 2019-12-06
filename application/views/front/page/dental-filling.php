 <?php

$imgHeaderLink = base_url($this->config->item('siteAssetDir') . 'dental-filling.jpg');

$image3 = base_url($this->config->item('siteAssetDir') . 'filling1.jpg');
$image1 = base_url($this->config->item('siteAssetDir') . 'filling2.jpg');
$image2 = base_url($this->config->item('siteAssetDir') . 'filling3.jpg');

$videoSrc = 'https://www.youtube.com/embed/0cu46Qy1Y3U';

$instantbooking = 'https://confidentdentalhealthcare.simplybook.asia/v2/#book/service/12/';
 
$bookLink = base_url(); 

?>



<!-- PAGEHEADER -->

<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0"

	data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '120%'}" data-image-src="<?php echo $imgHeaderLink; ?>">

	<div class="container">

		<div class="row justify-content-left">

			<div class="col-lg-6 text-left">

				<h2 class="text-light mb-2">Restore Smile with Dental Filling in Bali</h2>

				<h5 class="text-tertiary mb-5">Yes we do dental filling to repair decay in teeth, here some FAQ from our client about Dental Filling</h5>

				<p class="text-light">

					<span class="text-tertiary font-weight-semibold">A Dental Filling </span>a process of restoring a tooth which is damaged by decay in order to return to both its normal function and shape. The doctor is going to initially eliminate the decayed tooth before giving a filling material.
				</p>

				<p class="text-light mb-5">

					A Dental Filling is able to prevent further decay of the tooth because the spaces where bacteria is collected is closed off. There are some materials which can be used for filling, they are, including gold, porcelain, a composite resin (colorful fillings), and an amalgam (a mercury alloy, silver, copper, tin, and zinc).

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

			<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">Which is the best?</h2>

			<p>

				Neither of dental filling types are best to everybody, as they are determined by the extent of the repair, the allergies caused by certain materials, as well as the cost. There are several considerations for different materials, they include:<br>
				<ul>
					<li>
						Gold dental fillings. They are initially made to order in a laboratory, and later on be cemented into certain place. May withstand for more than 20 years. 
					</li>
					<li>
						Amalgam (silver) dental fillings. They are both resistant to wear, and reasonably inexpensive. They are rarely used in visible areas, such as for front teeth.
					</li>
					<li>
						Composite (plastic) resins. They are perfectly match as the teeth; thus, they are used in which a natural appearance is preferred. Able to last from 3 to 10 years.
					</li>
					<li>
						Porcelain dental fillings. Created to order in a laboratory, and later on be attached to the teeth. They are generally able to cover most of the decayed teeth, and cost approximately to gold dental fillings.
					</li>
				</ul>

			</p>


			

		</div>

	</div>

</div>





<!-- BEFORE AFTER -->

<section class="section section-default mb-0 mt-0">

	<div class="container">

		<div class="row">

			<div class="col-lg-5 order-last order-lg-first">

				<h2 class="text-primary mb-2 mb-md-3 mb-lg-4">What happens when get a dental filling?</h2>

				<p>

					If a dental filling is recommended to a cavity, the doctor is going to initially eliminate the decay and clean out the areas which are affected, and later on the clean cavities are then filled with preferred dental filling materials.
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

				The cost for Dental Filling itself is 500-800k IDR/tooth depend on the cavity.  <br>

				
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

					<p class="mb-0 font-italic" style="font-size: 16px;">for dental filling service</p>

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
        'subject' => 'Dental Filling'
    ];
$viewVar = [
        'contact' => $contact
    ];
$this->load->view('front/page/_modal_appointment', $viewVar);
?>