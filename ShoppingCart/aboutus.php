<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/

-->
<!DOCTYPE html>
<html>
<head>
<title>House of LT Creations | About</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
		/>		

<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

<!-- start menu -->
</head>
<body>
<!--header-->
<?php
   
    require "User/loginScript.php";
	require "cartFunctions.php";
	
?>
<div class="header2 text-center">
	 <div class="container">
		        <div class="carting">
					 
					 
					 		
					 			<?php
									if(isset($_SESSION["userId"]) && !empty($_SESSION["userId"])){

										$userId = $_SESSION["userId"];

										require_once "connect.php";
										$query = "Select*  from  users where userId = ".$userId." ";
						 				$rows = $conn->query($query);

						 				$name = "";

						 				foreach ($rows as $row){
						 					$name = $row["firstName"];
						 					echo "<a href='User/login.php?action=logout'  style ='font-weight:600;'>LOGOUT</a> ".$name;

										}
									}
									else{
										echo "<a href='User/login.php'>LOGIN</a>";
									}
								?>

					 			
					 		
					 	
					
				</div>
			 <div class="logo">
				 <h3><a href="index.php">House of LT Creations</a></h3>
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
				 		<img src="images/cart.png" alt=""/>
				 	</h3>
				<p>
				 	<a href="index.php?action=emptyCart"
				 		 class="simpleCart_empty">empty cart</a>
				</p>
			 
			 </div>
			 
			 <div class="clearfix"></div>
		 </div>
		<ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="index.php">Home</a></li>
			<!--<li class="grid"><a href="">CATAGORIES</a></li>
				<li class="grid"><a href="">GALLERY</a></li> -->
			<li class="grid"><a href="aboutus.php">ABOUT US</a></li>
			<li class="grid"><a href="contact.php">CONTACT US</a></li>				
		</ul> 
			  <div class="clearfix"></div> 
	 </div>
</div>
<!--header//-->
<div class="about">
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">About</li>
		 </ol>
		 <h2>ABOUT US</h2>
		 <div class="about-sec">
			 <div class="about-pic"><img src="images/about.jpg" class="img-responsive" alt=""/></div>
			 <div class="about-info">
	
			 
				 <p>House of LT Creations&#8230; Is a small boutique that deals with Tailor Made designs, Traditional wear and Modern Fashion.</p>
				<p>House of LT Creations&#8230; was founded 10 years ago in Soweto and has been paving its way ever since.</p>


				 
			 </div>
			 <div class="clearfix"></div>
		 </div>
		 <h3>OUR SPECIALS</h3>
		 <div class="about-grids">
			 <div class="col-md-3 about-grid">
				 <img src="images/Traditonal zulu man shirt.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>Traditonal zulu man shirt</h4></a>
				 <p>Mens short sleeve traditional shirt made with Da Gama Edenrose cotton and trimmed with embroidery. 
				 
				 This item is not kept in stock and is made to order. Please allow 1 week manufacturing time!</p>
			 </div>
			 <div class="col-md-3 about-grid">
				 <img src="images/matric_ball_-all.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>Matric Ball Dresses</h4></a>
				 <p> elegant options for matric dances, black tie events and cocktail parties!</p>
			 </div>
			 <div class="col-md-3 about-grid pot-2">
				 <img src="images/isiShweShwe traditional dress.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>isiShweShwe traditional dress</h4></a>
				 <p>Isishweshwe traditional dresses at very affordable price!</p>
			 </div>
			 <div class="col-md-3 about-grid pot-1">
				 <img src="images/Xhosa initiation attire.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>Xhosa initiation attire</h4></a>
				 <p>AMAKRWALA 
				 COLLECTION
				 modern Xhosa-inspired collection that would be suitable for Xhosa initiates, 
				 who are prescribed by tradition to dress up in new dignified formal clothing for six months after initiation.!</p>
			 </div>
			 <!--
			 <div class="clearfix"></div>
			 <div class="bottom-grids">
			 <div class="col-md-3 about-grid flwr">
				 <img src="images/MosGirlTwo.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>NEWLOOK</h4></a>
				 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, recusandae, minima deserunt pariatur illo eos doloremque
				 Asperiores modi temporibus consequuntur tempore quibusdam!</p>
			 </div>
			 <div class="col-md-3 about-grid flwr">
				 <img src="images/ab6.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>Meriea</h4></a>
				 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, recusandae, minima deserunt pariatur illo eos doloremque 
				 Asperiores modi temporibus consequuntur tempore quibusdam!</p>
			 </div>
			 <div class="col-md-3 about-grid flwr pot-2">
				 <img src="images/ab7.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>Woolen Shurg</h4></a>
				 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, recusandae, minima deserunt pariatur illo eos doloremque
				 Asperiores modi temporibus consequuntur tempore quibusdam!</p>
			 </div>
			 <div class="col-md-3 about-grid flwr pot-1">
				 <img src="images/ab8.jpg" class="img-responsive" alt=""/>
				 <a href="blog-single.html"><h4>Black Shurg</h4></a>
				 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, recusandae, minima deserunt pariatur illo eos doloremque 
				 Asperiores modi temporibus consequuntur tempore quibusdam!</p>
			 </div>
			 <div class="clearfix"></div>
			 </div>
			 -->
		 </div>
	 </div>
</div>

<!--fotter-->
<div class="fotter-logo">
	 <div class="container">
	 <div class="ftr-logo"><h3><a href="index.php">House of LT Creations</a></h3></div>
	 <div class="ftr-info">
	 <p>&copy; 2017 PTY All Rights Reseverd Design by APN GEEKS </p>
	</div>
	 <div class="clearfix"></div>
	 </div>
</div>
<!--fotter//-->

</body>
</html>