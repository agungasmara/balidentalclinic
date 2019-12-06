<?php
foreach ($templates as $template) :
	$name = $template->name;
	$subject = $template->subject;
	$description = $template->description;

	$editLink = base_url('marketing/email_template/edit/' . $template->id);
	$deleteLink = base_url('marketing/email_template/delete/' . $template->id);
?>

<div class="row data-list">
	<div class="col-md-12 mb-2">
		<div class="border p-3">
			<div class="row">
				<div class="col-sm-9 col-md-10">
					<h4 class="mt-0"><?php echo $name; ?></h4>
					<p class="mt-2 mb-2">
						Email subject : <span class="font-weight-semibold"><?php echo $subject; ?></span><br>
						<?php echo $description; ?>
					</p>
				</div>
				<div class="col-sm-3 col-md-2">
					<div class="btn-actions-sm">
						<a href="<?php echo $editLink; ?>" class="btn btn-default mb-1"><i class="icons icon-pencil"></i></a>
						<a href="<?php echo $deleteLink; ?>" class="btn btn-default mb-1" data-delete-confirmation="<?php echo $name; ?>"><i class="icons icon-trash"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
endforeach;
?>