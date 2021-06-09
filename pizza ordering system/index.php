<?php
//connect to database server
$con=mysqli_connect('localhost','root','','pizza') or die("could not connect:".mysqli_error());


//write the query to retrive data from "members" table
$query1="SELECT * FROM customer";
//$query2="SELECT * FROM shopadmin";

//execute the query
$result1 = mysqli_query($con,$query1);
//$result2 = mysqli_query($con,$query2);

//display the result in an html table
echo "<table border='1'>
<tr>
<th>id</th>
<th>customer name</th>
<th>phone number</th>
<th>nic</th>
<th>delivery date</th>
<th>pizza type</th>
<th>pizza size</th>
<th>quantity</th>
<th>price</th>
<th>deliverystatus</th>";

//iterate loop, for each row in rowest

while($row=mysqli_fetch_row($result1))
{
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[4]."</td>";
	echo "<td>".$row[5]."</td>";
	echo "<td>".$row[6]."</td>";
	echo "<td>".$row[7]."</td>";	
	echo "<td>".$row[8]."</td>";	
	echo "<td>".$row[9]."</td>";	
	
}
echo"</table>";






//close connection
mysqli_close($con);

?>