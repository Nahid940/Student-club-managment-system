
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

    <title>Profile information</title>

    <!-- Bootstrap Core CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
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
       <link href="usercss/footer-distributed.css" rel="stylesheet">
       
    <script>
        
    function printPageArea(info){
    var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(info).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
    }
    </script>
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
                            <small>Your details</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-file"></i> <a href="registrationdata.php">Profile</a>
                            </li>
                        </ol>
                        <span class="glyphicon glyphicon-print"></span>
                        <button type="button" class="btn btn-primary" onclick="printPageArea('info')">Print</button>
                        
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="col-lg-12" id="info">
                   <h2>Member information</h2>
                   
                    <?php 
                        $con=mysqli_connect("localhost","root","","myproject");
                        $value="select * from user_login where id='$id' and usertype='member'";
                        $result=mysqli_query($con,$value);
                        $numrows=mysqli_num_rows($result);
                        $rows=mysqli_fetch_array($result,MYSQLI_ASSOC);
                        
                      if($numrows==0){
                            echo "<div class='alert alert-danger'>
                                  <center><strong>No information found!! <br/></strong><h2><i class='fa fa-times' aria-hidden='true'></i> You are not a club member yet.</h2></center> 
                                  <br/>
                                  <center><h4>Get registered on due time and be a club member.</h4></center>
                                </div>";
                        }else{
                    ?> 
<!--                <form action="" method="post">-->
                    <div class="panel panel-default">
                    <div class="panel-body">
                    
                   <div class="table-responsive">
                   
                    <div class="col-md-1">
                          <img src="<?php echo $rows['image']; ?>" alt="" height="150px" width="150px" title="image"/>
                    </div>
                    <table class="table table-inverse table-hover">
                      
                        <tr>
                            <td><strong>Name :</strong> </td>
                            <td><?php echo $rows['name']?></td>
                            <td><strong>ID:</strong> </td>
                            <td><?php echo $rows['id']?></td>
                        </tr>
                        <tr>
                            <td><strong>Contact no. :</strong> </td>
                            <td><?php echo $rows['contactno']?></td>
                            <td><strong>Address :</strong> </td>
                            <td><?php echo $rows['address']?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Email : </strong></td>
                            <td><?php echo $rows['email']?></td>
                            <td><strong>Gender :</strong> </td>
                            <td><?php echo $rows['gender']?></td>
                            
                        </tr>
                        <tr>
                           <td><strong>Blood group :</strong> </td>
                            <td><?php echo $rows['bloodgroup']?></td>
                            <td><strong>Batch :</strong> </td>
                            <td> <?php echo $rows['batch']?></td>
                        </tr>
                        
                        <tr>
                           <td><strong>Facebook ID:</strong> </td>
                            <td><?php echo $rows['fcaebookidname']?></td>
                            <td><strong>FB profile link :</strong> </td>
                            <td> <?php echo $rows['facebookprofilelink']?></td>
                        </tr>
                    </table>
                    </div>
                    
<!--                </form>-->
                    </div>
                    </div>
              <?php }?>
                    
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
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

