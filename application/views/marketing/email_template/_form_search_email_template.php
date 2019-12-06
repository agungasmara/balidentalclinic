<?php
$name = isset($search['name']) ? $search['name'] : '';
$subject = isset($search['subject']) ? $search['subject'] : '';
?>


<div class="row">
	<div class="col-sm-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-tag"></i></span>
			<input name="name" placeholder="Name" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
	</div>

	<div class="col-sm-6 mb-1">
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-envelope"></i></span>
			<input name="subject" placeholder="Email Subject" class="form-control" type="text" value="<?php echo $subject; ?>">
		</div>
	</div>
</div>