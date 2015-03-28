<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php $this->View->makeTitle($app);?></title>
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
				<?php echo h(SYSTEM_MAIN_NAME); ?>
			</h1>
		</section>
	</header>

	<!--Navigation-->
	<nav id="mainNav">

	</nav>

	<!--Content-->
	<section id="mainContent" style="width: <?php echo $this->fetch('width_content');?>px;">
		<form id="<?php echo $this->fetch('myself'); ?>Form" method="post">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</form>
	</section>

	<!--Footer-->
	<footer id="mainFooter">

	</footer>

	<!-- Hidden for Javascript -->
	<input type="hidden" id="myself" value="<?php echo $this->fetch('myself'); ?>">
	<input type="hidden" id="rootPath" value="<?php $this->View->getProjectPath(); ?>">

	<!--Javascript-->
	<?php
		echo $this->element('readyScript');
	?>

</body>
</html>
