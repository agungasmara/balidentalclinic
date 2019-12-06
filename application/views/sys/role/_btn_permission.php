<?php
$listLink = base_url('sys/role');
?>

<hr class="dashed">
<div class="row d-none d-sm-block">
	<div class="col-sm-12">
		<button data-submit-loader="PROSES PENYIMPANAN DATA" data-submit-finish="SIMPAN DATA" class="btn btn-primary font-weight-semibold" type="submit">SIMPAN DATA</button>
		<button class="btn-check-uncheck btn btn-default font-weight-semibold" type="button" data-check-status="on">PILIH SEMUA</button>
		<a href="<?php echo $listLink; ?>" class="btn btn-default font-weight-semibold">DAFTAR ROLE</a>
	</div>
</div>

<div class="row d-sm-none">
	<div class="col-sm-12">
		<button data-submit-loader="PROSES PENYIMPANAN DATA" data-submit-finish="SIMPAN DATA" class="btn btn-primary btn-block font-weight-semibold" type="submit">SIMPAN DATA</button>
		<button class="btn-check-uncheck btn btn-default btn-block font-weight-semibold" type="button" data-check-status="on">PILIH SEMUA</button>
		<a href="<?php echo $listLink; ?>" class="btn btn-default btn-block font-weight-semibold">DAFTAR ROLE</a>
	</div>
</div>