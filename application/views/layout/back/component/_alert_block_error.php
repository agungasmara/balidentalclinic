<?php
$errorMessageBlock = isset($errorMessageBlock) ? $errorMessageBlock : '';
$errorFooterBlock = isset($errorFooterBlock) ? $errorFooterBlock : '';
$errorShowBlock = isset($errorShowBlock) && $errorShowBlock ? '' : 'hidden';
?>

<div id="error-message-block" class="alert alert-danger nomargin <?php echo $errorShowBlock; ?>">
	<button aria-hidden="true" data-hide="alert" class="close" type="button">×</button>
	<h5 class="font-weight-semibold">Ups, Something Wrong !</h5>
	<div class="message-body mb-md"><?php echo $errorMessageBlock; ?></div>
	<p class="message-footer"><?php echo $errorFooterBlock; ?></p>
</div>