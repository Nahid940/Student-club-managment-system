<?php
	$con=mysqli_connect("localhost","root","","myproject");
	$id=$_POST['id'];
    $event=$_POST['eventname'];
	
	$eid="select eid,sitlimit from event where eventname='$event'";
	$result=mysqli_query($con,$eid);
    $row=mysqli_fetch_array($result);
    $eventid=$row['eid'];
	$sitlimit=$row['sitlimit'];
	

    $check="select count(confirm) as totalprticipants from studentevent where eid='$eventid'";
	$total=mysqli_query($con,$check);
	$countresult=mysqli_fetch_array($total);
	
	//if($countresult['totalprticipants']==$sitlimit){
		//echo 3;
	//}else{
	
    $query1="select * from studentevent where eid='$eventid' and id='$id'";
    $queryresult=mysqli_query($con,$query1);

	$numrows=mysqli_num_rows($queryresult);
	if($numrows==1){
		echo 0;
	}else if($countresult['totalprticipants']==$sitlimit){
        echo 3;
    }else{
	$query="insert into studentevent values('$eventid','$id','no')";
	$result=mysqli_query($con,$query);
	if($result){
		echo 1;
	}
	}
	//}
	
?>