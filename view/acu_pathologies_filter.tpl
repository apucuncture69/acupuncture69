{$cpt = 0}
{foreach from=$smarty_xml item=filters}
  {if $cpt == 0}
    {$name = 'meridiens'}
  {elseif $cpt == 1}
    {$name = 'types'}
  {/if}
  
  <label for="{$name}">{$name|ucfirst}</label>
  <select id="{$name}" name="{$name}">
    <option value="all">Tous {$name}</option>
  {foreach from=$filters item=filter}
    <option value="{$filter}">{$filter}</option>
  {/foreach}
  </select>

  {$cpt = $cpt+1}
{/foreach}
