<div class="row no-gutters">

	<?php
	foreach ($extras as $extra) :
		$icon = $extra->icon . ' ' . $extra->iconClass;
		$class = $extra->class;
		$title = $extra->title;
		$description = $extra->description;
	?>

	<div class="col-md-6 col-lg-4 <?php echo $class; ?>">
		<div class="extra p-3 p-sm-4">
			<div class="extra-icon">
				<div class="hexagon">
					<i class="<?php echo $icon; ?>"></i>
				</div>
			</div>
			<div class="extra-info">
				<h4 class="mb-2 text-uppercase"><?php echo $title; ?></h4>
				<p class="mb-0"><?php echo $description; ?></p>
			</div>
		</div>
	</div>

	<?php endforeach; ?>

</div>
