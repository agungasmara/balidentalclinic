<?php
use Carbon\Carbon;

foreach ($users as $user) :
	$name = ucwords($user->first_name) . ' ' . ucwords($user->last_name);
	$email = $user->email;
	$role = ucwords($user->roles->first()->name);
	$activated = $user->actived == 1 ? '<span class="font-weight-semibold btn btn-default mt-2">ACTIVE</span>' :
		'<span class="font-weight-semibold text-muted btn btn-default mt-2">INACTIVE</span>';
	$lastLogin = is_null($user->last_login_at) ? 'User belum pernah login ke dalam sistem' :
		'Terakhir login pada <span class="font-weight-semibold">' . Carbon::createFromFormat('Y-m-d H:i:s', $user->last_login_at)->format('d F Y H:i:s') . '</span>';

	$editLink = base_url('sys/user/edit/' . $user->id);
	$deleteLink = base_url('sys/user/delete/' . $user->id);
?>

<div class="row data-list">
	<div class="col-md-12 mb-2">
		<div class="border p-3">
			<div class="row">
				<div class="col-sm-9 col-md-10">
					<h4 class="mt-0"><?php echo $name; ?></h4>
					<p class="mt-2 mb-2">
						<i class="icons icon-badge mr-2"></i>Role sebagai <span class="font-weight-semibold"><?php echo $role; ?></span><br>
						<i class="icons icon-envelope mr-2"></i>Alamat email di <span class="font-weight-semibold"><?php echo $email; ?></span><br>
						<i class="icons icon-calendar mr-2"></i><?php echo $lastLogin; ?><br>
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