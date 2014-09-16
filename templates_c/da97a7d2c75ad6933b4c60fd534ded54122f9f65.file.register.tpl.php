<?php /* Smarty version Smarty-3.1.19, created on 2014-09-16 17:26:31
         compiled from "./templates/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:718904141541856a7c51a13-11378550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da97a7d2c75ad6933b4c60fd534ded54122f9f65' => 
    array (
      0 => './templates/register.tpl',
      1 => 1410878281,
      2 => 'file',
    ),
    '469e10ca32e1bc794bd85277049124e52262e47c' => 
    array (
      0 => './templates/layout_nosidebar.tpl',
      1 => 1410878281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '718904141541856a7c51a13-11378550',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_541856a7e042d9_23394599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541856a7e042d9_23394599')) {function content_541856a7e042d9_23394599($_smarty_tpl) {?>
  <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <?php echo $_smarty_tpl->getSubTemplate ('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  
<div class="container">
  <form class="form-signin" role="form" action="<?php echo @constant('FILENAME_REGISTER');?>
" method="POST">
    <h2 class="form-signin-heading">Register Account</h2>
    <input type="hidden" name="action" value="register">
     
    <div class="form-group<?php if ($_smarty_tpl->tpl_vars['errors']->value[201]!=null) {?> has-error<?php }?>">
      <label for="name" class="sr-only">Name:</label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus pattern=".{1,64}" title="A valid name 1-64 letters" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
      <?php if (is_array($_smarty_tpl->tpl_vars['errors']->value)&&array_key_exists(201,$_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo @constant($_smarty_tpl->tpl_vars['errors']->value[201]);?>
</div>
      <?php }?>
    </div>
    <div class="form-group<?php if (($_smarty_tpl->tpl_vars['errors']->value[202]!=null)||($_smarty_tpl->tpl_vars['errors']->value[203]!=null)||($_smarty_tpl->tpl_vars['errors']->value[204]!=null)) {?> has-error<?php }?>">
      <label for="email_address" class="sr-only">Email Address:</label>
      <input type="email" id="email_address" name="email_address" class="form-control" placeholder="Email address" required value="<?php echo $_smarty_tpl->tpl_vars['email_address']->value;?>
">
      <?php if (is_array($_smarty_tpl->tpl_vars['errors']->value)&&array_key_exists(202,$_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo @constant($_smarty_tpl->tpl_vars['errors']->value[202]);?>
</div>
      <?php }?>
      <?php if (is_array($_smarty_tpl->tpl_vars['errors']->value)&&array_key_exists(203,$_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo @constant($_smarty_tpl->tpl_vars['errors']->value[203]);?>
</div>
      <?php }?>
      <?php if (is_array($_smarty_tpl->tpl_vars['errors']->value)&&array_key_exists(204,$_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo @constant($_smarty_tpl->tpl_vars['errors']->value[204]);?>
</div>
      <?php }?>
    </div>
    <div class="form-group<?php if ($_smarty_tpl->tpl_vars['errors']->value[205]!=null) {?> has-error<?php }?>">
      <label for="password" class="sr-only">Password:</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <?php if (is_array($_smarty_tpl->tpl_vars['errors']->value)&&array_key_exists(205,$_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo @constant($_smarty_tpl->tpl_vars['errors']->value[205]);?>
</div>
      <?php }?>
    </div>
    <div class="form-group<?php if (($_smarty_tpl->tpl_vars['errors']->value[206]!=null)||($_smarty_tpl->tpl_vars['errors']->value[207]!=null)) {?> has-error<?php }?>">
      <label for="password_confirmation" class="sr-only">Password Confirmation:</label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
      <?php if (is_array($_smarty_tpl->tpl_vars['errors']->value)&&array_key_exists(206,$_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo @constant($_smarty_tpl->tpl_vars['errors']->value[206]);?>
</div>
      <?php }?>
      <?php if (is_array($_smarty_tpl->tpl_vars['errors']->value)&&array_key_exists(207,$_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="alert alert-danger" role="alert"><?php echo @constant($_smarty_tpl->tpl_vars['errors']->value[207]);?>
</div>
      <?php }?>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register Account</button>
    <a href="<?php echo @constant('FILENAME_LOGIN');?>
" class="btn btn-lg btn-default btn-block"><i class="glyphicon glyphicon-arrow-left"></i> Go Back</a>
  </form>

</div> <!-- /container -->

  <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
