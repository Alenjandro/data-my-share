<?php
define('DB_NAME', 'e4010003');
define('DB_USER', 'e4010003');
define('DB_PASSWORD', '87Hyysnx');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('AUTH_KEY', 'f2e3c1070d74bfadc1d078b0771c468b839cae4d');
define('SECURE_AUTH_KEY', '1dd19e881e2c5e5f7ed3de1e53cd5fe52e555dac');
define('LOGGED_IN_KEY', '8e39fb8dcc91ce5e459bd20088bf9e67f1e708d4');
define('NONCE_KEY', '821e1fda44f4ec812be348f4ed09874a7659b011');
$table_prefix  = 'wp_news';

define ('WPLANG', 'ja');


/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
