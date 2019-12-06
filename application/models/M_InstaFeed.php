<?php
use \Curl\Curl;

class M_InstaFeed {
	private $userId = '7720137156';
	private $accessToken = '7720137156.1677ed0.70a0e2995e134879b830f16aaf157d0d';
	private $total = '9';
	private $url = 'https://api.instagram.com/v1/users/%s/media/recent/';
	private $feeds = [];
	private $responseCode = NULL;
	private $error = NULL;

	public function curlFeeds()
	{
		$curl = new Curl;
		$url = sprintf($this->url, $this->userId);
		$curl->get($url, [
			'access_token' => $this->accessToken,
			'count' => $this->total
		]);

		$this->feeds = [];
		$this->error = NULL;
		if ($curl->error) {
			$this->responseCode = 400;
			$this->error = [
				'errorCode' => $curl->errorCode,
				'errorMessage' => $curl->errorMessage
			];
		} else {
			$this->responseCode = $curl->response->meta->code;
		  	$this->setFeeds($curl->response);
		}
	}

	public function getFeeds()
	{
		return $this->feeds;
	}

	public function getResponseCode()
	{
		return $this->responseCode;
	}

	private function setFeeds($response)
	{
		$posts = $response->data;
		foreach ($posts as $post) {
			$tmp = (Object) [
				'type' => 'instagram',
				'link' => $post->link,
				'image' => $post->images->standard_resolution->url,
				'likes' => $post->likes->count,
				'comments' => $post->comments->count
			];
			array_push($this->feeds, $tmp);
		}
	}

}