<?php
$this->load->view('layout/front/_pageHeader');
$title = $blog->title;
$lead = $blog->lead;
$content = $blog->content;
?>

<div class="container mb-5">
	<div class="row">
		<div class="col-lg-9">
			<h2 class="text-secondary mb-2">
				<?php echo $title; ?>
			</h2>
			<hr class="dashed mb-5">

			<p class="lead mb-5"><?php echo $lead; ?></p>

			<?php
			echo $content;
			?>

		</div>
		<div class="col-lg-3">
			<?php $this->load->view('front/page/_sidebar'); ?>
		</div>
	</div>
</div>
