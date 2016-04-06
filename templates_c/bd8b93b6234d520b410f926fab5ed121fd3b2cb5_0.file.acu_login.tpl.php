<?php
/* Smarty version 3.1.28, created on 2016-04-06 10:30:15
  from "C:\Program Files\wamp\www\acupuncture\view\acu_login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5704c917b97ce6_14829676',
  'file_dependency' => 
  array (
    'bd8b93b6234d520b410f926fab5ed121fd3b2cb5' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_login.tpl',
      1 => 1459931348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5704c917b97ce6_14829676 ($_smarty_tpl) {
?>
<article class="acu_tile">

    <h1 id="acu_login_title">Connexion</h1>

    <form id="login_form" aria-labelledby="acu_login_title">
        <div class="form-group">
            <label for="login_email">Email</label>
            <input type="email" class="form-control" id="login_email" placeholder="Email" aria-required="true">
        </div>
        <div class="form-group">
            <label for="login_password">Mot de passe</label>
            <input type="password" class="form-control" id="login_password" placeholder="Mot de passe" aria-required="true">
        </div>
				<input id="login_redirect_page" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['redirect_page']->value;?>
" />
        <button id="login_submit" type="submit" class="btn btn-default">Connexion</button>
    </form>

</article>
<?php }
}
