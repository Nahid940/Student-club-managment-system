<?php
    $con= mysqli_connect("localhost","root","","myproject");
    $query1="Select COUNT(flag) AS 'pending' from userfeedback where flag='no'";
    $result1=mysqli_query($con,$query1);
    $row1=mysqli_fetch_array($result1);
    if($row1['pending'] >=1){
        echo $row1['pending'];
    }else if($row1['pending']==0){
        echo 0;
    }
?>