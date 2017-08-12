<?php

$con=mysqli_connect("localhost","root","","myproject");

$sql = "select count(flag) as total from eventfeedback where flag='no'";
$result=mysqli_query( $con,$sql);
$row=mysqli_fetch_array($result);

if($row['total']>=1){
	echo $row['total'];
}else if($row['total']==0){
    echo 0;
}

?>