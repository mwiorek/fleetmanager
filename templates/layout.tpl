{* Smarty *}
{include 'header.tpl'}
{block name="sidebar"}{include 'sidebar.tpl'}{/block}
<div class="container {block name=sidebar-class}{/block}">
    <h1 class="pageTitle">{$pageTitle}</h1>
    {block name="body"}{/block}
    {include 'footer.tpl'}
</div>
