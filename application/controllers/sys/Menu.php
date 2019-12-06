<?php

class Menu extends SysController
{
	protected $model = 'menu';
	protected $modelObj = 'M_Menu';
	protected $record = 'menu';
	protected $records = 'menus';
	protected $activeMenu = 'back-sys-menu';
	protected $viewDirectory = 'sys/menu/';
	protected $jsDirectory = 'js/back/';
	protected $localPrivateMethod = [
		'order' => 'edit',
		'sorted' => 'edit',
		'get_menus' => 'index'
	];


	public function order()
	{
		$views = [
			'content' => $this->viewDirectory . 'order'
		];
		$this->load->view($this->masterTemplate, $this->getControllerViews($views));
	}

	public function sorted()
	{
		$navType = isset($_POST['type']) ? $_POST['type'] : NULL;
		if (is_null($navType)) {
			$this->showErrorPage();
			return;
		}

		$nestables = isset($_POST['nestables']) ? $_POST['nestables'] : [];
		$childrenCounter = [];
		foreach ($nestables as $nestable) {
			$menuId = $nestable['id'];
			$parent = isset($nestable['parent_id']) ? $nestable['parent_id'] : NULL;
			$menu = M_Menu::isNavigationType($navType)->find($menuId);
			$parent = M_Menu::isNavigationType($navType)->find($parent);

			if (! empty($menu)) {
				$parent = empty($parent) ? NULL : $parent->id;
				$index = is_null($parent) ? 0 : $parent;
				$childrenCounter[$index] = isset($childrenCounter[$index]) ? $childrenCounter[$index] + 1 : 0;

				$menu->index = $childrenCounter[$index];
				$menu->parent = $parent;
				$menu->save();
			}
		}

		$this->load->library('navigation');
		if ($this->navigation->sqlMenuToJsonMenu($navType) === FALSE) {
			$result = $this->ajax_response->getUpdateResult(FALSE);
			$result['message'] = '<span class="font-weight-semibold">Ups, Proses Gagal !</span> Terjadi kesalahan pada saat proses penyimpanan layout <span class="font-weight-semibold">' . ucwords($navType) . '</span>. Silahkan ulangi proses penyimpanan.';
			echo json_encode($result); 
			return;
		}

		$result = $this->ajax_response->getUpdateResult(TRUE);
		$result['message'] = '<span class="font-weight-semibold">Berhasil !</span> Layout <span class="font-weight-semibold">' . ucwords($navType) . '</span> sudah berhasil disimpan di dalam sistem.';
		echo json_encode($result); 
	}

	public function get_menus($navType = NULL)
	{
		$this->load->library('navigation');
		$menus = M_Menu::isNavigationType($navType)
			->orderBy('index', 'asc')->get();

		if ($menus->count() == 0) {
			$result = [
				'status' => 'error',
				'message' => '<span class="font-weight-semibold">Ups, Proses Gagal !</span> Menu dengan tipe navigasi <span class="font-weight-semibold">' . $navType . '</span> tidak ditemukan di dalam sistem. Silahkan memilih tipe navigasi yang lain.'
			];
			echo json_encode($result);
			return;
		}

		$compiledMenus = $this->navigation->build($menus);

		$viewNestable = $this->viewDirectory . '_nestable_menus';
		$result = [
			'status' => 'success',
			'nestable' => $this->load->view($viewNestable, ['menus' => $compiledMenus], TRUE)
		];
		echo json_encode($result);
	}

	protected function getRecords($obj, $search, $skip, $take)
	{
		return $obj->with('menuParent')
			->getRecords($search)
			->orderBy('name', 'asc')
			->skip($skip)->take($take)
			->get();
	}

	protected function getAdditionalViewData($record)
	{
		$menu = new M_Menu;
		$navTypes = array_map('strtoupper', $menu->getNavigationTypes());

		if (in_array($this->controllerMethod, ['index', 'order'])) {
			$navTypes = ['0' => 'TIPE NAVIGASI'] + $navTypes;
		}

		$this->load->library('list_generator');
		$views = [
			'navigationTypes' => $navTypes,
			'permissions' => $this->list_generator->getPermission(),
		];
		return $views;
	}

	protected function setData($obj, $input, $record = NULL)
	{
		$data = $obj->setData($input);

		// check for permission foreign ley
		if (! is_null($data['permission_id'])) {
			$permission = M_Permission::find($data['permission_id']);
			if (empty($permission)) $data['permission_id'] = NULL;
		}

		return $data;
	}

	protected function setupSearch($input)
	{
		$search = [];
		if (isset($input['name'])) $search['name'] = $input['name'];
		if (isset($input['type']) && $input['type'] != '0') $search['type'] = $input['type'];
		return $search;
	}

}