<?php
$listLink = base_url('sys/role');
$permissionLink = base_url('sys/role/permission/' . $role->id);
$btnAttribute = [
	'listLink' => $listLink,
	'btnCaption' => 'DAFTAR ROLE'
];
?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-9">
				<h3 class="heading-primary mb-0 mt-2">Form Edit Role</h3>
				<p class="mb-0">Edit data role yang ada di dalam sistem</p>
			</div>
			<div class="col-sm-3">
				<div class="btn-actions-sm form-lg">
					<a href="<?php echo $listLink; ?>" class="btn btn-default mb-1"><i class="icons icon-arrow-left"></i></a>
					<a href="<?php echo $permissionLink; ?>" class="btn btn-default mb-1"><i class="icons icon-lock"></i></a>
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
		'id' => 'form-edit-role',
		'class' => 'form-lg form-borderless',
		'data-target-error' => 'error-message-block',
		'data-target-success' => 'info-message'
	];

	echo form_open('sys/role/update/'. $role->id, $attributes);
	
	$this->load->view('sys/role/_form_role');
	$this->load->view('layout/back/component/_btn_action_form', $btnAttribute);

	echo form_close();
	?>

	</div>
</div>