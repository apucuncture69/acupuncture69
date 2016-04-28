<?php
/* Smarty version 3.1.28, created on 2016-04-28 16:40:58
  from "C:\Program Files\wamp\www\acupuncture\view\acu_main.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_572220fa0793e1_37350862',
  'file_dependency' => 
  array (
    '6047915f861e1d40a741bc6368e0fa26551e5af4' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_main.tpl',
      1 => 1461854349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/acu_header.tpl' => 1,
    'file:view/".((string)$_smarty_tpl->tpl_vars[\'module\']->value).".tpl' => 1,
  ),
),false)) {
function content_572220fa0793e1_37350862 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Acupuncture</title>

  <link rel="stylesheet" type="text/css" href="public/style/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/style/main_style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="public/style/main_style_print.css" media="print">
  <link rel="stylesheet" type="text/css" href="public/style/main_style_small_device.css" media="screen and (max-width: 1280px)">
  <?php
$_from = $_smarty_tpl->tpl_vars['module_name']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_module_0_saved_item = isset($_smarty_tpl->tpl_vars['module']) ? $_smarty_tpl->tpl_vars['module'] : false;
$_smarty_tpl->tpl_vars['module'] = new Smarty_Variable();
$__foreach_module_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_module_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['module']->value) {
$__foreach_module_0_saved_local_item = $_smarty_tpl->tpl_vars['module'];
?>
    <link rel="stylesheet" type="text/css" href="public/style/<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
.css">
  <?php
$_smarty_tpl->tpl_vars['module'] = $__foreach_module_0_saved_local_item;
}
}
if ($__foreach_module_0_saved_item) {
$_smarty_tpl->tpl_vars['module'] = $__foreach_module_0_saved_item;
}
?>
</head>

<body>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:view/acu_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div id="main_content" role="main">
    <div id="main_content_top"></div>
    <div id="main_content_tiles">
    <?php
$_from = $_smarty_tpl->tpl_vars['module_name']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_module_1_saved_item = isset($_smarty_tpl->tpl_vars['module']) ? $_smarty_tpl->tpl_vars['module'] : false;
$_smarty_tpl->tpl_vars['module'] = new Smarty_Variable();
$__foreach_module_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_module_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['module']->value) {
$__foreach_module_1_saved_local_item = $_smarty_tpl->tpl_vars['module'];
?>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:view/".((string)$_smarty_tpl->tpl_vars['module']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php
$_smarty_tpl->tpl_vars['module'] = $__foreach_module_1_saved_local_item;
}
}
if ($__foreach_module_1_saved_item) {
$_smarty_tpl->tpl_vars['module'] = $__foreach_module_1_saved_item;
}
?>
    </div>
  </div>

  <footer>
    <p>© 2016 Brat Breton Collinet Decoster - All Rights Reserved</p>
  </footer>

  <?php echo '<script'; ?>
 src="http://code.jquery.com/jquery-2.2.2.js" integrity="sha256-4/zUCqiq0kqxhZIyp4G0Gk+AOtCJsY1TA00k5ClsZYE=" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="public/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="public/js/sha256/scripts/qunit.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="public/js/sha256/scripts/sha256.jquery.debug.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="public/js/acu_main.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php
$_from = $_smarty_tpl->tpl_vars['module_name']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_module_2_saved_item = isset($_smarty_tpl->tpl_vars['module']) ? $_smarty_tpl->tpl_vars['module'] : false;
$_smarty_tpl->tpl_vars['module'] = new Smarty_Variable();
$__foreach_module_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_module_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['module']->value) {
$__foreach_module_2_saved_local_item = $_smarty_tpl->tpl_vars['module'];
?>
    <?php echo '<script'; ?>
 src="public/js/<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php
$_smarty_tpl->tpl_vars['module'] = $__foreach_module_2_saved_local_item;
}
}
if ($__foreach_module_2_saved_item) {
$_smarty_tpl->tpl_vars['module'] = $__foreach_module_2_saved_item;
}
?>
</body>

</html>
<?php }
}
