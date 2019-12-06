<?php
use Carbon\Carbon;

$siteName = $appSettings['site_name'];
$siteMotto = $appSettings['site_motto'];
$loginLogo = base_url('public/asset/images/' . $appSettings['site_logo']);
$year = Carbon::today()->year;
?>

<div class="row">
	<div class="col-md-6 offset-md-3 col-md-offset-3 col-sm-8 offset-sm-2 col-sm-offset-2">

		<div class="p-3">
			<div class="text-center mt-5 mb-4">
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo $loginLogo; ?>" alt="<?php echo $siteName; ?>" style="max-width: 233px;">
				</a>
			</div>

			<div class="text-center">
				<h2 class="m-0 text-primary color-primary" style="font-size: 125px; line-height: 1;">404<i class="icons icon-ghost"></i></h2>
				<p class="mt-3 xs-mt-15 mb-4 font-weight-normal" style="font-size: 14px; line-height: 1.5; letter-spacing: 1px;">
					Maaf, Anda mengkases alamat yang salah<br>
					Silahkan kembali ke halaman <a href="<?php echo base_url(); ?>" class="text-primary color-primary font-weight-semibold">Dashboard</a> 
				</p>
			</div>

			<div class="text-center mt-2" style="font-size: 11px; line-height: 1.75">
				<span class="font-weight-semibold" style="font-size: 13px;"><?php echo $siteName; ?></span><br><?php echo $siteMotto ?><br>
				&copy; <?php echo $year; ?>. All Rights Reserved. Created By: <span class="text-primary">plagiatOr</span>
			</div>
		</div>

	</div>
</div>


<?php exit; ?>