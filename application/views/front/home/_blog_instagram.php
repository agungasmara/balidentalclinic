<?php
$imgSrc = $blog->image;
$blogLink = $blog->link;
$likes = $blog->likes;
$comments = $blog->comments;
?>

<div class="col-md-6 col-lg-4 mb-4 mb-lg-3 appear-animation"
	data-appear-animation="fadeIn"
	data-appear-animation-delay="<?php echo $animationDelay; ?>">
	<article class="insta-post thumb-info thumb-info-hide-wrapper-bg custom-thumb-info-style-1 h-100">
		<div class="thumb-info-wrapper">
			<a href="<?php echo $blogLink; ?>" target="_blank">
				<img class="img-fluid"
				    data-plugin-lazyload data-plugin-options="{'effect' : 'fadeIn'}"
				    data-original="<?php echo $imgSrc; ?>"
				    alt="confident-instagram-blog">
			</a>
		</div>
		<div class="insta-info p-3">
			<span style="line-height: 24px;"><i class="icons icon-heart mr-1" style="font-size:20px;"></i> <?php echo $likes; ?></span>
			<span style="line-height: 24px;"><i class="icons icon-speech ml-4 mr-1" style="font-size:20px;"></i> <?php echo $comments; ?></span>
		</div>
	</article>
</div>