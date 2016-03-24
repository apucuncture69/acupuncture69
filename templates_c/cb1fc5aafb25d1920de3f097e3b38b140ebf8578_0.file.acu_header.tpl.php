<?php
/* Smarty version 3.1.28, created on 2016-03-24 14:06:59
  from "C:\Program Files\wamp\www\acupuncture\view\acu_header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56f3e673917d85_89742398',
  'file_dependency' => 
  array (
    'cb1fc5aafb25d1920de3f097e3b38b140ebf8578' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_header.tpl',
      1 => 1458824425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f3e673917d85_89742398 ($_smarty_tpl) {
?>
<header>
  <a href="./">
    <img id="img_logo_site" src="public/img/ic_logo.png" alt="Acupuncture logo" />
  </a>

  <ul id="header_navigation_items" role="navigation">
    <li><a href="./">Accueil</a></li>
    <li><a href="pathologies">Pathologies</a></li>
    <li><a href="infos">Infos</a></li>
  </ul>

  <div id="header_profile">
    <a href="#">
      <img id="header_profile_avatar" src="http://www.bakefly.com/uploads/section/avatar.jpg" alt='Image de profil' />
      <p id="header_profile_username">Michael Breton</p>
    </a>
    <ul>
      <li>Menu 1</li>
      <li>Menu 2</li>
      <li>Deconnexion</li>
    </ul>
  </div>
</header>
<?php }
}
