	<?php
	$con=mysqli_connect("localhost","root","","myproject");
	
    $eid=$_POST['eid'];
	$eventname=$_POST['eventname'];
	$eventdate=$_POST['eventdate'];
	$status=$_POST['status'];
	



    $query="update event set eventname='$eventname',eventdate='$eventdate', status='$status' where eid='$eid'";

    $result=mysqli_query($con,$query);
    if($result){
        echo 1;
    }else{
        echo mysqli_error($con);
    }

	?>