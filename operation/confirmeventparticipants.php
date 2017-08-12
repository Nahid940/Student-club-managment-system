<?php
$con=mysqli_connect("localhost","root","","myproject");
if($_POST['sid'])
{
$id=$_POST['sid'];
$eid=$_POST['eid'];


$sql = "update studentevent set confirm='yes' where id='$id' and eid='$eid'";
$result=mysqli_query( $con,$sql);
if($result){
	echo 1;
}
}
?>