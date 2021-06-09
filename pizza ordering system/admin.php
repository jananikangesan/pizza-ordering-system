<?php  include('pizzacode.php');?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE id=$id");

		//if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['customername'];
			$phone= $n['phonenumber'];
			$nic = $n['nic'];
			$deliverydate = $n['deliverydate'];
			$type = $n['pizzatype'];
			$size = $n['pizzasize'];
			$qty = $n['quantity'];
			$price = $n['price'];
			$deliverystatus = $n['deliverystatus'];
			
		//}
	}
else{
	$update = false;
}

if(isset($_POST['go'])){
	$date=$_POST['d'];
	$view=true;
}
else{
	$view=false;
}	

	


?>




<!DOCTYPE html>
<html>
   <head>
     <title>admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
   </head>

   <body>
   <div id="head" >
      <font size="20px"><b>Pizza Ordering System</b></font>
	  <img src="image.jpg" height="100px" width="250px" align="right"/>
	  <img src="download.jpg" height="100px" width="250px" align="left"/>
	  
	</div>
	
	<div id="b">	
		
		<form action="pizzacode.php" method="post" id="b">
		<button class="btn2" type="submit" name="logout" ><b>logout</b></button>
		</form>
	</div>
	
	<?php $results = mysqli_query($db, "SELECT * FROM customer "); ?>

	<table border="2px">
		<thead>
			<tr>
				<th> Customer Name </th>
				<th> Phone Number </th>
				<th>NIC </th>
				<th>Delivery Date  </th>
				<th>Pizza Type  </th>
				<th> Pizza Size </th>
				<th> Quantity </th>
				<th> price </th>
				<th> DeliveryStatus </th>
			</tr>
		</thead>
		
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['customername']; ?></td>
				<td><?php echo $row['phonenumber']; ?></td>
				<td><?php echo $row['nic']; ?></td>
				<td><?php echo $row['deliverydate']; ?></td>
				<td><?php echo $row['pizzatype']; ?></td>
				<td><?php echo $row['pizzasize']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['price']; ?></td>
				<td><?php echo $row['deliverystatus']; ?></td>
				<td>
					<a href="admin.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
				</td>
				<td>
					<a href="pizzacode.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	
	<div id="a">	
	<h2>Update the status of the Delivery</h2>	
	</div>
	
<div>
<form method="post" action="pizzacode.php" id="form1">
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
		<div class="input-group">
			<label>Customer Name</label>
			<input type="text" name="name"value="<?php echo $name; ?>" required>
		</div>
			<div class="input-group">
			<label>NIC</label>
			<input type="text" name="nic"value="<?php echo $nic; ?>"  required>
		</div>
		<div class="input-group">
			<label>Delivery Date</label>
			<input type="text" name="deliverydate"value="<?php echo $deliverydate; ?>"  required>
		</div>
		
		<div>
		
		<input type="hidden" name="phone"value="<?php echo $phone; ?>" required >
		<input type="hidden" name="type" value="<?php echo $type; ?>"required >
		<input type="hidden" name="size" value="<?php echo $size; ?>"required >
		<input type="hidden" name="qty" value="<?php echo $qty; ?>" required>
			<input type="hidden" name="price" value="<?php echo $price; ?>" required>
			</div>
		
		
		<div class="input-group">
			delivery Status
			<select name="deliverystatus"  >
			<option value="None">None</option>
			<option value="Delivered">Delivered</option>
			<option value="NewDelivery">New Delivery</option>
			
			</select>

			</div>
		
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background:#ff80aa;" >update</button>
				
			
			<?php endif ?>
		</div>
		
		
	</form>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<div id="a">
<h2>Revenue of Sales for a Specific pizza size and type</h2>
</div>
<?php 
$detail=mysqli_query($db, "select deliverydate,pizzatype,pizzasize,sum(price) as revenue from customer group by pizzatype,pizzasize ,deliverydate order by deliverydate");?>
<table border="2px">
		<thead>
			<tr>
				<th>Delivery Date </th>
				<th>Pizza Type </th>
				<th> Pizza Size</th>
				<th>Revenue </th>
		</tr>
		</thead>
		
		<?php while ($row1 = mysqli_fetch_array($detail)) { ?>
			<tr>
			
				<td><?php echo $row1['deliverydate']; ?></td>
				<td><?php echo $row1['pizzatype']; ?></td>
				<td><?php echo $row1['pizzasize']; ?></td>
				<td><?php echo $row1['revenue']; ?></td>
				

			</tr>

		<?php } ?>
		</table>
		
		<div>
	<form method="post" action="admin.php" id="form1">
	<div class="input-group">
	<label>Delivery Date</label>
	<input type="date" name="e"  required>
	</div>
	
	<div class="input-group">
			Pizza Type
			<select name="t"  >
			<option value="Classic">Classic</option>
			<option value="Signature">Signature</option>
			<option value="Favourite">Favourite</option>
			<option value="Supreme">Supreme</option>
			</select>
			
			Pizza Size
			<select name="s"  >
			<option value="Small">Small</option>
			<option value="Medium">Medium</option>
			<option value="Large">Large</option>
			</select>
			<button class="btn" type="submit" name="g" >Go</button>
	</div>
   </form>
   
	</div>
	
<?php 
if (isset($_SESSION['info'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['info']; 
			unset($_SESSION['info']);
		?>
	</div>
<?php endif ?>



		
	
	
	<div>
	
	<div id="a">	
	<h2>View the orders by using delivery date</h2>	
	</div>
	
	<form method="post" action="admin.php" id="form1">
	<div class="input-group">
	<label>Delivery Date</label>
	<input type="date" name="d"  required>
	<button class="btn" type="submit" name="go" >Go</button>
	</div>
	
	
   </form>
   
	</div>
	
	<?php
	if($view==true){
		
		$find = mysqli_query($db, "SELECT * FROM customer where deliverydate='$date' ");
	?>	
		
		<table border="2px">
		<thead>
			<tr>
				<th> Customer Name </th>
				<th> Phone Number </th>
				<th>NIC </th>
				<th>Delivery Date  </th>
				<th>Pizza Type  </th>
				<th> Pizza Size </th>
				<th> Quantity </th>
				<th> price </th>
				<th> DeliveryStatus </th>
			</tr>
		</thead>
		
		<?php while ($row = mysqli_fetch_array($find)) { ?>
			<tr>
				<td><?php echo $row['customername']; ?></td>
				<td><?php echo $row['phonenumber']; ?></td>
				<td><?php echo $row['nic']; ?></td>
				<td><?php echo $row['deliverydate']; ?></td>
				<td><?php echo $row['pizzatype']; ?></td>
				<td><?php echo $row['pizzasize']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['price']; ?></td>
				<td><?php echo $row['deliverystatus']; ?></td>
			</tr>
		
		
		<?php } ?>
		</table>
		
	<?php }

		if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
	
   </body>
</html>