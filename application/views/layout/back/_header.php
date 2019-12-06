<?php
$frontLink = base_url();
$logoImage = base_url( $this->config->item('siteAssetDir') . $appSettings['site_logo'] );
$pageName = '';
?>

<div class="logo-container">
	<a href="<?php echo $frontLink; ?>" class="logo">
		<img src="<?php echo $logoImage; ?>" width="155" height="35" alt="<? echo $pageName; ?>" />
	</a>
	<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
		<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
	</div>
</div>

<div class="header-right">
	<div class="separator"></div>
	<?php $this->load->view('layout/back/_login_information'); ?>
</div>