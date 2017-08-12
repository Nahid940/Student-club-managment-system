<?php
$r = intval($_GET['r']);

$con = mysqli_connect("localhost","root","","myproject");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//mysqli_select_db($con,"ajax_demo");
$sql="Select ulg.id, name, tlt.recordid, batch from user_login ulg, timelimit tlt, registration reg where ulg.id=reg.id and tlt.recordid=reg.recordid and usertype='member' and tlt.recordid='".$r."'";
$result = mysqli_query($con,$sql);
$numrows=mysqli_num_rows($result);

$sqll="Select count(ulg.id) as totalparticipants from user_login ulg, timelimit tlt, registration reg where ulg.id=reg.id and tlt.recordid=reg.recordid and usertype='member' and tlt.recordid='".$r."'";
$result1 = mysqli_query($con,$sqll);
$rows=mysqli_fetch_array($result1);

echo "<h3><span class='label label-success'>Total registered on this session : ".$rows['totalparticipants']." </span></h3>";

if($numrows>0){
echo 
"<div class='table-responsive'>

<table class='table'>
<tr>
<th>Session</th>
<th>ID</th>
<th>Name.</th>
<th>Course</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['recordid'] . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['batch'] . "</td>";
    echo "</tr>";
}


echo "</table>";
echo "</div>";
}else{
	echo "<center><h2><span class='label label-danger'>No result found !</span></h2></center>";
}
//mysqli_close($con);
?>