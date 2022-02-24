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
		
		$query = $this->con->query("SELECT o.order_id, o.product_id, o.qty, o.trx_id,o.datetime,o.p_status,p.product_title, p.product_image,p.product_price,u.email FROM orders o JOIN products p ON o.product_id = p.product_id INNER JOIN user_info u on o.user_id=u.user_id");
		
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
$status = $_POST['status'];
$order = $_POST['order'];
$price = $_POST['price'];
    $sql = mysqli_query($con, "SELECT*FROM orders");
    if($row = mysqli_num_rows($sql)){
mysqli_query($con, "UPDATE orders set p_status='$status', price='$price' where order_id='$order'");
    header('location: ../customer_orders.php');
    }

?>