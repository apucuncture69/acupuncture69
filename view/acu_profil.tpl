<!-- Equipe tile -->
<article class="acu_tile" id="acu_infos_team">
  <h1 id="acu_infos_team_title">Mon profil</h1>
  <form>
    <div class="row">
      <label for="profil_prenom">Prénom:</label>
      <input name="profil_prenom" id="profil_prenom" type="text" value="{$profil_first}" tabindex="1"/>
    </div>
    <div class="row">
      <label for="profil_nom">Nom:</label>
      <input name="profil_nom" id="profil_nom" type="text" value="{$profil_last}" tabindex="2"/>
    </div>
    <div class="row">
      <label for="profil_email">Email:</label>
      <output name="profil_email" id="profil_email">{$profil_email}</output>
    </div>
    <div class="row">
      <label for="profil_mdp">Mot de passe:</label>
      <input name="profil_mdp" id="profil_mdp" type="password" placeholder="••••••••••" value="" tabindex="3"/>
      <label for="profil_newmdp">Nouveau mot de passe:</label>
      <input name="profil_newmdp" id="profil_newmdp" type="password" placeholder="••••••••••" value="" tabindex="4"/>
    </div>
  </form>
  <div id="profil_error">
    {if $profil_saved eq '1'}
      Modifications enregistrées.
    {/if}
  </div>
  <button id="profil_submit" tabindex="5">Modifier</button>
</article>
