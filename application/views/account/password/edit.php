
<div class="row">
	<div class="col-md-12">
		<h3 class="heading-primary mb-0 mt-2">Ganti Password Akun</h3>
		<p>Ganti password akun anda secara berkala untuk menjamin keamanan akun</p>
		<hr class="dashed">

		<?php
		$this->load->view('layout/back/component/_alert_block_error');
		$this->load->view('layout/back/component/_alert_info');
		$this->load->view('layout/back/component/_alert_error');

		$attributes = [
			'id' => 'form-change-password',
			'class' => 'form-lg form-borderless',
			'data-target-error' => 'error-message-block',
			'data-target-success' => 'info-message'
		];
		echo form_open('account/password/update', $attributes);
		$this->load->view('account/password/_form_password');
		$this->load->view('account/password/_btn_password');
		echo form_close(); 
		?>

	</div>
</div>