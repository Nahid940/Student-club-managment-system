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

    <title>Feedback</title>

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
       <link href="usercss//jquery-ui.css" rel="stylesheet">
<!--
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
-->
   
  
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
                            Hello
                            <small>Register here...</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-registered"></i>  <a href="userfeedback.php">User feedback</a>
                            </li>
                          
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="container">
                  <h2>Give your feedback regarding club activity</h2>
                  <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <hr/>
                        <div class="col-lg-12">
                        
                        <form class="form-horizontal">
                          <div class="form-group">
                     
                          </div>
<!--
                          <div class="form-group">
                           <div class="col-sm-6"> 
                          
                           <label class="control-label">Are you a registered club member : </label>
                           <span class="label label-danger" id="optradioc"></span>
                           
                            <div class="radio">
                            <label class="radio-inline">
                              <input type="radio" name="optradio" value="Yes" id="optradio"/>Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio" value="No" id="optradio"/>No
                            </label>
                            </div>
                            </div>
                          </div>
-->
                          
                      
                          <div class="form-group"> 
                            <div class=" col-sm-6">
                            
                            <label class="control-label ">Your experience on club activity  :   </label>
                             <span class="label label-danger" id="optradio1e"></span>
                            <div class="radio">
                            <label class="radio-inline">
                              <input type="radio" name="optradio1" value="Good" id="optradio1"/>Good
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio1" value="Not so good" id="optradio1"/>Not so good
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio1" value="Bad" id="optradio1"/>Bad
                            </label>
                            </div>
                            
                            </div>
                          </div>
                          
                          
                           <div class="form-group"> 
                            <div class=" col-lg-10">
                            <label class="control-label ">Are you satisfied with current club activities : </label>
                             <span class="label label-danger" id="optradio2e"></span>
                             <div class="radio">
                            <label class="radio-inline">
                              <input type="radio" name="optradio2" value="Yes" id="optradio2"/>Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio2" value="No" id="optradio2"/>No
                            </label>
                            </div>
                         
                            </div>
                          </div>
                          
                          <div class="form-group">
                             <div class="col-sm-10">
                            
                             <label class="control-label">Your feedback: </label>
                                 <span class="label label-danger" id="result2"></span>
                                  <textarea name="content" class="form-control" rows="6" id="content"></textarea>
                             </div>
                             
                          </div>
                          
                          
                            <div class="form-group"> 
                                <div style="float:right;margin-right:10%">
                                  <input type="button" class="btn btn-success button" id="button" value="Submit">
                                </div>
                            </div>
                            
                          
                        </form>
                       
                            <center><h3><span class="label label-success" id="result"></span></h3></center>
                            <center><h3><span class="label label-danger" id="result1"></span></h3></center>
                        </div>
    
                     
                       
                       </div>
                       
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="sid" value="<?php echo $id?>" id="sid"/>
                    </form>
                    
                    <div id='load'></div>
                    
                    
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
    <script src="js/jquery-ui.js"></script>
    
<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>-->
<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>-->
   
<!--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
    
    <script type="text/javascript">
  
	$(document).ready(function(){
         
		$(".button").on('click',function(e){
            e.preventDefault();
			var id = $('#sid').val();
			var content = $('#content').val();
           
            var optradio1 = document.getElementsByName('optradio1');
            var optradio2 = document.getElementsByName('optradio2');
            
             if( !(optradio1[0].checked || optradio1[1].checked || optradio1[2].checked)){
                $("#optradio1e").text("Select one option !!");
            }else if( !(optradio2[0].checked || optradio2[1].checked)){
                 $("#optradio2e").text("Select one option !!");
            }else if(content==''){
                 $("#result2").text("Give information properly !!");
            }else{
                
            
    

            for (var i = 0, length = optradio1.length; i < length; i++) {
               
                if (optradio1[i].checked) {
                    // do whatever you want with the checked radio
                    var optradio1 =(optradio1[i].value);

                    // only one radio can be logically checked, don't check the rest
                    break;
                }
            }
            
            
               for (var i = 0, length = optradio2.length; i < length; i++) {
                if (optradio2[i].checked) {
                    // do whatever you want with the checked radio
                    var optradio2 =(optradio2[i].value);

                    // only one radio can be logically checked, don't check the rest
                    break;
                }
            }
            }
            
            
            if(content !='' &&  optradio1!='' && optradio2!=''){
//                
       
				$.ajax({
					type: "POST",
                  
					data:{
						id: id,
						optradio1: optradio1,
						optradio2: optradio2,
						content: content,
					},
                    url: "operation/feedback.php",
					success: function(responseText){
                        
                        if(responseText==1){
                           $("#result").text("Thank you for your feedback. We will evaluate it soon.");
                             setTimeout(function(){
                                $('#result1').fadeOut();
                            },1000);
                            
                        }else if(responseText==0){
                            $("#result1").append("You can post only one feedback per day !");
                            
                        }else{
                            $("#result").text(responseText);
                        }
                                      
					},
               
                 
				});
            }
		
		});
	});
        
        $(document).ready(function(){
            var id = $('#sid').val();
            $.ajax({
					type: "POST",
					data:{
						id: id,
					},
                    url: "eventfeedbackform.php",
					success: function(data){          
                        $('#load').html(data);            
					},
               
				});
            
        });
        
	</script>

</body>
</html>
