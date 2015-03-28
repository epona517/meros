<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title></title>
	<?php
		echo $this->element('head');
	?>
</head>
<body>
	<!--Header-->
	<header id="mainHeader" class="table_parent">
		<section id="systemTitle" class="table_child_c">
			<h1>
				<div id="logo" class="frame_circle"></div>
				<?php // echo h(SYSTEM_NAME); ?>
			</h1>
		</section>
	</header>

	<!--Navigation-->
	<nav id="mainNav">

	</nav>

	<!--Content-->
	<section id="mainContent" style="width: <?php echo $this->fetch('width_content');?>px;">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
	</section>

	<!--Footer-->
	<footer id="mainFooter">

	</footer>

	<!--Javascript-->
	<?php
		echo $this->element('readyScript');
	?>

</body>
</html>
