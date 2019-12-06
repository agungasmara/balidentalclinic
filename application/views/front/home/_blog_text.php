<?php
use Carbon\Carbon;
$publishedAt = Carbon::createFromFormat('Y-m-d', $blog->published_at);
$anchor = base_url('article/' . $blog->slug);
?>

<div class="col-md-6 col-lg-4 mb-4 mb-lg-3 appear-animation" 
	data-appear-animation="fadeIn" 
	data-appear-animation-delay="<?php echo $animationDelay; ?>">
	<article class="thumb-info custom-thumb-info-style-1 h-100">
		<div class="thumb-info-caption">
			<span class="date d-block text-color-tertiary font-weight-semibold text-3 mb-3"><?php echo $publishedAt->format('d M Y'); ?></span>
			<h3 class="font-weight-semibold text-transform-none mb-4">
				<a href="<?php echo $anchor; ?>" class="custom-link-color-dark">
					<?php echo $blog->title; ?>
				</a>
			</h3>
			<p><?php echo $blog->lead; ?></p>
		</div>
	</article>
</div>