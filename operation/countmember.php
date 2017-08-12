<?php
$con=mysqli_connect("localhost","root","","myproject");
$count="select count(usertype) as member from user_login where usertype='member' and permit='yes' and active='yes'";
$result=mysqli_query($con,$count);
$row=mysqli_fetch_array($result);
if($row['member']==0){
	echo "No member registered yet !";
}else if($row['member']==1){
	echo $row['member']." Person";
}else if($row['member']>1){
	echo $row['member']." Persons";
}
?>