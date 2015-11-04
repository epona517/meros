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
		<div id="systemTitle" class="table_child_c">
			<h1>
				<i class="fa fa-car"></i>
			</h1>
			<h4>
				<?php
					$this->View->makeSystemNameForLogin();
				?>
			</h4>
		</div>
	</header>

	<!--Navigation-->
	<nav id="mainNav">

	</nav>

	<!--Content-->
	<div id="mainContent" style="width: <?php echo $this->fetch('width_content');?>px;">
		<form id="<?php echo $this->fetch('myself'); ?>Form" method="post">
			<?php echo $this->Session->flash('flashMessage'); ?>
			<?php echo $this->fetch('content'); ?>
		</form>
	</div>

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
