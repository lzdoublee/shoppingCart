
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>House of LT Creations | Cart </title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- start menu -->
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<!-- start menu -->
</head>
<body>
<!--header-->
<div class="header2 text-center">
     <?php 
        require "../cartFunctions.php";
        require "loginScript.php";
        require "orderFunctions.php";

        //require "order.php";
        //redirects the user to the login page if he/she tries to hack the site by typing the URL to this on the URL bar
        if(empty($_SESSION["userId"])){
        	header("Location:login.php");

		}

        if(isset($_GET["action"]) && $_GET["action"] == "removeItem") {
				 		removeItem();
				 		header( "Location: cart.php" );
        }

        if(isset($_GET["action"]) && $_GET["action"] == "placeOrder"){
			 		
			 		placeOrder();

			 		//clear all session related to the cart
			 		unset( $_SESSION["cart"]);
			 		unset( $_SESSION["nuOfItems"]);
			 		unset( $_SESSION["total"]);
			 		header( "Location: cart.php" );
			 		echo '<script type="text/javascript">
				
				         	alert("Order placed successfully");

		    			</script>';
		}
     	

     ?>
	 <div class="container">
		<div class="main-header">
			<div class="carting">

	 			<?php
					if(isset($_SESSION["userId"]) && !empty($_SESSION["userId"])){

						$userId = $_SESSION["userId"];

						require_once "../connect.php";
						$query = "Select*  from  users where userId = ".$userId." ";
		 				$rows = $conn->query($query);

		 				$name = "";

		 				foreach ($rows as $row){
		 					$name = $row["firstName"];
		 					echo "<a href='login.php?action=logout'  style ='font-weight:600;'>LOGOUT</a> ".$name;

						}
					}
					else{
						echo "<a href='User/login.php'>LOGIN</a>";
					}
				?>
				
			</div>
			 <div class="logo">
				 <h3><a href="../index.php">House of LT Creations</a></h3>
			  </div>			  
			 <div class="box_1">	
			       
				<a href="cart.php">
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
					 		
					 		} 

                            


					 		?> 
				 		</span> items)
				 		<img src="../images/cart.png" alt=""/>
				 	</h3>
				</a>
				<p>
				 	<a href="index.php?action=emptyCart"
				 		 class="simpleCart_empty">empty cart</a>
				</p>
			 
			 </div>
			 
			 <div class="clearfix"></div>
		 </div>
				<!-- start header menu -->
		 <ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="../index.php">Home</a></li>
			<!--<li class="grid"><a href="">CATAGORIES</a></li>
				<li class="grid"><a href="">GALLERY</a></li> -->
			<li class="grid"><a href="../aboutus.php">ABOUT US</a></li>
			<li class="grid"><a href="../contact.php">CONTACT US</a></li>				
		</ul> 	 
			 </div>
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="cart">
	 <div class="container">
			 <ol class="breadcrumb">
		  <li><a href="../index.php">Home</a></li>
		  <li class="active">Cart</li>
		  <li><a href="cart.php?action=ViewOrders">View Orders</a></li>
		   <li><a href="cart.php?action=ViewCart">View Cart</a></li>

		 </ol>
		 <div class="cart-top">
			<a href="index.html"><< home</a>
		 </div>	
			
		 <div class="col-md-9 cart-items">
			<h2>My Shopping Bag(<?php
                                   
									
									if(isset($_SESSION["nuOfItems"]))
					 					{ echo  $_SESSION["nuOfItems"]; 
					 				}else{
						 				echo "0";
						 			}
						 		?>)
			</h2>


			<?php 
			     if(isset($_GET["action"])){
			     	if($_GET["action"] == "ViewOrders"){

			     	 displayOrderDetails();
			     	}
			     	else if($_GET["action"] == "ViewCart"){
			     		if(isset($_SESSION["cart"])){

			     		 displayCart();
			     		}
			     	}
			    }
			    else if(isset($_SESSION["cart"])){
				  	 displayCart();
				}	

			?>
				
		  </div>
		 
		 <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total">350.00</span>
				 <span>Discount</span>
				 <span class="total">---</span>
				 <span>Delivery Charges</span>
				 <span class="total">100.00</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">TOTAL</h4>
			 <span class="total final"><?php if(isset($_SESSION["total"])){
										echo  "R".$_SESSION["total"]; 
				 					}else{
					 					echo "R0 .00";
					 				}   ?></span>
			 <div class="clearfix"></div>
			 <a class="order" href="?action=placeOrder">Place Order</a>
			 <div class="total-item">
				 <h3>OPTIONS</h3>
				 <h4>COUPONS</h4>
				 <a class="cpns" href="#">Apply Coupons</a>
				 <p><a href="#">Log In</a> to use accounts - linked coupons</p>
			 </div>
			</div>
	 </div>
</div>
<!--fotter-->
<div class="fotter-logo">
	 <div class="container">
	 <div class="ftr-logo"><h3><a href="index.html">House of LT Creations</a></h3></div>
	 <div class="ftr-info">
	 <p>&copy; 2017 All Rights Reseverd </a> </p>
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->

</body>
</html>

