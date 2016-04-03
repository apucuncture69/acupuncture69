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
        <a class="navbar-brand" href="./">
          <img id="img_logo_site" src="public/img/ic_logo.png" alt="Acupuncture logo" />
        </a>
      </div>

      <div class="collapse navbar-collapse" id="header_navigation_collapse">
        <ul id="header_navigation_items" class="nav navbar-nav">
          <li class="{if $module_name eq 'acu_home'}active{/if}"><a href="./">Accueil</a></li>
          <li class="{if $module_name eq 'acu_pathologies'}active{/if}"><a href="pathologies">Pathologies</a></li>
          <li class="{if $module_name eq 'acu_infos'}active{/if}"><a href="infos">Infos</a></li>
        </ul>

        <ul id="header_profile" class="nav navbar-nav navbar-right">
          {if $user.isConnected eq true}
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <!--<img id="header_profile_avatar" src="http://2.gravatar.com/avatar/{$user.email|md5}" alt='Image de profil' />-->
              <p id="header_profile_username">{$user.display_name}</p>
              <span class="caret"></span>
            </a>
            <ul id="header_menu_user" role="menu" class="dropdown-menu">
              <li role="menuitem">Menu 1</li>
              <li role="separator" class="divider"></li>
              <li role="menuitem">Menu 2</li>
              <li role="separator" class="divider"></li>
              <li role="menuitem" id="header_deco">Déconnexion</li>
            </ul>
          </li>
          {else}
          <li>
            <a href="login">
              <p id="header_profile_username">Se connecter</p>
            </a>
          </li>
          {/if}
        </ul>
      </div>
    </div>
  </nav>

</header>
