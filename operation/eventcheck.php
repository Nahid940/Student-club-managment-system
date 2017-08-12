<?php
$con=mysqli_connect("localhost","root","","myproject");
date_default_timezone_set("Asia/Dhaka");
$today=date('Y-m-d',time());
$query="SELECT COUNT(eid) AS totalevent FROM event
WHERE status='yes' and reglastdate>='$today'";
$result=mysqli_query($con,$query);


if($result){
	$row=mysqli_fetch_array($result);
}

if($row['totalevent']==1){
	echo $row['totalevent']." event registration is going on !";
}else if($row['totalevent']>1){
	echo $row['totalevent']." events registration are going on !";
}else if($row['totalevent']==0){
	echo "No event is going on.";
}
else {
	echo mysqli_error($con);
}
?>
