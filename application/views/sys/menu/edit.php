<?php
$listLink = base_url('sys/menu');
$sortLink = base_url('sys/menu/order');
$btnAttribute = [
	'listLink' => $listLink,
	'btnCaption' => 'DAFTAR USER'
];
?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-9">
				<h3 class="heading-primary mb-0 mt-2">Form Edit Menu</h3>
				<p class="mb-0">Edit data menu yang ada di dalam sistem</p>
			</div>
			<div class="col-sm-3">
				<div class="btn-actions-sm form-lg">
					<a href="<?php echo $listLink; ?>" class="btn btn-default mb-1"><i class="icons icon-arrow-left"></i></a>
					<a href="<?php echo $sortLink; ?>" class="btn btn-default mb-1"><i class="icons icon-equalizer"></i></a>
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
		'id' => 'form-edit-menu',
		'class' => 'form-lg form-borderless',
		'data-target-error' => 'error-message-block',
		'data-target-success' => 'info-message'
	];

	echo form_open('sys/menu/update/'. $menu->id, $attributes);
	
	$this->load->view('sys/menu/_form_menu');
	$this->load->view('layout/back/component/_btn_action_form', $btnAttribute);

	echo form_close();
	?>

	</div>
</div>