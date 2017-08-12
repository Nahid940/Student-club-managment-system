<?php
	$con=mysqli_connect("localhost","root","","myproject");
	$id=$_POST['id'];
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$checkpassword="select password from user_login where id='$id'";
	$result=mysqli_query($con,$checkpassword);
	$row=mysqli_fetch_array($result);
	$oldp=$row['password'];
	if($oldp==$oldpassword){
		$query="Update user_login set password='$newpassword' where id='$id'";
		$result=mysqli_query($con,$query);
		if($result){
			echo 1;
		}
	}else{
		echo 0;
	}
?>