<?php
/* Smarty version 3.1.28, created on 2016-03-24 17:25:15
  from "C:\Program Files\wamp\www\acupuncture\view\acu_pathologies.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56f414eb2e4918_33995191',
  'file_dependency' => 
  array (
    'cc029412821b97c1d49596ced368a6ce95ee893f' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_pathologies.tpl',
      1 => 1458829949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f414eb2e4918_33995191 ($_smarty_tpl) {
?>
<!-- Pathologies tile -->
<div class="acu_tile">
  <h2>Chercher une pathologie</h2>

  <div id="acu_search_patho" class="acu_search_view">
    <input type="search" placeholder="Pathologie..." class="acu_search_input" />
    <button class="acu_search_btn">
      <span class="acu_search_img" />
    </button>
  </div>

  <div class="table-responsive-vertical">
    <table id="acu_pathologie_table" class="table table-hover">
      <thead>
        <tr>
          <th>Type</th>
          <th>Meridien</th>
          <th>Description</th>
          <th>Symptomes</th>
        </tr>
      </thead>
      <tbody>
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
</div>
<?php }
}
