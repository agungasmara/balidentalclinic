<?php
$name = isset($template->name) ? $template->name : '';
$subject = isset($template->subject) ? $template->subject : '';
$description = isset($template->description) ? $template->description : '';
?>

<div class="row">
	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Name</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-tag"></i></span>
			<input name="name" placeholder="Name" class="form-control" type="text" value="<?php echo $name; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Write down template name that you want to store<br>
			Make sure name same as filename that already uploaded
		</span>
	</div>

	<div class="col-sm-6 mb-2">
		<label class="d-none d-sm-block control-label">Email Subject</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="icons icon-energy"></i></span>
			<input name="subject" placeholder="Email subject" class="form-control" type="text" value="<?php echo $subject; ?>">
		</div>
		<span class="help-block d-none d-sm-block">
			Write down email subject
		</span>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<label class="d-none d-sm-block control-label">Description</label>
		<textarea placeholder="Description" name="description" class="autogrow-text py-2 px-3"><?php echo $description; ?></textarea>
		<span class="help-block d-none d-sm-block">
			Write clear description that can describe this template
		</span>
	</div>
</div>