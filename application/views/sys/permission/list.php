<?php
$addLink = base_url('sys/permission/add');
$resetLink = base_url('sys/permission');
?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-9">
				<h3 class="heading-primary mb-0 mt-2">Daftar Permission</h3>
				<p class="mb-0">Daftar permission yang tersimpan di dalam sistem</p>
			</div>
			<div class="col-sm-3">
				<div class="btn-actions-sm form-lg">
					<button class="btn btn-default mb-1" data-toggle-search="form-search-permission"><i class="icons icon-magnifier"></i></button>
					<a href="<?php echo $addLink; ?>" class="btn btn-default mb-1"><i class="icons icon-note"></i></a>
				</div>
			</div>
		</div>
		<hr class="dashed">
	</div>
</div>

<div class="row pt-0">
	<div class="col-md-12">

		<?php
		$this->load->view('layout/back/component/_alert_error');

		$attributes = [
			'id' => 'form-search-permission',
			'class' => 'form-lg form-borderless mb-md'
		];
		echo form_open('sys/permission', $attributes);

		$this->load->view('sys/permission/_form_search_permission');
		$this->load->view('layout/back/component/_btn_action_search', ['resetLink' => $resetLink]);
		?>

		<hr class="dashed">

		<?php
		echo form_close();
		?>

	</div>
</div>

<div id="list-permissions">
	<?php $this->load->view('sys/permission/_list_permissions'); ?>
</div>

<div class="row mt-3">
	<div class="col-md-12">
		<nav aria-label="Number of permission records" class="d-none d-md-inline-block">
			<ul class="pagination-medium pagination">
				<li class="page-item"><span class="page-link"><?php echo $this->pagination->getTotalRows(); ?> Data</span></li>
				<li class="page-item"><span class="page-link">Hal. <?php echo $this->pagination->getNumPages(); ?></span></li>
			</ul>
		</nav>

		<nav aria-label="Search permission pages" class="d-inline-block">
		<?php echo $this->pagination->create_links(); ?>
		</nav>

	</div>
</div>

<?php
$this->load->view('layout/back/component/_modal_delete_confirmation');
$this->load->view('layout/back/component/_modal_delete_success');
?>