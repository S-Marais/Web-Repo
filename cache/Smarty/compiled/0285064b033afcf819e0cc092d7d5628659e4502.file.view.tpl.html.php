<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-19 08:44:06
         compiled from "templates/register/view.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:4381509205493d746764670-43515390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0285064b033afcf819e0cc092d7d5628659e4502' => 
    array (
      0 => 'templates/register/view.tpl.html',
      1 => 1418602034,
      2 => 'file',
    ),
    '0d6b9d906a418d0c96c8e3435d6a37e12395fd17' => 
    array (
      0 => '/var/www/site/templates/base_layout.tpl.html',
      1 => 1418859351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4381509205493d746764670-43515390',
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
  'unifunc' => 'content_5493d7469a2124_31388495',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5493d7469a2124_31388495')) {function content_5493d7469a2124_31388495($_smarty_tpl) {?>
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
		
		
	</head>
	<body>
		
		
		

	</body>
</html>
<?php }} ?>
