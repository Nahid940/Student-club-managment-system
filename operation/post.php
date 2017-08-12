<?php
$con=mysqli_connect("localhost","root","","myproject");
$query="select COUNT(content) as newNotice from post order by date DESC limit 1";

$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
echo $row['newNotice']." new notice.";
?>
