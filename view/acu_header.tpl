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
    {if $user.email ne ''}
      <a href="#">
        <img id="header_profile_avatar" src="http://2.gravatar.com/avatar/{$user.email|md5}" alt='Image de profil' />
        <p id="header_profile_username">{$user.display_name}</p>
      </a>
      <ul id="header_menu_user">
        <li>Menu 1</li>
        <li>Menu 2</li>
        <li>Déconnexion</li>
      </ul>
    {else}
      <a href="login">
        <p id="header_profile_username">Se connecter</p>
      </a>
    {/if}
  </div>

</header>
