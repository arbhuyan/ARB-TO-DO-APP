<?php
/**
 * This is base class file of the app. 
 * This file contains all kind of base functions.
 * @author MD. Anisur Rahman Bhuyan
 * @copyright Open Source Project
 * @link http://anisbd.com/
 * @version 1.0
 */

class main_class {

	private $db;

	public function __construct() {

		$this->db = new dbConnect();
	}

	// user exists function
	public function user_exist($user_id) {

		// make sql
		$sql ="select * from arb_users where user_id=?";

		// return a result
		return $this->db->get_user_count($sql, array($user_id));
	}

	// insert data function
	public function register_user($user_id, $user_pass) {

		// make sql
		$sql ="insert into arb_users (user_id, user_pass) values (?, ?)";

		// return a result
		return $this->db->insert_new_data($sql, array($user_id, md5($user_pass)));
	}

	// user login function
	public function user_login($user_id, $user_pass) {

		// make sql
		$sql ="select id, user_id, user_pass from arb_users where user_id=? and user_pass=?";

		// return a result
		$user_validate = $this->db->get_single_result($sql, array($user_id, md5($user_pass)));

		if($user_validate){
			$_SESSION['user_logged_in'] = TRUE;
			$_SESSION['userid'] = $user_id;
			$_SESSION['uid'] = $user_validate->id;
			return TRUE;
		} else {
			$_SESSION['msg'] = "Sorry, User id or Password does not matches, please try again.";
			return FALSE;
		}
	}

	// user function
	public function get_user_info($uid, $user_pass) {

		// make sql
		$sql ="select id from arb_users where id=? and user_pass=?";

		// return a result
		$user_validate = $this->db->get_single_result($sql, array($uid, md5($user_pass)));

		if($user_validate){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// user update function
	public function update_user_info($uid, $new_pass) {

		// make sql
		$sql ="update arb_users set user_pass=? where id=?";

		// return a result
		$user_update = $this->db->update_data($sql, array(md5($new_pass), $uid));

		if($user_update){
			return TRUE;
		} else {
			return FALSE;
		}
	}

}