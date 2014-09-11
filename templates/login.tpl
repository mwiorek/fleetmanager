{* Smarty *}
    
{include 'header.tpl'}

<div class="container">

  <form class="form-signin" role="form" action="{$smarty.const.FILENAME_LOGIN}" method="POST">
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
    <a href="{$smarty.const.FILENAME_REGISTER}" class="btn btn-lg btn-default btn-block">Register</a>
    <p class="help-block">Did you forget your password? <a href="{$smarty.const.FILENAME_PASSWORD_FORGOTTEN}">Click Here</a></p>
  </form>
  <p>{$smarty.session.id}</p>
</div> <!-- /container -->

{include 'footer.tpl'}