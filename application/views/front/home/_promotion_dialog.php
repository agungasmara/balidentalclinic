<?php
if (empty($promotion)) return;

$name = $promotion->name;
$code = $promotion->code;
$test = base_url( $this->config->item('promotionDir') . $code . '/popup.svg' );
$testxs = base_url( $this->config->item('promotionDir') . $code . '/popup_xs.svg' );

$promotionLink = base_url('promotion/code/' . $code);
?>

<div id="promotion-dialog" class="dialog dialog-lg zoom-anim-dialog mfp-hide">
	<a href="<?php echo $promotionLink; ?>">
		<div class="d-none d-sm-block">
			<img class="img-fluid" src="<?php echo $test; ?>" alt="<?php echo $name ?>">
		</div>
		<div class="d-sm-none">
			<img class="img-fluid" src="<?php echo $testxs; ?>" alt="<?php echo $name ?>">
		</div>
	</a>	
</div>