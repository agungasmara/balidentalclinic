<?php
$btnCaption = isset($btnCaption) ? $btnCaption : 'LIST DATA';
?>

<hr class="dashed">
<div class="row d-none d-sm-block">
	<div class="col-sm-12">
		<button data-submit-loader="SAVING PROCESS" data-submit-finish="SAVE DATA" class="btn btn-primary font-weight-semibold" type="submit">SAVE DATA</button>
		<button class="btn btn-default font-weight-semibold" type="reset">CANCEL</button>
		<a href="<?php echo $listLink; ?>" class="btn btn-default font-weight-semibold"><?php echo $btnCaption; ?></a>
	</div>
</div>

<div class="row d-sm-none">
	<div class="col-sm-12">
		<button data-submit-loader="SAVING PROCESS" data-submit-finish="SAVE DATA" class="btn btn-primary btn-block font-weight-semibold" type="submit">SAVE DATA</button>
		<button class="btn btn-default btn-block font-weight-semibold" type="reset">CANCEL</button>
		<a href="<?php echo $listLink; ?>" class="btn btn-default btn-block font-weight-semibold"><?php echo $btnCaption; ?></a>
	</div>
</div>