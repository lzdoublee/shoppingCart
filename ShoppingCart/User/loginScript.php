<?php
  

     /*
		SCRIPT LOGIC: select username and password from the users table where username and passwords matches the user-supplied password and email. If the number of rows affected by this query is greater than 1, meaning the user entered correct password and email, 
		grab userId from the users table and assign to a variable ($userId). Take this user Id and store it in a session $_SESSION["userId"]. By its existance, this session alerts all scripts that the user is now logged. On the home page we diplay 
		Logout +username if this session exists, we diplay login otherwise. Also, in the homepage when a user click the cart button we redirect him/her to the cart page if this session exists, else we tell the user to login first.


		If the number of rows affected by the select query, display a javascript that tells the user to enter correnct details.

      */
   
   session_start();

 	


  if(isset($_POST["email"]) && isset($_POST["password"])){


  	require "../connect.php";

  	$query = "Select*  from  users where email = '".$_POST["email"]."' AND password = '".md5($_POST["password"])."'";
	$rows = $conn->query($query);

	$rowsFound = $rows->rowCount();
	

	 	//echo $rowsFound;

	 	if( $rowsFound >0){
			//header( "Location: cart.php" );

			$userId = 0;

			foreach ($rows as $row) {
				$userId = $row["userId"];
			}
		    
		 	$_SESSION["userId"] = $userId;
		 	 header("Location:cart.php");
		 	
	 	}
	 	else{
	 		header("Location:login.php?loginError=invalidDetails");
		 
		 	
		   }

	}


?>