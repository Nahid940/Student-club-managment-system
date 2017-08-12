<?php
    $con= mysqli_connect("localhost","root","","myproject");
    if(isset($_POST['insert'])){
        $username=$_POST['username'];
        $query = "SELECT username FROM registration where username='$username'";
        
        $result=mysqli_query($con,$query);
        $numResult=mysqli_num_rows($result);
        
        if($numResult>=1){
            echo '<script language="javascript">';
            echo 'alert("You are already registered !")';
            echo '</script>';
        }else {  
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        
        $filename=$_FILES['image']['name'];
        $filesize=$_FILES['image']['size'];
        $filelocation=$_FILES['image']['tmp_name'];
        $div=explode('.',$filename);
        
        $fileExtension=strtolower(end($div));
        $uniqueName=substr(md5(time()), 0, 10).'.'.$fileExtension;
        $uploaded_image = "uploads/".$uniqueName;
        
        move_uploaded_file($filelocation,$uploaded_image);
               
        $id=$_POST['id'];
        $name=$_POST['name'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $gender=$_POST['optradio'];
        $blood=$_POST['blood'];
        $batch=$_POST['batch'];
        $reasonofjoining=$_POST['reasonofjoining'];
        
        $insert="Insert into registration(username,id,name,contact,email,address,gender,blood,batch,reasonofjoining,image) values('$username','$id','$name','$contact','$email','$address','$gender','$blood','$batch','$reasonofjoining','$uploaded_image')";
        
        $result=mysqli_query($con,$insert);
        if($result){
           header('location:registration.php');
        }
    }
    }



//    if(isset($_POST['login'])){
//        header("Location:login.php");
//    }
//    if(isset($_POST['signup'])){
//        $name=mysqli_real_escape_string($con,$_POST['name']);
//        $username=mysqli_real_escape_string($con,$_POST['username']);
//        $password=mysqli_real_escape_string($con,$_POST['password']);
//        $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
//        
//        if($name!="" || $username!="" || $password!="" || $cpassword!=""){
//        $query = "SELECT username FROM user_login where username='".$username."'";
//        $result=mysqli_query($con,$query);
//        $numResult=mysqli_num_rows($result);
//        
//        if($numResult>=1){
//            echo '<script language="javascript">';
//            echo 'alert("Username already exist !")';
//            echo '</script>';
//        }else{
//            mysqli_query($con,"insert into user_login(name,username,password) values('$name','$username','$password')");
//            header("Location:login.php");   
//        }    
//    }
//    }


if(isset($_POST['deletevent'])){
    $eid=$_POST['eid'];
    $query="Delete from event where eid='$eid'";
    mysqli_query($con,$query);
    header("Location:admin/controlpanel.php"); 
}

    if(isset($_POST['adddate'])){
        $startday=$_POST['startday'];
        $endday=$_POST['endday'];
        $query="Update timelimit set startdate='$startday', enddate='$endday' where recordid=1";
        $result=mysqli_query($con,$query);
        if(!$result){
            echo mysqli_query($con);
        }else{
        header("location:admin/controlpanel.php");
        }
    }

if(isset($_POST['addevent'])){
        $eventname=$_POST['eventname'];
        $eventdate=$_POST['eventdate'];
        $query="Insert into event(eventname,eventdate,status) values('$eventname','$eventdate','yes')";
        $result=mysqli_query($con,$query);
        if(!$result){
            echo mysqli_query($con);
        }else{
            header("location:admin/controlpanel.php");
        }
    }
if(isset($_POST['editevent'])){
    $status=$_POST['status'];
    $eid=$_POST['eid'];
    $query="Update event set status='$status' where eid='$eid'";
   $result= mysqli_query($con,$query);
     if(!$result){
            echo mysqli_query($con);
        }else{
            header("location:admin/controlpanel.php");
        }
    
}




?>