    <div class="footer container-fluid">
    
      <div class="row">
        <div class="col-xs-12">
          <p class="text-muted">
            ©Martin Wiorek 2014 built using: Twiter Bootstrap, Smarty Template System, and jQuery
          </p>
        </div>
      </div>
 
    </div>
    {block name="footer_scripts"}
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <script src="{$smarty.const.DIR_WS_STATIC}js/vendor/jquery-1.11.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{$smarty.const.DIR_WS_STATIC}js/bootstrap.min.js"></script>
    <script src="{$smarty.const.DIR_WS_STATIC}js/user_scripts.js"></script>
    {/block}
  </body>
</html>