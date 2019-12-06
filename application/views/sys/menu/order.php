<?php
$listLink = base_url('sys/menu');
$getMenusLink = base_url('sys/menu/get_menus/');
?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-9">
				<h3 class="heading-primary mb-0 mt-2">Form Urutan Menu</h3>
				<p class="mb-0">Edit urutan menu yang ada di dalam sistem</p>
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
	$this->load->view('layout/back/component/_alert_info');
	$this->load->view('layout/back/component/_alert_error');

	$attributes = [
		'id' => 'form-order-menu',
		'class' => 'form-lg form-borderless',
		'data-target-error' => 'error-message',
		'data-target-success' => 'info-message'
	];

	echo form_open('sys/menu/sorted/', $attributes);
	?>
	
	<div class="row">
		<div class="col-12">
			<div class="input-group">
				<span class="input-group-addon"><i class="icons icon-tag"></i></span>
				<?php
					$attributes = [
						'class' => 'form-control',
						'id' => 'menu-order',
						'data-url' => $getMenusLink
					];
					echo form_dropdown('type', $navigationTypes, '0', $attributes);
				?>
			</div>
			<span class="help-block">
				Pilih kategori navigasi menu yang akan diurutkan. Setelah list menu ditampilkan, proses pengurutan dapat dilakukan dengan drag &amp drop.
			</span>
		</div>
	</div>

	<div id="row-nestable" class="row hidden">
		<div class="col-12">
			<hr class="dashed">
			<div id="panel-nestable"></div>
			<hr class="dashed">
			<button data-submit-loader="PROSES PENYIMPANAN LAYOUT" data-submit-finish="SIMPAN LAYOUT MENU" class="btn btn-primary btn-block font-weight-semibold" type="submit">SIMPAN LAYOUT MENU</button>
		</div>
	</div>

	<?php
	echo form_close();
	?>

	</div>
</div>