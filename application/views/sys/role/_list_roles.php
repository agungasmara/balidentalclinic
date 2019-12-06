<?php
foreach ($roles as $role) :
	$name = ucwords($role->name);
	$defaultFor = ucwords($role->default_for);
	$users = ucwords($role->users_count);
	$activated = $role->actived == 1 ? '<span class="font-weight-semibold btn btn-default mt-2">ACTIVE</span>' :
		'<span class="font-weight-semibold text-muted btn btn-default mt-2">INACTIVE</span>';
	$deleted = $role->deleteable == 1 ? '<span class="font-weight-semibold btn btn-default mt-2">DELETEABLE</span>' :
		'<span class="font-weight-semibold text-muted btn btn-default mt-2">UNDELETED</span>';

	$editLink = base_url('sys/role/edit/' . $role->id);
	$deleteLink = base_url('sys/role/delete/' . $role->id);
	$permissionLink = base_url('sys/role/permission/' . $role->id);
?>

<div class="row data-list">
	<div class="col-md-12 mb-2">
		<div class="border p-3">
			<div class="row">
				<div class="col-sm-8 col-md-9">
					<h4 class="mt-0"><?php echo $name; ?></h4>
					<p class="mt-2 mb-2">
						<i class="icons icon-energy mr-2"></i>Role ini defaultnya digunakan untuk <span class="font-weight-semibold"><?php echo $defaultFor; ?></span><br>
						<i class="icons icon-people mr-2"></i>Ada <span class="font-weight-semibold"><?php echo $users; ?> users</span> yang di assign ke role ini<br>
						<?php echo $activated . ' ' .$deleted; ?>
					</p>
				</div>
				<div class="col-sm-4 col-md-3">
					<div class="btn-actions-sm">
						<a href="<?php echo $editLink; ?>" class="btn btn-default mb-1"><i class="icons icon-pencil"></i></a>
						<a href="<?php echo $permissionLink; ?>" class="btn btn-default mb-1"><i class="icons icon-lock"></i></a>
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