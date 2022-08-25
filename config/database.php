<?php
/*
* Mysql database class - only one connection alowed
*/


class Database {
	private $_conn;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "php";

	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// Constructor
	public function __construct() {
		$this->_conn = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

	// Get mysqli connection
	public function getConnection() {
		return $this->_conn;
	}
}

// // create instance 
// $database = Database::getInstance();
// $sql = "SELECT * FROM users";

// $result = $database->query($sql);
// $response = $result->fetch_all();
// echo "<pre>"; print_r($response);
// // var_dump($result);



?>