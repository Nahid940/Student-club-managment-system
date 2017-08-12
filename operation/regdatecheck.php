<?php
$con=mysqli_connect("localhost","root","","myproject");
date_default_timezone_set("Asia/Dhaka");
$today=date('Y-m-d',time());
$id=$_POST['id'];

$checkifregistered="select usertype,permit from user_login where id='$id'";
$res=mysqli_query($con,$checkifregistered);
$check=mysqli_fetch_array($res);
if($check['usertype']=='user'){

$query="select startdate, enddate from timelimit where status='open'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

if($today>=$row['startdate'] && $row['enddate']>=$today){
	echo 1;
}else{
	echo 0;
}
}else if($check['usertype']=='member' && $check['permit']=='no'){
    echo "Your member registration is pending !";
}else if($check['usertype']=='member' && $check['permit']=='yes'){
    echo "Your member registration is complete !";
}

?>
