<?php
$q = ($_GET['q']);

$con = mysqli_connect("localhost","root","","myproject");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//mysqli_select_db($con,"ajax_demo");
$sql="select ulg.id,name,batch,eventname,eventdate from event evt, studentevent stdev, user_login ulg where evt.eid=stdev.eid and ulg.id=stdev.id and eventname='$q' and confirm='yes'";
$result = mysqli_query($con,$sql);
$numrows=mysqli_num_rows($result);

$sqll="Select count(ulg.id) as totalparticipants from event evt, studentevent stdev, user_login ulg where evt.eid=stdev.eid and ulg.id=stdev.id and eventname='$q' and confirm='yes'";
$result1 = mysqli_query($con,$sqll);
$rows=mysqli_fetch_array($result1);

echo "<h3><span class='label label-success'>Total registered on this event : ".$rows['totalparticipants']." </span></h3>";

if($numrows>=1){
echo 
"<div class='table-responsive'>

<table class='table'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Course</th>
<th>Event name</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['batch'] . "</td>";
    echo "<td>" . $row['eventname'] . "</td>";
    echo "</tr>";
}


echo "</table>";
echo "</div>";
}else{
	echo "<center><h2><span class='label label-danger'>No result found !</span></h2></center>";
}
//mysqli_close($con);
?>