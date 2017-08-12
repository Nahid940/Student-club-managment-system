<?php
$q = ($_GET['q']);

$con = mysqli_connect("localhost","root","","myproject");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//mysqli_select_db($con,"ajax_demo");
$sql="SELECT eventname,eventdate,eventtime,roomnumber FROM event WHERE eventname = '".$q."'";
$result = mysqli_query($con,$sql);
//$numrows=mysqli_num_rows($result);
//if($numrows>0){

echo 
"<div class='table-responsive'>
<table class='table'>
<tr>
<th>Event name</th>
<th>Event date</th>
<th>Event time</th>
<th>Room No.</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['eventname'] . "</td>";
    echo "<td>" . $row['eventdate'] . "</td>";
    echo "<td>" . $row['eventtime'] . "</td>";
    echo "<td>" . $row['roomnumber'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";
//}
mysqli_close($con);
?>