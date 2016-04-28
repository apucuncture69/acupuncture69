<?php
/* Smarty version 3.1.28, created on 2016-04-28 16:41:00
  from "C:\Program Files\wamp\www\acupuncture\view\acu_pathologies.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_572220fcb6f390_54660613',
  'file_dependency' => 
  array (
    'cc029412821b97c1d49596ced368a6ce95ee893f' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_pathologies.tpl',
      1 => 1461854349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572220fcb6f390_54660613 ($_smarty_tpl) {
?>
<!-- Pathologies tile -->
<article class="acu_tile">
  <h1 id="acu_pathologie_title">Pathologies</h1>

  <div id="acu_search_patho" class="acu_search_view" aria-labelledby="acu_pathologie_title">
    <?php if ($_smarty_tpl->tpl_vars['user']->value['isConnected'] == true) {?>
    <input id="search" type="search" maxlength="20" placeholder="Pathologie..." class="acu_search_input" aria-controls="acu_pathologie_table" title="Chercher une pathologie" tabindex="31"/>
    <button class="acu_search_btn">
      <span class="acu_search_img"></span>
    </button>
    <?php } else { ?>
    <div id="patho_button_search" tabindex="31">
      Rechercher
    </div>
    <?php }?>
  </div>
  <div id="words">
  </div>
  <div id="pathologies_filter">
  </div>

  <div class="table-responsive-vertical" aria-labelledby="acu_pathologie_title">
    <table id="acu_pathologie_table" class="table table-hover" role="region">
      <thead>
        <tr>
          <th>Type</th>
          <th>Méridien</th>
          <th>Description</th>
          <th>Symptômes</th>
        </tr>
      </thead>
      <tbody id="pathologies_content" aria-live="polite" aria-atomic="true" aria-relevant="additions removals">
      </tbody>
    </table>
  </div>
</article>

<div id="loading">
  <img class="patho_img_loading" src="public/img/loading.gif" alt="Chargement..." aria-describedby="chargement des données"/>
</div>
<?php }
}
