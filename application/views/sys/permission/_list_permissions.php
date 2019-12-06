<?php
foreach ($permissions as $permission) :
	$name = ucwords($permission->name);
	$module = ucwords($permission->module);
	$controller = ucwords($permission->controller);
	$method = ucwords($permission->method);
	$roles = $permission->roles_count > 0 ? 'Ada <span class="font-weight-semibold">' . $permission->roles_count . ' Role</span> yang menggunakan permission ini' :
		'Tidak ada roles yang menggunakan permission ini';
	$activated = $permission->actived == 1 ? '<span class="font-weight-semibold btn btn-default mt-2">ACTIVE</span>' :
		'<span class="font-weight-semibold text-muted btn btn-default mt-2">INACTIVE</span>';

	$editLink = base_url('sys/permission/edit/' . $permission->id);
	$deleteLink = base_url('sys/permission/delete/' . $permission->id);
?>

<div class="row data-list">
	<div class="col-md-12 mb-2">
		<div class="border p-3">
			<div class="row">
				<div class="col-sm-9 col-md-10">
					<h4 class="mt-0"><?php echo $name; ?></h4>
					<p class="mt-2 mb-2">
						<i class="icons icon-folder mr-2"></i>Untuk module <span class="font-weight-semibold"><?php echo $module; ?></span><br>
						<i class="icons icon-energy mr-2"></i>Mengakses method <span class="font-weight-semibold"><?php echo $method; ?></span> di class controller <span class="font-weight-semibold"><?php echo $controller; ?></span><br>
						<i class="icons icon-badge mr-2"></i><?php echo $roles; ?><br>
						<?php echo $activated; ?>
					</p>
				</div>
				<div class="col-sm-3 col-md-2">
					<div class="btn-actions-sm">
						<a href="<?php echo $editLink; ?>" class="btn btn-default mb-1"><i class="icons icon-pencil"></i></a>
						<a href="<?php echo $deleteLink; ?>" class="btn btn-default mb-1" data-delete-confirmation="<?php echo $name; ?>"><i class="icons icon-trash"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
endforeach;
?>