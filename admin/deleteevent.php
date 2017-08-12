<?php

$con=mysqli_connect("localhost","root","","myproject");
if($_POST['eid'])
{
$eid=$_POST['eid'];
$sql = "delete from event where eid='$eid'";
$result=mysqli_query( $con,$sql);
if($result){
	echo 1;
}
}
?>