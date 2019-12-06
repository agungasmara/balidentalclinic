<section class="section section-default border-0 my-0 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div id="googlemapsMarkers" class="google-map mt-0 mb-4"></div>
			</div>
			<div class="col-lg-5">

				<div class="border px-4 py-5 bg-white smooth-shadow">
					<h4 class="text-tertiary font-weight-semibold mb-2">CONTACT US</h4>
					<p>
						If you are a traveler currently exploring Bali and in need of dental care service or general health service, you can contact us :
					</p>
					<?php
					$this->load->view('layout/back/component/_alert_error', ['alertId' => 'form-message-error']);
					$this->load->view('layout/back/component/_alert_info', ['alertId' => 'form-message-info']);
					$attributes = [
						'id' => 'form-message',
						'class' => 'form-borderless form-lg',
						'data-target-error' => 'form-message-error',
						'data-target-success' => 'form-message-info',
						'data-scroll' => 'true'
					];
					echo form_open('home/post_email', $attributes);
					$this->load->view('front/home/_form_contact');
					echo form_close();
					?>
				</div>
				
			</div>
		</div>
	</div>
</section>