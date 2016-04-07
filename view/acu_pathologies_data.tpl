{foreach from=$smarty_xml item=pathologie}
  <tr>
    <td class="tab_elt_pri">
      {$pathologie->type|upper}
    </td>
    <td>
      <table>
      {foreach from=$pathologie->meridien item=meridien}
        <tr>
          <td class="tab_elt_pri" data-title="Nom du méridien">
            {$meridien->nom}
          </td>
        </tr>
        <tr>
          <td class="tab_elt_sec">
            Element: {$meridien->element}
          </td>
        </tr>
        <tr>
          <td class="tab_elt_sec">
            Yin: {$meridien->yin}
          </td>
        </tr>
      {/foreach}
      </table>
    </td>
    <td>
      {$pathologie->description}
    </td>
    <td>
      <table>
      {foreach from=$pathologie->symptomes->symptome item=symptome}
        <tr>
          <td class="tab_elt_pri">
            {$symptome->description}
          </td>
        </tr>
        <tr>
          <td class="tab_elt_sec">
            {if $symptome->aggr eq 'true' }
              Aggravant
            {else}
              Non aggravant
            {/if}
          </td>
        </tr>
      {/foreach}
      </table>
    </td>
  </tr>
{/foreach}
