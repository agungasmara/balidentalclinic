<?php

/**
 * Check if menu show based on login needed or permissions
 * @param  Obejct  $menu         menu object
 * @param  Array   $permissions  permission that user have
 * @return boolean               show menu or not
 */
function showingMenu($menu, $permissions)
{
	$exculdedLogin = [
		'daftar', 'masuk'
	];

	$isLogin = isset($_SESSION['login_data']) ? TRUE : FALSE;
	if (
		($menu->is_login == 1 && ! $isLogin) ||
		($isLogin && in_array($menu->name, $exculdedLogin))
	) return FALSE;

	if ($menu->is_login == 1 && $isLogin) return TRUE;

	$hasPermissions = is_array($menu->permission_id) ? array_intersect($menu->permission_id, $permissions) : [];
	if (! is_null($menu->permission_id) && count($hasPermissions) == 0) return FALSE;

	return TRUE;
}


/**
 * recursive function transform json menu to HTML
 * @param  int    $parent         indicator that indicate root or not
 * @param  Array  $menus          menus
 * @param  Array  $permissions    permissions that user have
 * @return string                 HTML string
 */
function build_menu($parent, $menus, $permissions, $homepageNavigation) {
	$html = '';
	$html .= $parent == 0 ? '<ul id="mainNav" class="nav nav-pills">' : '<ul class="dropdown-menu">';

	foreach ($menus as $menu) {
		if ( ! showingMenu($menu, $permissions) ) continue;

		$selfLink = '';
		if (empty($menu->link)) {
			$link = 'href="#"';
		} elseif (strpos($menu->link, '#') !== FALSE) {
			$selfLink = ($homepageNavigation) ? 
				' data-hash data-hash-offset="70" ' : '';
			$link = ($homepageNavigation) ?
				'href="' . $menu->link . '"'
				: 'href="' . base_url() . $menu->link . '"';
		} else {
			$link = 'href="' . base_url( $menu->link ) . '"';
		}
		$htmlId = $menu->html_id;
		$name = ucwords($menu->name);

		if (! isset($menu->children)) {
			$html .= '<li id="' . $htmlId . '"><a ' . $link
				. ' class="nav-link" ' .  $selfLink . '>' 
				. $name . '</a></li>';
		}

		if (isset($menu->children) && is_array($menu->children)) {
			$html .= '<li id="' . $htmlId . '" class="dropdown"><a '
				. $link . ' class="nav-link dropdown-item dropdown-toggle" ' 
				. $selfLink . '>' . $name . '</a>';
			$html .= build_menu(($parent + 1), $menu->children, $permissions, $homepageNavigation);
			$html .= '</li>';
		}
	}

	$html .= '</ul>';

	return $html;
}

$homepageNavigation = isset($homepageNavigation) ?
	$homepageNavigation : FALSE;
$navigationHtml = '';
if (isset($navigation)) {
	$navigationHtml = build_menu(0, $navigation['menus'], $navigation['permissions'], $homepageNavigation);
}

?>

<div class="header-nav header-nav-top-line">
	<div class="header-nav-main header-nav-main-no-arrows header-nav-main-dark header-nav-main-effect-3 header-nav-main-sub-effect-1">
		<nav class="collapse">
			<?php echo $navigationHtml; ?>
		</nav>
	</div>

	<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
		<i class="fas fa-bars"></i>
	</button>
</div>