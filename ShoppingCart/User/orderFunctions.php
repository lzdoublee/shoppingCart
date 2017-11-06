<?php


  
	
    /*
     ====================================================================
       					SCRIPT LOGIC: 
     ====================================================================

	    PLACE ORDER: grab userid of the user that is currently loggedin, from this session : $_SESSION["userId"]; and store it 
	    in a variable named $userId. Select all fields from users table where id = $userId. We wan't to know who's placing the order.
	    OK now that we know who is placing the order, grab all items from the cart session and store them into the orderdetails table
	    Generate OrderId using php , we use this OrderId to establish a relationship between the order table and orderDetails table

	    Orders Can be viewed on the admin section and user section
	    here: http://localhost/IP/ShoppingCartProject/Admin/Admin.php
	    and here: http://localhost/IP/ShoppingCartProject/User/cart.php
	    a user can view only order that he/she placed. 

	    VIEW ORDERS: select all fields from orderdetails where userId equals the id of the user that is currently loggedin.


	*/

    
   /*
   		========================================================
   			FUNCTIONS USAGE
   		========================================================
		    all functions in this script are called on the cart page, We make use of query strings to dertemine which function should be called. For an example: when a user clicks on the vieworders link we pass actions=ViewOrders to the URL bar as a query string. On the main section of the cart page we grab action from the URL bar and execute ralavant function(s). 
	*/

     
	class Order{

		public $orderId;
		public  $customerName;
		public $customerSurname;
		public $customerAdress;
		public $cellNumber;
		public $amountDue;
	
		public function __construct($orderId, $customerName, $customerSurname,$customerAdress,$cellNumber,$amountDue) {
			$this->orderId = $orderId;
			$this->customerName = $customerName;
			$this->customerSurname = $customerSurname;
			$this->customerAdress = $customerAdress;
			$this->cellNumber = $cellNumber;
			$this->amountDue = $amountDue;
		}


    	public function getOrderId(){
			return $this->orderId;
		}
		public function getCustomerName(){
			return $this->customerName;
		}
		public function getCustomerSurname(){
			return $this->customerSurname;
		}
		public function getCustomerAddress(){
			return $this->customerAdress;
		}

		public function getCellNumber(){
			return $this->cellNumber;
		}
		public function getAmountDue(){
			return $this->amountDue;
		}
   

    }




	function placeOrder(){
		require "../connect.php";
		//require "order.php";
		//require "loginScript.php";

		$orderId = " ";
		$customerName = " ";
		$customerSurname = "";
		$customerAdress  = "";
		$cellNumber = "";
		$amountDue  = "";

        
        //grabs user Id of the currently loggedin user
		$userId = $_SESSION["userId"];
		
		

		//select all details related to this id from users table
		$query = "Select*  from  users where userId = '".$userId."'";
		$rows = $conn->query($query);

		foreach ($rows as $key => $row){
			

			$customerName = $row["firstName"];
			$customerSurname = $row["lastName"];
			$cellNumber = $row["mobileNumber"];
			$customerAdress  = $row["customerAddress"];
		}

		//grabs the total orice of items that are in the cart
		$amountDue  = $_SESSION["total"];


		//genereates order ID
		//IMPORTANT: this Id forms a relationship between the order table and the orderdetails table
		$chopeddSurn = substr($customerName,0,3);
	    $orderId = uniqid("$chopeddSurn");


	
		$order = new Order($orderId, $customerName, $customerSurname,$customerAdress,$cellNumber,$amountDue);
		$orderId = $order->getOrderId();
	   	$customerName = $order->getCustomerName();
	    $customerSurname = $order->getCustomerSurname();
	    $customerAdress = $order->getCustomerAddress();
	    $cellNumber  = $order->getCellNumber();
	    $amountDue = $order->getAmountDue();


	    $tutus = "Not delivered";


		$stmt = $conn->prepare("INSERT INTO orders (orderId,customerName,customerSurname,customerAddress, phoneNumber,amountDue,status) VALUES (?,?,?,?,?,?,?)");

	   


	   $stmt->bindParam(1,$orderId);
       $stmt->bindParam(2,$customerName );
       $stmt->bindParam(3,$customerSurname);
       $stmt->bindParam(4,$customerAdress);
       $stmt->bindParam(5,$cellNumber);
       $stmt->bindParam(6,$amountDue);
       $stmt->bindParam(7,$tutus);
	   $stmt->execute();

		  
       $itemName = " ";
       $itemPrice = " ";
       //I forgot to use the actual quality here, which is supposed to come from quality input control in the home
       //I noticed this in the last minute....decided to use a defualt value of 1
       $quality = "1";
       $date = date("Y-m-d");
       $tatus = "Not Delivered";

       //here we loop through our cart, we grab all the items in the cart and insert them to the order details table
       foreach ($_SESSION["cart"] as $item ) {
       		$itemName  =  $item->getItemName();
       		$itemPrice =$item->getPrice();
           
            $stmt = $conn->prepare("INSERT INTO orderdetails (itemName,itemPrice,quantity,orderDate,orderId,userId) VALUES (?,?,?,?,?,?)");

		   $stmt->bindParam(1,$itemName);
	       $stmt->bindParam(2,$itemPrice );
	       $stmt->bindParam(3,$quality);
	       $stmt->bindParam(4,$date);
	       $stmt->bindParam(5,$orderId);
	       $stmt->bindParam(6,$userId);
		   $stmt->execute();


       }

       
   }

function displayOrderDetails(){
  	 require "../connect.php";


  	 $userId = $_SESSION["userId"];

  	 $query = "Select*  from  orderdetails where userId = '".$userId."' ";
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




	

?>