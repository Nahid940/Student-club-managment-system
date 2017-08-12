<?php
$con=mysqli_connect("localhost","root","","myproject");
date_default_timezone_set("Asia/Dhaka");
$today=date('Y-m-d',time());

$lastdate="select * from timelimit where status='open'";
$result=mysqli_query($con,$lastdate);
$row=mysqli_fetch_array($result);
$date=strtotime($row['startdate']);
$date1=strtotime($row['enddate']);
$recordid=$row['recordid'];

$date2 =strtotime($today);
$diff = ($date1 - $date2)/86400;

if($date2>=$date && $date2<=$date1){

if($diff>=1){
    echo $diff." days remaining";
}else if($diff==0){
    echo "Last day of registration !";
}else if($diff<0){
    
    echo 0;
}
    
}
else{
    $updatestatus="update timelimit set status='close' where recordid='$recordid'";
    mysqli_query($con,$updatestatus);
    echo "Registration is not going on.";
}
?>