<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-18 00:35:55
         compiled from "templates/templates/home/view.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1027923250548d7bcbe31d78-37364341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '373ddb5c97e14ddfe604ee6c09cb9d69252a31ac' => 
    array (
      0 => 'templates/templates/home/view.tpl.html',
      1 => 1418859286,
      2 => 'file',
    ),
    'a1754f71b7c2ec0f99d876c443c7aac56f9c8593' => 
    array (
      0 => '/var/www/site/templates/templates/base_layout.tpl.html',
      1 => 1418859351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1027923250548d7bcbe31d78-37364341',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_548d7bcc08c669_46737240',
  'variables' => 
  array (
    'CSS_FILES' => 0,
    'CSS_FILE' => 0,
    'JS_FILES' => 0,
    'JS_FILE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548d7bcc08c669_46737240')) {function content_548d7bcc08c669_46737240($_smarty_tpl) {?>
<html>
	<head>
		<?php  $_smarty_tpl->tpl_vars['CSS_FILE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['CSS_FILE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CSS_FILES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['CSS_FILE']->key => $_smarty_tpl->tpl_vars['CSS_FILE']->value) {
$_smarty_tpl->tpl_vars['CSS_FILE']->_loop = true;
?>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['CSS_FILE']->value;?>
"/>
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['JS_FILE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['JS_FILE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['JS_FILES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['JS_FILE']->key => $_smarty_tpl->tpl_vars['JS_FILE']->value) {
$_smarty_tpl->tpl_vars['JS_FILE']->_loop = true;
?>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_FILE']->value;?>
"><?php echo '</script'; ?>
>
		<?php } ?>
		
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="stylesheet" type="text/css" href="css/home.css" />

	</head>
	<body>
		
	<div id="bodyframe">
	</div>

		
	<div id="header">
		<div class="inner">
			<div id="site_logo"></div>
			<div class="top_menu">
				<a href="">Etudiants</a>
				<a href="">Offres</a>
				<a href="">Entreprises</a>
			</div>
		</div>
	</div>

	</body>
</html>
<?php }} ?>
