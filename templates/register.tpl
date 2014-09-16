{* Smarty *}

{extends file="layout_nosidebar.tpl"}
{block name="title"}Register Account{/block}
{block name="body"}
<div class="container">
  <form class="form-signin" role="form" action="{$smarty.const.FILENAME_REGISTER}" method="POST">
    <h2 class="form-signin-heading">Register Account</h2>
    <input type="hidden" name="action" value="register">
     
    <div class="form-group{if $errors.201 neq NULL} has-error{/if}">
      <label for="name" class="sr-only">Name:</label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus pattern="{literal}.{1,64}{/literal}" title="A valid name 1-64 letters" value="{$name}">
      {if is_array($errors) and array_key_exists(201,$errors)}
        <div class="alert alert-danger" role="alert">{$smarty.const.{$errors.201}}</div>
      {/if}
    </div>
    <div class="form-group{if ($errors.202 neq NULL) or ($errors.203 neq NULL) or ($errors.204 neq NULL)} has-error{/if}">
      <label for="email_address" class="sr-only">Email Address:</label>
      <input type="email" id="email_address" name="email_address" class="form-control" placeholder="Email address" required value="{$email_address}">
      {if is_array($errors) and array_key_exists(202,$errors)}
        <div class="alert alert-danger" role="alert">{$smarty.const.{$errors.202}}</div>
      {/if}
      {if is_array($errors) and array_key_exists(203,$errors)}
        <div class="alert alert-danger" role="alert">{$smarty.const.{$errors.203}}</div>
      {/if}
      {if is_array($errors) and array_key_exists(204,$errors)}
        <div class="alert alert-danger" role="alert">{$smarty.const.{$errors.204}}</div>
      {/if}
    </div>
    <div class="form-group{if $errors.205 neq NULL} has-error{/if}">
      <label for="password" class="sr-only">Password:</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      {if is_array($errors) and array_key_exists(205,$errors)}
        <div class="alert alert-danger" role="alert">{$smarty.const.{$errors.205}}</div>
      {/if}
    </div>
    <div class="form-group{if ($errors.206 neq NULL) or ($errors.207 neq NULL)} has-error{/if}">
      <label for="password_confirmation" class="sr-only">Password Confirmation:</label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
      {if is_array($errors) and array_key_exists(206,$errors)}
        <div class="alert alert-danger" role="alert">{$smarty.const.{$errors.206}}</div>
      {/if}
      {if is_array($errors) and array_key_exists(207,$errors)}
        <div class="alert alert-danger" role="alert">{$smarty.const.{$errors.207}}</div>
      {/if}
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register Account</button>
    <a href="{$smarty.const.FILENAME_LOGIN}" class="btn btn-lg btn-default btn-block"><i class="glyphicon glyphicon-arrow-left"></i> Go Back</a>
  </form>

</div> <!-- /container -->
{/block}