<?php
$name = isset($menu->name) ? strtoupper($menu->name) : '';
$navigationType = isset($menu->nav_type) ? $menu->nav_type : '';
$htmlId = isset($menu->html_id) ? $menu->html_id : '';
$icon = isset($menu->icon) ? $menu->icon : '';
$permission = isset($menu->permission_id) ? $menu->permission_id : 0;
$external = isset($menu->is_internal) && ($menu->is_internal == 0) ? 'checked="checked"' : '';
$link = isset($menu->link) ? $menu->link : '';
$isLogin = isset($menu->is_login) && ($menu->is_login == 1) ? 'checked="checked"' : '';

$ajaxUrl = base_url('sys/menu/get_parents/');
$menuId = isset($menu) ? $menu->id : 0;
?>

<div class="row">
	<div class="col-12 mb-sm-3">
		<div class="custom-switch">
			<input id="switch-internal" class="cmn-toggle cmn-toggle-yes-no hidden" type="checkbox" name="external" <?php echo $external; ?> >
			<label for="switch-internal" data-on="LINK EKSTERNAL" data-off="LINK INTERNAL"></label>
		</div>
	</div>

	<div class="col-12 mb-2">
		<label class="d-none d-sm-block control-label">Link</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-link"></i></span>
			<input name="link" placeholder="Link" class="form-control" type="text" value="<?php echo $link; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Untuk <span class="font-weight-semibold">link internal</span> cukup tuliskan path relatif nya, contoh : <span class="font-weight-semibold">'sys/user'</span>. Untuk link eksternal, tuliskan link dengan lengkap, contoh : <span class="font-weight-semibold">https://www.google.co.id/</span>
		</span>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Tipe Navigasi</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-tag"></i></span>
			<?php
				$attributes = [
					'class' => 'form-control'
				];
				echo form_dropdown('nav_type', $navigationTypes, $navigationType, $attributes);
			?>
		</div>
		<span class="help-block d-none d-sm-block">
			Pilih kategori navigasi untuk menu yang akan disimpan
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Nama</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-grid"></i></span>
			<input name="name" placeholder="Nama" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Nama menu yang akan ditampilkan
		</span>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">HTML ID</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-paper-plane"></i></span>
			<input name="html_id" placeholder="HTML ID" class="form-control" type="text" value="<?php echo $htmlId; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			HTML ID untuk trigger menu aktif
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Icon</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-drop"></i></span>
			<input name="icon" placeholder="Icon" class="form-control" type="text" value="<?php echo $icon; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			List icon yang dapat digunakan adalah <a href="http://fontawesome.io/cheatsheet/">Font Awsome</a> atau <a href="http://simplelineicons.com/">Simple Line</a>. Tuliskan class secara lengkap "<span class="font-weight-semibold">fa fa-user</span>"
		</span>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<label class="d-none d-sm-block control-label">Login Akses</label>
		<div class="custom-switch">
			<input id="switch-login" class="cmn-toggle cmn-toggle-yes-no hidden" type="checkbox" name="is_login" <?php echo $isLogin; ?> >
			<label for="switch-login" data-on="AKSES LOGIN" data-off="PUBLIK / PERMISSION"></label>
		</div>
	</div>

	<div id="permission_selectbox" class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Permission</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-folder"></i></span>
			<?php
				$attributes = [
					'class' => 'select2'
				];
				echo form_dropdown('permission_id', $permissions, $permission, $attributes);
			?>
		</div>
		<span class="help-block d-none d-sm-block">
			Pilih jika menu hanya bisa diakses dengan permission tertentu
		</span>
	</div>
</div>