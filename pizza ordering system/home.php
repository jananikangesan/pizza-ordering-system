<?php  include('pizzacode.php');?>

<!DOCTYPE html>
<html>
   <head>
     <title>home</title>
	<link rel="stylesheet" type="text/css" href="c.css">
   </head>

   <body>
   <div id="head" >
      <font size="20px"><b>Pizza Ordering System</b></font>
	  <img src="image.jpg" height="100px" width="250px" align="right"/>
	  <img src="download.jpg" height="100px" width="250px" align="left"/>  
	</div >
	
	<div id="b">	
		
		<form action="pizzacode.php" method="post">
		<button class="btn" type="submit" name="add" ><b>Admin</b></button>
		</form>
	</div>

	
	<div id="a">

	<h1>WELCOME TO OUR ONLINE PIZZA ORDERING SYSTEM!!</h1>
	
	<p align="center"><img src="pizza.jpg"  id="pizza"/></p>
	</div>
		
	
	
	<div id="a">	
		<form action="pizzacode.php" method="post">
		<button class="btn" type="submit" name="order" ><b>Order Pizza!</b></button>
		</form>
	</form>
		
	</div>
	
	<?php 

		if (isset($_SESSION['message'])): ?>
	<div id="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>



	
   </body>
</html>