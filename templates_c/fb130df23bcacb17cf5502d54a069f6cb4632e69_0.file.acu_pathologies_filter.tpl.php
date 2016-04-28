<?php
/* Smarty version 3.1.28, created on 2016-04-28 16:41:01
  from "C:\Program Files\wamp\www\acupuncture\view\acu_pathologies_filter.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_572220fd8f72e2_52182987',
  'file_dependency' => 
  array (
    'fb130df23bcacb17cf5502d54a069f6cb4632e69' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_pathologies_filter.tpl',
      1 => 1461854349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572220fd8f72e2_52182987 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cpt', 0);
$_from = $_smarty_tpl->tpl_vars['smarty_xml']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_filters_0_saved_item = isset($_smarty_tpl->tpl_vars['filters']) ? $_smarty_tpl->tpl_vars['filters'] : false;
$_smarty_tpl->tpl_vars['filters'] = new Smarty_Variable();
$__foreach_filters_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_filters_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['filters']->value) {
$__foreach_filters_0_saved_local_item = $_smarty_tpl->tpl_vars['filters'];
?>
  <?php if ($_smarty_tpl->tpl_vars['cpt']->value == 0) {?>
    <?php $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable('meridiens', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'name', 0);?>
    <?php $_smarty_tpl->tpl_vars['tabindex'] = new Smarty_Variable(32, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'tabindex', 0);?>
  <?php } elseif ($_smarty_tpl->tpl_vars['cpt']->value == 1) {?>
    <?php $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable('types', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'name', 0);?>
    <?php $_smarty_tpl->tpl_vars['tabindex'] = new Smarty_Variable(33, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'tabindex', 0);?>
  <?php }?>
  
  <label for="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><?php echo ucfirst($_smarty_tpl->tpl_vars['name']->value);?>
</label>
  <select id="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['tabindex']->value;?>
">
    <option value="all">Tous <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
  <?php
$_from = $_smarty_tpl->tpl_vars['filters']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_filter_1_saved_item = isset($_smarty_tpl->tpl_vars['filter']) ? $_smarty_tpl->tpl_vars['filter'] : false;
$_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable();
$__foreach_filter_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_filter_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->value) {
$__foreach_filter_1_saved_local_item = $_smarty_tpl->tpl_vars['filter'];
?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['filter']->value;?>
</option>
  <?php
$_smarty_tpl->tpl_vars['filter'] = $__foreach_filter_1_saved_local_item;
}
}
if ($__foreach_filter_1_saved_item) {
$_smarty_tpl->tpl_vars['filter'] = $__foreach_filter_1_saved_item;
}
?>
  </select>

  <?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cpt']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cpt', 0);
$_smarty_tpl->tpl_vars['filters'] = $__foreach_filters_0_saved_local_item;
}
}
if ($__foreach_filters_0_saved_item) {
$_smarty_tpl->tpl_vars['filters'] = $__foreach_filters_0_saved_item;
}
}
}
