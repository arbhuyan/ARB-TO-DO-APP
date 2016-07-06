<?php
/**
 * This is init file of the app. 
 * This init file contains all initial files for this app.
 * @author MD. Anisur Rahman Bhuyan
 * @copyright Open Source Project
 * @link http://anisbd.com/
 * @version 1.0
 */

// security check
if(!isset($s_token))
{
	echo "This is restricted file";
	exit();
}

/**
 *	All Required files.
 */

// require general config file
require_once("./config.php");

// require general functions file
require_once("functions.php");

// require database
require_once("database/dbConnect.php");

// require class loader
require_once("class.loader.php");