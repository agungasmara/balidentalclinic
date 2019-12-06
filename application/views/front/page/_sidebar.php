<?php
$shops = [
	'shop1' => (object) [
		'name' => 'Confident Dental & Health Care',
		'description' => 'Jl. Padma Utara No.4,<br>
			Legian, Kuta, Bali 80361<br>
			<span class="font-italic">( Next to Y Sports Bar Legian )</span>',
		'link' => 'https://www.google.co.id/maps/place/confident+dental+and+health+care/@-8.70507,115.168534,15z/data=!4m12!1m6!3m5!1s0x0:0x39a767f5efac5052!2sconfident+dental+and+health+care!8m2!3d-8.70507!4d115.168534!3m4!1s0x0:0x39a767f5efac5052!8m2!3d-8.70507!4d115.168534'
	]
];
?>

<div class="widget">
	<a class="btn btn-tertiary btn-block font-weight-semibold text-center text-color-light popup-with-zoom-anim py-3 mb-2 mt-5 mt-lg-0 mb-lg-5" 
		href="#modal-appointment">
		<i class="icons icon-calendar mr-2"></i>
		BOOK APPOINTMENT
	</a>
	<h5 class="text-primary pt-4">Contact Us</h5>
	<hr class="dashed">
	<div class="widget-body">
		<p class="mb-2">
			Yes, <span class="font-weight-semibold text-tertiary">We open everyday</span><br>
			From <span class="text-primary font-weight-semibold">Monday</span> to
			<span class="text-primary font-weight-semibold">Sunday</span>,<br>
			We start at <span class="text-primary font-weight-semibold">9AM</span> until 
			<span class="text-primary font-weight-semibold">10PM</span>
		</p>
		<p class="mb-2">
			If you are a traveler currently exploring Bali and in need of dental care service
			or general health service, you can contact us :
		</p>

		<p class="mb-2">
			WhatsApp :<br>
			<a href="https://wa.me/6281337398840" target="_blank" class="text-primary font-weight-semibold">+62 813 3739 8840</a>
		</p>

		<p class="mb-2">
			Email :<br>
			<a href="mailto:admin@balidentalclinic.com" class="text-primary font-weight-semibold">admin@balidentalclinic.com</a>
		</p>

		<hr class="dashed">
		<p class="mb-3 pt-20">Or directly directly visit our clinic that located at :</p>

		<?php
		foreach ($shops as $shop) :
			$name = ucwords($shop->name);
			$description = $shop->description;
			$link = $shop->link;
		?>
		<div class="mb-3" style="color: rgb(119, 119, 119);">
			<a href="<?php echo $link; ?>" class="text-primary font-weight-semibold" target="_blank">
				<?php echo $name; ?>
			</a><br>
			<?php echo $description; ?> 
		</div>
		<?php endforeach; ?>

	</div>
</div>

<?php $this->load->view('front/page/_modal_appointment'); ?>