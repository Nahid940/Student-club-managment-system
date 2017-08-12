
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

//    $editQuery="Select * from user_login where id='$id'";
    $editQuery="select name,id,contactno,address,email,gender,bloodgroup,batch from user_login where id='$id'";
    $result=mysqli_query($con,$editQuery);
    $rows=mysqli_fetch_array( $result,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update information</title>

    <!-- Bootstrap Core CSS -->
    <link href="usercss/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="usercss/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
       <link href="usercss/style.css" rel="stylesheet"/>
       <link href="usercss/footer-distributed.css" rel="stylesheet"/>
       
     
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
                           
                            <small>Update profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-registered"></i>  <a href="editprofile.php">Update profile</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                   <center><h3><span class="label label-success" id="result"></span></h3></center>
                    <h2>Edit your information</h2>
                    <div class="panel panel-default">
                    <div class="panel-body">
                    <form action="" method="post" enctype="multipart/form-data"  name="form" id="updateform">
                   
                         <div class="form-group">
                                <input type="hidden" id="id" name="id" value="<?php echo $rows['id']?>">
                        
                            <label class="control-label col-lg-2">Name : </label>
                            
                             <div class="col-lg-4">
                                 <input type="text" class="form-control" id="name" placeholder="Name*" name="name" value="<?php echo $rows['name']?>">
                                 
                             </div>
                             
                            <label class="control-label col-lg-2">Email : </label>
                             <div class="col-lg-4">
                                 <input type="text" class="form-control" id="email" placeholder="Email*" name="email" value="<?php echo $rows['email']?>">
                             </div>
                             
<!--
                            <label class="control-label col-lg-1">Username: </label>
                            <div class="col-lg-3">
                            <input type="text" name="username" class="form-control" id='username' value="<?php echo $rows['username'];?>">
                            </div>
-->
                        </div>

                         <div class="form-group">
                              <label class="control-label col-lg-2">Contact No. : </label>
                             <div class="col-lg-4">
                                <input type="text" class="form-control" id="contactno" placeholder="Contact No.*" name="contactno" value="<?php echo $rows['contactno']?>">
                             </div>
                             
                            <label class="control-label col-lg-2">Address : </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="address" placeholder="Address*" name="address" value="<?php echo $rows['address']?>">
                            </div>
                            
                           
                        </div>
                        
                        
                        <div class="form-group">
                              
                              
                             <div class="col-lg-4">
                               <label class="control-label ">Blood Group* : </label>
                                <select name="blood" id="blood" class="form-control">
                                    <option value="">--Select Blood Group--</option>
                                    <option value="A+" <?php if($rows['bloodgroup']=='A+') echo 'selected="selected"';?>>A+</option>
                                    <option value="O+" <?php if($rows['bloodgroup']=='O+') echo 'selected="selected"';?>>O+</option>
                                    <option value="B+" <?php if($rows['bloodgroup']=='B+') echo 'selected="selected"';?>>B+</option>
                                    <option value="AB+" <?php if($rows['bloodgroup']=='AB+') echo 'selected="selected"';?>>AB+</option>
                                    <option value="A-" <?php if($rows['bloodgroup']=='A-') echo 'selected="selected"';?>>A-</option>
                                    <option value="O-" <?php if($rows['bloodgroup']=='O-') echo 'selected="selected"';?>>O-</option>
                                    <option value="B-" <?php if($rows['bloodgroup']=='B-') echo 'selected="selected"';?>>B-</option>
                                    <option value="AB-" <?php if($rows['bloodgroup']=='AB-') echo 'selected="selected"';?>>AB-</option>
                                </select>
                             </div>
                             
                             
                             
                             <div class="col-lg-4">
                                 <label class="control-label">Gender: </label>
                                 &nbsp;
                                <label class="radio-inline"><input type="radio" name="optradio" value="Male" id="optradio" <?php if($rows['gender']=='Male') echo 'checked="checked"';?>>Male</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="Female" id="optradio" <?php if($rows['gender']=='Female') echo 'checked="checked"';?>>Female</label>
                             </div>
                             
                            <div class="col-lg-4">
                            <label class="control-label">Batch : </label>
                            <select name="batch" id="batch" class="form-control">
                                    <option value="">--Select Batch--</option>
                                    <option value="IFY" <?php if($rows['batch']=='IFY') echo 'selected="selected"';?>>IFY</option>
                                    <option value="L4DC" <?php if($rows['batch']=='L4DC') echo 'selected="selected"';?>>L4DC</option>
                                    <option value="L5DC" <?php if($rows['batch']=='L5DC') echo 'selected="selected"';?>>L5DC</option>
                                    <option value="BIT" <?php if($rows['batch']=='BIT') echo 'selected="selected"';?>>BIT</option>
                                </select>
                            </div>

                        </div>
                        &nbsp;

                        
                    <div class="form-group">
                       <div class="col-bg-6 pull-right">
                            <button type="button" name="button" id="button" class="btn btn-primary" align="center">Update</button>
                        </div>
                    </div>
                        
                
                    </form>
                    </div>
                </div>
                
              
                
                
                <div class="col-lg-12">
                   &nbsp;
                    <ol class="breadcrumb">
                        <li>
                            
                        </li>
                    </ol>
                    <div class="col-lg-3">
                    <h3><span class="label label-success" id="cpresult"></span></h3>
                    <h3><span class="label label-danger" id="wrongresult"></span></h3>
                     <h3><span class="label label-primary">Change password</span></h3>
                    <form action="" method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo $rows['id']?>">
                    <div class="form-group">
                    <span class="label label-danger" id="error"></span>
                    <label for="">Old password : </label>
                    <span class="label label-danger" id="oldpasswordc"></span>
                    <input type="password" class="form-control " placeholder="Old password" name="oldpassword" id="oldpassword"/>
                    <label for="">New password :</label>
                    <span class="label label-danger" id="newpasswordc"></span>
                    <input type="password" class="form-control" placeholder="New Password" name="newpassword" id="newpassword"/>
                    <label for="">Confirm new password :</label>
                    <span class="label label-danger" id="cnewpasswordc"></span>
                    <input type="password" class="form-control" placeholder="Confirm new Password" name="cnespassword" id="cnewpassword"/>
                    </div>
                    <div class="col-bg-3 pull-right">
                         <button type="button" name="button" id="editpassword" name="editpassword" class="btn btn-primary" align="center">Save</button>
                     </div>
                    
                    </form>
                    </div>

                    </div> 
                </div>
            </div>
                
            </div>
            <!-- /.container-fluid 
            
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
    
    
    <script type="text/javascript">
        
	$(document).ready(function(){
        $("#editpassword").click(function(){
       var oldpassword = $('#oldpassword').val();
       var newpassword = $('#newpassword').val();
       var cnewpassword = $('#cnewpassword').val();
       var id = $('#id').val();
    
        if(oldpassword==''){
            document.getElementById("oldpasswordc").innerHTML="Enter old password !!";
        }else if(newpassword==''){
            document.getElementById("newpasswordc").innerHTML="Enter new password !!";
        }else if(newpassword.length<5){
            document.getElementById("newpasswordc").innerHTML="Password must be five cahracter long !!";
        }else if(cnewpassword==''){
            document.getElementById("cnewpasswordc").innerHTML="Confirm new password !!";
        }else if(newpassword != cnewpassword){
            document.getElementById("cnewpasswordc").innerHTML="Password doesn't match !!";
        }else{
				$.ajax({
					type: "POST",
                    data:{
                        oldpassword: oldpassword,
                        newpassword: newpassword,
                        id: id
					},
                    url: "operation/updatepassword.php",
					success: function(responseText){
//                           $("#cpresult").text(responseText);
                        if(responseText==1){
                             $("#cpresult").text("Password updated !");
                        }else{
                            $("#wrongresult").text("Password doesn't match !");
                        }
                            
					},
                    
				});
			}
            
		});
	});
        

        $(document).ready(function(){
		$("#button").click(function(){
            var formdata = new FormData($('#updateform')[0]);
				$.ajax({
					type: "POST",
					data:formdata,
                    url: "operation/updateprofile.php",
                    contentType:false,
                    processData:false,
                    
					success: function(responseText){
                        if(responseText==1){
                           $("#result").text("Information updated !");
                            setTimeout(function(){
                            $('#result').fadeOut();
                            },2000);
                        }
                        else{
                            $("#result").text(responseText);
                        }
                                      
					},
                    
				});
//			}
            
		});
	});
	
    </script>

</body>
</html>


