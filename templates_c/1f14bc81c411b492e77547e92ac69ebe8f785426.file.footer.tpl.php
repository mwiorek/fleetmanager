<?php /* Smarty version Smarty-3.1.19, created on 2014-09-11 16:24:46
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14667851625410727b4ed440-70464371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f14bc81c411b492e77547e92ac69ebe8f785426' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1410443231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14667851625410727b4ed440-70464371',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5410727b4fd972_94016794',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5410727b4fd972_94016794')) {function content_5410727b4fd972_94016794($_smarty_tpl) {?>    <div class="footer container-fluid">
    
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
