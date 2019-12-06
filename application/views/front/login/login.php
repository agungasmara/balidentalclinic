<?php
use Carbon\Carbon;

$siteName = $appSettings['site_name'];
$siteMotto = $appSettings['site_motto'];
$siteLogo = base_url( $this->config->item('siteAssetDir') . 'site-logo.png');
$homeLink = base_url();
$year = Carbon::today()->year;
?>

<div class="row justify-content-center">
	<div class="col-sm-8 col-md-6 col-lg-4 mt-4 p-4">

		<div class="bg-white p-4">
			<div class="text-center mb-4">
				<a href="<?php echo $homeLink; ?>">
					<img class="site-logo" src="<?php echo $siteLogo; ?>" alt="<?php echo $siteName; ?>" style="max-width: 233px;">
				</a>
			</div>

			<?php
			$attributes = [
				'class' => 'form-horizontal form-borderless form-lg'
			];
			echo form_open('login/validate', $attributes);
			?>

			<?php 
			$this->load->view('layout/back/component/_alert_error');
			$this->load->view('layout/back/component/_alert_info');
			?>

			<div class="input-group mb-1">
				<span class="input-group-addon"><i class="icon-user"></i></span>
				<input name="username" placeholder="Email" class="form-control" type="text">
			</div>

			<div class="input-group mb-1">
				<span class="input-group-addon"><i class="icon-lock"></i></span>
				<input name="password" placeholder="Password" class="form-control" type="password">
			</div>

			<button class="btn btn-primary btn-block font-weight-semibold" type="submit">LOGIN</button>

			<?php echo form_close(); ?>

			<div class="text-center mt-4" style="font-size: 11px; line-height: 1.75">
				<span class="font-weight-semibold" style="font-size: 13px;"><?php echo $siteName; ?></span><br><?php echo $siteMotto ?><br>
				&copy; <?php echo $year; ?>. All Rights Reserved. Created By: <span class="text-primary">plagiatOr</span>
			</div>
		</div>

	</div>
</div>