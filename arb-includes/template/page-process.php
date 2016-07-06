<?php
/**
 * This is theme page processor of the app. 
 * This file contains all kind of paging functions.
 * @author MD. Anisur Rahman Bhuyan
 * @copyright Open Source Project
 * @link http://anisbd.com/
 * @version 1.0
 */

// user session
if(!session_id()){

	// start a session
	session_start();
}

// security check
if(!isset($s_token))
{
	echo "This is restricted file";
	exit();
}

/**
 * Post functions for general use.
 */

if(isset($_GET['register'])){

	// register user
	if(process_user_register()){
		redirect_to("index.php");
	} else {
		redirect_to("register.php");
	}

} elseif(isset($_GET['signout'])){

	// register user
	process_signout();

} else {
	
	// process login
	process_user_login();
}