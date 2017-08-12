<?php
$con=mysqli_connect("localhost","root","","myproject");
if($_POST['id'] && $_POST['dates'])
{
$id=$_POST['id'];
$date=$_POST['dates'];

$sql = "update userfeedback set flag='yes' where id='$id' and date='$date'";
$result=mysqli_query( $con,$sql);
if($result){
	echo 1;
}
}
?>