<?php
/* Smarty version 3.1.28, created on 2016-03-25 22:28:43
  from "C:\Program Files\wamp\www\acupuncture\view\acu_pathologies.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56f5ad8b276c16_41149431',
  'file_dependency' => 
  array (
    'cc029412821b97c1d49596ced368a6ce95ee893f' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_pathologies.tpl',
      1 => 1458941001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f5ad8b276c16_41149431 ($_smarty_tpl) {
?>
<!-- Pathologies tile -->
<article class="acu_tile">
  <h1 id="acu_pathologie_title">Chercher une pathologie</h1>

  <div id="acu_search_patho" class="acu_search_view" aria-labelledby="acu_pathologie_title">
    <input type="search" placeholder="Pathologie..." class="acu_search_input" aria-controls="acu_pathologie_table" title="Chercher une pathologie"/>
    <button class="acu_search_btn">
      <span class="acu_search_img"></span>
    </button>
  </div>

  <div class="table-responsive-vertical" aria-labelledby="acu_pathologie_title">
    <table id="acu_pathologie_table" class="table table-hover" role="region">
      <thead>
        <tr>
          <th>Type</th>
          <th>Meridien</th>
          <th>Description</th>
          <th>Symptomes</th>
        </tr>
      </thead>
      <tbody aria-live="polite" aria-atomic="true" aria-relevant="additions removals">
        <tr>
          <td data-title="Type">Crampe</td>
          <td data-title="Meridien">Bras</td>
          <td data-title="Description">Grosse crampe qui fait bien mal</td>
          <td data-title="Symptomes">Contraction subite des muscles</td>
        </tr>
        <tr>
          <td data-title="Type">Crampe</td>
          <td data-title="Meridien">Bras</td>
          <td data-title="Description">Grosse crampe qui fait bien mal</td>
          <td data-title="Symptomes">Contraction subite des muscles</td>
        </tr>
        <tr>
          <td data-title="Type">Crampe</td>
          <td data-title="Meridien">Bras</td>
          <td data-title="Description">Grosse crampe qui fait bien mal</td>
          <td data-title="Symptomes">Contraction subite des muscles</td>
        </tr>
        <tr>
          <td data-title="Type">Crampe</td>
          <td data-title="Meridien">Bras</td>
          <td data-title="Description">Grosse crampe qui fait bien mal</td>
          <td data-title="Symptomes">Contraction subite des muscles</td>
        </tr>
      </tbody>
    </table>
  </div>
</article>
<?php }
}
