<?php
$con= mysqli_connect("localhost","root","","myproject");
$id=$_GET['id'];
$query="Select name,contactno,address,email,gender,bloodgroup,batch,usertype,permit,active from user_login where id='$id'";
$result=mysqli_query($con,$query);
//if($result){
	$row=mysqli_fetch_array($result);
//}
if($result){
$str= "Name: ".$row['name']."<br/>"."Contact no.: ".$row['contactno']."<br/>"."Address: ".$row['address']."<br/>"."Email: ".$row['email']."<br/>"."Gender : ".$row['gender']."<br/>"."Blood group : ".$row['bloodgroup']."<br/>"."Batch : " .$row['batch']."<br/>"."User type : ".$row['usertype']."<br/>"."Confirmation : ".$row['permit']."<br/>"."Active account : ".$row['active'];
echo $str;
}
?>