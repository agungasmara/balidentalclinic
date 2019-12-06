<?php
$module = isset($permission->module) ? strtoupper($permission->module) : '';
$controller = isset($permission->controller) ? strtoupper($permission->controller) : '';
$method = isset($permission->method) ? strtoupper($permission->method) : '';
$name = isset($permission->name) ? strtoupper($permission->name) : '';
$activated = isset($permission->actived) && ($permission->actived == 1) ? 'checked="checked"' : '';
?>

<div class="row">
	<div class="col-sm-12 mb-lg-3">
		<div class="custom-switch">
			<input id="switch-activated" class="cmn-toggle cmn-toggle-yes-no hidden" type="checkbox" name="actived" <?php echo $activated; ?> >
			<label for="switch-activated" data-on="ACTIVE PERMISSION" data-off="INACTIVE PERMISSION"></label>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Module</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-drawer"></i></span>
			<input name="module" placeholder="Module" class="form-control" type="text" value="<?php echo $module; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Tuliskan module sesuai dengan yang di set di controller
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Controller</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-notebook"></i></span>
			<input name="controller" placeholder="Controller" class="form-control" type="text" value="<?php echo $controller; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Tuliskan nama controller sesuai dengan nama class yang dibuat
		</span>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Method</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-doc"></i></span>
			<input name="method" placeholder="Method" class="form-control" type="text" value="<?php echo $method; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Tuliskan method yang dapat diakses
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Nama</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-lock"></i></span>
			<input name="name" placeholder="Name" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Tuliskan nama yang dapat mendeskripsikan permission dengan singkat dan jelas
		</span>
	</div>
</div>