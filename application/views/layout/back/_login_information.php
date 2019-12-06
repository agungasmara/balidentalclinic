<?php
$userAvatar = base_url( $this->config->item('avatarDir') . $appSettings['default_avatar'] );
$userName = ucwords( $_SESSION['login_data']['first_name'] .  ' ' . $_SESSION['login_data']['last_name'] );
$userEmail = $_SESSION['login_data']['email'];
$userRole = ucwords( $_SESSION['login_data']['role'] );

$profileMenus = [
	'profile' => (object) [
		'link' => 'account/profile',
		'text' => 'My Profile',
		'icon' => 'icons icon-user'
	],
	'password' => (object) [
		'link' => 'account/password',
		'text' => 'Change Password',
		'icon' => 'icons icon-lock'
	],
	'logout' => (object) [
		'link' => 'login/destroy',
		'text' => 'Logout',
		'icon' => 'icons icon-logout'
	],
];
?>

<div id="userbox" class="userbox">
	<a href="#" data-toggle="dropdown">
		<figure class="profile-picture">
			<img src="<?php echo $userAvatar; ?>" alt="<?php echo $userName; ?>" class="rounded-circle" data-lock-picture="<?php echo $userAvatar; ?>">
		</figure>
		<div class="profile-info" data-lock-name="<?php echo $userName; ?>" data-lock-email="<?php echo $userEmail; ?>">
			<span class="name font-weight-semibold"><?php echo $userName; ?></span>
			<span class="role"><?php echo $userRole; ?></span>
		</div>

		<i class="fa custom-caret"></i>
	</a>

	<div class="dropdown-menu">
		<ul class="list-unstyled mb-2">
			<li class="divider"></li>

			<?php 
			foreach ($profileMenus as $menu) : 
				$icon = $menu->icon;
				$text = $menu->text;
				$link = base_url( $menu->link );
			?>
			<li>
				<a role="menuitem" tabindex="-1" href="<?php echo $link; ?>"><i class="<?php echo $icon; ?> mr-2"></i><?php echo $text; ?></a>
			</li>
			<?php endforeach; ?>

		</ul>
	</div>
</div>