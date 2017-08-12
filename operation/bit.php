<?php
$con=mysqli_connect("localhost","root","","myproject");
$count="select count(batch) as totalmember from user_login where usertype='member' and batch='BIT'  and permit='yes' and active='yes'";
$result=mysqli_query($con,$count);
$row=mysqli_fetch_array($result);

if($row['totalmember']==0){
	echo "No member found !";
}else{
    echo $row['totalmember'];
}
?>