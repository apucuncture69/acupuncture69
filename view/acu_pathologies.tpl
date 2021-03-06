<!-- Pathologies tile -->
<article class="acu_tile">
  <h1 id="acu_pathologie_title">Pathologies</h1>

  <div id="acu_search_patho" class="acu_search_view" aria-labelledby="acu_pathologie_title">
    {if $user.isConnected eq true}
    <input id="search" type="search" maxlength="20" placeholder="Pathologie..." class="acu_search_input" aria-controls="acu_pathologie_table" title="Chercher une pathologie" tabindex="31"/>
    <button class="acu_search_btn">
      <span class="acu_search_img"></span>
    </button>
    {else}
    <div id="patho_button_search" tabindex="31">
      Rechercher
    </div>
    {/if}
  </div>
  <div id="words">
  </div>
  <div id="pathologies_filter">
  </div>

  <div class="table-responsive-vertical" aria-labelledby="acu_pathologie_title">
    <table id="acu_pathologie_table" class="table table-hover" role="region">
      <thead>
        <tr>
          <th>Type</th>
          <th>Méridien</th>
          <th>Description</th>
          <th>Symptômes</th>
        </tr>
      </thead>
      <tbody id="pathologies_content" aria-live="polite" aria-atomic="true" aria-relevant="additions removals">
      </tbody>
    </table>
  </div>
</article>

<div id="loading">
  <img class="patho_img_loading" src="public/img/loading.gif" alt="Chargement..." aria-describedby="chargement des données"/>
</div>
