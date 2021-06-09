<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'pizza');

	// initialize variables
	$name = "";
	$phone = "";
	$nic = "";
	$deliverydate = "";
	$type = "";
	$size = "";
	$qty = "";
	$price = "";
	$deliverystatus = "";
	
	if (isset($_POST['save'])) {
	 $name = $_POST['name'];
		$phone = $_POST['phone'];
		$nic = $_POST['nic'];
		$deliverydate = $_POST['deliverydate']; 
		$type =$_POST['type'];
		$size = $_POST['size'];
		
		$qty = $_POST['qty'];
		
		
		$a=mysqli_query($db,"select * from pricelist where pizzatype='$type'");
		$price=mysqli_fetch_array($a);
		$np=$price["$size"]*$qty;
		
		mysqli_query($db, "INSERT INTO customer (customername,phonenumber, nic, deliverydate,pizzatype,pizzasize,quantity,price )VALUES ('$name', '$phone', '$nic','$deliverydate','$type','$size','$qty','$np')"); 
		$_SESSION['message'] = "Thank you!!your Order has been successfully received!!!"; 
		header('location: home.php');
		
}
if (isset($_POST['update'])) {
	
	
		$id = $_POST['id'];
		$name = $_POST['name'];
		$deliverydate = $_POST['deliverydate'];
		$deliverystatus = $_POST['deliverystatus'];
	

	
	mysqli_query($db, "UPDATE customer SET deliverystatus='$deliverystatus' WHERE id=$id");
	$_SESSION['message'] = "customer details updated!"; 
	header('location: admin.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer WHERE id=$id");
	$_SESSION['message'] = "customer details  deleted successfully!"; 
	header('location: admin.php');
}

if(isset($_POST['order'])){
	header('location: customer.php');
	
}

if(isset($_POST['add'])){
	header('location: login.php');
	
}
if(isset($_POST['logout'])){
	$_SESSION['message'] = "Logout successfully!!!"; 
	header('location: home.php');
	
}

$username="";
if(isset($_POST['login'])){
	
	$username=$_POST['user'];
	
	$r = mysqli_query($db, "SELECT * FROM userdata WHERE username='$username'");
	
	if(mysqli_fetch_row($r)!=false){
		$password=$_POST['psw'];
		$pw =mysqli_query($db, "SELECT  password  FROM userdata WHERE username='$username'");
		$p=mysqli_fetch_array($pw);
		//$p=mysqli_fetch_array(mysqli_query($db, "SELECT  password  FROM userdata WHERE username='$username'"));
		
		 if($p['password']==$password){
			header('location: admin.php');
		}
		else{
			$_SESSION['message'] = "Your is password wrong.Try again!"; 
			header('location: login.php');
		} 	
	}
	else{
		 $_SESSION['message'] = "Only Admin can accesss!"; 
			header('location: home.php'); 	
	}
}

if(isset($_POST['g'])){
	$e=$_POST['e'];
	$t=$_POST['t'];
	$s=$_POST['s'];
	
	
	$bill=mysqli_fetch_array(mysqli_query($db, "select sum(price) as revenue from customer where pizzatype='$t' and pizzasize='$s'  and deliverydate='$e'"));

 $_SESSION['info'] = "Revenue of ". $t ." type ," .$s  ." pizza  in ". $e. " is ". $bill['revenue']."/=";

		
}


?>