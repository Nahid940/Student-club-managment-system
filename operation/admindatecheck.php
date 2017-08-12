<?php
$con=mysqli_connect("localhost","root","","myproject");
date_default_timezone_set("Asia/Dhaka");
$today=date('Y-m-d',time());

$query="select startdate, enddate from timelimit where status='open'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

if($today>=$row['startdate'] && $today<=$row['enddate']){
	echo 1;
}else{
	echo 0;
}

?>