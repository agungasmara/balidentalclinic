<?php

function renderSliderElement ($element)
{
	$type = $element->type;
	$templates = (Object) [
		'a' => '<a href="%s" %s>%s</a>',
		'div' => '<div %s>%s</div>',
	];
	
	$attributes = get_object_vars($element->attributes);
	$attrString = '';
	foreach ($attributes as $field => $val) {
		$attrString .= $field . '="' . $val . '" ';
	}

	if ($type == 'div')
		return sprintf($templates->$type, $attrString, $element->text);

	if ($type == 'a')
		return sprintf($templates->$type, $element->href, $attrString, $element->text);
}

?>

<div id="home"
	class="slider-container rev_slider_wrapper" style="height: 760px;">
	<div id="revolutionSlider" class="slider rev_slider" 
		data-version="5.4.7"
		data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 800, 'gridheight': 760, 'responsiveLevels': [4096,1200,992,500]}">
		<ul>
			
			<?php
			$sliderDir = $this->config->item('sliderDir');
			foreach ($sliders as $slider) :
				$sliderImg = base_url($sliderDir . $slider->background);
				// $sliderImg = 'public/inventory/sliders/' . $slider->background;
				$elements = $slider->elements;
			?>

			<li data-transition="fade">
				<img src="<?php echo $sliderImg; ?>"  
					alt=""
					data-bgposition="center center" 
					data-bgfit="cover" 
					data-bgrepeat="no-repeat" 
					class="rev-slidebg">

				<?php
				foreach ($elements as $element) :
					echo renderSliderElement($element);
				endforeach;
				?>

			</li>

			<?php endforeach; ?>

		</ul>
	</div>
</div>