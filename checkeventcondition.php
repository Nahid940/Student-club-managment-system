<?php
$q = ($_GET['q']);

$con = mysqli_connect("localhost","root","","myproject");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//mysqli_select_db($con,"ajax_demo");

$checkparticipants="select "




$sql="SELECT * FROM user_login WHERE batch = '".$q."' and active='yes'";
$result = mysqli_query($con,$sql);
$numrows=mysqli_num_rows($result);
if($numrows>0){

echo 
"<div class='table-responsive'>
<table class='table'>
<tr>
<th>Name</th>
<th>ID</th>
<th>Contact no.</th>
<th>Address</th>
<th>Email</th>
<th>Gender</th>
<th>Blood group</th>
<th>Batch</th>
<th>Usertype</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['contactno'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['bloodgroup'] . "</td>";
    echo "<td>" . $row['batch'] . "</td>";
    echo "<td>" . $row['usertype'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";
}else{
	echo "<center><h2><span class='label label-danger'>No result found !</span></h2></center>";
}
mysqli_close($con);
?>