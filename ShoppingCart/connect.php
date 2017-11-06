<?php
try{
		$dsn = "mysql:dbname=houseofltcreations";
		$username = "root";
		$password = "";
		$conn = new PDO( $dsn, $username, $password );
		} 
			catch ( PDOException $e ){
			echo "Connection failed: " . $e-> getMessage();
  }

   ?>