	<?php
	$con=mysqli_connect("localhost","root","","myproject");
	
//if(isset($_POST)){
	$today=date('Y-m-d',time());
    $recordid=$_POST['recordid'];
	$startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];

$checkdate="select enddate from timelimit where recordid='$recordid'";
$checkresult=mysqli_query($con,$checkdate);
$row=mysqli_fetch_array($checkresult);

	
	if($row['enddate']<$today){
		echo 0;
	}else{
	
    $query="update timelimit set startdate='$startdate',enddate='$enddate' where recordid='$recordid'";
    $result=mysqli_query($con,$query);
   
	}
	

	?>