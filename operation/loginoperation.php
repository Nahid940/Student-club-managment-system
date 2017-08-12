
<?php
   
	if(isset($_POST['id']) && ($_POST['password'])){
        $password=$_POST['password'];
		$id=$_POST['id'];
		
        $con=mysqli_connect("localhost","root","","myproject");
		$query="select password,id,active from user_login where  password='$password' and id='$id' and active='yes'";
		$result=mysqli_query($con,$query);
        $row=mysqli_num_rows($result);
        if($row==0){
            echo "Account doesn't exist or disabled !!!";
        }else{
            $rows=mysqli_fetch_array($result);
            $sid=$rows['id'];
            session_start();
            $_SESSION['id']=$sid;
            echo 1;
        }
    }
?>

	
	
	
	
	
	
	
	
	
    
