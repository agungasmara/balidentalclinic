<?php
$activeMenu = isset($activeMenu) ? $activeMenu : 'beranda';
?>

<!DOCTYPE html>
<html class="fixed sidebar-light sidebar-left-sm">
	<head>
		<?php $this->load->view('layout/back/_head'); ?>
	</head>

	<body class="body" data-active-menu="<?php echo $activeMenu; ?>" style="background-color: #FFF;">
		
		<header class="header">	
			<?php $this->load->view('layout/back/_header'); ?>
		</header>

		<div class="inner-wrapper">
			<aside id="sidebar-left" class="sidebar-left">
				<?php $this->load->view('layout/back/_navigation.php'); ?>
			</aside>

			<section class="content-body" role="main">
				
				<?php
				$this->load->view('layout/back/_page_header');
				
				if (isset($content)) {
					$this->load->view($content);
				}

				if (isset($contents) && is_array($contents)) {
					foreach ($contents as $content) {
						$this->load->view($content);
					}
				}
				?>

			</section>
		</div>

		<?php $this->load->view('layout/back/_script'); ?>
		
	</body>
</html>