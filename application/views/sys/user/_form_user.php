<?php
$firstName = isset($user->first_name) ? strtoupper($user->first_name) : '';
$lastName = isset($user->last_name) ? strtoupper($user->last_name) : '';
$email = isset($user->email) ? $user->email : '';
$role = isset($user->roles) ? $user->roles->first() : NULL;
$role = ! is_null($role) ? $role->id : '0';
$activated = isset($user->actived) && ($user->actived == 1) ? 'checked="checked"' : '';
?>

<div class="row">
	<div class="col-sm-12 mb-lg-3">
		<div class="custom-switch">
			<input id="switch-activated" class="cmn-toggle cmn-toggle-yes-no hidden" type="checkbox" name="actived" <?php echo $activated; ?> >
			<label for="switch-activated" data-on="ACTIVE USER" data-off="INACTIVE USER"></label>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Email</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-envelope"></i></span>
			<input name="email" placeholder="Email" class="form-control" type="text" value="<?php echo $email; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Data email harus unik dan belum pernah didaftarkan di dalam sistem
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Role</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-badge"></i></span>
			<?php
				$attributes = [
					'class' => 'form-control'
				];
				echo form_dropdown('role_id', $roles, $role, $attributes);
			?>
		</div>
		<span class="help-block d-none d-sm-block">
			Pilih role yang sesuai dengan user. Role menentukan modul yang dapat diakses oleh user
		</span>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Nama Depan</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-user"></i></span>
			<input name="first_name" placeholder="Nama depan" class="form-control" type="text" value="<?php echo $firstName; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Hanya dapat diisi dengan karakter huruf
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Nama Belakang</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-user"></i></span>
			<input name="last_name" placeholder="Nama belakang" class="form-control" type="text" value="<?php echo $lastName; ?>">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Kata Kunci</label>
		<div class="input-group">
			<span class="input-group-addon"><input type="checkbox" value="1" name="password_needed"></i></span>
			<input name="password" placeholder="Kata kunci" class="form-control" type="password" disabled="disabled">
		</div>
		<span class="help-block d-none d-sm-block">
			Untuk keamanan gunakan kombinasi huruf dan angka sebagai kata kunci dan terdiri dari minimal 6 karakter
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Konfirmasi Kata Kunci</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-lock"></i></span>
			<input name="password_confirmation" placeholder="Konfirmasi kata kunci" class="form-control" type="password" disabled="disabled">
		</div>
		<span class="help-blockd-none d-sm-block">
			Tulis ulang kata kunci yang akan digunakan
		</span>
	</div>
</div>