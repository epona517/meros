<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script('lib/jquery-2.1.3.min');
		echo $this->Html->script('common');
		echo $this->Html->script($this->fetch('myself'));
		echo $this->Html->css('lib/normalize');
		echo $this->Html->css('lib/genericons');
		echo $this->Html->css('commonize');
		echo $this->Html->css('forms');
		echo $this->Html->css($this->fetch('myself'));
	?>
</head>
<body>
	<header id="mainHeader">

	</header>
	<nav id="mainNav">

	</nav>
	<section id="mainContent" style="width: <?php echo $this->fetch('width_content');?>px;">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
	</section>
	<footer id="mainFooter">

	</footer>
	<script type="text/javascript">
		$(function() {

			common.init();
			<?php echo $this->fetch('myself'); ?>.init();

		});
	</script>
</body>
</html>
