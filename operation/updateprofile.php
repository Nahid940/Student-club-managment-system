	<?php
	$con=mysqli_connect("localhost","root","","myproject");
	
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['optradio'];
	$contactno=$_POST['contactno'];
	$address=$_POST['address'];
	$blood=$_POST['blood'];
	$batch=$_POST['batch'];

	
    //$permited  = array('jpg', 'jpeg', 'png', 'gif');
	
//    $filename=$_FILES['image']['name'];
//    $filesize=$_FILES['image']['size'];
//    $filelocation=$_FILES['image']['tmp_name'];
//    $div=explode('.',$filename);
//
//    $fileExtension=strtolower(end($div));
//    $uniqueName=substr(md5(time()), 0, 10).'.'.$fileExtension;
//    $uploaded_image = "images/".$uniqueName;
//
//    move_uploaded_file($filelocation,$uploaded_image);

    //move_uploaded_file($filelocation,$uploaded_image);

    $query="update user_login set name='$name', email='$email',gender='$gender',contactno='$contactno',address='$address',bloodgroup='$blood',batch='$batch' where id='$id'";

    $result=mysqli_query($con,$query);
    if($result){
        echo 1;
    }else{
        echo mysqli_error($con);
    }

	?>