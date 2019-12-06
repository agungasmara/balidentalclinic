<?php

function build($menus)
{
	$nestable = '<ol class="dd-list">';

	foreach ($menus as $menu) {
		$menuId = $menu['id'];
		$menuName = ucwords($menu['name']);
		$nestable .= ' <li class="dd-item" data-id="' . $menuId . '"><div class="dd-handle">' . $menuName . '</div>';

		if (isset($menu['children']) && is_array($menu['children'])) {
			$nestable .= build($menu['children']);
		}
		
		$nestable .= '</li>';
	}

	$nestable .= '</ol>';
	return $nestable;
}

echo '<div id="nestable" class="dd">';
echo build($menus);
echo '<div>';