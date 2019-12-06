<?php

class Setting extends SysController
{
	protected $model = 'konfigurasi aplikasi';
	protected $activeMenu = 'back-sys-setting';

	public function index()
	{
		$settings = M_App_Setting::all();

		$views = [
			'content' => 'sys/setting/add',
			'settings' => $settings
		];

		$this->load->view('layout/back',  $this->getControllerViews($views));
	}

	public function update($id = NULL)
	{
		$this->load->library('file_uploader');

		$settings = M_App_Setting::all();
		foreach ($settings as $setting) {
			if ($setting->type == 'text') {
				$this->updateTextValue($setting);
				continue;
			}

			if ($setting->type == 'image' && $setting->code == 'site_logo') {
				$this->updateImageFile('siteAssetDir', 'site_logo', 'site-logo');
				continue;
			}

			if ($setting->type == 'image' && $setting->code == 'default_avatar') {
				$this->updateImageFile('avatarDir', 'default_avatar', 'default');
				continue;
			}

			if ($setting->type == 'image' && $setting->code == 'login_bg') {
				$this->updateImageFile('siteAssetDir', 'login_bg', 'login-background');
				continue;
			}
		}

		$result = [
			'status' => 'success',
			'message' => '<span class="font-weight-semibold">Berhasil !</span> Setting aplikasi berhasil diperbaharui.',
			'csrf' => [
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			]
		];
		echo json_encode($result);
	}

	private function updateTextValue($setting)
	{
		$data = isset($_POST[$setting->code]) ? trim($_POST[$setting->code]) : NULL;
		M_App_Setting::where('code', '=', $setting->code)
			->update(['value' => $data]);
	}

	private function updateImageFile($imageDir, $imageId, $filename)
	{
		$fileType = $imageId == 'login_bg' ? 'jpg' : 'png';
		$this->file_uploader->initialize( $this->config->item($imageDir), FALSE, $filename, $fileType );
		$this->file_uploader->upload($imageId, FALSE);
	}
}