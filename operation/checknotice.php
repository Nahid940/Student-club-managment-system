<?php
$con= mysqli_connect("localhost","root","","myproject");
$cehck="Select * from post";
$result=mysqli_query($con,$cehck);
$num_rows=mysqli_num_rows($result);
if($num_rows==0){
	echo "No notice found !";
}
?>