


<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>New Fashions a Flat Ecommerce Bootstarp Responsive Website Template | Login :: w3layouts</title>
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
<script src="js/jquery.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
</head>
<body>
<!--header-->
<?php
   
    require "loginScript.php";
	require "../cartFunctions.php";
	
?>
<div class="header2 text-center">
 	<div class="container">
		<div class="main-header">
			 <div class="carting">
				
				 </div>
			<div class="logo">
				 <h3><a href="../index.php">House of LT Creations</a></h3>
			  </div>			  
				    <?php
					$loggedin = 0;
                      					 
					if(isset($_SESSION["userId"])){
						$loggedin = 1;
					   
						
					}
				 

				// echo $_SESSION["cart"];
				?>

				<script type="text/javascript">
					function hi(){
						 var javaScriptVar = "<?php echo $loggedin; ?>";

						 if(javaScriptVar>0){
						 	 window.location="User/cart.php";
						 }
				         else{
				         	alert("You need to login first!");
				         }

				        
					}
				   
				</script>			  
			 <div class="box_1" onclick="hi()">




			  		
			 	
			    <h3>
						Total: 	R<?php    
									if(isset($_SESSION["total"])){
										echo  $_SESSION["total"]; 
				 					}else{
					 					echo "0";
					 				}
							 	?> 
				 		<span class="simpleCart_total"></span> 
				 		(<span id="simpleCart_quantity" class="simpleCart_quantity">
				 			<?php
				 				if(isset($_SESSION["nuOfItems"]))
				 					{ echo  $_SESSION["nuOfItems"]; 
				 			}else{
					 			echo "0";
					 		
					 		} ?> 
				 		</span> items)
				 		<img src="../images/cart.png" alt=""/>
				 	</h3>
				<p>
				 	<a href="index.php?action=emptyCart"
				 		 class="simpleCart_empty">empty cart</a>
				</p>
			 
			 </div>
			 
			<div class="clearfix"></div>
		 </div>
		<ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="../index.php">Home</a></li>
			<!-- <li class="grid"><a href="">CATAGORIES</a></li>
				<li class="grid"><a href="">GALLERY</a></li> -->
			<li class="grid"><a href="../about.php">ABOUT US</a></li>
			<li class="grid"><a href="../contact.php">CONTACT US</a></li>				
		</ul> 	
	</div>
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="login">
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Login</li>
		 </ol>
		 <h2>Login</h2>
		 <div class="col-md-6 log">			 
				 <p>Welcome, please enter the folling to continue.</p>
				 <p>If you have previously Login with us, <span>click here</span></p>

				 <?php
				 	if(isset($_GET["action"])){
				 		if($_GET["action"] == "logout"){
				 			
				 			unset($_SESSION['userId']);
				 		}
				 	}


				 	if(isset($_GET["loginError"])){
				 		echo '<script type="text/javascript">
				
				         	alert("Invalid username or password!");

		    			</script>';
				 	}
				 ?>
				 <form  action = "loginScript.php" method = "post">
					 <h5>Email:</h5>	
					 <input type="text" value=""  name ="email">
					 <h5>Password:</h5>
					 <input type="password" value="" name = "password">					
					 <input type="submit" value="Login">
					  <a href="#">Forgot Password ?</a>
				 </form>				 
		 </div>
		  <div class="col-md-6 login-right">
			  	<h3>NEW REGISTRATION</h3>
				<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				<a class="acount-btn" href="registration.php">Create an Account</a>
		 </div>
		 <div class="clearfix"></div>		 
		 
	 </div>
</div>
<!--fotter-->
<div class="fotter-logo">
	 <div class="container">
	 <div class="ftr-logo"><h3><a href="../index.php">House of LT Creations</a></h3></div>
	 <div class="ftr-info">
	 <p>&copy; 2017 All Rights Reseverd </p>
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->	
</body>
</html>














