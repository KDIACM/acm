{* if errors are as a array *}
{if $error}
  <li class="msg">
    <label class="error">
      {foreach from=$error item=err}
        {$err}<br />
      {/foreach}
    </label>
    <div style="clear: both;"></div>
  </li>
{/if}

{* if just error notification *}
{if $err}
  <li class="msg">
    <label class="error">
        Errors occured on form submission
    </label>
    <div style="clear: both;"></div>
  </li>
  <li style="height:5px;">
  </li>
{/if}