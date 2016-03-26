<?php
/* Smarty version 3.1.28, created on 2016-03-25 22:28:10
  from "C:\Program Files\wamp\www\acupuncture\view\acu_header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56f5ad6a8a14e7_85706038',
  'file_dependency' => 
  array (
    'cb1fc5aafb25d1920de3f097e3b38b140ebf8578' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_header.tpl',
      1 => 1458941284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f5ad6a8a14e7_85706038 ($_smarty_tpl) {
?>
<header>
  <a href="./">
    <img id="img_logo_site" src="public/img/ic_logo.png" alt="Acupuncture logo" />
  </a>

  <nav>
    <ul id="header_navigation_items">
      <li><a href="./">Accueil</a></li>
      <li><a href="pathologies">Pathologies</a></li>
      <li><a href="infos">Infos</a></li>
    </ul>
  </nav>

  <div id="header_profile">
    <?php if ($_smarty_tpl->tpl_vars['user']->value['email'] != '') {?>
    <a href="#">
      <img id="header_profile_avatar" src="http://2.gravatar.com/avatar/<?php echo md5($_smarty_tpl->tpl_vars['user']->value['email']);?>
" alt='Image de profil' />
      <p id="header_profile_username"><?php echo $_smarty_tpl->tpl_vars['user']->value['display_name'];?>
</p>
    </a>
    <ul id="header_menu_user" role="menu">
      <li role="menuitem">Menu 1</li>
      <li role="menuitem">Menu 2</li>
      <li role="menuitem">Déconnexion</li>
    </ul>
    <?php } else { ?>
    <a href="login">
      <p id="header_profile_username">Se connecter</p>
    </a>
    <?php }?>
  </div>

</header><?php }
}
