	<?php
	$con=mysqli_connect("localhost","root","","myproject");
	
	//if(isset($_POST)){
    $eid=$_POST['eid'];
	$eventname=$_POST['eventname'];
    $datepicker5=$_POST['datepicker5'];
	$eventtime=$_POST['eventtime'];
	$reglastdate=$_POST['reglastdate'];
	$roomnumber=$_POST['roomnumber'];
	$status=$_POST['statuss'];
	$sitlimit=$_POST['sitlimit'];
	$enablefeedback=$_POST['enablefeedback'];
    $query="update event set eventname='$eventname',eventtime='$eventtime',reglastdate='$reglastdate',eventdate='$datepicker5',roomnumber='$roomnumber',status='$status',sitlimit='$sitlimit',enablefeedback='$enablefeedback' where eid='$eid'";
    $result=mysqli_query($con,$query);
	//}
	?>