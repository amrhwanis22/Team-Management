<?php

class Database {
	private $_Connection;
	private static $_instance; 
	private $_Host = "localhost";
	private $_Username = "root";
	private $_Password = "";
	private $_Database = "swe";
	
	public static function getInstance() {
		if(!self::$_instance) { 
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	private function __construct() {
		$this->_Connection = new mysqli($this->_Host, $this->_Username,$this->_Password, $this->_Database);
	

		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),E_USER_ERROR);
		}
	}
	private function __clone() { }


	public function getConnection() {
		return $this->_Connection;
	}
}

?>