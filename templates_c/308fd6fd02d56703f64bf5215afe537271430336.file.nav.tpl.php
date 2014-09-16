<?php /* Smarty version Smarty-3.1.19, created on 2014-09-16 17:26:31
         compiled from "./templates/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:846935162541856a7e0e237-27434189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '308fd6fd02d56703f64bf5215afe537271430336' => 
    array (
      0 => './templates/nav.tpl',
      1 => 1410878281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '846935162541856a7e0e237-27434189',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_541856a7e19ef0_84689274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541856a7e19ef0_84689274')) {function content_541856a7e19ef0_84689274($_smarty_tpl) {?>
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
