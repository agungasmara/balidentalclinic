<?php
$roleName = ucwords($role->name);
$listLink = base_url('sys/role');
?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-9">
				<h3 class="heading-primary mb-0 mt-2">Form Edit Permission</h3>
				<p class="mb-0">Edit data permission yang aktif untuk role <span class="font-weight-semibold"><?php echo $roleName; ?></span></p>
			</div>
			<div class="col-sm-3">
				<div class="btn-actions-sm form-lg">
					<a href="<?php echo $listLink; ?>" class="btn btn-default mb-1"><i class="icons icon-arrow-left"></i></a>
				</div>
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
		'id' => 'form-permitted-role',
		'class' => 'form-lg form-borderless',
		'data-target-error' => 'error-message-block',
		'data-target-success' => 'info-message'
	];

	echo form_open('sys/role/permitted/'. $role->id, $attributes);
	
	$this->load->view('sys/role/_form_search_permission');
	echo '<hr class="dashed">';
	$this->load->view('sys/role/_form_permission');
	$this->load->view('sys/role/_btn_permission');

	echo form_close();
	?>

	</div>
</div>