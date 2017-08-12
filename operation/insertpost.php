<?php
	$con= mysqli_connect("localhost","root","","myproject");
	
	$posttitle=$_POST['posttitle'];
	$datepicker1=$_POST['datepicker1'];
	$author=$_POST['author'];
	$keyword=$_POST['keyword'];
	$content=$_POST['content'];
	
	$query="insert into post (posttitle,date,authorname,keywords,content) values('$posttitle','$datepicker1','$author','$keyword','$content')";
	$result=mysqli_query($con,$query);
	if($result){
		echo 1;
	}else{
		echo mysqli_error($con);
	}
?>