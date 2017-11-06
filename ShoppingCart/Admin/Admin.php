<!DOCTYPE html>
<html>
<head>
<title>House of LT Creations | Home</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="House of LT Creations Shopping Cart" 
    />

<!-- start menu -->
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

<!-- start menu -->

</head>
<body>

  <div class="header" id ="header-admin">
   <div class="container">
       <div class="main-header">
        <div class="carting">
         
         </div>
       <div class="logo">
         <h3><a href="Admin.php">House of LT Creations</a></h3>
        </div>     
       <div class="clearfix"></div>
     </div>
        
        <!-- start header menu -->
    <ul class="megamenu-admin">
      <li class="active grid">
        <a class="color1" href="Admin.php">Orders</a>
      </li>
      <li class="grid">
         <a href="Admin.php?action=AddProduct">Add Product</a>
      </li>
        <li><a href="Admin.php?action=ViewProducts">Products</a>
      </li>
    </ul>
    
    <div class="clearfix"></div>         
   </div>
    
</div>
<div style="height:400px; width:400px; margin-left:20%;">
   <?php
      require "AdminFunctions.php";
     
      $action = "";

  if(isset( $_GET["action"])){
    $action = $_GET["action"];
    
  }
  else
  
  if($action == ""){
    viewOrders();   
  }
  
  if($action == "AddProduct"){
    echo $action;
   addProduct(); 
  }
  else if  ($action == "ViewProducts"){   
    viewProducts(); 
  }
  else
  if($action == "ViewOrderDetails")
  {

    //displayOrderDetails();
    displayOrderDetails();
  }
  else
  if($action == "DeleteProduct"){
     deleteItem();
  }
  else if($action == "UpdateProduct"){
    updateProduct();
  }




   ?>
 </div>
  
 <!--fotter//-->
<div class="fotter-logo">
   <div class="container">
   <div class="ftr-logo"><h3><a href="index.php">House of LT Creations</a></h3></div>
   <div class="ftr-info">
   <p>&copy; 2017 PTY All Rights Reseverd Design by <a href="http://w3layouts.com/">House of LT Creations</a> </p>
  </div>
   <div class="clearfix"></div>
   </div>
</div>
<!--fotter//--> 

</body>
</html>










