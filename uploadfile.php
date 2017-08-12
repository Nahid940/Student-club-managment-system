<?php
		$con= mysqli_connect("localhost","root","","myproject");
		$title=$_POST['title'];
		$filedate=$_POST['filedate'];
		$filetype=$_POST['filetype'];

				
		$filename=$_FILES['fileUpload']['name'];
		$filesize=$_FILES['fileUpload']['size'];
		$filelocation=$_FILES['fileUpload']['tmp_name'];
		$div=explode('.',$filename);

		$fileExtension=strtolower(end($div));
		$uniqueName=$title.'.'.$fileExtension;
		$uploaded_file = "uploads/".$uniqueName;

		move_uploaded_file($filelocation,$uploaded_file);
		
		$query="insert into files values('$title','$filedate','$uploaded_file','$filetype')";
		$result=mysqli_query($con,$query);
		if($result){
			echo 1;
		}else{
			echo 0;
		}



?>