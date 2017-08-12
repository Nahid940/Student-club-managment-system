<?php 
    session_start();
    date_default_timezone_set("Asia/Dhaka");
   
    $con= mysqli_connect("localhost","root","","myproject");
   if(isset($_SESSION["id"])){
        $id=$_SESSION["id"];
        $query="Select name from user_login where id='$id'";
        $result=mysqli_query($con,$query);
        $row=mysqli_num_rows($result);
        if($row==1){
            $rows=mysqli_fetch_array($result);
            $name=$rows['name'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

    <!-- Bootstrap Core CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
    <link href="usercss/footer-distributed.css" rel="stylesheet">
    <link href="usercss/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="usercss/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="usercss/style.css" rel="stylesheet">
    <link href="usercss/styles.css" rel="stylesheet">
    <link href="usercss/jquery-ui.css" rel="stylesheet">
    
    
<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
  
    
  
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="home.php"><img class="img" src="logo/CodeClub_Logo.png" alt="logo"></a>
            </div>
            <!-- Top Menu Items -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
               
                <ul class="nav navbar-right top-nav">
                    <li class="active"><a href="home.php"><i class="fa fa-home" aria-hidden="true"> </i> Home</a></li>
                    <li><a href="registration.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registration</a></li>
                    <li><a href="eventregistration.php"><i class="fa fa-check" aria-hidden="true"></i> Event registration</a></li>
                    <li><a href="registrationdata.php"><i class="fa fa-fw fa-user"></i>Member information</a></li>
                    <li><a href="userfeedback.php"><i class="fa fa-pencil" aria-hidden="true"></i> Feedback</a></li>
                
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
					<?php
                    
                    echo $name;
                    ?>
					<b class="caret"></b></a>
					
					
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="editprofile.php"><i class="fa fa-fw fa-gear"></i>Update profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <a href="loginform.html"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </div>
       
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Club member rgistration</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-registered"></i>  <a href="registration.php">Registration</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    
                    <?php
                    date_default_timezone_set("Asia/Dhaka");
                    $today=date('Y-m-d',time());
                    
                    //$value="Select * from registration where id='$id'";
                    $value="Select usertype,permit from user_login where id='$id'";
                    $result=mysqli_query($con,$value);
                    $permit=mysqli_fetch_array($result);
                    $numrows=mysqli_num_rows($result);
                    if($permit['permit']=='no' && $permit['usertype']=='member'){
                        echo "<div class='alert alert-warning'>
                              <h2>  <i class='fa fa-check' aria-hidden='true'></i> Your request for club membership is pending.</h2><br/>
                              <span class='label label-primary'>Go to</span> <a href='registrationdata.php'>Profile</a> to view or perint your information.
                        </div>
                        ";
                    }
                    else if($permit['permit']=='yes' && $permit['usertype']=='member'){
                        echo "<div class='alert alert-success'>
                              <strong>Congratulations !<br/></strong> <h2>  <i class='fa fa-check' aria-hidden='true'></i> You are registered for club membership.</h2><br/>
                              <span class='label label-primary'>Go to</span> <a href='registrationdata.php'>Profile</a> to view or print your information.
                        </div>
                        ";
                    }else{
                    
                    //$query="select startdate, enddate from timelimit";
                    $query="select recordid, startdate, enddate from timelimit where status='open'";
                    $result=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($result);
                    
                    if($row['startdate']<=$today && $row['enddate']>=$today){
                    $date1 = strtotime($row['enddate']);
                    $date2 =strtotime($today);
                    $diff = ($date1 - $date2)/86400;
                    if($diff==0){
                        echo "<h3><span class='label label-info'>Last day of registration !!</span></h3>";
                    }else if($diff>=1){
                        echo "<h3 class='text-right'><span class='label label-info'>Remaining time ".$diff." days</span></h3></center>";
                    }  
                     include("regform.php");;
                    
                        
                   
                    }
                    else{
                    echo"<div class='alert alert-danger' >
                              <h2 class='text-center'>Sorry !</h2> <h2 class='text-center'> <i class='fa fa-times' aria-hidden='true'></i> Registration is closed!.</h2><br/>
                                <p class='text-center'>Wait for the next session.</p>
                        </div>
                        ";
                    }
                    }
                    ?>
                    
                </div>
            </div>
            <!-- /.container-fluid -->
        <footer class="footer-distributed">

			<div class="footer-right">

				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
				</p>

				<p>Company Name &copy; 2017</p>
			</div>

		</footer>

        </div>
        <!-- /#page-wrapper -->

    </div>
    
    <script type="text/javascript" src="validation.js"></script>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
  
    
      
    <script type="text/javascript">
	$(document).ready(function(){
		$("#reg").click(function(){
            var id=$('#rid').val();
            var recordid=$('#recordid').val();

          
				$.ajax({
					type: "POST",
					data:{id:id},
                    url: "regoperation.php",
					success: function(responseText){
                        if(responseText==1){
                           $("#result").text("Your registration is complete !!");
                            setTimeout(function(){
                            $('#result').fadeOut();
                            location.reload();
                        },4000);
                        }
                      
                         
					},
				});
			
            
		});
	});
	
	</script>

</body>
</html>
