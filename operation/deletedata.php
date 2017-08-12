<?php

$con=mysqli_connect("localhost","root","","myproject");
if($_POST['id'])
{
$id=$_POST['id'];


$sql = "delete from user_login where id='$id'";
$result=mysqli_query( $con,$sql);
if($result){
	echo 1;
}
}
?>