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
		<div id="systemTitle" class="table_child_l">
			<?php echo h(SYSTEM_MAIN_NAME); ?>
		</div>
		<div id="viewTitle" class="table_child_c">
			<?php echo h($app['viewName']); ?>
		</div>
		<div id="mySpace" class="table_child_r">
			<div class="wrap_user">
				<i class="fa fa-user"></i>
			</div>
		</div>
	</header>

	<!--Navigation-->
	<nav id="mainNav" class="area__nav">
		<div class="nav__wrap_menu">
			<ul>
				<li class="nav_menu"><a href="#"><i class="fa fa-pencil-square-o"></i></a>
				<li class="nav_menu"><a href="#" class="menu_txt">W</i></a>
				<li class="nav_menu"><a href="#" class="menu_txt">M</a>
			</ul>
		</div>
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
