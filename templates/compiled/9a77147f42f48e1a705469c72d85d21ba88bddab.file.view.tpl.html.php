<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-18 00:19:41
         compiled from "templates/templates/login/view.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:459982875548d7bc6ebb353-09678353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a77147f42f48e1a705469c72d85d21ba88bddab' => 
    array (
      0 => 'templates/templates/login/view.tpl.html',
      1 => 1418601956,
      2 => 'file',
    ),
    'a1754f71b7c2ec0f99d876c443c7aac56f9c8593' => 
    array (
      0 => '/var/www/site/templates/templates/base_layout.tpl.html',
      1 => 1418857348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '459982875548d7bc6ebb353-09678353',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_548d7bc71cff00_79521461',
  'variables' => 
  array (
    'CSS_FILES' => 0,
    'CSS_FILE' => 0,
    'JS_FILES' => 0,
    'JS_FILE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548d7bc71cff00_79521461')) {function content_548d7bc71cff00_79521461($_smarty_tpl) {?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<?php  $_smarty_tpl->tpl_vars['CSS_FILE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['CSS_FILE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CSS_FILES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['CSS_FILE']->key => $_smarty_tpl->tpl_vars['CSS_FILE']->value) {
$_smarty_tpl->tpl_vars['CSS_FILE']->_loop = true;
?>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['CSS_FILE']->value;?>
"><?php echo '</script'; ?>
>
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
		
		
	</head>
	<body>
		

		
		
	</body>
</html>
<?php }} ?>
