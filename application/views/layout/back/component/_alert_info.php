<?php
$alertId = isset($alertId) ? $alertId : 'info-message';
$infoMessage = isset($infoMessage) ? $infoMessage : '';
$infoShow = isset($infoShow) && $infoShow ? '' : 'hidden';
?>

<div id="<?php echo $alertId; ?>" class="alert alert-info <?php echo $infoShow; ?>">
	<button type="button" class="close" data-hide="alert" aria-hidden="true">×</button>
	<span class="message-body"><?php echo $infoMessage; ?></span>
</div>