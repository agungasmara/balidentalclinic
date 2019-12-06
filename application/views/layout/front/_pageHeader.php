<?php

$pageHeaderBackground = isset($pageHeaderBackground) ? 
	$pageHeaderBackground : 
	base_url($this->config->item('siteAssetDir') . 'header-bg.png');
$pageTitle = isset($title) ? 
	$title : $appSettings['site_name'];
$pageSubTitle = isset($subTitle) ? 
	$subTitle : $appSettings['site_motto'];
	
?>

<section class="page-header page-header-custom-background"
	style="background-image: url(<?php echo $pageHeaderBackground; ?>);">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<h1>
					<?php echo $pageTitle; ?>
					<span><?php echo $pageSubTitle; ?></span>
				</h1>
			</div>
		</div>
	</div>
</section>