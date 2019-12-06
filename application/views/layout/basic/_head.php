<?php

$title = $appSettings['site_name'] . ' - ' . $appSettings['site_motto'];
$description = $appSettings['site_description'];
$keyword = $appSettings['site_keywords'];
if (isset($seoMeta)) {
	$title = $seoMeta['title'] . ' - ' . $seoMeta['subtitle'];
	$description = $seoMeta['description'];
	$keyword = $seoMeta['keyword'];
}
$icon = base_url('public/asset/images/favicon.ico');

?>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keyword; ?>">
<meta name="author" content="creactive.id">
<link rel="shortcut icon" href="<?php echo $icon; ?>" type="image/x-icon">
<link rel="icon" href="<?php echo $icon; ?>" type="image/x-icon">

<title><?php echo $title; ?></title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

<?php 
if (isset($css_asset)) echo $css_asset;
?>

<script src="<?php echo base_url('public/asset/vendor/modernizr/modernizr.js'); ?>"></script>