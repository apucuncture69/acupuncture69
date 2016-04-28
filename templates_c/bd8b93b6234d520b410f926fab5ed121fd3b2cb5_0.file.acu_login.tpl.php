<?php
/* Smarty version 3.1.28, created on 2016-04-28 16:40:58
  from "C:\Program Files\wamp\www\acupuncture\view\acu_login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_572220fa5ee698_91789491',
  'file_dependency' => 
  array (
    'bd8b93b6234d520b410f926fab5ed121fd3b2cb5' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_login.tpl',
      1 => 1461854349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572220fa5ee698_91789491 ($_smarty_tpl) {
?>
<article class="acu_tile">
    <h1 id="acu_login_title">Connexion</h1>
    <div id="login_form">
        <form aria-labelledby="acu_login_title">
            <div class="form-group">
                <label for="login_email">Email:</label>
                <input class="form-control" id="login_email" type="text" placeholder="Email" aria-required="true" tabindex="5" title="Exemple: mon.email@toto.fr"/>
            </div>
            <div class="form-group">
                <label for="login_password">Mot de passe:</label>
                <input class="form-control" id="login_password" type="password" placeholder="Mot de passe" aria-required="true" tabindex="6" title="Votre mot de passe doit contenir au moins 5 caractères"/>
            </div>
            <input id="login_redirect_page" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['redirect_page']->value;?>
" />
        </form>
        <div id="login_error"></div>
        <button id="login_submit" class="btn btn-default" tabindex="7">Connexion</button>
        <div>
            <a href="signup" tabindex="8">S'inscrire</a>
        </div>
    </div>
</article>

<?php }
}
