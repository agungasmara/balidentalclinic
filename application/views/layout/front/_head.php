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
<link rel="icon" href="<?php echo $icon ?>" type="image/x-icon">
<title><?php echo $title; ?></title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<?php 
if (isset($css_asset)) echo $css_asset;
?>

<script src="<?php echo base_url('public/asset/vendor/modernizr/modernizr.min.js'); ?>"></script>