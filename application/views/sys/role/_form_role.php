<?php
$name = isset($role->name) ? strtoupper($role->name) : '';
$defaultFor = isset($role->default_for) ? strtoupper($role->default_for) : '';
$activated = isset($role->actived) && ($role->actived == 1) ? 'checked="checked"' : '';
$deleted = isset($role->deleteable) && ($role->deleteable == 1) ? 'checked="checked"' : '';
?>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Nama</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-badge"></i></span>
			<input name="name" placeholder="Nama" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Nama role harus unik dan belum pernah didaftarkan di dalam sistem
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Default untuk</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-energy"></i></span>
			<input name="default_for" placeholder="Default untuk" class="form-control" type="text" value="<?php echo $defaultFor; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Pengaturan default ini digunakan untuk mengatur role default untuk user yang baru mendaftar ke dalam sistem
		</span>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="custom-switch">
			<input id="switch-activated" class="cmn-toggle cmn-toggle-yes-no hidden" type="checkbox" name="actived" <?php echo $activated; ?> >
			<label for="switch-activated" data-on="ACTIVE ROLE" data-off="INACTIVE ROLE"></label>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="custom-switch">
			<input id="switch-deleted" class="cmn-toggle cmn-toggle-yes-no hidden" type="checkbox" name="deleteable" <?php echo $deleted; ?> >
			<label for="switch-deleted" data-on="DELETEABLE ROLE" data-off="UNDELETED ROLE"></label>
		</div>
	</div>
</div>