<?php
/**
 * This is config file of the app. 
 * This config file contains all basic informations of the web page.
 * @author MD. Anisur Rahman Bhuyan
 * @copyright Open Source Project
 * @link http://anisbd.com/
 * @version 1.0
 */

/**
 * Website Basic informations
 */

// define webpage url
define("BASE_URL", "Your website url here");

// define website name
define("SITE_NAME", "Your App Name Here");

// define website description
define("SITE_DESCRIPTION", "A Simple To Do Web Application.");

/**
 * Database informations
 */

// database driver
define("DATABASE_DRIVER", "mysql");

// database host
define("DATABASE_HOST", "database_host_name");

// database username
define("DATABASE_USERNAME", "database_username");

// database password
define("DATABASE_PASSWORD", "database_password");

// database name
define("DATABASE_NAME", "database_name");

// database table prefix
define("DATABASE_TABLE_PREFIX", "app_");

/**
 * Pls, do not edit under this line if you are not confirm about this.
 */

// get root folder
define("ROOT_PATH", __DIR__);

// theme forlder
define("THEME_DIRECTORY", "theme");

// theme name
define("THEME_NAME", "default");

// user forced login page
define("SHOW_LOGIN_PAGE", TRUE);