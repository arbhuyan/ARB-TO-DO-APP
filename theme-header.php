<?php
/**
 * This is theme verification procedure of the app.
 * This file contains all theme related functions.
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
 * get initial data here
 */

// get initial file
require_once("arb-includes/init.php");

/**
* Checking your theme folder for prior informations.
*/

if(theme_check_ok()){
	require_once("arb-includes/template/theme.loader.php");
} else {
	echo"Sorry, Your theme is not properly installed. Minimum required files for theme are index.php and style.css";
}