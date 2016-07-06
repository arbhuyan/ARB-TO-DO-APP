<?php
/**
 * This is theme loader of the app. 
 * This file contains all kind of theme functions.
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

// require page processing
require_once("page-process.php");

/**
 * Theme functions for general use.
 */

// get default stylesheet
function get_stylesheet() {
	
	// default stylesheet style.css
	$stylesheet = get_theme_directory().'/style.css';

	// include default stylesheet
	if(file_exists($stylesheet)){
		return $stylesheet;
	}
}

// include theme header file
function get_header() {

	// get header file
	$header_file = get_theme_directory().'/header.php';

	// include header file if exists
	if(file_exists($header_file)){
		include $header_file;
	}
}

// include theme sidebar file
function get_sidebar() {

	// get header file
	$sidebar_file = get_theme_directory().'/sidebar.php';

	// include sidebar file if exists
	if(file_exists($sidebar_file)){
		include $sidebar_file;
	}
}

// include theme template part
function get_template_part($part) {

	// get header file
	$template_file = get_theme_directory().'/'.$part.'.php';

	// include template file if exists
	if(file_exists($template_file)){
		include $template_file;
	}
}

// include theme footer file
function get_footer() {

	// get header file
	$footer_file = get_theme_directory().'/footer.php';

	// include footer file if exists
	if(file_exists($footer_file)){
		include $footer_file;
	}
}

// run theme if all conditions confirmed
function run_theme(){

	if( DATABASE_NAME != 'database_name' ){

		$login_required = SHOW_LOGIN_PAGE;

		if($login_required && !user_logged_in()){
			require_once('arb-includes/default-templates/login.php');
		} else {
			// run theme index.php
			require_once(get_theme_directory().'/index.php');
		}

	} else {
		echo"<h3>Database yet to connect ! Please update config.php</h3>";
	}
}

// run register page if all conditions confirmed
function run_register_page(){

	if(!user_logged_in()){
		// run theme index.php
		require_once('arb-includes/default-templates/register.php');
	} else {
		redirect_to("index.php");
	}
}

// run register page if all conditions confirmed
function run_login_page(){

	if(!user_logged_in()){
		// run theme index.php
		require_once('arb-includes/default-templates/login.php');
	} else {
		redirect_to("index.php");
	}
}