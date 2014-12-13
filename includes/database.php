<?php
class Database {
	public function __construct() {
		$host = $this->host = "sql5.freemysqlhosting.net";
		$dbname = $this->dbname = "sql552477";
		$username = $this->username = "sql552477";
		$password = $this->password = "sD5%vS4*";
		try{
		$this->db = new PDO ("mysql:host=localhost;dbname=sharing", "root", "333gde");
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->db->query('SET NAMES "utf8"');
		}
	 	catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}