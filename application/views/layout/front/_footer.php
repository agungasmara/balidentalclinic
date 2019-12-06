<?php
use Carbon\Carbon;
$siteName = $appSettings['site_name'];
$year = Carbon::today()->year;
$siteLink = base_url();
$creactiveLink = 'http://www.creactive.id';
?>

<footer id="footer" class="background-color-quaternary border-0 mt-0">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-0">
				<ul class="social-icons social-icons-dark">
					<li class="social-icons-facebook"><a href="https://www.facebook.com/Confident-dental-and-health-care-654058111596256/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
					<li class="social-icons-instagram"><a href="https://www.instagram.com/confident_bali/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright background-color-quaternary border-0 mt-0 mb-0">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="text-center text-muted">
						Thank you for visiting
						<a class="text-secondary font-weight-semibold" href="<?php echo $siteLink; ?>">
							<?php echo $siteName; ?>
						</a><br>
						© Copyright <?php echo $year ?> by
						<a class="text-secondary font-weight-semibold" 
						    target="_blank"
						    href="<?php echo $creactiveLink; ?>">
							Creactive.ID
						</a> - 
						All Rights Reserved
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>