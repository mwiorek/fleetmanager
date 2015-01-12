{block name=sidebar}
<div class="navigation">
<ul class="nav nav-sidebar">
    <li {if {$smarty.server.SCRIPT_NAME|basename} == {$smarty.const.FILENAME_DEFAULT}} class="active"{/if}><a href="{$smarty.const.FILENAME_DEFAULT}">Overview</a></li>
{*     <li {if {$smarty.server.SCRIPT_NAME|basename} == {$smarty.const.FILENAME_REPORTS}} class="active"{/if}><a href="{$smarty.const.FILENAME_REPORTS}">Reports</a></li>
    <li {if $page_title == 'analytics'} class="active"{/if}><a href="#">Analytics</a></li>
    <li {if $page_title == 'export'} class="active"{/if}><a href="#">Export</a></li>
</ul>
<ul class="nav nav-sidebar">
    <li {if $page_title == 'navitem'} class="active"{/if}><a href="">Nav item</a></li>
    <li {if $page_title == 'navitemag'} class="active"{/if}><a href="">Nav item again</a></li>
    <li {if $page_title == 'onemore'} class="active"{/if}><a href="">One more nav</a></li>
    <li {if $page_title == 'anothernav'} class="active"{/if}><a href="">Another nav item</a></li>
    <li {if $page_title == 'morenav'} class="active"{/if}><a href="">More navigation</a></li>
</ul> *}
{* <ul class="nav nav-sidebar"> *}
    
    <li {if {$smarty.server.SCRIPT_NAME|basename} == {$smarty.const.FILENAME_SETTINGS}} class="active"{/if}><a href="{$smarty.const.FILENAME_SETTINGS}">Account Settings</a></li>
    <li {if {$smarty.server.SCRIPT_NAME|basename} == {$smarty.const.FILENAME_SETTINGS}} class="active"{/if}><a href="{$smarty.const.FILENAME_SETTINGS}">Account Settings</a></li>
    {* <li {if $page_title == 'something else'} class="active"{/if}><a href="">Something else</a></li>*}
    <li><a href="{$smarty.const.FILENAME_LOGOUT}">Logout</a></li>
</ul>
</div>
{/block}