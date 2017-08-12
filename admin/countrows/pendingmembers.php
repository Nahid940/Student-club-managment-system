<?php
    $con= mysqli_connect("localhost","root","","myproject");
    $query1="Select COUNT(permit) AS pending from user_login where permit='no' and usertype='member'";
    $result1=mysqli_query($con,$query1);
    $row1=mysqli_fetch_array($result1);
    if($row1['pending'] >=1){
        echo $row1['pending'];
    }else if($row1['pending']==0){
        echo 0;
    }
?>