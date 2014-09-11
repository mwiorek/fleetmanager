<?php

/*

The use of DIR_FS/DIR_WS, etc is taken from how osCommerce does directory mapping
https://github.com/osCommerce/oscommerce2/blob/23/catalog/includes/configure.php
*/

define('DIR_FS', str_replace("\\","/",getcwd()));
//File system directory (local)
//smarty template's hack for windows/*nix systems
//http://www.smarty.net/docs/en/installing.smarty.basic.tpl

define('DIR_WS', ''); // virtual file directory (webdirectories)

define('SMARTY_DIR', DIR_FS . '/libs/Smarty-3.1.19/');

define('HTTP_SERVER', 'http://localhost'); 

define('DIR_WS_STATIC', 'static/');

define('DIR_WS_INCLUDES', 'includes/');

define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');

define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');

//DB credentials are defined in the databaseConnection Class /includes/classes/databaseConnection.php

define('APP_NAME', 'BI-Dashboard');

define('REGISTER_USER_PASSWORDS_DO_NOT_MATCH', 'Problem i paradiset');