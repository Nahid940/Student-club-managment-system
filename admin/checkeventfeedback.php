<?php

$con=mysqli_connect("localhost","root","","myproject");
if($_POST['eid'])
{
$eid=$_POST['eid'];
$sid=$_POST['sid'];
$sql = "update eventfeedback set flag='yes' where eid='$eid' and id='$sid'";
$result=mysqli_query( $con,$sql);
if($result){
	echo 1;
}
}
?>