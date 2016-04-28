<?php
/* Smarty version 3.1.28, created on 2016-04-28 16:40:58
  from "C:\Program Files\wamp\www\acupuncture\view\acu_header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_572220fa592062_12045277',
  'file_dependency' => 
  array (
    'cb1fc5aafb25d1920de3f097e3b38b140ebf8578' => 
    array (
      0 => 'C:\\Program Files\\wamp\\www\\acupuncture\\view\\acu_header.tpl',
      1 => 1461854349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572220fa592062_12045277 ($_smarty_tpl) {
?>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header_navigation_collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./" tabindex="-1">
          <img id="img_logo_site" src="public/img/ic_logo.png" alt="Acupuncture logo" />
        </a>
      </div>

      <div class="collapse navbar-collapse" id="header_navigation_collapse">
        <ul id="header_navigation_items" class="nav navbar-nav">
          <li class="<?php if ($_smarty_tpl->tpl_vars['module_name']->value == 'acu_home') {?>active<?php }?>"><a href="./" tabindex="10" accesskey="1">Accueil</a></li>
          <li class="<?php if ($_smarty_tpl->tpl_vars['module_name']->value == 'acu_pathologies') {?>active<?php }?>"><a href="pathologies" tabindex="20" accesskey="2">Pathologies</a></li>
          <li class="<?php if ($_smarty_tpl->tpl_vars['module_name']->value == 'acu_infos') {?>active<?php }?>"><a href="infos" tabindex="30" accesskey="3">Infos</a></li>
        </ul>

        <ul id="header_profile" class="nav navbar-nav navbar-right">
          <?php if ($_smarty_tpl->tpl_vars['user']->value['isConnected'] == true) {?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" tabindex="40">
              <!--<img id="header_profile_avatar" src="http://2.gravatar.com/avatar/<?php echo md5($_smarty_tpl->tpl_vars['user']->value['email']);?>
" alt='Image de profil' />-->
              <p id="header_profile_username"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['display_name'])===null||$tmp==='' ? 'Anonyme' : $tmp);?>
</p>
              <span class="caret"></span>
            </a>
            <ul id="header_menu_user" role="menu" class="dropdown-menu">
              <li role="menuitem"><a href="profil">Mon profil</a></li>
              <li role="menuitem" id="header_deco"><a href="#">Déconnexion</a></li>
            </ul>
          </li>
          <?php } else { ?>
          <li>
            <a href="login" tabindex="40">
              <p id="header_profile_username">Se connecter</p>
            </a>
          </li>
          <li>
            <a href="signup" tabindex="50">
              <p class="header_button">S'inscrire</p>
            </a>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </nav>

</header>
<?php }
}
