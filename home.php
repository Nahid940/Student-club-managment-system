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

    <title>Home</title>

    <!-- Bootstrap Core CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
    <link href="usercss/footer-distributed.css" rel="stylesheet"/>
    <link href="usercss/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="usercss/sb-admin.css" rel="stylesheet" type="text/css"/>
    <link href="usercss/style.css" rel="stylesheet" type="text/css"/>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
    </style>
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
                           <small>Welcome</small>
                            <?php echo $name ?>
                            
                        </h1>
                     
                    </div>
                </div> 
                
                <div class="row">
                  <div class="col-lg-8">
                       <div class="jumbotron">
                            <h1>E-Club</h1>      
                            <p>E-club helps you to get connected with club at any time any where.</p>
                          </div>
                        </div>
                  
                  <div class="col-lg-4" style="border-left:solid 1px white">
                        <center><h2><i class="fa fa-list" aria-hidden="true"></i> Recent Activities</h2></center>
                        
                    <div class="panel panel-default">
                        <div class="list-group">
                            <a href="registration.php" class="list-group-item list-group-item-success" id="regdate">Registration is closed !</a>
                            <a href="eventregistration.php" class="list-group-item list-group-item-success" id="eventcheck"></a>
                            <a href="notice.php" class="list-group-item list-group-item-success" id="notice"></a>
                            <a href="files.php" class="list-group-item list-group-item-success" id="files"></a>
                        </div>
                    </div>
                  </div>
                </div>
                </div>
                <!-- /.row -->
                
                
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
       
        <form action="" method="post">
            <input type="hidden" id="id" value="<?php echo $id ?>"/>
        </form>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script>
	$(document).ready(function(){
        var id=$('#id').val();
        $.ajax({
                type:'POST',
                data:{
                    id:id,
                },
            url: "operation/regdatecheck.php",
            success: function(responseText){
                if(responseText==1){
                   $("#regdate").text("Member registration is going on.");
                }else if(responseText==0){
                   $("#regdate").text("Member registration is not going on.");
                }
                else{
                    $("#regdate").text(responseText);
                }
            }
        });

	});
        
    $(document).ready(function(){
    
    $.ajax({
       
        url: "operation/eventcheck.php",
        success: function(responseText){
            $("#eventcheck").text(responseText);
        }
    });

	});
        
    $(document).ready(function(){
        
    $.ajax({
    url: "operation/post.php",
    success: function(responseText){
        $("#notice").text(responseText);
    }
    });

	});
        
        
    $(document).ready(function(){
    $.ajax({
        url: "operation/files.php",
        success: function(responseText){
            if(responseText==0){
                $("#files").text("No files shared yet !");
            }else{
                $("#files").text(responseText);
            }
        }
    });

	});
	</script>

</body>

</html>


