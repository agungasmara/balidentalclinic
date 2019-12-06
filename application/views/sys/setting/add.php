
<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-md-12">
				<h3 class="heading-primary mb-0 mt-2">Form Konfigurasi Aplikasi</h3>
				<p class="mb-0">Update konfigurasi aplikasi sesuai dengan kebutuhan Anda</p>
			</div>
		</div>
		<hr class="dashed">
	</div>
</div>

<div class="row pt-0">
	<div class="col-md-12">

	<?php
	$this->load->view('layout/back/component/_alert_block_error');
	$this->load->view('layout/back/component/_alert_info');
	$this->load->view('layout/back/component/_alert_error');

	$attributes = [
		'id' => 'form-edit-setting',
		'class' => 'form-lg form-borderless',
		'data-target-error' => 'error-message-block',
		'data-target-success' => 'info-message'
	];

	echo form_open('sys/setting/update', $attributes);
	
	$this->load->view('sys/setting/_form_setting');
	$this->load->view('sys/setting/_btn_setting');

	echo form_close();
	?>

	</div>
</div>