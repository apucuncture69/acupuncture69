<?php
/* Smarty version 3.1.28, created on 2016-04-28 17:10:16
  from "C:\Program Files\wamp\www\acupuncture\view\acu_profil.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_572227d8d89e04_60672117',
  'file_dependency' => 
  array (
    '9e61a5a51805795ac294a63c9caece3c81d9669e' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_profil.tpl',
      1 => 1461856045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572227d8d89e04_60672117 ($_smarty_tpl) {
?>
<!-- Equipe tile -->
<article class="acu_tile" id="acu_infos_team">
  <h1 id="acu_infos_team_title">Mon profil</h1>
  <form>
    <div class="row">
      <label for="profil_prenom">Prénom:</label>
      <input name="profil_prenom" id="profil_prenom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['profil_first']->value;?>
" tabindex="1"/>
    </div>
    <div class="row">
      <label for="profil_nom">Nom:</label>
      <input name="profil_nom" id="profil_nom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['profil_last']->value;?>
" tabindex="2"/>
    </div>
    <div class="row">
      <label for="profil_email">Email:</label>
      <output name="profil_email" id="profil_email"><?php echo $_smarty_tpl->tpl_vars['profil_email']->value;?>
</output>
    </div>
    <div class="row">
      <label for="profil_mdp">Mot de passe:</label>
      <input name="profil_mdp" id="profil_mdp" type="password" placeholder="••••••••••" value="" tabindex="3"/>
      <label for="profil_newmdp">Nouveau mot de passe:</label>
      <input name="profil_newmdp" id="profil_newmdp" type="password" placeholder="••••••••••" value="" tabindex="4"/>
    </div>
  </form>
  <div id="profil_error">
    <?php if ($_smarty_tpl->tpl_vars['profil_saved']->value == '1') {?>
      Modifications enregistrées.
    <?php }?>
  </div>
  <button id="profil_submit" tabindex="5">Modifier</button>
</article>
<?php }
}
