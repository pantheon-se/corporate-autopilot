<?php

/**
 * This config file is yours to hack on. It will work out of the box on Pantheon
 * but you may find there are a lot of neat tricks to be used here.
 *
 * See our documentation for more details:
 *
 * https://pantheon.io/docs
 */


/**
 * Pantheon platform settings. Everything you need should already be set.
 */
if (file_exists(dirname(__FILE__) . '/wp-config-pantheon.php') && isset($_ENV['PANTHEON_ENVIRONMENT'])) {
    require_once(dirname(__FILE__) . '/wp-config-pantheon.php');

/**
 * Local configuration information.
 *
 * If you are working in a local/desktop development environment and want to
 * keep your config separate, we recommend using a 'wp-config-local.php' file,
 * which you should also make sure you .gitignore.
 */
} elseif (file_exists(dirname(__FILE__) . '/wp-config-local.php') && !isset($_ENV['PANTHEON_ENVIRONMENT'])) {
    # IMPORTANT: ensure your local config does not include wp-settings.php
    require_once(dirname(__FILE__) . '/wp-config-local.php');

/**
 * This block will be executed if you are NOT running on Pantheon and have NO
 * wp-config-local.php. Insert alternate config here if necessary.
 *
 * If you are only running on Pantheon, you can ignore this block.
 */
} else {
    define('DB_NAME', 'database_name');
    define('DB_USER', 'database_username');
    define('DB_PASSWORD', 'database_password');
    define('DB_HOST', 'database_host');
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');
    define('AUTH_KEY', 'put your unique phrase here');
    define('SECURE_AUTH_KEY', 'put your unique phrase here');
    define('LOGGED_IN_KEY', 'put your unique phrase here');
    define('NONCE_KEY', 'put your unique phrase here');
    define('AUTH_SALT', 'put your unique phrase here');
    define('SECURE_AUTH_SALT', 'put your unique phrase here');
    define('LOGGED_IN_SALT', 'put your unique phrase here');
    define('NONCE_SALT', 'put your unique phrase here');
}

// Specific to Colgate
if (!empty($_ENV['PANTHEON_ENVIRONMENT'])
  && (php_sapi_name() != "cli")) {

  if ($_SERVER['REQUEST_URI'] == '/') {
    echo file_get_contents('index.html');
    exit();
  }
}
  


/** Standard wp-config.php stuff from here on down. **/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * You may want to examine $_ENV['PANTHEON_ENVIRONMENT'] to set this to be
 * "true" in dev, but false in test and live.
 */
if (!defined('WP_DEBUG')) {
    define('WP_DEBUG', false);
}

/**
 * Add New Relic goodness.
 */
if (extension_loaded('newrelic')) {
    // Enable distributed tracing
    ini_set('newrelic.distributed_tracing_enabled', 'true');
}

/**
 * Define Cron Control Secret
 */
define('WP_CRON_CONTROL_SECRET', '18787b5221a115f0b5a31d6ad8ae89e3');

/**
 * Add Cloud Vision API Key
 */
// define('GCV_API_KEY', '9a3c701d17b0749a4a22e7b28c65bd5661cd66dd');

/**
 * Add Pantheon Redirection.
 */
$redirect_config = __DIR__ . "/redirect.php";
if (file_exists($redirect_config)) {
    require_once $redirect_config;
}

/* That's all, stop editing! Happy Pressing. */




/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
