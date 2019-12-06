<?php

/**
 * Check if menu show based on login needed or permissions
 * @param  Obejct  $menu         menu object
 * @param  Array   $permissions  permission that user have
 * @return boolean               show menu or not
 */
function showingMenu($menu, $permissions)
{
	$isLogin = isset($_SESSION['login_data']) ? TRUE : FALSE;
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
function build_menu($parent, $menus, $permissions) {
	$html = '';
	$html .= $parent == 0 ? '<ul class="nav nav-main">' : '<ul class="nav nav-children">';

	foreach ($menus as $menu) {
		if ( ! showingMenu($menu, $permissions) ) continue;

		$link = empty($menu->link) || $menu->link == '#' ? 'href="#"' : 'href="' . base_url( $menu->link ) . '"';
		$htmlId = $menu->html_id;
		$icon = $menu->icon;
		$name = ucwords($menu->name);

		if (! isset($menu->children)) {
			$html .= '<li id="' . $htmlId . '"><a ' . $link . ' class="font-weight-semibold"><i class="' . $icon . '"></i><span>' . $name . '</span></a></li>';
		}

		if (isset($menu->children) && is_array($menu->children)) {
			$html .= '<li id="' . $htmlId . '" class="nav-parent"><a ' . $link . ' class="font-weight-semibold"><i class="' . $icon . '"></i><span>' . $name . '</span></a>';
			$html .= build_menu(($parent + 1), $menu->children, $permissions);
			$html .= '</li>';
		}
	}

	$html .= '</ul>';

	return $html;
}


$navigationHtml = '';
if (isset($navigation)) {
	$navigationHtml = build_menu(0, $navigation['menus'], $navigation['permissions']);
}
?>

<div class="sidebar-header">
	<div class="sidebar-title font-weight-semibold text-muted">Navigation</div>
	<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
		<i class="icons icon-menu" aria-label="Toggle sidebar"></i>
	</div>
</div>

<div class="nano">
	<div class="nano-content">
		<nav id="menu" class="nav-main" role="navigation">
			<?php echo $navigationHtml; ?>
		</nav>
	</div>
</div>