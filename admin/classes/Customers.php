<?php 
session_start();

/**
 * 
 */
class Customers
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getCustomers(){
		$query = $this->con->query("SELECT `user_id`, `first_name`, `last_name`, `email`, `mobile`, `address1`, `address2` FROM `user_info`");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no customer data'];
	}


	public function getCustomersOrder(){
		
		$query = $this->con->query("SELECT o.order_id, o.product_id, o.qty, o.trx_id,o.datetime,o.p_status,o.shipping,o.payment_method,o.cancel,o.receive,p.product_title, p.product_image,p.product_price,u.email,u.user_id FROM orders o JOIN products p ON o.product_id = p.product_id INNER JOIN user_info u on o.user_id=u.user_id order by datetime desc");
		
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
				include '../db.php';
				
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no orders yet'];
	}
	

}


/*$c = new Customers();
echo "<pre>";
print_r($c->getCustomers());
exit();*/

if (isset($_POST["GET_CUSTOMERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
	}
}

if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomersOrder());
		exit();
	}
}
include '../db.php';
$email = $_POST['email'] ;
$title = $_POST['title'];
$trx = $_POST['trx'];
$p_status = $_POST['p_status'];
$shipping = $_POST['shipping'];
$payment_method = $_POST['payment_method'];
$status = $_POST['status'];
$order = $_POST['order'];
$total = $_POST['price'];
$qt = $_POST['qty1'];
$cancel = $row['cancel'];
$cancel="";
$empty = "Cancel";
$receive = $row['receive'];
$receive="Order Received";
    $sql = mysqli_query($con, "SELECT*FROM orders order by datetime desc");
    if($row = mysqli_num_rows($sql)){
mysqli_query($con, "UPDATE orders set shipping='$status', price='$total' where order_id='$order'");
mysqli_query($con, "UPDATE processing set shipping='$status', price='$total' where order_id='$order'");
    header('location: ../customer_orders.php');
    }
	if($status == "Processing..."){
		mysqli_query($con, " UPDATE orders SET cancel='$empty',receive='$cancel' WHERE order_id='$order'");
	}
	if($status == "Cancelled"){
mysqli_query($con, " DELETE FROM orders WHERE order_id='$order'");
mysqli_query($con, " DELETE FROM processing WHERE order_id='$order'");
	}
	if($status == "Preparing"){
	
		mysqli_query($con, " UPDATE orders set cancel='$cancel' WHERE order_id='$order'");
		mysqli_query($con, " DELETE FROM processing WHERE order_id='$order'");

		$user_id =  $_SESSION['user_id']=$_POST['user_id'];
		$email =  $_SESSION['email']=$_POST['email'];
	$product_id =$_SESSION['product_id']= $_POST['product_id'];
$trx =$_SESSION['trx']= $_POST['trx'];
$p_status =$_SESSION['p_status']= $_POST['p_status'];
$shipping =$_SESSION['shipping']= $_POST['shipping'];
$payment_method = $_SESSION['payment_method']=$_POST['payment_method'];
$order =$_SESSION['order']= $_POST['order'];
$total = $_SESSION['price']=$_POST['price'];
$qt = $_SESSION['qty1']=$_POST['qty1'];
header('location:preparing.php');
			}
if($status == "Shipping"){
				mysqli_query($con, " UPDATE orders set cancel='$cancel' WHERE order_id='$order'");
				$user_id =  $_SESSION['user_id']=$_POST['user_id'];
				$email =  $_SESSION['email']=$_POST['email'];
			$product_id =$_SESSION['product_id']= $_POST['product_id'];
		$trx =$_SESSION['trx']= $_POST['trx'];
		$p_status =$_SESSION['p_status']= $_POST['p_status'];
		$shipping =$_SESSION['shipping']= $_POST['shipping'];
		$payment_method = $_SESSION['payment_method']=$_POST['payment_method'];
		$order =$_SESSION['order']= $_POST['order'];
		$total = $_SESSION['price']=$_POST['price'];
		$qt = $_SESSION['qty1']=$_POST['qty1'];
		header('location:shipping.php');
			}
			if($status == "Delivered"){
				
				$user_id =  $_SESSION['user_id']=$_POST['user_id'];
				$email =  $_SESSION['email']=$_POST['email'];
			$product_id =$_SESSION['product_id']= $_POST['product_id'];
		$trx =$_SESSION['trx']= $_POST['trx'];
		$p_status =$_SESSION['p_status']= $_POST['p_status'];
		$shipping =$_SESSION['shipping']= $_POST['shipping'];
		$payment_method = $_SESSION['payment_method']=$_POST['payment_method'];
		$order =$_SESSION['order']= $_POST['order'];
		$total = $_SESSION['price']=$_POST['price'];
		$qt = $_SESSION['qty1']=$_POST['qty1'];
		header('location:delivered.php');
				}
if($status == "Settled"){
	mysqli_query($con, " DELETE FROM orders WHERE order_id='$order'");
	$email =  $_SESSION['email']=$_POST['email'];
	$title =$_SESSION['title']= $_POST['title'];
$trx =$_SESSION['trx']= $_POST['trx'];
$p_status =$_SESSION['p_status']= $_POST['p_status'];
$shipping =$_SESSION['shipping']= $_POST['shipping'];
$payment_method = $_SESSION['payment_method']=$_POST['payment_method'];
$order =$_SESSION['order']= $_POST['order'];
$total = $_SESSION['price']=$_POST['price'];
$qt = $_SESSION['qty1']=$_POST['qty1'];
		header("location:history.php");
		
				}

				
		?>
				
