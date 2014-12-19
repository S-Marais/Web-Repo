<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-19 03:33:34
         compiled from "templates/home/view.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:167568002254938e7e0e7ca4-61134425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee2496a4a7ca10530e67998c29158de85904092b' => 
    array (
      0 => 'templates/home/view.tpl.html',
      1 => 1418860166,
      2 => 'file',
    ),
    '0d6b9d906a418d0c96c8e3435d6a37e12395fd17' => 
    array (
      0 => '/var/www/site/templates/base_layout.tpl.html',
      1 => 1418859351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167568002254938e7e0e7ca4-61134425',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CSS_FILES' => 0,
    'CSS_FILE' => 0,
    'JS_FILES' => 0,
    'JS_FILE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54938e7e123e53_75465393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54938e7e123e53_75465393')) {function content_54938e7e123e53_75465393($_smarty_tpl) {?>
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
