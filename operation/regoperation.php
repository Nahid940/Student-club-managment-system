<?php
	$con=mysqli_connect("localhost","root","","myproject");
	$id=$_POST['id'];
    $recordid=$_POST['recordid'];
	$reasonofjoining=$_POST['reasonofjoining'];
	$fcaebookidname=$_POST['fcaebookidname'];
	$facebookprofilelink=$_POST['facebookprofilelink'];
	
    //$permited  = array('jpg', 'jpeg', 'png', 'gif');
	
    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $filelocation=$_FILES['image']['tmp_name'];
    $div=explode('.',$filename);

    $fileExtension=strtolower(end($div));
    $uniqueName=substr(md5(time()), 0, 10).'.'.$fileExtension;
    $uploaded_image = "images/".$uniqueName;

    move_uploaded_file($filelocation,$uploaded_image);

    //move_uploaded_file($filelocation,$uploaded_image);
 


	$query="select * from registration where id='$id'";
	$result=mysqli_query($con,$query);
	$numrows=mysqli_num_rows($result);
	if($numrows==1){
		echo 0;
	}else{
       
		$query="insert into registration(id,reasonofjoining,fcaebookidname,facebookprofilelink,image,recordid) values('$id','$reasonofjoining','$fcaebookidname','$facebookprofilelink','$uploaded_image','$recordid')";
		$result=mysqli_query($con,$query);
		$query1="update user_login set usertype='member' where id='$id'";
		$result1=mysqli_query($con,$query1);
		if($result){
			echo 1;
		}else{
			echo mysqli_error($con);
		}
	}
	
?>	