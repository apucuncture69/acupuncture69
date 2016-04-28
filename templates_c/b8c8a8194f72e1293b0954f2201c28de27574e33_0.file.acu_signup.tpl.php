<?php
/* Smarty version 3.1.28, created on 2016-04-28 16:47:31
  from "C:\Program Files\wamp\www\acupuncture\view\acu_signup.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57222283a818e9_83894927',
  'file_dependency' => 
  array (
    'b8c8a8194f72e1293b0954f2201c28de27574e33' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_signup.tpl',
      1 => 1461854349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57222283a818e9_83894927 ($_smarty_tpl) {
?>
<article class="acu_tile">
    <h1 id="acu_signup_title">Inscription</h1>
    <div id="signup_form">
        <form aria-labelledby="acu_signup_title">
	    <div class="form-group">
                <label for="signup_lastname">Nom:</label>
                <input class="form-control" id="signup_lastname" type="text" placeholder="Nom" aria-required="true"/>
            </div>
	    <div class="form-group">
                <label for="signup_firstname">Prénom:</label>
                <input class="form-control" id="signup_firstname" type="text" placeholder="Prénom" aria-required="true"/>
            </div>
            <div class="form-group">
                <label for="signup_email">Email:</label>
                <input class="form-control" id="signup_email" type="text" placeholder="Email" aria-required="true"/>
            </div>
            <div class="form-group">
                <label for="signup_password">Mot de passe:</label>
                <input class="form-control" id="signup_password" type="password" placeholder="Mot de passe" aria-required="true"/>
            </div>
	    <div class="form-group">
                <label for="signup_password_again">Confirmation de mot de passe:</label>
                <input class="form-control" id="signup_password_again" type="password" placeholder="Confirmation de mot de passe" aria-required="true"/>
            </div>
            <input id="signup_redirect_page" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['redirect_page']->value;?>
" />
        </form>
        <button id="signup_submit" class="btn btn-default">Inscription</button>
    </div>
</article>

<?php }
}
