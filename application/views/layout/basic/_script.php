<!-- DEFAULT SCRIPT -->
<?php
if (isset($js_asset)) echo $js_asset;

if (isset($scripts)) :
	foreach ($scripts as $script) :
		$url = base_url( 'public/asset/' . $script . '.js' );
?>

	<script src="<?php echo $url; ?>"></script>	

<?php
	endforeach;
endif;
?>