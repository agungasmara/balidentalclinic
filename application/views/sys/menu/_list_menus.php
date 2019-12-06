<?php
foreach ($menus as $menu) :
	$name = ucwords($menu->name);
	$navigationType = ucwords($menu->nav_type);
	$htmlId = $menu->html_id;
	$icon = $menu->icon;
	$link = ($menu->is_internal == 1) ? base_url($menu->link) : $menu->link;
	$isInternal = $menu->is_internal == 1 ? '<span class="font-weight-semibold btn btn-default mt-2">LINK INTERNAL</span>' :
		'<span class="font-weight-semibold text-muted btn btn-default mt-2">LINK EXTERNAL</span>';
	$isLogin = $menu->is_login == 1 ? '<span class="font-weight-semibold btn btn-default mt-2">LOGIN ACCESS</span>' :
		'<span class="font-weight-semibold text-muted btn btn-default mt-2">PUBLIC ACCESS</span>';
	
	$permission = NULL;
	if ( ! is_null($menu->permission_id) ) {
		$isLogin = '<span class="font-weight-semibold text-muted btn btn-default mt-2">PRIVATE ACCESS</span>';
		$permission = '<i class="icons icon-lock mr-2"></i>Membutuhkan <span class="font-weight-semibold text-danger">' . ucwords($menu->permission->name) . '</span> permission<br>';
	}

	$parentFormat = 'Ada di group <span class="font-weight-semibold text-primary">Menu %s</span> dengan <span class="font-weight-semibold text-primary">index %d</span>';
	$parent = (is_null($menu->parent)) ? 'root' : ucwords($menu->menuParent->name);
	$parent = sprintf($parentFormat, $parent, $menu->index);

	$editLink = base_url('sys/menu/edit/' . $menu->id);
	$deleteLink = base_url('sys/menu/delete/' . $menu->id);
?>

<div class="row data-list">
	<div class="col-md-12 mb-2">
		<div class="border p-3">
			<div class="row">
				<div class="col-sm-9 col-md-10">
					<h4 class="mt-0"><i class="<?php echo $icon; ?> mr-2"></i><?php echo $name; ?></h4>
					<p class="mt-2 mb-2">
						<i class="icons icon-tag mr-2"></i>Tipe navigasi <span class="font-weight-semibold"><?php echo $navigationType; ?></span><br>
						<i class="icons icon-paper-plane mr-2"></i>Dengan HTML ID <span class="font-weight-semibold"><?php echo $htmlId; ?></span><br>
						<i class="icons icon-link mr-2"></i>Akses halaman : <a href="<?php echo $link; ?>"><?php echo $link; ?></a><br>
						<i class="icons icon-folder mr-2"></i><?php echo $parent; ?><br>
						<?php 
						echo $permission . $isInternal . ' ' . $isLogin;
						?>
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