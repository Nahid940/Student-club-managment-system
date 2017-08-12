<?php
 
    $con= mysqli_connect("localhost","root","","myproject");
    date_default_timezone_set("Asia/Dhaka");
    $today=date('Y-m-d',time());

    $startday=$_POST['startday'];
	$endday=$_POST['endday'];
    

    $checkdate="select * from timelimit where enddate>='$today' and status='open'";
    $check=mysqli_query($con,$checkdate);
    $row=mysqli_fetch_array($check);
    $num_rows=mysqli_num_rows($check);

    if($num_rows>=1){
        echo 0;
    }else{
      $query="insert into timelimit (startdate,enddate,status) values('$startday','$endday','open')";
    $result=mysqli_query($con,$query);
        if($result){
            echo 1;
        } 
    }

?>