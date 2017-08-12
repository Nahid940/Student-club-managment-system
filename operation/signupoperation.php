<?php
	$con=mysqli_connect("localhost","root","","myproject");
	$personname=$_POST['name'];
    $gen=$_POST['optradio'];
	$password=$_POST['password'];
    $id=$_POST['id'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$blood=$_POST['blood'];
	$batch=$_POST['batch'];
    //$reasonofjoining=$_POST['reasonofjoining'];
    $fcaebookidname=$_POST['fcaebookidname'];
    $facebookprofilelink=$_POST['facebookprofilelink'];
    $recordid=$_POST['recordid'];
	

    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $filelocation=$_FILES['image']['tmp_name'];
    $div=explode('.',$filename);

    $fileExtension=strtolower(end($div));
    $uniqueName=substr(md5(time()), 0, 10).'.'.$fileExtension;
    $uploaded_image = "../images/".$uniqueName;
    move_uploaded_file($filelocation,$uploaded_image);

    
	$query="select * from user_login where id='$id'";
	$result=mysqli_query($con,$query);
	$numrows=mysqli_num_rows($result);
	if($numrows==1){
		echo 0;
	}else{
	$query="insert into user_login values('$personname','$password','$id','$contact','$address','$email','$gen','$blood','$batch','$fcaebookidname','$facebookprofilelink','$recordid','$uploaded_image','user','no','yes')";
	$result=mysqli_query($con,$query);
	if($result){
		echo 1;
	}else{
        echo mysqli_error($con);
    }
	}
	
?>