<?php
//    session_start();
    $con= mysqli_connect("localhost","root","","myproject");
//    if(isset($_SESSION["id"])){
//        $id=$_SESSION["id"];
//        $query="Select name from user_login where id='$id'";
//        $result=mysqli_query($con,$query);
//        $row=mysqli_num_rows($result);
//        if($row==1){
//            $rows=mysqli_fetch_array($result);
//            $name=$rows['name'];
//        }
//    }
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
                     <ul class="nav navbar-right top-nav">
                    <li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"> </i> Home</a></li>
                    <li class="active"><a href=""><i class="fa fa-exclamation" aria-hidden="true"></i> Instructions</a></li>
                    <li class="active"><a href=""><i class="fa fa-list" aria-hidden="true"> </i> About</a></li>
                    <li class="active"><a href="loginform.html"><i class="fa fa-key" aria-hidden="true"></i> Login</a></li>
                    <li class="active"><a href="regiform.php"><i class="fa fa-user" aria-hidden="true"></i> Sign up</a></li>
            </ul>
                    
                
<!--
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
					<?php
                    
                    //echo $name;
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
-->
            </ul>
            </div>
      
        </nav>

        <div id="page-wrapper">
            
        <div class="container-fluid">
                
                
                <!-- Page Heading -->
              
                
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
             
             <?php
//                    date_default_timezone_set("Asia/Dhaka");
//                    $today=date('Y-m-d',time());
//                   $query="select recordid, startdate, enddate from timelimit where status='open'";
//                    $result=mysqli_query($con,$query);
//                    $row=mysqli_fetch_array($result);
//                    
//                    if($row['startdate']<=$today && $row['enddate']>=$today){
//                    $date1 = strtotime($row['enddate']);
//                    $date2 =strtotime($today);
//                    $diff = ($date1 - $date2)/86400;
//                    if($diff==0){
//                        echo "<h3><span class='label label-info'>Last day of registration !!</span></h3>";
//                    }else if($diff>=1){
//                        echo "<h3><span class='label label-info'>Remaining time ".$diff." days</span></h3>";
//                    }
//                    include("regform.php");
//                    
//                    }
//                    else{
//                    echo"<div class='alert alert-danger' >
//                              <h2 class='text-center'>Sorry !</h2> <h2 class='text-center'> <i class='fa fa-times' aria-hidden='true'></i> Registration is closed!.</h2><br/>
//                                <p class='text-center'>Wait for the next session.</p>
//                        </div>
//                        ";
//                    }
                    
            ?>           <form action="" method="post" enctype="multipart/form-data"  id="regform" name="regform">
<input type="hidden" name="recordid" id="recordid" value="<?php echo $row['recordid'];?>"/>

<div id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h3 class="text-center">Sign up</h3>
          <h5><span class="label label-success" id="result"></span></h5>
          <span  id="login"><a href="loginform.html">Log in</a></span>
      </div>
      
      <div class="modal-body">
<!--            <div class="col-lg-12">-->
           
           <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
            <label for="">Name</label>
            <span class="must"> *</span>
            <span class="label label-danger" id="name"></span>
            <input class="form-control " type="text" name="name" placeholder="personname" id='personname'/>
            </div>
            
            </div>
            
            <div class='col-lg-6'>
            <div class="form-group">
            <label for="">ID</label>
            <span class="must"> *</span>
            <span class="label label-danger" id="idc"></span>
            <input type="text" class="form-control " placeholder="ID" name="id" id="id"/>
            </div>

       
            </div>
            
            </div>
            
<!--            ..........................-->
            
            <div class="row">
          
            
<!--            </div>-->
       
            
<!--        <div class="col-lg-12">-->
<!--        <div class="row">-->
            <div class='col-lg-6'>
            <div class="form-group">
            <label for="">Contact no.</label>
            <span class="must"> *</span>
            <span class="label label-danger" id="contactc"></span>
                 <input type="text" class="form-control" id="contact" placeholder="Contact No.*" name="contact"/>
            </div>
            </div>
            
            <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Address</label>
                      <span class="must"> *</span>
                       <span class="label label-danger" id="addressc"></span>
                        <input type="text" class="form-control" id="address" placeholder="Address*" name="address"/>
                    </div>
                </div>
            </div>
<!--            ..........................-->
            
            
            <div class="row">
            
            <div class='col-lg-6'>
            <div class="form-group">
            <label for=""  class="control-label ">Email</label>
            <span class="must"> *</span>
            <span class="label label-danger" id="emailc"></span>
            <input type="text" class="form-control" id="email" placeholder="Email*" name="email"/>
            </div>
            </div>
<!--            </div>-->
            
            
                <div class="col-lg-6">
                  
                   <div class="form group">
                        <span class="label label-danger" id="optradioc"></span>
                         <label class="control-label ">Gender : </label>
                           <span class="must"> *</span>
                            <label class="radio-inline">
                              <input type="radio" name="optradio" value="Male" id="optradio"/>Male
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio" value="Female" id="optradio"/>Female
                            </label>
                        </div>
                     </div>
            </div>
               <div class="row">
                <div class="col-lg-6">
                       <div class="form-group">
                       <label for="">Blood group</label>
                       <span class="must"> *</span>
                       <span class="label label-danger" id="bloodc"></span>
<!--                              <label class="control-label col-lg-2">Blood Group* : </label>-->
                            
                                <select name="blood" id="blood"  class="form-control">
                                    <option value="">--Select Blood Group--</option>
                                    <option value="A+">A+</option>
                                    <option value="O+">O+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="A-">A-</option>
                                    <option value="O-">O-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                        </div>
                        
                </div>
                  <div class="col-lg-6">
                   <div class="form-group">
<!--						   <label class="control-label col-lg-2">Batch* : </label>-->
                             
                     <label for="">Select course</label>
                      <span class="must"> *</span>
                       <span class="label label-danger" id="batchc"></span>
                        <select name="batch" id="batch" class="form-control">
                            <option value="">--Select course--</option>
                            <option value="IFY">IFY</option>
                            <option value="L4DC">L4DC</option>
                            <option value="L5DC">L5DC</option>
                            <option value="BIT">BIT</option>
                        </select>
                     </div>
				</div>
           </div>
           
<!--      </div>-->
            
                 
            <div class="col-lg-12">
            <div class="row">
            <div class='col-lg-6'>
                <div class="form-group">
                <label for="">Password</label>
                <span class="must"> *</span>
                <span class="label label-danger" id="error1"></span>
                    <input type="password" class="form-control " placeholder="Password" name="password" id="password"/>
                </div>

            </div>
               
            <div class="col-lg-6">
                <div class="form-group">
                <label for="">Confirm password</label>
                <span class="must"> *</span>
                <span class="label label-danger" id="error"></span>
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword"/>


                </div>
            </div>
            
            
            </div>  
                
            </div>
            
            
            <div class="col-lg-12">
                <div class="row">
                   
                <div class="col-lg-6">
                    <div class="form-group">
                                <label class="control-label">Facebook ID name : </label>
                                <input type="text"  class="form-control"  name="fcaebookidname" id="fcaebookidname"/>
                 
                    </div>
                    </div>
                    
                    
                   
                    <div class="col-lg-6">
                         <div class="form-group">
                                   <label class="control-label">Facebook profile link : </label>
                                <input type="text"  class="form-control" name="facebookprofilelink" id="facebookprofilelink"/>
                        </div>
                    </div>
            </div>
      </div>
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="form-group">
                    <div class="form-group show-border"> 
<!--                            <span class="btn btn-default btn-file">-->
                                <label class="control-label">Browse image  : </label>
                                <span class="must">*</span>
                                <span class='label label-danger' id="imagec"></span>
                                <span class="label label-primary">File type : jpeg, jpg, png || Max size : 30 kb</span>
                                <input class="form-control" id="image" name="image" type="file"/>
<!--                            </span>-->

<!--                        </div>-->
                </div>
            
                    </div>
                </div>
            </div>
            
<!--
            <div class="col-lg-12">
                <div class="row">
                    <div class="form-group">
                         <label class="control-label">Reason of joining : </label>
                            <span class="must">*</span>
                            <span class='label label-danger' id="reasonofjoiningc"></span>
                            <textarea class="form-control" rows="5" name="reasonofjoining" id="reasonofjoining"></textarea>
                    </div>
                </div>
            </div>
-->

           
            <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block button" type="button" name="signup" id="button">Sign up</button>
            
            </div>
			
            <span> Go to <a href="loginform.html">Log in</a></span>
  </div>
  </div>
    </div>
     </div>
</form>
                       
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

    
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

 <script type="text/javascript">   
	$(document).ready(function(){
        document.getElementById('login').hidden = "hidden";
		$(".button").on('click',function(e){
            e.preventDefault();
           
			var personname = $('#personname').val();
			var id = $('#id').val();
            var contact = $('#contact').val();
            var email = $('#email').val();
			var address = $('#address').val();
			var blood = $('#blood').val();
			var batch = $('#batch').val();
			var password = $('#password').val();
			var cpassword = $('#cpassword').val();
			
            
//            var $email = $('form input[name="email');
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            
            var gender = document.getElementsByName('optradio');

            for (var i = 0, length = gender.length; i < length; i++) {
                if (gender[i].checked) {
                    // do whatever you want with the checked radio
                    var gen =(gender[i].value);

                    // only one radio can be logically checked, don't check the rest
                    break;
                }
            }
       
            if(personname==''){
                document.getElementById("name").innerHTML="Enter name !!"; 
            }else if(id=='' || isNaN(id) || id.length<7 || id.length>7){
                 document.getElementById("idc").innerHTML="Enter valid ID !!"; 
            }
            else if(contact==''){
                 document.getElementById("contactc").innerHTML="Enter contact no. !!"; 
            }
            else if(email=='' || !re.test(email)){
                 document.getElementById("emailc").innerHTML="Enter valid email address !!"; 
            } 
            else if(address==''){
                 document.getElementById("addressc").innerHTML="Enter your address !!"; 
            }else if(!gen){
                 document.getElementById("optradioc").innerHTML="Select gender !!"; 
            }else if(blood==''){
                 document.getElementById("bloodc").innerHTML="Select your blood group !!"; 
            }else if(batch==''){
                 document.getElementById("batchc").innerHTML="Select your batch !!"; 
            }else if(password=='' || password.length<5){
                 document.getElementById("error1").innerHTML="Enter password properly!!"; 
            }else if(cpassword==''){
                 document.getElementById("error").innerHTML="Re enter password !!"; 
            }else if(cpassword != password){
                 document.getElementById("error").innerHTML="Password doesn't match !!"; 
            }
            
            else{
                var formdata = new FormData($('#regform')[0]);
				$.ajax({
					type: "POST",
					data:formdata,
                    url: "operation/signupoperation.php",
                    contentType:false,
                    processData:false,
					success: function(responseText){
                        if(responseText==1){
                           $("#result").text("Sign up complete");
                            $("#login").show();
                        }else if(responseText==0){
                            $("#result").text("ID already exist !!");
                        }   else{
                            $("#result").text(responseText)
                        }     
					}
				});
			}
		});
	});
	</script>

</body>

</html>


