<?php
$subject = isset($contact->subject) ? $contact->subject : '';
?>

<div class="input-group mb-1">
	<span class="input-group-addon"><i class="icon-user"></i></span>
	<input name="name" placeholder="Your Name" class="form-control" type="text">
</div>
<div class="input-group mb-1">
	<span class="input-group-addon"><i class="icon-envelope"></i></span>
	<input name="email" placeholder="Your Email" class="form-control" type="text">
</div>
<div class="input-group mb-1">
	<span class="input-group-addon"><i class="icon-tag"></i></span>
	<input name="subject" placeholder="Subject" class="form-control" type="text" value="<?php echo $subject; ?>">
</div>
<div class="input-group mb-1">
	<span class="input-group-addon"><i class="icon-doc"></i></span>
	<textarea name="message" class="form-control"
		rows="5"></textarea>
</div>
<button class="btn btn-tertiary btn-block font-weight-semibold" type="sumbit"
	data-submit-loader="SENDING MESSAGE"
	data-submit-finish="SEND MESSAGE">
	SEND MESSAGE
</button>