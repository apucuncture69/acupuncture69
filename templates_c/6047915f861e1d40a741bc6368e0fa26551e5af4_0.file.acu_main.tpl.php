<?php
/* Smarty version 3.1.28, created on 2016-03-25 22:14:34
  from "C:\Program Files\wamp\www\acupuncture\view\acu_main.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56f5aa3acd63a2_11504870',
  'file_dependency' => 
  array (
    '6047915f861e1d40a741bc6368e0fa26551e5af4' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_main.tpl',
      1 => 1458903659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/acu_header.tpl' => 1,
    'file:view/".((string)$_smarty_tpl->tpl_vars[\'module_name\']->value).".tpl' => 1,
  ),
),false)) {
function content_56f5aa3acd63a2_11504870 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Acupuncture</title>
  <link rel="stylesheet" type="text/css" href="public/style/main_style.css" />
  <link rel="stylesheet" type="text/css" href="public/style/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
.css" />
  <meta charset="UTF-8">
</head>

<body>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:view/acu_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div id="main_content" role="main">
    <div id="main_content_top"></div>
    <div id="main_content_tiles">
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:view/".((string)$_smarty_tpl->tpl_vars['module_name']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
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
 src="public/js/<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
.js" type="text/javascript"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
