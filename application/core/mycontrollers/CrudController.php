<?php

class CrudController extends BaseController
{
	protected $model;
	protected $modelObj;
	protected $record;
	protected $records;
	protected $includedUserIdLog = FALSE;
	protected $userIdLog = 'user_id';
	protected $activeMenu = NULL;
	protected $masterTemplate = 'layout/back';
	protected $navigationType = 'backend';
	protected $controllerDirectory = '';
	protected $viewDirectory = 'sys/';
	protected $jsDirectory = 'js/back/';
	protected $privateMethod = [
		'index' => 1,
		'show' => 1,
		'add' => 1,
		'insert' => 1,
		'edit' => 1,
		'update' => 1,
		'delete' => 1
	];

	public function __construct()
	{
		parent::__construct();
		$params = [
			'model' => $this->model
		];
		$this->load->library('ajax_response', $params);

		if (is_null($this->activeMenu)) {
			$this->activeMenu = 'manage-' . strtolower($this->controllerName);
		}
	}

	public function index()
	{
		$search = $this->getSearchParam();
		if (isset($_POST) && count($_POST) > 0) {
			$search = $this->setupSearch($_POST);
		}

		$obj = new $this->modelObj;
		$this->paginationOptions['base_url'] = base_url($this->controllerDirectory . strtolower($this->controllerName) . '/index');
		$this->paginationOptions['total_rows'] = $this->getTotalRows($obj, $search);
		$this->setPagination($search);

		$skip = isset($search[$this->paginationSkip]) ? $search[$this->paginationSkip] : 0;
		$take = $this->paginationOptions['per_page'];
		$records = $this->getRecords($obj, $search, $skip, $take);

		$views = [
			'content' => $this->viewDirectory . 'list',
			$this->records => $records,
			'search' => $search
		];

		$this->load->view($this->masterTemplate, $this->getControllerViews($views));
	}

	public function show($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $this->getRecord($obj, $id);
		if (empty($record)) {
			$this->showErrorPage();
			return;
		}

		$views = [
			'content' => $this->viewDirectory . 'show',
			$this->record => $record
		];

		$this->load->view($this->masterTemplate, $this->getControllerViews($views, $record));
	}

	public function add()
	{
		$views = [
			'content' => $this->viewDirectory . 'add'
		];

		$this->load->view($this->masterTemplate, $this->getControllerViews($views));
	}

	public function insert()
	{
		$obj = new $this->modelObj;
		$data = $this->setData($obj, $_POST);

		// run validation
		$rules = $this->getRules($obj, $_POST);
		$this->setValidation($rules, $data);
		if ($this->validation->run() == FALSE) {
			echo json_encode( $this->ajax_response->getInsertResult(FALSE) );
			return;
		}

		$obj->create($data);
		
		echo json_encode( $this->ajax_response->getInsertResult(TRUE, NULL, TRUE) );
	}

	public function edit($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $this->getRecord($obj, $id);
		if (empty($record)) {
			$this->showErrorPage();
			return;
		}

		$views = [
			'content' => $this->viewDirectory . 'edit',
			$this->record => $record
		];

		$this->load->view($this->masterTemplate, $this->getControllerViews($views, $record));
	}

	public function update($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $obj->find($id);

		if (empty($record)) {
			echo json_encode( $this->ajax_response->getNotFoundResult('update') );
			return;
		}

		$data = $this->setData($obj, $_POST, $record);
		$rules =  $this->getRules($obj, $_POST, $record);
		$this->setValidation($rules, $data);
		if ($this->validation->run() == FALSE) {
			echo json_encode( $this->ajax_response->getUpdateResult(FALSE) );
			return;
		}

		$record->update($data);

		echo json_encode( $this->ajax_response->getUpdateResult(TRUE) );
	}

	public function delete($id = NULL)
	{
		$obj = new $this->modelObj;
		$record = $this->getRecord($obj, $id);

		if (empty($record)) {
			echo json_encode( $this->ajax_response->getNotFoundResult('delete') );
			return;
		}

		$record->delete();

		$name = $this->getRecordName($record);
		$result = $this->ajax_response->getDeleteResult($name);
		$result['link'] = $this->getDeleteRefreshLink();
		echo json_encode($result);
	}

	protected function getDeleteRefreshLink()
	{
		return base_url($this->controllerDirectory . strtolower($this->controllerName));
	}

	protected function getRecordName($data)
	{
		return ucwords($data->name);
	}

	protected function getTotalRows($obj, $search)
	{
		return $obj->getRecords($search)->count();
	}

	protected function getRecords($obj, $search, $skip, $take)
	{
		return $obj->getRecords($search)
			->latest()
			->skip($skip)->take($take)
			->get();
	}

	protected function getRecord($obj, $id)
	{
		return $obj->find($id);
	}

	protected function getRules($obj , $input, $record = NULL)
	{
		return $obj->getRules();
	}

	protected function getJsScripts()
	{
		return [ $this->jsDirectory . strtolower($this->controllerName) ];
	}

	protected function getAdditionalViewData($record)
	{
		return []; 
	}

	protected function setData($obj, $input, $record = NULL)
	{
		$data = $obj->setData($input);
		$data = $this->sanitizeData($data, $record);

		// check if table store user id in sistem
		if ($this->includedUserIdLog) {
			$data[ $this->userIdLog ] = $this->loginSession['id'];
		}

		return $data;
	}

	protected function sanitizeData($data, $record)
	{
		return $data;
	}

	protected function setupSearch($input)
	{
		$search = [];
		return $search;
	}

	protected function getControllerViews($input, $record = NULL)
	{
		$views = [
			'scripts' => $this->getJsScripts(),
			'navigation' => $this->navigation->getJsonMenu($this->navigationType),
			'activeMenu' => $this->activeMenu,
			'title' => 'Manage ' . ucwords($this->model),
			'subTitle' => 'manage all ' . $this->model . ' data that recorded in system'
		];

		return array_merge($this->getBaseViews(), $views, $this->getAdditionalViewData($record), $input);
	}

}