<!DOCTYPE html>
<html class="fixed">
	<head>
		<?php $this->load->view('layout/front/_head'); ?>
		
		<!-- Facebook Pixel Code -->
        <script>
        	!function(f,b,e,v,n,t,s)
            	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        	n.queue=[];t=b.createElement(e);t.async=!0;
        	t.src=v;s=b.getElementsByTagName(e)[0];
        	s.parentNode.insertBefore(t,s)}(window,document,'script',
        	    'https://connect.facebook.net/en_US/fbevents.js');
        	fbq('init', '328771744300995'); 
        	fbq('track', 'PageView');
        </script>
        <noscript>
        	<img height="1" width="1" src="https://www.facebook.com/tr?id=328771744300995&ev=PageView &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
        
	</head>

	<body class="one-page" data-target="#header" data-spy="scroll" data-offset="100">

		<div class="body">
			
			<?php 
			if (isset($noticeBoard)) :
				$this->load->view('layout/front/_notice_board');
			endif;
			?>

			<?php if (isset($activeMenu)) : ?>
			<!-- ACTIVE MENU -->
			<div class="hidden" data-active-menu="<?php echo $activeMenu; ?>" data-active-menu-class="active"></div>
			<?php endif ?>

			<!-- HEADER -->
			<?php  $this->load->view('layout/front/_header'); ?>

			<!-- CONTENT -->
			<div role="main" class="main">
				
				<?php
				if (isset($content)) {
					$this->load->view($content);
				}

				if (isset($contents) && is_array($contents)) {
					foreach ($contents as $content) {
						$this->load->view($content);
					}
				}
				?>

			</div>

			<!-- FOOTER -->
			<?php  $this->load->view('layout/front/_footer'); ?>
				
		</div>

		<?php $this->load->view('layout/front/_script'); ?>
		
	</body>
</html>