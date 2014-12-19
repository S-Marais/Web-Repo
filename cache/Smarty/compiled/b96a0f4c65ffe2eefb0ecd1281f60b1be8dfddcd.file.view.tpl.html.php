<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-19 03:34:01
         compiled from "templates/login/view.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:24929763154938e99b366d3-56296480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b96a0f4c65ffe2eefb0ecd1281f60b1be8dfddcd' => 
    array (
      0 => 'templates/login/view.tpl.html',
      1 => 1418601956,
      2 => 'file',
    ),
    '0d6b9d906a418d0c96c8e3435d6a37e12395fd17' => 
    array (
      0 => '/var/www/site/templates/base_layout.tpl.html',
      1 => 1418859351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24929763154938e99b366d3-56296480',
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
  'unifunc' => 'content_54938e99b72676_32602972',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54938e99b72676_32602972')) {function content_54938e99b72676_32602972($_smarty_tpl) {?>
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
