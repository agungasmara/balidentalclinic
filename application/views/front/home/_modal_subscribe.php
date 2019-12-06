<div id="modal-subscribe" class="dialog dialog-sm zoom-anim-dialog mfp-hide">
	<h2 class="mb-3">Subscription Form</h2>
	<p style="font-size: 13px;">
		Fill this form and <span class="font-weight-semibold text-tertiary">Get 20% Off Teeth Whitening</span>
	</p>

	<?php
	$this->load->view('layout/back/component/_alert_error');
	$this->load->view('layout/back/component/_alert_info');
	$attributes = [
		'id' => 'form-subscribe',
		'class' => 'form-borderless form-lg',
		'data-target-error' => 'error-message',
		'data-target-success' => 'info-message',
		'data-scroll' => 'true'
	];
	echo form_open('home/subscribe', $attributes);
	?>

	<div class="input-group mb-1">
		<span class="input-group-addon"><i class="icon-user"></i></span>
		<input name="name" placeholder="Name" class="form-control text-uppercase" type="text">
	</div>
	<div class="input-group mb-1">
		<span class="input-group-addon"><i class="icon-envelope"></i></span>
		<input name="email" placeholder="EMAIL" class="form-control" type="text">
	</div>
	<button class="btn btn-tertiary btn-block font-weight-semibold" type="sumbit"
		data-submit-loader="WAIT A MOMMENT"
		data-submit-finish="SUBSCRIBE NOW">
		SUBSCRIBE NOW
	</button>

	<?php echo form_close(); ?>

</div>