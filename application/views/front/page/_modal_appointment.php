<div id="modal-appointment" class="dialog dialog-ld zoom-anim-dialog mfp-hide">		
	<h2 class="mb-3">Book Appoinment</h2>
	<p style="font-size: 13px;">
		Fill this form and if you want to book appoinment with our doctor.
		Please write schedule date and descrive your emdical condition in message box.<br>
		Our representative will response to you as soon as possible.
	</p>

	<?php
	$this->load->view('layout/back/component/_alert_error');
	$this->load->view('layout/back/component/_alert_info');
	$attributes = [
		'id' => 'form-appointment',
		'class' => 'form-borderless form-lg',
		'data-target-error' => 'error-message',
		'data-target-success' => 'info-message',
		'data-scroll' => 'true'
	];
	echo form_open('home/post_email', $attributes);
	$this->load->view('front/home/_form_contact');
	echo form_close();
	?>
</div>