<?php
/* Smarty version 3.1.28, created on 2016-03-25 11:16:22
  from "C:\Program Files\wamp\www\acupuncture\view\acu_login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56f50ff68d7e47_22279822',
  'file_dependency' => 
  array (
    'bd8b93b6234d520b410f926fab5ed121fd3b2cb5' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_login.tpl',
      1 => 1458900907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f50ff68d7e47_22279822 ($_smarty_tpl) {
?>
<article class="acu_tile">
	<h1 id="acu_login_title">Connexion</h1>
	<div id="login_form" aria-labelledby="acu_login_title">
		<label class="elt_form" for="login_email">Email:</label>
		<input class="elt_form" id="login_email" type="text" aria-required="true"/>
		<label class="elt_form" for="login_password">Mot de passe:</label>
		<input class="elt_form" id="login_password" type="password" aria-required="true"/>
		<button id="login_submit" class="elt_form">Connexion</button>
	</div>
</article>
<?php }
}
