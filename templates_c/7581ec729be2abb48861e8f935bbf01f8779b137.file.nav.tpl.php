<?php /* Smarty version Smarty-3.1.19, created on 2014-09-12 18:16:51
         compiled from "./templates/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20087742125411a6042e1898-28713690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7581ec729be2abb48861e8f935bbf01f8779b137' => 
    array (
      0 => './templates/nav.tpl',
      1 => 1410538608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20087742125411a6042e1898-28713690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5411a6042f1fe5_98165300',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5411a6042f1fe5_98165300')) {function content_5411a6042f1fe5_98165300($_smarty_tpl) {?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo @constant('APP_NAME');?>
</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Log Out</a></li>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
  </div>
</nav><?php }} ?>
