<!DOCTYPE html>
<html class="fixed">
	<head>
		<?php $this->load->view('layout/basic/_head'); ?>
	</head>

	<body>

		<!-- SECTION CONTENT -->
		<section>
	
			<?php
			if (isset($contents) && is_array($contents)) {
				foreach ($contents as $content) {
					$this->load->view($content);
				}
			}

			if (isset($content)) {
				$this->load->view($content);
			}
			?>

		</section>

		<?php $this->load->view('layout/basic/_script'); ?>

	</body>
</html>