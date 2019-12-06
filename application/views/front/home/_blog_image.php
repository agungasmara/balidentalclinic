<?php
$imgSrc = $blog->imageLink == 'internal' ?
	base_url($blog->imageSrc) :
	$blog->imageSrc;
?>

<div class="col-md-6 col-lg-4 mb-4 mb-lg-3 appear-animation"
	data-appear-animation="fadeIn"
	data-appear-animation-delay="<?php echo $animationDelay; ?>">
	<article class="thumb-info thumb-info-hide-wrapper-bg custom-thumb-info-style-1 h-100">
		<div class="thumb-info-wrapper">
			<a href="demo-education-blog-detail.html">
				<img src="<?php echo $imgSrc; ?>" class="img-fluid" alt="">
			</a>
		</div>
		<div class="thumb-info-caption">
			<span class="date d-block text-color-tertiary font-weight-semibold text-3 mb-3"><?php echo $blog->date; ?></span>
			<h3 class="font-weight-semibold text-transform-none">
				<a href="<?php echo $blog->anchor; ?>" class="custom-link-color-dark">
				<?php echo $blog->title; ?>
				</a>
			</h3>
		</div>
	</article>
</div>