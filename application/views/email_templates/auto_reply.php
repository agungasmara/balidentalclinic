<?php
$name = isset($email->name) ? ucwords($email->name) : '';
$subject = isset($email->subject) ? $email->subject : '';
?>

<h4>Hi <?php echo $name; ?>,</h4>

<p>
Thank you for sending us message about : <strong><?php echo $subject; ?></strong><br>
Please wait, our representative will response to your email soon.
</p>
<br>
Best regards,<br>
<i>Confident Bali</i>