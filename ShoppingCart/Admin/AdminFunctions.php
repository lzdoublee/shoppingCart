<?php

	class Product{

			public  $itemName;
			public $itemPrice;
			public $imageUrl;
			//public $isNew;
			public $catagory;

			public function __construct($itemName, $itemPrice,$imageUrl,$catagory) {
				$this->itemName = $itemName;
				$this->itemPrice = $itemPrice;
				$this->imageUrl = $imageUrl;
				$this->catagory = $catagory;
			}

	     public function getItemName(){
				return $this->itemName;
			}
			public function getPrice(){
				return $this->itemPrice;
			}
			public function getImageUrl(){
				return $this->imageUrl;
			}
			public function getCatagory(){
				return $this->catagory;
			}
	   

	    }






  function viewOrders(){
  	 require "../connect.php";
  	 $query = "Select*  from  orders";
	 $rows = $conn->query($query);


	 echo "<table>
	  <tbody>
		  <thead>
		    <tr>
		      <th>Order Id</th>
		      <th>Customer Name</th>
		      <th>Customer Surname</th>
		      <th>Customer Address</th>
		      <th>Cell Number</th>
		      <th>Amount Due</th>
		      <th>Status</th>
		    </tr>
  	</thead>";

	 foreach($rows as $row){
	 	$orderId = $row["orderId"];
	 	$customerName = $row["customerName"];
	 	$customerSurname = $row["customerSurname"];
	 	$customerAddress = $row["customerAddress"];
	 	$phoneNumber = $row["phoneNumber"];
	 	$amountDue = $row["amountDue"];
	 	$status = $row["status"];

		echo"<tr>
	      <td><strong>".$orderId."</strong></td>
	      <td>".$customerName."</td>
	      <td>".$customerSurname."</td>
	      <td>".$customerAddress."</td>
	      <td>".$phoneNumber."</td>
	      <td>".$amountDue."</td>
	      <td>".$status."</td>
	      <td><a href = 'Admin.php?action=ViewOrderDetails&orderId=".$orderId."'>View Details</a></td>
	    </tr>";

	 }
   

 echo "</tbody>
</table>";



  }

  function displayOrderDetails(){
  	 require "../connect.php";


  	  $orderId=$_GET["orderId"];

  	 $query = "Select*  from  orderdetails where orderId = '".$orderId."' ";
	 $rows = $conn->query($query);


	 echo "<table>
	  <tbody>
		  <thead>
		    <tr>
		      <th>Item Name</th>
		      <th>Item Price</th>
		      <th>Quantity</th>
		      <th>Order Date</th>
		     </tr>
  	</thead>";

	 foreach($rows as $row){
	 	$itemName = $row["itemName"];
	 	$itemPrice = $row["itemPrice"];
	 	$quantity = $row["quantity"];
	 	$orderDate = $row["orderDate"];

	 	
	 echo"<tr>
      <td><strong>".$itemName ."</strong></td>
      <td>".$itemPrice."</td>
      <td>".$quantity."</td>
      <td>".$orderDate."</td>
      </tr>";

	 }
   

 echo "</tbody>
</table>";

  }

  function addProduct(){


	    if(isset($_POST['submit'])){
		    $temp_name = $_FILES["file"]["tmp_name"]; // get the temporary filename/path on the server
		    $name = $_FILES["file"]["name"]; // get the filename of the actual file

		    echo $name;
		  
			if(isset($name)){
				if(!empty($name)){
				
				// Move file from temp to uploads folder
			    move_uploaded_file($temp_name, "../images/$name");
			    chmod("../images/$name", 0644); // Set read and write permissions if file
			    echo "File Uploaded!";
			}
		}


	
		$itemName = $_POST["itemName"];
		$itemPrice = $_POST["itemPrice"];
		$catagory = $_POST["Catagory"];
		$imageName =    "images/".$_FILES["file"]["name"];
   
	   $itemObject = new Product($itemName,$itemPrice,$imageName,$catagory);

	    require "../connect.php";


	   $stmt = $conn->prepare("INSERT INTO items (itemname,itemprice,catagory,imageurl,isNew) VALUES (?,?,?,?,?)");

	   	$itemName = $itemObject->getItemName();
	   	$Price = $itemObject->getPrice();
	    $catagory = $itemObject->getCatagory();
	    $imageUrl = $itemObject->getImageUrl();
	    $isNew = 1;


	   $stmt->bindParam(1,$itemName);
       $stmt->bindParam(2,$Price );
       $stmt->bindParam(3,$catagory);
       $stmt->bindParam(4,  $imageUrl);
       $stmt->bindParam(5,$isNew);

        $stmt->execute();
       
      



  
	}







	  echo '<form method="post" action="" id="AddProductForm" enctype="multipart/form-data">


	      <div id ="add-product-container" style = "margin-top:20px;"">
	        <div class ="addproduct-main-section">
	            
	            <h5><span id="" class="itemDetail">Item Name</span></h5><input name="itemName" type="text" id="" class="item" class="itemDetail"/><br/>

	            <h5><span id="" class="itemDetail">Price</span></h5><input name="itemPrice" type="text" id="" class="item" /><br/>
	            <span id="" class="itemDetail">Catagory</span><br/><select name="Catagory" id="" class="item" style="height:46px;">
	  <option value="Men" class="itemDetail">Men</option>
	  <option value="Women" class="itemDetail">Women</option>

	  </select>
	            <h5><span  class="itemDetail">Image</span></h5>
	            <input type="file" class="ChooseImage" name="file" style = "margin-left:35%" class="item"/>
	           <input type="submit"  name = "submit" value="Add" id="" class="Add-Product" class="item"  style = "margin-left:84%; margin-bottom:10%;""/>
	        </div>
	      </div>
	</form>';

	

	if(isset($_GET["itemName"]) && isset($_GET["itemPrice"]) && isset($_GET["Catagory"]) && isset($_GET["imageName"])){

		//$target_dir = "images/";
		//$target_file = $target_dir . basename($_FILES["imageName"]["name"]);


  }
}


  function viewProducts(){
  	  require "../connect.php";
  	 $query = "Select*  from  items";
	 $rows = $conn->query($query);


	 echo "<table>
	  <tbody>
		  <thead>
		    <tr>
		      <th>Product Id</th>
		      <th>Item Name</th>
		      <th>Item Price</th>
		      <th>Catagory</th>
		    </tr>
  	</thead>";

	 foreach($rows as $row){
	 	$itemId = $row["id"];
	 	$itemName = $row["itemname"];
	 	$itemPrice = $row["itemprice"];
	 	$catagory= $row["catagory"];
		echo"<tr>
	      <td><strong>".$itemId."</strong></td>
	      <td>15</td>
	      <td>".$itemName."</td>
	      <td>".$itemPrice."</td>
	      <td>".$catagory."</td>
	      <td><a href = 'Admin.php?action=DeleteProduct&productId=".$itemId."'>Delete</a></td>
	      <td><a href = 'Admin.php?action=UpdateProduct&orderId=".$itemId."&itemName=".urlencode($itemName)."&itemPrice=".$itemPrice."&catagory=".$catagory."'>update</a></td>
	    </tr>";

	 }
   

 echo "</tbody>
</table>";
  }

  function deleteItem(){

  	 require "../connect.php";

  	$product_id = $_GET["productId"];


  	$sql = "DELETE FROM items WHERE id=".$product_id."";

    
    $conn->exec($sql);

    viewProducts();


  }

  function updateProduct(){
    require "../connect.php";

    $itemName = "";
    $itemName = "";
    $itemPrice = "";
    $Catagory = "";


    if(isset($_GET["itemName"])&&isset($_GET["itemPrice"]) && isset($_GET["catagory"])){
    		$itemName =  $_GET["itemName"];
		  	$itemPrice = $_GET["itemPrice"];
			$Catagory = $_GET["catagory"];

    }


  

 


   echo '<form method="post" action="" id="AddProductForm" enctype="multipart/form-data">


	      <div id ="add-product-container" style = "margin-top:20px;"">
	        <div class ="addproduct-main-section">
	            
	            <h5><span id="" class="itemDetail">New Item Name</span></h5><input name="itemName" type="text" id="" class="item" class="itemDetail" value = "'.$itemName.'"
	            /><br/>

	            <h5><span id="" class="itemDetail"> New Price</span></h5><input name="itemPrice" value ="'.$itemPrice.'" type="text" id="" class="item" /><br/>
	            <span id="" class="itemDetail"> New Catagory</span><br/><select name="Catagory" value ="'.$Catagory.'" id="" class="item" style="height:46px;">
	  <option value="Men" class="itemDetail">Men</option>
	  <option value="Women" class="itemDetail">Women</option>

	  </select>
	            <h5><span  class="itemDetail"> New Image</span></h5>
	            <input type="file" class="ChooseImage" name="file" style = "margin-left:35%" class="item"/>
	           <input type="submit"  name = "submit" value="Update" id="" class="Add-Product" class="item"  style = "margin-left:84%; margin-bottom:10%;""/>
	        </div>
	      </div>
	</form>';

	

	if(isset($_POST["submit"])){


		$orderId  = $_GET["orderId"];
		$itemName = $_POST["itemName"];

		
		$sql = "UPDATE items SET itemName ='".$itemName."' WHERE id=".$orderId."";

	    // Prepare statement
	    $stmt = $conn->prepare($sql);

	    // execute the query
	    $stmt->execute();

	    header("Location: Admin.php?action=UpdateProduct");
	}
}

?>