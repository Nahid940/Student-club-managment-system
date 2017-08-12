<?php
$con=mysqli_connect("localhost","root","","myproject");
$id=$_POST['id'];
$optradio1=$_POST['optradio1'];
$optradio2=$_POST['optradio2'];
$content=$_POST['content'];

date_default_timezone_set("Asia/Dhaka");
$today=date('Y-m-d',time());

$query="select date from userfeedback where date='$today' and id='$id'";
$check=mysqli_query($con,$query);
$row=mysqli_fetch_array($check);
if($row['date']==$today){
    echo 0;
}else{

$query="insert into userfeedback values('$id','$today','$optradio1','$optradio2','$content','no')";

$result=mysqli_query($con,$query);
if($result){
    echo 1;
}else {
    echo mysqli_error($con);
}
}
?>