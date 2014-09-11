<?php /* Smarty version Smarty-3.1.19, created on 2014-09-10 20:44:04
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79702987354109bf41270a2-86886356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb41b376a9441d9b54de3a10a545f1150f3e834f' => 
    array (
      0 => './templates/login.tpl',
      1 => 1410275632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79702987354109bf41270a2-86886356',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54109bf41ae049_94720719',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54109bf41ae049_94720719')) {function content_54109bf41ae049_94720719($_smarty_tpl) {?>
    
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
