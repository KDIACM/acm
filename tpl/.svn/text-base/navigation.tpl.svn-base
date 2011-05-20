{if count($navigation->m_navigation_obj) > 0}
	<div class="msg">
		<p class="successful">
		{section name=i loop=$navigation->m_navigation_obj}
			<a href="{if $navigation->m_navigation_obj[i]->m_navi_link != ''}{$navigation->m_navigation_obj[i]->m_navi_link}{/if}"><b>{$navigation->m_navigation_obj[i]->m_navi_name}</b></a>
			{if !$smarty.section.i.last} > {/if}
		{/section}
		</p>
	</div>
{/if}
