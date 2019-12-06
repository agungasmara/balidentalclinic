<div id="services" class="row">

	<?php
	foreach ($services as $service) :
		$class = $service->class;
		$textColor = $service->textColor;
		$title = $service->title;
		$icon = $service->icon;
		$description = implode('', $service->description);
		$link = $service->link;
		$linkClass = $service->linkClass;
		$linkText = $service->linkText;
	?>

	<div class="<?php echo $class; ?>">
		<div class="service-feature py-5 px-4">
			<div class="service-title">
				<div class="service-icon <?php echo $textColor; ?>">
					<i class="<?php echo $icon; ?>"></i>
				</div>
				<h3 class="text-light">
					<?php echo $title;  ?>
				</h3>
			</div>
			<?php echo $description; ?>
			<a href="<?php echo $link; ?>" class="btn btn-outline btn-white <?php echo $linkClass; ?>">
				<?php echo $linkText; ?>
			</a>
		</div>
	</div>

	<?php endforeach; ?>

</div>
