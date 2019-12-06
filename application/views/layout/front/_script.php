<!-- DEFAULT SCRIPT -->
<?php
if (isset($js_asset)) echo $js_asset;

if (isset($externalScripts)) :
	foreach ($externalScripts as $script) :
?>
	<script src="<?php echo $script; ?>"></script>	
<?php
	endforeach;
endif;

if (isset($scripts)) :
	foreach ($scripts as $script) :
		$url = base_url() . 'public/asset/' . $script . '.js';
?>
		<script src="<?php echo $url; ?>"></script>	
<?php
	endforeach;
endif;
?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125491930-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'UA-125491930-1');
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120096083-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-120096083-1');
	gtag('config', 'AW-802884335');
</script>

<script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-802884335/-7T9COr0vJMBEO-V7P4C', 'event_callback': callback }); return false; } </script>