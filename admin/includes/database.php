<?php

require_once 'config.php';

Class Database{


	public $connection;

	function __construct() {   // execute automatically when obj created

		$this->open_db_connection();

	}

	// pass all config parametres and open the connection
	public function open_db_connection()
	{

		$this->connection = new mysqli(DB_HOST,DB_USER,
			DB_PASS,DB_NAME);

		if ($this->connection->connect_errno):
			die('database connection failed badly' . $this->connection->connect_error);
		endif;

	}

	// method for queries
	public function query($sql)
	{
		$result = $this->connection->query($sql);

		$this->confirm_query($result);

		return $result;
	}


	// to use inside query for check if we've an error
	private function confirm_query($result)
	{
		if(!$result):
			die('Query Failed' . $this->connection->error);
		endif;
	}


	//  filter strings
	public function escape_string($string)
	{
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;
	}


	// get one id
	public function the_insert_id()
	{
		return $this->connection->insert_id;
	}



}// end Class Database

$database = new Database();




