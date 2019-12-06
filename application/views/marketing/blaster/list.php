<?php
$addLink = base_url('marketing/blaster/add');
$resetLink = base_url('marketing/blaster');
?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-9">
				<h3 class="heading-primary mb-0 mt-2">Email Blaster</h3>
				<p class="mb-0">All email queue that blast to your customer</p>
			</div>
			<div class="col-sm-3">
				<div class="btn-actions-sm form-lg">
					<button class="btn btn-default mb-1" data-toggle-search="form-search-user"><i class="icons icon-magnifier"></i></button>
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
		$attributes = [
			'id' => 'form-search-blaster',
			'class' => 'form-lg form-borderless mb-md'
		];
		echo form_open('marketing/blaster', $attributes);

		$this->load->view('marketing/blaster/_form_search_blaster');
		$this->load->view('layout/back/component/_btn_action_search', ['resetLink' => $resetLink]);
		?>

		<hr class="dashed">

		<?php
		echo form_close();
		?>

	</div>
</div>

<div id="list-users">
	<?php $this->load->view('marketing/blaster/_list_blasters'); ?>
</div>

<div class="row mt-3">
	<div class="col-md-12">
		<nav aria-label="Number of user records" class="d-none d-md-inline-block">
			<ul class="pagination-medium pagination hidden-xs">
				<li class="page-item"><span class="page-link"><?php echo $this->pagination->getTotalRows(); ?> Data</span></li>
				<li class="page-item"><span class="page-link">Hal. <?php echo $this->pagination->getNumPages(); ?></span></li>
			</ul>
		</nav>

		<nav aria-label="Search user pages" class="d-inline-block">
		<?php echo $this->pagination->create_links(); ?>
		</nav>

	</div>
</div>

<?php
$this->load->view('layout/back/component/_modal_delete_confirmation');
$this->load->view('layout/back/component/_modal_delete_success');
?>