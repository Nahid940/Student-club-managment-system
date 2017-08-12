<?php
		$eventname=$_POST['eventname'];
		$eventdate=$_POST['eventdate'];
		$eventtime=$_POST['eventtime'];
		$datepicker3=$_POST['datepicker3'];
		$roomnumber=$_POST['roomnumber'];
		$con=mysqli_connect("localhost","root","","myproject");
		$query="insert into event(eventname,eventdate,eventtime,reglastdate,roomnumber,status,sitlimit,enablefeedback) values('$eventname','$eventdate','$eventtime','$datepicker3','$roomnumber','yes',600,'no')";
		$result=mysqli_query($con,$query);
		if($result){
			echo 1;
		}
		
?>