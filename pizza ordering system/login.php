<?php  include('pizzacode.php');?>








<!DOCTYPE html>
<html>
   <head>
     <title>login</title>
	<link rel="stylesheet" type="text/css" href="b.css">
   </head>

   <body>
   <div id="head" >
      <font size="20px"><b>Pizza Ordering System</b></font>
	  <img src="image.jpg" height="100px" width="250px" align="right"/>
	  <img src="download.jpg" height="100px" width="250px" align="left"/>
</div>
	
	<div>
	<form action="pizzacode.php" method="post">
	<h1 id="a">LOGIN</h1>
	<div class="input-group">
			<label>user name</label>
			<input type="text" name="user" required >
		</div>
		
		<div class="input-group">
			<label>password</label>
			<input type="password" name="psw"  required>
		</div>
		
		<div >
			
		<button class="btn" type="submit" name="login" ><b>login</b></button>
		
		</div>
		
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