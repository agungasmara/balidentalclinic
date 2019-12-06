<?php
$homeLink = base_url();
$siteName = $appSettings['site_name'];
$siteLogo = base_url('public/asset/images/' . $appSettings['site_logo']);
$transparantHeader = $transparantHeader ? 'header-transparent' : '';
?>

<header id="header" style="z-index: 100001;" class="<?php echo $transparantHeader; ?> header-transparent-not-fixed header-no-min-height" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 52, 'stickySetTop': '0'}">
	<div class="header-body" style="border-top: 0px;">
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="<?php echo $homeLink; ?>">
								<img height="30"
									alt="<?php echo $siteName; ?>"
									src="<?php echo $siteLogo; ?>">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						
						<?php $this->load->view('layout/front/_navigation'); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</header>