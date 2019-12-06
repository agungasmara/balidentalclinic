<?php
$name = isset($search['name']) ? $search['name'] : '';
$email = isset($search['email']) ? $search['email'] : '';
$role = isset($search['role']) ? $search['role'] : '0';
$actived = isset($search['actived']) ? $search['actived'] : '99';
?>


<div class="row">
	<div class="col-sm-12 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-user"></i></span>
			<input name="name" placeholder="Nama" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
	</div>

	<div class="col-md-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-envelope"></i></span>
			<input name="email" placeholder="Email" class="form-control" type="text" value="<?php echo $email; ?>">
		</div>
	</div>

	<div class="col-sm-6 col-md-3 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-badge"></i></span>
			<?php
			$attributes = [
				'class' => 'form-control'
			];
			echo form_dropdown('role', $roles, $role, $attributes);
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
			echo form_dropdown('actived', $statusList, $actived, $attributes);
			?>
		</div>
	</div>
</div>