{* Smarty *}

{extends file="layout.tpl"}
{block name="body"}

{if ('ADMIN')|in_array:$user_roles}
{include 'all_user_table.tpl'}
{/if}
{if ('ADM')|in_array:$user_roles or ('ADMIN')|in_array:$user_roles}
{include 'active_vehicles_table.tpl'}
{include 'vehicle_table.tpl' vehicleList=$available_vehicles title='Available Vehicles'}
{include 'vehicle_table.tpl' vehicleList=$all_vehicle_list title='All Vehicles'}
{/if}
{if ('DRIVER')|in_array:$user_roles or ('ADMIN')|in_array:$user_roles }
{include 'drivers_table.tpl' ActiveVehicleList=$active_vehicles AssignedVehicleList=$assigned_vehicles}
{/if}

{/block}