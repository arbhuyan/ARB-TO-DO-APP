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
 *	All class files.
 */

// require main class
require_once("classes/main_class.php");

// require data class
require_once("classes/data_class.php");