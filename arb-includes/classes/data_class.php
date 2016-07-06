<?php
/**
 * This is data class file of the app. 
 * This file contains all kind of data functions.
 * @author MD. Anisur Rahman Bhuyan
 * @copyright Open Source Project
 * @link http://anisbd.com/
 * @version 1.0
 */

class data_class {

	private $db;

	public function __construct() {

		$this->db = new dbConnect();
	}

	public function count_data($user_id) {
		// make a query
		$sql = "select * from arb_todo where uid = ?";

		// count result
		$data_count = $this->db->get_user_count($sql, array($user_id));

		if($data_count != 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// user data list
	public function get_app_data($user_id) {
		// make a query
		$sql = "select * from arb_todo where uid = ? order by id DESC";

		// user data
		$user_data = $this->db->get_all_result($sql, array($user_id));

		return $user_data;
	}

	// single data list
	public function get_single_task($id) {
		// make a query
		$sql = "select * from arb_todo where id = ?";

		// user data
		$single_data = $this->db->get_single_result($sql, array($id));

		return $single_data;
	}

	// insert new data
	public function insert_new_task($uid,$title,$desc,$time) {
		// make a query
		$sql = "insert into arb_todo (uid, task_name, task_desc, time) values (?, ?, ?, ?)";

		// user data
		$insert_task = $this->db->insert_new_data($sql, array($uid, $title, $desc, $time));

		return $insert_task;
	}

	// update data
	public function update_task($id,$uid,$title,$desc,$time,$progress) {
		// make a query
		$sql = "update arb_todo set task_name = ?, task_desc = ?, progress = ?, time = ? where id=? and uid=?";

		// user data
		$update_task = $this->db->update_data($sql, array($title,$desc,$progress,$time,$id,$uid));

		return $update_task;
	}

	// delete data
	public function delete_task($id) {
		// make a query
		$sql = "delete from arb_todo where id=?";

		// user data
		$delete_task = $this->db->delete_data($sql, array($id));

		return $delete_task;
	}

}