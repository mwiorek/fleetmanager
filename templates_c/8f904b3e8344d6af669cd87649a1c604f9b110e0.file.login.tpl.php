<?php /* Smarty version Smarty-3.1.19, created on 2014-09-16 17:26:28
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1997437411541856a41f5721-42505390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f904b3e8344d6af669cd87649a1c604f9b110e0' => 
    array (
      0 => './templates/login.tpl',
      1 => 1410878281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1997437411541856a41f5721-42505390',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_541856a4244743_35340783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541856a4244743_35340783')) {function content_541856a4244743_35340783($_smarty_tpl) {?>
    
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">

  <form class="form-signin" role="form" action="<?php echo @constant('FILENAME_LOGIN');?>
" method="POST">
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="hidden" name="action" value="login">
    <input type="email" class="form-control" placeholder="Email address" required autofocus>
    <input type="password" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
    <p class="help-block text-center">or</p>
    <a href="<?php echo @constant('FILENAME_REGISTER');?>
" class="btn btn-lg btn-default btn-block">Register</a>
    <p class="help-block">Did you forget your password? <a href="<?php echo @constant('FILENAME_PASSWORD_FORGOTTEN');?>
">Click Here</a></p>
  </form>
  <p><?php echo $_SESSION['id'];?>
</p>
</div> <!-- /container -->

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
