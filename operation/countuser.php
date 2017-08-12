<?php
$con=mysqli_connect("localhost","root","","myproject");
$count="select count(usertype) as user from user_login where usertype='user'";
$result=mysqli_query($con,$count);
$row=mysqli_fetch_array($result);
if($row['user']==0){
	echo "No user found!";
}else if($row['user']==1){
	echo $row['user']." Person";
}else if($row['user']>1){
	echo $row['user']." Persons";
}
?>