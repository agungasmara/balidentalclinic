<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MY_Pagination extends CI_Pagination 
{

	public function __construct() {
		parent::__construct();

		$this->num_links = 3;
		$this->uri_segment = 5;
		$this->full_tag_open = '<ul class="pagination pagination-medium">';
		$this->full_tag_close = '</ul>';
		$this->num_tag_open = '<li class="page-item">';
		$this->num_tag_close = '</li>';
		$this->prev_tag_open = '<li class="page-item">';
		$this->prev_tag_close = '</li>';
		$this->next_tag_open = '<li class="page-item">';
		$this->next_tag_close = '</li>';
		$this->first_tag_open = '<li class="page-item">';
		$this->first_tag_close = '</li>';
		$this->last_tag_open = '<li class="page-item">';
		$this->last_tag_close = '</li>';
		$this->cur_tag_open = '<li class="active"><a class="page-link" href="#">';
		$this->cur_tag_close = '</a></li>';

	}

	public function getNumPages()
	{
		return ceil($this->total_rows / $this->per_page);
	}

	public function getTotalRows()
	{
		return $this->total_rows;
	}

	public function setUriSegment($index)
	{
		$this->uri_segment = $index;
	}

}