<?php /* Smarty version Smarty-3.1.19, created on 2014-09-16 17:26:28
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:972933985541856a428f6e8-22891205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e3a89ac4e67a4e52db731aef6db14b203ee6051' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1410878281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '972933985541856a428f6e8-22891205',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_541856a42b1e60_48511965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541856a42b1e60_48511965')) {function content_541856a42b1e60_48511965($_smarty_tpl) {?>    <div class="footer container-fluid">
    
      <div class="row">
        <div class="col-xs-12">
          <p class="text-muted">
            ©Martin Wiorek 2014 built using: Twiter Bootstrap, Smarty Template System, and jQuery
          </p>
        </div>
      </div>
 
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script src="<?php echo @constant('DIR_WS_STATIC');?>
js/vendor/jquery-1.11.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo @constant('DIR_WS_STATIC');?>
js/bootstrap.min.js"></script>
    <script src="<?php echo @constant('DIR_WS_STATIC');?>
js/user_scripts.js"></script>
    
  </body>
</html><?php }} ?>
