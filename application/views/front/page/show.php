<?php
$slug = $page->slug;
$title = $page->title;
$type = $page->type;
$content = $page->content;

if ($type == 'html') {
	$this->load->view('front/page/' . $slug);
} else {
	echo $content;
}