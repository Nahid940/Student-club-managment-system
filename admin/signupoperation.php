<?php
	$con=mysqli_connect("localhost","root","","myproject");
	
	$password=$_POST['password'];
	$personname=$_POST['personname'];
	$email=$_POST['email'];

	$query="select * from admin where email='$email'";
	$result=mysqli_query($con,$query);
	$numrows=mysqli_num_rows($result);
	if($numrows==1){
		echo 0;
	}else{
	$query="insert into admin values('$email','$personname','$password')";
	$result=mysqli_query($con,$query);
	if($result){
		echo 1;
	}
	}
	
?>