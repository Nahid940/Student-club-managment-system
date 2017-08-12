
<?php
    session_start();
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

    <title>Files</title>
    <link href="usercss/footer-distributed.css" rel="stylesheet">

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
                <a class="navbar-brand" href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <!-- Top Menu Items -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
               
                <ul class="nav navbar-right top-nav">
                    <li class="active"><a href="home.php"><i class="fa fa-home" aria-hidden="true"> </i> Home</a></li>
                    <li><a href="registration.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Registration</a></li>
                    <li><a href="eventregistration.php"><i class="fa fa-check" aria-hidden="true"></i> Event registration</a></li>
                    <li><a href="registrationdata.php"><i class="fa fa-fw fa-user"></i>Profile</a></li>
                    <li><a href="userfeedback.php"><i class="fa fa-pencil" aria-hidden="true"></i> Feedback</a></li>
                
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
					<?php
                    echo $name;
                    ?>
					<b class="caret"></b></a>
					
					
                    <ul class="dropdown-menu">
                        <li>
                            <a href="registrationdata.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i>Update profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login.html"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                            <small>Notice</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-file"></i>  <a href="files.php">Files</a>
                            </li>
                        </ol>
                    </div>
                </div>
                
                
                <div class="panel panel-success">
                <div class="panel-body">
                <div class="row">
                
                <div class="col-lg-6">
                   <h1><small>Turorials</small></h1>
                    <div class="table-responsive"> 
                    <table class="table">
                        <?php 
                        $query="select * from files where type='Tutorial'";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows>=1){
                       
                    ?>
                        <thead>
                            <tr>
                                <th>File name</th>
                                <th>Date</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        
                    <?php
                    while($row=mysqli_fetch_array($result)){?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo $row['file']?>">Download</a></td>
                        </tr>
                    </tbody>
                    <?php  
                        }
                        }else{
                            echo "<center><span class='label label-danger'>No file shared!</span></center>";
                        }
                    ?>
                    </table>
                    </div>
                </div>
                   
                   
                    <div class="col-lg-6">
                    
                    <div class="table-responsive">
                    <h1><small>Results</small></h1> 
                    <table class="table">
                    <?php 
                        $query="select * from files where type='Result'";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows>=1){
                       
                    ?>
                        <thead>
                            <tr>
                                <th>File name</th>
                                <th>Date</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        
                   <?php
                    while($row=mysqli_fetch_array($result)){?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo $row['file']?>">Download</a></td>
                        </tr>
                    </tbody>
                    <?php  
                        }
                        }else{
                            echo "<center><span class='label label-danger'>No file shared!</span></center>";
                        }
                    ?>
                        </table>
                    </div>
                   </div>
                   
                   </div>
                   
                   
                   
                    </div>
                </div>
                
                <div class="panel panel-success">
                    <div class="panel-body">
                    <div class="col-lg-6">
                    <h1><small>Notice</small></h1>
                    <div class="table-responsive"> 
                    <table class="table">
                     <?php 
                        $query="select * from files where type='Notice'";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows>=1){
                       
                    ?>
                        <thead>
                            <tr>
                                <th>File name</th>
                                <th>Date</th>
                                <th>File</th>
                            </tr>
                        </thead>
                   <?php
                    while($row=mysqli_fetch_array($result)){?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo $row['file']?>">Download</a></td>
                        </tr>
                    </tbody>
                    <?php  
                        }
                        }else{
                            echo "<center><span class='label label-danger'>No file shared!</span></center>";
                        }
                    ?>
                        </table>
                    </div>
                   </div>
                   
                   
                    <div class="col-lg-6">
                    <h1><small>Others</small></h1>
                    <div class="table-responsive"> 
                    <table class="table">
                       
                    <?php 
                        $query="select * from files where type='Others'";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows>=1){
                       
                    ?>
                     <thead>
                            <tr>
                                <th>File name</th>
                                <th>Date</th>
                                <th>File</th>
                            </tr>
                        </thead>
                    <?php
                    while($row=mysqli_fetch_array($result)){?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><i class="fa fa-download" aria-hidden="true"></i> <a href="<?php echo $row['file']?>">Download</a></td>
                        </tr>
                    </tbody>
                    <?php  
                        }
                        }else{
                            echo "<center><span class='label label-danger'>No file shared!</span></center>";
                        }
                    ?>
                        </table>
                    </div>
                   </div>
                    </div>
                </div>

                

                
            </div>
            
            <!-- /.container-fluid -->
            
             
            <footer class="footer-distributed">

			<div class="footer-right">

				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>

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
    
    <script>
        $(document).ready(function(){
            $('#button').click(function(){
            var id = $('#id').val();
			var eventname = $('#event').val();
            
			if(eventname==''){
                document.getElementById("eventc").innerHTML="Select Event !!"; 
            }else{

				$.ajax({
					type: "POST",
					data:{
						id: id,
                        eventname: eventname
					},
                    url: "operation/eventreg.php",
                    
					success: function(responseText){
                        if(responseText==1){
                            $("#result").text("You are registered for this event. Thank you.");
                        }else {
                            $("#result1").text("You are already registered for this event !!.");
                        }
					}
                 
				});
			}
            });
        });
    </script>
</body>
</html>
