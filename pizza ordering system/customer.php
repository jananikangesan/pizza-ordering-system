<?php  include('pizzacode.php');?>
<!DOCTYPE html>
<html>
   <head>
     <title>order</title>
	<link rel="stylesheet" type="text/css" href="st.css">
   </head>

   <body>
   <div id="head" >
      <font size="20px"><b>Pizza Ordering System</b></font>
	  <img src="image.jpg" height="100px" width="250px" align="right"/>
	  <img src="download.jpg" height="100px" width="250px" align="left"/>
	  </div>
	  
	   <div>
	   
	   <div id="a">
	<h2>Price list of Pizza</h2>	
	</div>
	<?php 
	$d=mysqli_query($db, "select * from pricelist ");?>
	<table border="2px">
		<thead>
			<tr>
			<th rowspan="2" >Pizza Type</th>
			<th colspan="3"> Price of Pizza Size</th>	
		</tr>
	<tr>
	<th>Small</th>
	<th>Medium</th>
	<th>Large</th>
	</th>
		
		</thead>
		
		<?php while ($row1 = mysqli_fetch_array($d)) { ?>
			<tr>
			
				<td><?php echo $row1['pizzatype']; ?></td>
				<td><?php echo $row1['Small']; ?></td>
				<td><?php echo $row1['Medium']; ?></td>
				<td><?php echo $row1['Large']; ?></td>
				

			</tr>

		<?php } ?>
		</table>
	
	</div>
	

	
<div>
<div id="a">
<h2>Order the pizza by providing the following informations </h2>	
</div>
<form method="post" action="pizzacode.php" >
		<h1 id="a">ORDER THE PIZZA!!!</h1>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
		<div class="input-group">
			<label>Customer Name</label>
			<input type="text" name="name" required>
		</div>
		<div class="input-group">
			<label>Phone no</label>
			<input type="text" name="phone" required >
		</div>
		<div class="input-group">
			<label>NIC</label>
			<input type="text" name="nic"  required>
		</div>
		<div class="input-group">
			<label>Delivery Date</label>
			<input type="date" name="deliverydate"  required>
		</div>
			<div class="input-group">
			Pizza Type
			<select name="type"  >
			<option value="Classic">Classic</option>
			<option value="Signature">Signature</option>
			<option value="Favourite">Favourite</option>
			<option value="Supreme">Supreme</option>
			</select>

			</div>
			
			<div class="input-group">
			Pizza Size
			<select name="size"  >
			<option value="Small">Small</option>
			<option value="Medium">Medium</option>
			<option value="Large">Large</option>
			
			</select>
			</div>
				
		<div class="input-group">
			<label>Quantity</label>
			<input type="text" name="qty"  required>
		</div>
		
	
		
		<div class="input-group">
			
				<button class="btn" type="submit" name="save" >Save</button>
		
		</div>

		
	</form>
	</div>
	
	<?php 

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