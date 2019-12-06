<?php
$navType = isset($search['type']) ? $search['type'] : '0';
$name = isset($search['name']) ? $search['name'] : '';
?>

<div class="row">
	<div class="col-sm-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-tag"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('type', $navigationTypes, $navType, $attributes);
			?>
		</div>
	</div>

	<div class="col-sm-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-grid"></i></span>
			<input name="name" placeholder="Nama" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
	</div>
</div>