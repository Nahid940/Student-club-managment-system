<?php
$con=mysqli_connect("localhost","root","","myproject");
if($_POST['id'] && $_POST['eid'])
{
$id=$_POST['id'];
$eid=$_POST['eid'];


$sql = "delete from studentevent where id='$id' and eid='$eid'";
$result=mysqli_query( $con,$sql);
if($result){
	echo 1;
}
}
?>