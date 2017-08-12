<?php
	$con=mysqli_connect("localhost","root","","myproject");
	
	$id=$_POST['id'];
		$query="update user_login set usertype='member' where id='$id' and usertype='user'";
		$result=mysqli_query($con,$query);
//		$query1="update user_login set usertype='member' where id='$id'";
//		$result1=mysqli_query($con,$query1);
		if($result){
			echo 1;
		}else{
			echo mysqli_error($con);
		}
	
	
?>	