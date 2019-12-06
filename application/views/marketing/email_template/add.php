<?php
$listLink = base_url('marketing/email_template');
$btnAttribute = [
	'listLink' => $listLink,
	'btnCaption' => 'TEMPLATE LIST'
];
?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-9">
				<h3 class="heading-primary mb-0 mt-2">Form New Template</h3>
				<p class="mb-0">Add new email template into system</p>
			</div>
			<div class="col-sm-3">
				<div class="btn-actions-sm form-lg">
					<a href="<?php echo $listLink; ?>" class="btn btn-default"><i class="icons icon-arrow-left"></i></a>
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
		'id' => 'form-add-email-template',
		'class' => 'form-lg form-borderless',
		'data-target-error' => 'error-message-block',
		'data-target-success' => 'info-message'
	];

	echo form_open('marketing/email_template/insert', $attributes);
	
	$this->load->view('marketing/email_template/_form_email_template');
	$this->load->view('layout/back/component/_btn_action_form', $btnAttribute);

	echo form_close();
	?>

	</div>
</div>