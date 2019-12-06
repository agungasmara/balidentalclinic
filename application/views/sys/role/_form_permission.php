<?php
$rolePermissions = $role->permissions->pluck('id')->toArray();
$module = '';
$controller = '';

foreach ($permissions as $permission) :
?>

<?php
	// close tag for panel
	if (($permission->module != $module || $permission->controller != $controller) && ($module != '' && $controller != '')) {
		echo '</div></div></div>';
	}

	// creaate panel for new module and controller
	if ($permission->module != $module || $permission->controller != $controller) :
		$permModuleController = ucwords($permission->module) . ' / ' . ucwords($permission->controller);
		$keyword = $permission->module . '-' . $permission->controller;
?>

		<div class="row permission-item" data-permission-keyword="<?php echo $keyword; ?>">
		<div class="col-12 mb-2">
			<div class="border p-3">
				<h4 class="heading-primary mt-0 mb-0"><i class="icons icon-folder mr-2"></i><?php echo $permModuleController ?></h4>
			</div>
			<div class="border border-top-0 p-3">

<?php 
	endif 
?>

<?php
				// create checkbox for all permissions
				$module = $permission->module;
				$controller = $permission->controller;
				$id = $permission->id;
				$checkboxId = 'checkbox_' . $id;
				$name = ucfirst($permission->name);
				$actived = ($permission->actived == 1) ? 'checkbox-primary' : 'checkbox-danger';
				$checked = (in_array($id, $rolePermissions)) ? 'checked="checked"' : '';
?>

				<div class="checkbox-custom <?php echo $actived; ?>">
					<input name="permissions[]" value="<?php echo $id; ?>" id="<?php echo $checkboxId ?>" type="checkbox" <?php echo $checked; ?> >
					<label for="<?php echo $checkboxId ?>"><?php echo $name; ?></label>
				</div>

<?php
endforeach;
echo '</div></div></div>';
?>