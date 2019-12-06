<?php
$name = isset($search['name']) ? strtoupper($search['name']) : '';
$status = isset($search['status']) ? $search['status'] : '99';
$module = isset($search['module']) ? $search['module'] : '0';
$controller = isset($search['controller']) ? $search['controller'] : '0';
$method = isset($search['method']) ? $search['method'] : '0';
?>

<div class="row">
	<div class="col-sm-12 col-md-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-lock"></i></span>
			<input name="name" placeholder="Nama" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
	</div>
	<div class="col-sm-6 col-md-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-energy"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('status', $permissionsStatus, $status, $attributes);
			?>
		</div>
	</div>
	<div class="col-sm-6 col-md-4 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-drawer"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('module', $modules, $module, $attributes);
			?>
		</div>
	</div>
	<div class="col-sm-6 col-md-4 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-notebook"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('controller', $controllers, $controller, $attributes);
			?>
		</div>
	</div>
	<div class="col-sm-6 col-md-4 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-doc"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('method', $methods, $method, $attributes);
			?>
		</div>
	</div>
</div>