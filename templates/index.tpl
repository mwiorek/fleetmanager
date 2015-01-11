{* Smarty *}

{extends file="layout.tpl"}
{block name="body"}

{if ('ADMIN')|in_array:$users_roles}
{include 'user_table.tpl'}
{/if}
{if ('ADM')|in_array:$users_roles or ('ADMIN')|in_array:$users_roles}
{include 'vehicle_table.tpl'}
{/if}
{if ('DRIVER')|in_array:$users_roles or ('ADMIN')|in_array:$users_roles }
{/if}

{/block}