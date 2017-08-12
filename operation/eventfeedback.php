<?php
$con=mysqli_connect("localhost","root","","myproject");
$id=$_POST['id'];
$eid=$_POST['eventid'];
//$datepicker3=$_POST['datepicker3'];
$optradio=$_POST['optradio'];
$optradio1=$_POST['optradio1'];
$optradio2=$_POST['optradio2'];
$content=$_POST['content'];

date_default_timezone_set("Asia/Dhaka");
$today=date('Y-m-d',time());



$query="select date from eventfeedback where date='$today' and id='$id' and eid='$eid'"; // '
$check=mysqli_query($con,$query);
$row=mysqli_fetch_array($check);
if($row['date']==$today){
    echo 0;
}else{

    $query="insert into eventfeedback(eid,id,eventquality,eventsuccess,helpful,content,date,flag) values('$eid','$id','$optradio','$optradio1','$optradio2','$content','$today','no')";

    $result=mysqli_query($con,$query);
        if($result){
            echo 1;
        }else {
            echo mysqli_error($con);
        }
}
?>