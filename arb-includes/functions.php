<?php
/**
 * This is function of the app. 
 * This file contains general functions of the app.
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

// removing warnings
ini_set('display_errors', 0);

/**
 * Get basic website informations
*/

// get home url
function home_url() {
	return BASE_URL;
}

// get theme directory
function get_theme_directory() {
	return THEME_DIRECTORY.'/'.THEME_NAME;
}

// get default css
function get_header_default() {?>
	<link rel="stylesheet" href="arb-includes/default-templates/asset/css/cutegrids.css">
	<link rel="stylesheet" href="arb-includes/default-templates/asset/css/icofont.css">
	<link rel="stylesheet" href="arb-includes/default-templates/asset/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet(); ?>">
<?php
}

// site name and description
function site_info($content) {
	
	// show site name
	if($content == "name"){
		echo SITE_NAME;
	}

	// show site description
	if($content == "description"){
		echo SITE_DESCRIPTION;
	}
}

/**
 * Initial theme functions.
 */

function theme_check_ok() {

	// get index.php file
	$index_file = get_theme_directory().'/index.php';

	// get style.css file
	$style_css = get_theme_directory().'/style.css';

	// check if both file exists in theme folder
	if(file_exists($index_file) && file_exists($style_css)){
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * clear data from unauthorized entry
 */

function _clr($content) {
	$content = htmlentities($content);
	return $content;
}

/**
*	check user register-login
*/

function user_exist($userid) {
	$user_query = new main_class();
	$user_count = $user_query->user_exist($userid);
	return $user_count;
}

function process_user_register() {
	
	if(isset($_POST['submit'])){
		// collect post data
		$userid = _clr($_POST['name']);
		$pass = _clr($_POST['pass']);

		// check user existance
		if(user_exist($userid) == 0){
			
			$user_register = new main_class();
			$register_result = $user_register->register_user($userid, $pass);
			$_SESSION["msg"] = "User registered successfully. Login Here";
			return TRUE;

		} else {

			$_SESSION["msg"] = "Sorry, user id already exists. Try another";
			return FALSE;
		}
	}
}

function process_user_login() {

	if(isset($_POST['submit'])){

		// collect post data
		$userid = _clr($_POST['name']);
		$pass = _clr($_POST['pass']);

		// process user login
		$user_login = new main_class();
		$login_user = $user_login->user_login($userid, $pass);

		if($login_user){
			redirect_to("index.php");
		}
	}
}

/**
*	user authentication
*/
// check user login status
function user_logged_in(){
	if(isset($_SESSION['user_logged_in']) && isset($_SESSION['uid'])){
		return TRUE;
	} else {
		return FALSE;
	}
}

// signout process
function process_signout() {
	
	// clear sessions
	unset($_SESSION['user_logged_in']);
	unset($_SESSION['userid']);
	unset($_SESSION['uid']);

	// destroy user sessions
	session_unset();

	// signout message
	$_SESSION['msg'] = "User signout successfull.";

	if(isset($_SESSION['msg'])){
		redirect_to("index.php");
	}
}

// signout url
function signout_url(){
	return 'index.php?signout';
}

/**
*	Show messages
*/

// get message
function get_message(){
	if(!empty($_SESSION['msg'])){

		$message = "<p class=\"txt_msg text-center\">".$_SESSION['msg'].'</p>';

		// return message
		return $message;
	}
}

// flash message
function show_message() {
	echo get_message();	
	unset($_SESSION['msg']);
}

// redirect to
function redirect_to($param) {
	header("location: {$param}");
	exit();
}

/**
*	to do list
*/

// check user data
function have_list() {
	if(user_logged_in()){

		// logged in user id
		$uid = $_SESSION['uid'];
		
		// user data check
		$user_data = new data_class();
		$data_count = $user_data->count_data($uid);

		// return data_count
		return $data_count;	
	}
}

// todo list data
function todo_list() {
	if(user_logged_in()){

		// logged in user id
		$uid = $_SESSION['uid'];
		
		// user data list
		$list_data = new data_class();
		$data_list = $list_data->get_app_data($uid);

		// return data_list
		return $data_list;	
	}
}

// show main contents
function get_content(){
	if(user_logged_in()){
		require_once("default-templates/content.php");
	}
}

// show sidebar contents
function sidebar_content(){
	if(user_logged_in()){
		require_once("default-templates/content/sidebar.php");
	}
}

// time left function
function time_left($time){
	$now = time();
	$last_time = strtotime($time);
	$diff = $last_time - $now;

	if($diff>0){
		if($diff>3600){
			$diff = floor($diff/3600)." Hours";
		} elseif($diff>60){
			$diff = floor($diff/60)." Minutes";
		}

		return $diff;
	} else {
		return "Time Over";
	}
}