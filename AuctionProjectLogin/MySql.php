<?php

//this file establishes a connection to the server, checks to see if the inputs in username and password are in the database, and if they are
//it returns true
 
require_once 'constants.php';

class MySql{

	function _construct(){ //magic method runs as soon as mysql class is instantiated, connects to the database
		$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
				      die('There was a problem connecting to the database.');
	}

	function verify_credentials($username, $password){
		$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
				      die('There was a problem connecting to the database.');

		$query = "SELECT *
				  FROM User
				  WHERE username = ? AND password = ?
				  LIMIT 1"; //ensures only 1 user is returned //using prepared statements?? for username and password


		if($stmt = $conn->prepare($query)){

			$stmt->bind_param('ss', $username, $password);
			$stmt->execute();

			if($stmt->fetch()){ //if you found something that matches those values you know they're a user and can log them in
				$stmt -> close();
				return true; 
			} 

		}

	}

}