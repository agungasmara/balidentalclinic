<?php
$alertId = isset($alertId) ? $alertId : 'error-message';
$errorMessage = isset($errorMessage) ? $errorMessage : '';
$errorShow = isset($errorShow) && $errorShow ? '' : 'hidden';
?>

<div id="<?php echo $alertId; ?>" class="alert alert-danger <?php echo $errorShow; ?>">
	<button type="button" class="close" data-hide="alert" aria-hidden="true">×</button>
	<span class="message-body"><?php echo $errorMessage; ?></span>
</div>