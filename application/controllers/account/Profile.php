<?php

class Profile extends AccountController
{
	protected $publicPermissionActive = TRUE;

	public function index()
	{
		dump('profile');
	}

	public function get_city($id = NULL)
	{
		$this->load->library('list_generator');
		$cities = $this->list_generator->getCity($id);
		echo json_encode($cities);
	}
}