<?php
/* Smarty version 3.1.28, created on 2016-04-28 16:41:01
  from "C:\Program Files\wamp\www\acupuncture\view\acu_pathologies_data.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_572220fdf2aa91_35224311',
  'file_dependency' => 
  array (
    '40d31fca7be704fd56d3a7e7088ac49ab43c8063' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_pathologies_data.tpl',
      1 => 1461854349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572220fdf2aa91_35224311 ($_smarty_tpl) {
$_from = $_smarty_tpl->tpl_vars['smarty_xml']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_pathologie_0_saved_item = isset($_smarty_tpl->tpl_vars['pathologie']) ? $_smarty_tpl->tpl_vars['pathologie'] : false;
$_smarty_tpl->tpl_vars['pathologie'] = new Smarty_Variable();
$__foreach_pathologie_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_pathologie_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['pathologie']->value) {
$__foreach_pathologie_0_saved_local_item = $_smarty_tpl->tpl_vars['pathologie'];
?>
  <tr>
    <td class="tab_elt_pri">
      <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['pathologie']->value->type, 'UTF-8');?>

    </td>
    <td>
      <table>
      <?php
$_from = $_smarty_tpl->tpl_vars['pathologie']->value->meridien;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_meridien_1_saved_item = isset($_smarty_tpl->tpl_vars['meridien']) ? $_smarty_tpl->tpl_vars['meridien'] : false;
$_smarty_tpl->tpl_vars['meridien'] = new Smarty_Variable();
$__foreach_meridien_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_meridien_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['meridien']->value) {
$__foreach_meridien_1_saved_local_item = $_smarty_tpl->tpl_vars['meridien'];
?>
        <tr>
          <td class="tab_elt_pri" data-title="Nom du méridien">
            <?php echo $_smarty_tpl->tpl_vars['meridien']->value->nom;?>

          </td>
        </tr>
        <tr>
          <td class="tab_elt_sec">
            Element: <?php echo $_smarty_tpl->tpl_vars['meridien']->value->element;?>

          </td>
        </tr>
        <tr>
          <td class="tab_elt_sec">
            <?php if ($_smarty_tpl->tpl_vars['meridien']->value->yin == 1) {?>
            Yin
            <?php } else { ?>
            Yang
            <?php }?>
          </td>
        </tr>
      <?php
$_smarty_tpl->tpl_vars['meridien'] = $__foreach_meridien_1_saved_local_item;
}
}
if ($__foreach_meridien_1_saved_item) {
$_smarty_tpl->tpl_vars['meridien'] = $__foreach_meridien_1_saved_item;
}
?>
      </table>
    </td>
    <td>
      <?php echo $_smarty_tpl->tpl_vars['pathologie']->value->description;?>

    </td>
    <td>
      <table class="patho_symptome_cell">
      <?php
$_from = $_smarty_tpl->tpl_vars['pathologie']->value->symptomes->symptome;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_symptome_2_saved_item = isset($_smarty_tpl->tpl_vars['symptome']) ? $_smarty_tpl->tpl_vars['symptome'] : false;
$_smarty_tpl->tpl_vars['symptome'] = new Smarty_Variable();
$__foreach_symptome_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_symptome_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['symptome']->value) {
$__foreach_symptome_2_saved_local_item = $_smarty_tpl->tpl_vars['symptome'];
?>
        <tr>
          <td class="tab_elt_pri">
            <?php echo $_smarty_tpl->tpl_vars['symptome']->value->description;?>

          </td>
        </tr>
        <tr>
          <td class="tab_elt_sec">
            <?php if ($_smarty_tpl->tpl_vars['symptome']->value->aggr == 'true') {?>
              Aggravant
            <?php } else { ?>
              Non aggravant
            <?php }?>
          </td>
        </tr>
      <?php
$_smarty_tpl->tpl_vars['symptome'] = $__foreach_symptome_2_saved_local_item;
}
}
if ($__foreach_symptome_2_saved_item) {
$_smarty_tpl->tpl_vars['symptome'] = $__foreach_symptome_2_saved_item;
}
?>
      </table>
    </td>
  </tr>
<?php
$_smarty_tpl->tpl_vars['pathologie'] = $__foreach_pathologie_0_saved_local_item;
}
}
if ($__foreach_pathologie_0_saved_item) {
$_smarty_tpl->tpl_vars['pathologie'] = $__foreach_pathologie_0_saved_item;
}
}
}
