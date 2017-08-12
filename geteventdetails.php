<?php
$q = ($_GET['q']);
$con = mysqli_connect("localhost","root","","myproject");
$sql="SELECT * FROM event WHERE eventname = '".$q."'";
$result = mysqli_query($con,$sql);


$row=mysqli_fetch_array($result);
echo 
"<div class='table-responsive'>
<center><h4><span class='label label-primary'>Event details</span></h4></center>
<table class='table'>
<tr>

</tr>";
//while($row = mysqli_fetch_array($result)) {
    echo "<tr>";

    echo "<td><b> Event Name : " . $row['eventname'] . "</b></td>";
	echo "<td> <b>Registration last date : " . $row['reglastdate'] . "</b></td>";  
    echo "</tr>";
	echo "<tr>";
    echo "<td> <b>Event Date : " . $row['eventdate'] . "</b></td>";
     echo "<td><b> Event Time : ". $row['eventtime'] . "</b></td>";
    echo "</tr>";
	
	
//echo "<td>" . $row['eventdate'] . "</td>";
    //echo "<td>" . $row['eventtime'] . "</td>";
    //echo "<td>" . $row['reglastdate'] . "</td>";
    //echo "<td>" . $row['roomnumber'] . "</td>";
//}

echo "</table>";
echo "</div>";
//}
mysqli_close($con);
?>
