<?php

class File_Uploader
{
	private $uploadMessage = '';
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function initialize($path, $encrypt = TRUE, $fileName = 'default', $fileType = 'png', $fileSize = 1024)
	{
		$this->CI->load->library('upload');
		$this->CI->load->helper('file');
		
		$setting = [
			'upload_path' => $path,
			'allowed_types' => $fileType,
			'max_size' => $fileSize
		];

		if ($encrypt) $setting['encrypt_name'] = TRUE;
		if (! $encrypt) {
			 $setting['file_name'] = $fileName;
			 $setting['overwrite'] = TRUE;
		}

		$this->CI->upload->initialize($setting);
	}

	public function getMessage($label = '')
	{
		return sprintf($this->uploadMessage, $label);
	}

	public function getFileName($multi = FALSE)
	{
		if ($multi) {
			$data = [];
			$files = $this->CI->upload->get_multi_upload_data();
			foreach ($files as $file) {
				array_push($data, $file['file_name']);
			}
			return $data;
		}

		$data = $this->CI->upload->data();
		return $data['file_name'];
	}

	public function isEmpty($file)
	{
		return empty($_FILES[$file]['name']);
	}

	public function upload($file, $required = TRUE, $multi = FALSE)
	{
		if (! $required && $this->isEmpty($file) ) {
			return TRUE;
		}

		if ($multi) {
			if (! $this->CI->upload->do_multi_upload($file)) {
				$this->uploadMessage = $this->CI->upload->display_errors('<li>','</li>');
				return FALSE;
			}

			return TRUE;
		}

		if (! $this->CI->upload->do_upload($file)) {
			$this->uploadMessage = $this->CI->upload->display_errors('<li>','</li>');
			return FALSE;
		}

		return TRUE;
	}

	public function delete($fileDir, $filename)
	{
		if (empty($filename)) return;

		if (file_exists($fileDir . $filename)) unlink($fileDir . $filename);
	}

}