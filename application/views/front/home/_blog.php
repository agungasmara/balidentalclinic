<?php
$instaFeedMail = base_url('Notify/about/instafeed');
?>

<section id="news" class="section background-color-grey border-0 my-0 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-5">
				<h3 class="font-weight-normal text-grey" style="text-transform: none;">
					Follow <span class="font-weight-semibold text-primary">our Story</span> and keep updated !
				</h3>
				<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<p>
						<span class="text-secondary font-weight-semibold">Confi-dent</span> always provide newest information related to health especially in dental health. Check the newest information on our blog or you can follow our Instagram at:
					</p>
					<a href="https://www.instagram.com/confident_bali/" target="_blank"
						class="btn btn-default p-3">
						<h4 class="font-weight-light text-grey mb-0" style="text-transform: none;"
							data-instafeed-code="<?php echo $instaFeedCode; ?>"
							data-instafeed-mail="<?php echo $instaFeedMail; ?>">
							<i class="icons icon-social-instagram mr-2"></i>
							confident_bali
						</h4>
					</a>
				</div>
			</div>
			</div>
		</div>

		<div class="row justify-content-center mb-5">

			<?php
			foreach ($blogs as $idx => $blog) :
				$params = [
					'blog' => $blog,
					'animationDelay' => $idx * 200 + 200
				];
				switch ($blog->type) {
					case 'image' :
						$this->load->view('front/home/_blog_image', $params);
						break;
					default :
						$this->load->view('front/home/_blog_text', $params);
				}
			endforeach;

			foreach ($instaFeeds as $idx => $blog) :
				$params = [
					'blog' => $blog,
					'animationDelay' => $idx * 200 + 200
				];
				switch ($blog->type) {
					case 'instagram' :
						$this->load->view('front/home/_blog_instagram', $params);
						break;
					case 'image' :
						$this->load->view('front/home/_blog_image', $params);
						break;
					default :
						$this->load->view('front/home/_blog_text', $params);
				}
			endforeach;
			?>

		</div>
	</div>
</section>