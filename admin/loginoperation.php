
<?php
   
	if(isset($_POST['email']) && ($_POST['password'])){
		$email=$_POST['email'];
        $password=$_POST['password'];
		
		
        $con=mysqli_connect("localhost","root","","myproject");
		$query="select * from admin where  email='$email' and  password='$password'";
		$result=mysqli_query($con,$query);
        $row=mysqli_num_rows($result);
        if($row==0){
            echo "Account doesn't exist or disabled !!!";
        }else{
            $rows=mysqli_fetch_array($result);
            $email=$rows['email'];
            session_start();
            $_SESSION['email']=$email;
            echo 1;
        }
    }
?>

	
	
	
	
	
	
	
	
	
    
