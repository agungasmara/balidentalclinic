<?php

class BaseController extends CI_Controller
{
	// basic variable to read controller detail
	protected $controllerName = '';
	protected $controllerMethod = '';
	protected $moduleName = 'front';
	protected $enableUploadFile = FALSE;
	
	// basic variable for search and pagination
	protected $urlSearchSegment = 3;
	protected $paginationSkip = 'per_page';
	protected $paginationOptions = [
		'page_query_string' => TRUE,
		'total_rows' => 0,
		'per_page' => 10,
		'base_url' => '',
		'prefix' => '',
		'suffix' => '',
		'first_url' => '',
		'attributes' => ['class' => 'page-link']
	];	

	// list method for auth
	protected $loginLink = 'login';
	protected $authActive = TRUE;
	protected $publicPermissionActive = FALSE;
	protected $privateMethod = [];
	protected $localPrivateMethod = [];
	protected $loginSession;

	// style and script
	protected $cssFiles = [];
	protected $jsFiles = [];


	public function __construct()
	{
		parent::__construct();

		$this->load->library('carabiner');
		$this->load->library('auth');
		$this->load->library('navigation');

		if ($this->enableUploadFile) {
			$this->load->library('file_uploader');
		}

		$this->setCssFiles();
		$this->setJsFiles();

		$this->getAppSettings();
		$this->loginSession     = isset($this->session->userdata['login_data']) ? $this->session->userdata['login_data'] : NULL;
		$this->controllerName   = $this->router->fetch_class();
		$this->controllerMethod = $this->router->fetch_method();
		$this->privateMethod = array_merge($this->privateMethod, $this->localPrivateMethod);
	}

	public function _remap($method, $params = [])
	{
		if ($this->authorized()) {
			return call_user_func_array( [$this, $method], $params);
		}

		$this->showErrorPage();
	}

	public function authorized()
	{
		// check if method exist or not
		if (! method_exists($this, $this->controllerMethod) ) return FALSE;

		// check if public permission active
		// if method not in private list then run this method
		if ($this->publicPermissionActive) $this->freeAccessAllMethod();
		if (! array_key_exists($this->controllerMethod, $this->privateMethod) ) return TRUE;

		// setup permision for method
		// if string then permission refer to another method's permission
		$permissionMethod = ( is_string($this->privateMethod[$this->controllerMethod]) ) ? 
			$this->privateMethod[ $this->controllerMethod ] : 
			$this->controllerMethod;

		// check if need login validation active
		// check if method need specific permission or just login access
		if (! $this->isUserLogged()) return FALSE;
		if (! $this->isPermissionNeeded($permissionMethod) ) return TRUE;

		// check if user has permission to access method
		$hasPermission = $this->auth->hasPermission($this->loginSession, $this->moduleName, $this->controllerName, $permissionMethod);
		if ($hasPermission) return TRUE;

		return FALSE;
	}


	protected function freeAccessAllMethod()
	{
		unset($this->privateMethod);
		$this->privateMethod = [];
	}

	protected function isPermissionNeeded( $method )
	{
		$accessType = $this->privateMethod[ $method ];
		return $accessType === 0 ? FALSE : TRUE; 
	}

	protected function isUserLogged()
	{
		if (! $this->authActive) return TRUE;
		if (is_null($this->loginSession)) return FALSE;
		return TRUE;
	}

	protected function showLoginPage()
	{
		redirect($this->loginLink);
	}

	protected function showErrorPage()
	{
		if ( $this->input->is_ajax_request() ) {
			echo json_encode( $this->showAjaxErrorPage() );
			return;
		}

		$view = [
			'content' => 'errors/custom/error_404'
		];
		$view = array_merge($this->getBaseViews(), $view);

		$this->output->set_status_header(404);
		$this->load->view('layout/basic', $view);
	}

	protected function showAjaxErrorPage()
	{
		$result = [
			'status' => 'error',
			'message' => 'Proses tidak dapat dilanjutkan karena Anda tidak memiliki otoritas.<br>Silahkan menghubungi admin untuk menambahkan otorisasi pada account Anda',
			'csrf' => [
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			]
		];

		return $result;
	}

	protected function uploadFile($filename, $alias, $dir, $format, $size, $required = TRUE)
	{
		$format = $this->config->item($format);
		$size = $this->config->item($size);
		$this->file_uploader->initialize($dir, TRUE, NULL, $format, $size);

		$result = [
			'status' => $this->file_uploader->upload($filename, $required),
			'message' => $this->file_uploader->getMessage($alias),
			'filename' => $this->file_uploader->getFileName()
		];
		return $result;
	}

	protected function setValidation($rules, $data)
	{
		$this->validation->set_data($data);
		$this->validation->set_rules($rules);
	}

	protected function setPagination($search)
	{
		$this->load->library('pagination');

		if ($this->paginationOptions['page_query_string'] === TRUE) {
			$this->paginationOptions['suffix'] = (! empty($search)) ? 
				'&' . $this->setSearchQueryString($search) : '';
			$this->paginationOptions['first_url'] = $this->paginationOptions['base_url'] .
				'?' . $this->paginationSkip . '=0' .
				$this->paginationOptions['suffix'];
		} else {
			unset($search[$this->paginationSkip]);
			$this->paginationOptions['suffix'] = '/' . $this->uri->assoc_to_uri($search);
			$this->paginationOptions['first_url'] = $this->paginationOptions['base_url'] . 
				'/' . $this->paginationOptions['prefix'] . '/0/' . 
				$this->paginationOptions['suffix'];
		}
		
		$this->pagination->initialize($this->paginationOptions);
	}

	protected function setPaginationMaxRecords($maxRecords)
	{
		$this->paginationOptions['per_page'] = $maxRecords;
	}

	protected function setSearchQueryString($search)
	{
		if (isset($search['per_page'])) unset($search['per_page']);
		$queries = http_build_query($search);
		return $queries;
	}

	protected function getSearchParamInUrl()
	{
		$queries = array_map('urldecode', $this->uri->uri_to_assoc($this->urlSearchSegment));
		return $queries;
	}

	protected function getSearchParam()
	{
		if (! $this->paginationOptions['page_query_string'] === TRUE) {
			return $this->getSearchParamInUrl();
		}
		return $_GET;
	}

	protected function loadCssTemplate() {
		$this->carabiner->empty_cache('both','yesterday');

		foreach ($this->cssFiles as $css) {
			$this->carabiner->css($css);
		}

		$result = $this->carabiner->display_string('css');
		return $result;
	}

	protected function loadJsTemplate() {
		$this->carabiner->empty_cache('both','yesterday');
		
		foreach ($this->jsFiles as $js) {
			$this->carabiner->js($js);
		}
		
		$result = $this->carabiner->display_string('js');
		return $result;
	}

	protected function getBaseViews($loadCss = TRUE, $loadJs = TRUE)
	{
		$views['appSettings'] = $this->session->userdata['app_settings'];

		if ($loadCss) {
			$views['css_asset'] = $this->loadCssTemplate();
		}

		if ($loadJs) {
			$views['js_asset'] = $this->loadJsTemplate();
		}

		return $views;
	}

	protected function getAppSettings()
	{
		$settings = M_App_Setting::all()->pluck('value', 'code')->toArray();
		$this->session->set_userdata('app_settings', $settings);
	}	

	protected function setCssFiles()
	{
		$this->cssFiles = [
			'../vendor/bootstrap/css/bootstrap.css',
			'../vendor/animate/animate.css',
			'../vendor/font-awesome/css/fontawesome-all.css',
			'../vendor/simple-line-icons/css/simple-line-icons.css',
			'../vendor/magnific-popup/magnific-popup.css',
			'../vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css',
			'../vendor/bootstrap-fileinput/css/fileinput.css',
			'../vendor/select2/css/select2.css',
			'../vendor/select2-bootstrap-theme/select2-bootstrap.min.css',
			'back/pretty-checkbox.css',
			'back/theme.css',
			'back/skin-default.css',
			'back/square-borders.css',
			'back/custom.css',
		];
	}

	protected function setJsFiles()
	{
		$this->jsFiles = [
			'../vendor/jquery/jquery.js',
			'../vendor/jquery-browser-mobile/jquery.browser.mobile.js',
			'../vendor/popper/umd/popper.js',
			'../vendor/bootstrap/js/bootstrap.js',
			'../vendor/bootstrap-datepicker/js/bootstrap-datepicker.js',
			'../vendor/common/common.js',
			'../vendor/nanoscroller/nanoscroller.js',
			'../vendor/magnific-popup/jquery.magnific-popup.js',
			'../vendor/jquery-placeholder/jquery-placeholder.js',
			'../vendor/jquery-form/jquery-form.min.js',
			'../vendor/bootstrap-fileinput/js/fileinput.min.js',
			'../vendor/bootstrap-fileinput/js/locales/id.js',
			'../vendor/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js',
			'../vendor/select2/js/select2.js',
			'../vendor/jquery.autogrow/jquery.autogrow-textarea.js',
			'../vendor/jquery-nestable/jquery-nestable.min.js"',
			'back/theme.js',
			'back/theme.init.js',
			'back/app.js',
		];
	}

}