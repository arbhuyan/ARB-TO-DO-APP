<?php
/**
 * This is database of the app. 
 * This file contains database relation functions.
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
 * Make a database class.
 */

// create database class
class dbConnect {

	// protected value
	public $isconnect_db;
	protected $arb_data_con;

	// connect to db
	public function __construct(){

		/// make data variable
		$db_driver 	= DATABASE_DRIVER;
		$db_host 	= DATABASE_HOST;
		$db_name 	= DATABASE_NAME;
		$db_user 	= DATABASE_USERNAME;
		$db_pass 	= DATABASE_PASSWORD;

		try {
			
			// make true isconnect_db
			$this->isconnect_db = TRUE;

			// create new pdo
			$this->arb_data_con = new PDO("{$db_driver}:host={$db_host}; dbname={$db_name};", $db_user, $db_pass);
			$this->arb_data_con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->arb_data_con -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

		} catch(PDOException $exp) {
			// throw an erro
			throw new Exception($exp->getMessage());
		}
	}

	/**
	 * disconnect_dbing database connect_dbion
	 */
	private function Disconnect()
	{
		$this->isconnect_db = FALSE;
		$this->arb_data_con = NULL;
	}

	// count user data
	public function get_user_count($sql, $arg = [])
	{
		$query = $this->arb_data_con->prepare($sql);
		$query->execute($arg);
		$row = $query->rowCount();
		$this->Disconnect();
		return $row;
	}

	/**
	 * Return single result
	 * @param string $sql
	 * @param array $args
	 * @return query $row
	 */
	public function get_single_result($sql, $arg = [])
	{
		$query = $this->arb_data_con->prepare($sql);
		$query->execute($arg);
		$row = $query->fetch();
		$this->Disconnect();
		return $row;
	}

	/**
	 * Return all result
	 * @param string $sql
	 * @param array $args
	 * @return query $row
	 */
	public function get_all_result($sql, $arg = [])
	{
		$query = $this->arb_data_con->prepare($sql);
		$query->execute($arg);
		$row = $query->fetchAll();
		$this->Disconnect();
		return $row;
	}

	/**
	 * insert new data
	 * @param string $sql
	 * @param array $args
	 * @return query $row
	 */
	public function insert_new_data($sql, $arg = [])
	{
		$query = $this->arb_data_con->prepare($sql);
		$query->execute($arg);
		$this->Disconnect();
		return TRUE;
	}

	/**
	 * update data
	 * @param string $sql
	 * @param array $args
	 * @return query $row
	 */
	public function update_data($sql, $arg = [])
	{
		$query = $this->arb_data_con->prepare($sql);
		$query->execute($arg);
		$this->Disconnect();
		return TRUE;
	}

	/**
	 * delete data
	 * @param string $sql
	 * @param array $args
	 * @return query $row
	 */
	public function delete_data($sql, $arg = [])
	{
		$query = $this->arb_data_con->prepare($sql);
		$query->execute($arg);
		$this->Disconnect();
		return TRUE;
	}
}