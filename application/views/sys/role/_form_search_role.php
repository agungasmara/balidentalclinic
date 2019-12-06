<?php
$name = isset($search['name']) ? strtoupper($search['name']) : '';
$status = isset($search['status']) ? $search['status'] : '99';
$deleted = isset($search['deleted']) ? $search['deleted'] : '99';
?>

<div class="row">
	<div class="col-sm-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-badge"></i></span>
			<input name="name" placeholder="Nama" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
	</div>

	<div class="col-sm-6 col-md-3 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-energy"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('status', $rolesStatus, $status, $attributes);
			?>
		</div>
	</div>

	<div class="col-sm-6 col-md-3 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-energy"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('deleted', $rolesDeleteStatus, $deleted, $attributes);
			?>
		</div>
	</div>
</div>