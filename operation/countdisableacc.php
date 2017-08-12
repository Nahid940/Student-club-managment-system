<?php
$con=mysqli_connect("localhost","root","","myproject");
$count="select count(active) as disabled from user_login where active='no'";
$result=mysqli_query($con,$count);
$row=mysqli_fetch_array($result);
if($row['disabled']==0){
	echo "No account disabled yet !";
}else if($row['disabled']==1){
	echo $row['disabled']." account";
}else if($row['disabled']>1){
	echo $row['disabled']." accounts";
}
?>