<?php
echo $this->Html->meta('icon');
echo $this->Html->script('lib/jquery-2.1.3.min');
echo $this->Html->script('lib/jquery-ui.min.js');
echo $this->Html->script('common');
echo $this->Html->script($this->fetch('myself'));
echo $this->Html->css('lib/normalize');
echo $this->Html->css('lib/genericons');
echo $this->Html->css('lib/awesome/css/font-awesome.min.css');
echo $this->Html->css('lib/jquery-ui.min.css');
// echo $this->Html->css('lib/jquery-ui.structure.min.css');
// echo $this->Html->css('lib/jquery-ui.theme.min.css');
echo $this->Html->css('commonize');
echo $this->Html->css('scale');
echo $this->Html->css('forms');
echo $this->Html->css('header' . $this->fetch('special'));
echo $this->Html->css('nav');
echo $this->Html->css($this->fetch('myself'));