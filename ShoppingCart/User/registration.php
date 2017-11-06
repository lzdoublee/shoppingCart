
<?php 

   class User{

   	 public $name;
	 public $surname;
	 public $email;
	 public $address;
	 public $password;
	 public $mobilenumber; 

        public function __construct($name, $surname, $email,$address,$password,$mobilenumber) {
			$this->name = $name;
			$this->surname = $surname;
			$this->email = $email;
			$this->address = $address;
			$this->password = $password;
			$this->mobilenumber = $mobilenumber;
		}


    	public function getName(){
			return $this->name;
		}
		public function getSurname(){
			return $this->surname;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getAddress(){
			return $this->address;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getMobileNumber(){
			return $this->mobilenumber;
		}
   

    }

	if(isset($_POST["submit"])){


		require "../connect.php";
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$password = md5($_POST["password"]);
		$password2 = md5($_POST["password2"]);
		$mobilenumber = $_POST["mobilenumber"];

		if( $password != $password2 ){
	    	echo '<script type="text/javascript">
				alert("Passwords dont\'t match");
			</script>';
	    }
	    else if( empty($name) || empty($surname) || empty($email) || empty($password) || empty($password2) || empty($mobilenumber) ){
	    	echo '<script type="text/javascript">
				alert("Please fill in all fields");
			</script>';
	    }
	    else{
	    	
	    	$user = new User($name,$surname,$email,$address,$password,$mobilenumber);
	      	$name =   $user->getName();
		 	$surname =  $user->getSurname();
		 	$email =  $user->getEmail();
		 	$address =  $user->getAddress();
		 	$mobilenumber = $user->getMobileNumber();
			$stmt = $conn->prepare("INSERT INTO users (firstName,lastName,email,customerAddress,password,mobilenumber) VALUES (?,?,?,?,?,?)");

			$stmt->bindParam(1,$name);
			$stmt->bindParam(2,$surname );
			$stmt->bindParam(3,$email);
			$stmt->bindParam(4,$address);
			$stmt->bindParam(5,$password);
			$stmt->bindParam(6,$mobilenumber);

	        $stmt->execute();

	        echo '<script type="text/javascript">
				
				         	alert("You now registerted!");

		    			</script>';

		}

    }	

   

	  

 ?>







<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>New Fashions a Flat Ecommerce Bootstarp Responsive Website Template | Registration :: w3layouts</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
		/>	
<!-- start menu -->
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
</head>
<body>
<!--header-->
<div class="header2 text-center">
	 <div class="container">
		 <div class="main-header">
			  <div class="carting">
				 <ul><li><a href="login.php"> LOGIN</a></li></ul>
				 </div>
			 <div class="logo">
				 <h3><a href="index.php">House of LT Creations</a></h3>
			  </div>			  
			 <div class="box_1">				 
				 <a href="cart.php"><h3>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)<img src="images/cart.png" alt=""/></h3></a>
				 <p><a href="javascript:;" class="simpleCart_empty">empty cart</a></p>
			 
			 </div>
			 
			 <div class="clearfix"></div>
		</div>
			<!-- start header menu -->
		 
		</div>
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="registration-form">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="../index.php">Home</a></li>
		  <li class="active">Registration</li>
		 </ol>
		 <h2>Registration</h2>

		 <div class="col-md-6 reg-form">
			 <div class="reg">
				 <p>Welcome, please enter the filling to continue.</p>
				 <p>If you have previously registered with us, <a href="#">click here</a></p>
				 <form  action = "registration.php" method="post">
					 <ul>
						 <li class="text-info">First Name: </li>
						 <li><input type="text" value="" name = "name"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Last Name: </li>
						 <li><input type="text" name = "surname" value=""></li>
					 </ul>				 
					<ul>
						 <li class="text-info">Email: </li>
						 <li><input type="text" value="" name = "email"></li>
					 </ul>
					 <ul>
						 <li class="text-info">Address: </li>
						 <li><input type="text" value="" name = "address" 
						</li>
					 </ul>
					 <ul>
						 <li class="text-info">Password: </li>
						 <li><input type="password" name = "password" value=""></li>
					 </ul>
					 <ul>
						 <li class="text-info">Re-enter Password:</li>
						 <li><input type="password" name = "password2" value=""></li>
					 </ul>
					 <ul>
						 <li class="text-info">Mobile Number:</li>
						 <li><input type="text" value="" name = "mobilenumber"></li>
					 </ul>						
					 <input type="submit" value="Register Now" name = "submit">
					 <p class="click">By clicking this button, you agree to my modern style <a href="#">Pollicy Terms and Conditions</a> to Use</p> 
				 </form>
			 </div>
		 </div>
		 <div class="col-md-6 reg-right">
			 <h3>Completely Free Account</h3>
			 
		 </div>
		 <div class="clearfix"></div>		 
	 </div>
</div>
<!--fotter-->
<div class="fotter-logo">
	 <div class="container">
	 <div class="ftr-logo"><h3><a href="index.php">House of LT Creations</a></h3></div>
	 <div class="ftr-info">
	 <p>&copy; 2017 PTY All Rights Reseverd  </p>
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->	
</body>
</html>
		