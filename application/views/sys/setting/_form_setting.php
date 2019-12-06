
<?php 
foreach ($settings as $setting) : 
	$code = $setting->code;
	$name = $setting->name;
	$value = $setting->value;
	$type = $setting->type;
?>

<?php if ($type == 'text') : ?>

<div class="row">
	<div class="col-md-12 mb-3">
		<label class="hidden-xs control-label"><?php echo $name; ?></label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-doc"></i></span>
			<input name="<?php echo $code; ?>" class="form-control" type="text" value="<?php echo $value; ?>">
		</div>
	</div>
</div>

<?php endif; ?>


<?php 
if ($type == 'image') :

	if ($code == 'site_logo') {
		$default = base_url($this->config->item('siteAssetDir') . $value);
		$fileSize = filesize($this->config->item('siteAssetDir') . $value);
	}

	if ($code == 'default_avatar') {
		$default = base_url() . $this->config->item('avatarDir') . $value;
		$fileSize = filesize($this->config->item('avatarDir') . $value);
	}

	if ($code == 'login_bg') {
		$default = base_url($this->config->item('siteAssetDir') . $value);
		$fileSize = filesize($this->config->item('siteAssetDir') . $value);
	}
?>

<div class="row">
	<div class="col-sm-12 mb-3">
		<label class="hidden-xs control-label"><?php echo $name; ?></label>
		<span id="data_<?php echo $code; ?>" class="hidden" data-filesize="<?php echo $fileSize; ?>" data-filename="<?php echo $value; ?>"><?php echo $default; ?></span>
		<input id="<?php echo $code; ?>" name="<?php echo $code; ?>" type="file" class="file-loading" />
	</div>
</div>

<?php endif; ?>

<?php endforeach; ?>