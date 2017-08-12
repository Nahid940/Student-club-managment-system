<?php 
session_start();
        $con= mysqli_connect("localhost","root","","myproject");
        if(isset($_SESSION["email"])){
        $email=$_SESSION["email"];
        $query="Select name from admin where email='$email'";
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

    <title>Post insert</title>

    <!-- Bootstrap Core CSS -->
    <link href="../usercss/bootstrap.min.css" rel="stylesheet">
    <link href="../usercss/jquery-ui.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


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
                <a class="navbar-brand" href="admin.php">Admin</a>
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
<!--
                <li class="active"><a href="home.php">Home</a></li>
                  <li><a href="#">Page 1</a></li>
                  <li><a href="#">Page 2</a></li> 
                  <li><a href="#">Page 3</a></li>
-->
                
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
                            <a href="login.html"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                
                
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li>
                        <a href="insertpost.php"><i class="fa fa-fw fa-pencil"></i>Share notice and files</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i>Data tables</a>
                    </li>
                    <li>
                        <a href="controlpanel.php"><i class="fa fa-fw fa-edit"></i> Control panel</a>
                    </li>
                     <li>
                        <a href="event.php"><i class="fa fa-fw fa-edit"></i> Event</a>
                    </li>
                 
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            
            
            

            <div class="container-fluid">
                
                
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                               Share
                            <small>post and files</small>
                        </h1>
                        <!--<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-registered"></i>  <a href="registration.php">Registration</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>-->
                    </div>
                </div>
                
<!--
                <div class="row">
                    <div class="col-lg-6">
                        <from action='' enctype="multipart/form-data" method='post' class="form-horizontal">
                        
                         
                        </from>
                    </div>
                </div>
                
-->
            <div class="row">
               <div class="panel panel-success">
                   <div class="panel-heading"><center><h4>Share file</h4></center></div>
               <div class="panel-body">
                <center><h3><span class="label label-success" id="result"></span></h3></center>
                <center><h3><span class="label label-danger" id="error"></span></h3></center>
           
                
              
               <div class="col-lg-12">
               <form action="" method="post" id="fileuploadform" enctype="multipart/form-data">
               
               <div class="col-lg-12">
                   <label class="control-label col-lg-2">File name:</label>
                   
                <div class="form-group show-border col-sm-4">
                   <span class="label label-danger" id="filenamec"></span>
                    <input class="form-control" name="title" id="filetitle" placeholder=" document title" type="text"/>
                </div>

                <label class="control-label col-lg-2">Select date:</label>
                <div class="col-lg-4">
                   <input class="form-control" id="datepicker" name='filedate'/>
                </div>

               </div>

                <div class="col-lg-12">
                
                 <label class="control-label col-lg-2">Select file type:</label>
                 
                 <div class="col-lg-4">
                 <span class="label label-danger" id="filetypec"></span>
                <select class="form-control" id="filetype" name="filetype">
                  <option value="">File type</option>
                  <option value="Result">Result</option>
                  <option value="Tutorial">Tutorial</option>
                  <option value="Notice">Notice</option>
                  <option value="Others">Others</option>
                </select>
                 </div>
                 
                
                <label class="control-label col-lg-2">Select file:</label>
                <span class="label label-info">File type: docx, pdf, xlsx, ppt</span>
                 <span class="label label-danger" id="filec"></span>
                <div class="form-group show-border"> 
                    <span class="btn btn-default btn-file">
                        Browse<input class="" name="fileUpload" id="file" type="file"/>
                    </span>
                    
                </div>
                
                <span class="pull-right">
                    <button class="btn btn-primary" type="button" id="upload" title="Upload">Upload</button>
                </span>
                
                </div>
                
                </form>

            </div>
            </div>
            </div>
             
            </div>
              
              
               
                <div class="row">
                <hr/>
                <div class="panel panel-success">
                <div class="panel-heading"><center><h4>Share notice</h4></center></div>
                <div class="panel-body">
                
                <div class="row">
                    <center><h3><span class="label label-success" id="resultc"></span></h3></center>
                    &nbsp;
                    <div class="col-lg-12">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                    <label class="control-label col-sm-2">Title:</label>
                                    <div class="col-sm-4">
                                       <span class="label label-danger" id="posttitlec"></span>
                                        <input type="text" class="form-control" name="posttitle" id="posttitle" placeholder="Post title">
                                    </div>
                                    
                                    <label class="control-label col-sm-2">Date:</label>
                                    <div class="col-sm-4">
                                         <input class="form-control" id="datepicker1" name='eventdate'>
                                    </div>
                                    
                            </div>
                            <div class="form-group">
                                 <label class="control-label col-lg-2">Author:</label>
                                    <div class="col-lg-4">
                                       <span class="label label-danger" id="authorc"></span>
                                        <input type="text" name="authorname" class="form-control" id="author" placeholder="Author name">
                                    </div>
                                    <label class="control-label col-lg-2">Post keywords:</label>
                                     <div class="col-lg-4">
                                       <span class="label label-danger" id="keywordc"></span>
                                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="keywords">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                             <label class="control-label col-lg-2">Content:</label>
                                <div class="col-lg-10">
                                    <span class="label label-danger" id="contentc"></span>
                                    <textarea name="content" id="content"></textarea>
                                </div>
                            </div>
                            
                       
                           <span class="pull-right">
                            <input type="button" name="post" class="btn btn-primary" id="post" value="Post"/>
                            </span>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                </div>
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        

    </div>
    <!-- /#wrapper -->
    
    
      
   


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
   
    <script src="../js/jquery-ui.js"></script>
<!--        <script src="../js/tinymce.min.js"></script>-->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    
    
<!--
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
    
    
    
    <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
    
    <script>
        
        $(document).ready(function() {
             $('#fileuploadform').formValidation({
                  framework: 'bootstrap',
        icon: {
//            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
                 
        fields: {
            fileUpload: {
                validators: {
                    notEmpty: {
                        message: 'Please select your photo !!'
                    },
                    file: {
                        extension: 'pdf,doc,docx,xls,ppt,zip',
                        type: 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.ms-powerpoint,application/zip',
                        maxSize: 2097152,   // 2048 * 1024
                        message: 'The selected file is not valid !!'
                    }
                }
            },
        }
                 
            });
        });
    </script>
    <script>
   $(document).ready(function () {
    
    var dbDate = "";
    var date2 = new Date(dbDate);
    $("#datepicker,#datepicker1").datepicker({ 
    dateFormat: 'yy-mm-dd',
     minDate:0
    }).datepicker('setDate', date2)
    });
       
    </script>     		    
    <script type="text/javascript">
        
	$(document).ready(function(){
       
		$("#upload").click(function(){
            var filename=$('#filetitle').val();
            var filetype=$('#filetype').val();
            var file=$('#file').val();
            
            
            if(filename==''){
                document.getElementById("filenamec").innerHTML="Type file name !";
            }else if(filetype==''){
                document.getElementById("filetypec").innerHTML="Select file type !";
            }else if(file==''){
                document.getElementById("filec").innerHTML="Select file !";
            }
            
            else{
			var formdata = new FormData($('#fileuploadform')[0]);
//            if(posttitle != ''){
			
				$.ajax({
					type: "POST",
					data:formdata,
                    contentType: false,
                    processData: false,
                    url: "../uploadfile.php",
                    
					success: function(responseText){
                        if(responseText==1){
                           $("#result").text("File uploaded !");
//                              setTimeout(function(){
//                                    $('#result').fadeOut();
//                                },2000);
                        }else {
                            $("#error").text(responseText);
                        }

					}
                 
				});
            }
            
		});
	});
 
        
    $(document).ready(function(){
		$("#post").click(function(){
            tinyMCE.triggerSave(); 
			var posttitle = $('#posttitle').val();
			var datepicker1 = $('#datepicker1').val();
			var author = $('#author').val();
			var keyword = $('#keyword').val();
			var content = $('#content').val();
            
            if(posttitle == ''){
                document.getElementById("posttitlec").innerHTML="Insert post title !";
            }else if(author==''){
                document.getElementById("authorc").innerHTML="Insert post title !";
            }else if(keyword==''){
                document.getElementById("keywordc").innerHTML="Insert post title !";
            }else if(content==''){
                document.getElementById("contentc").innerHTML="Insert post title !";
            }else{
			
				$.ajax({
					type: "POST",
					data:{
						posttitle: posttitle,
                        datepicker1: datepicker1,
                        author: author,
                        keyword: keyword,
                        content: content,
					},
                    url: "../operation/insertpost.php",
                    
					success: function(responseText){
                        if(responseText==1){
                           $("#resultc").text("Post inserted !");
//                            setTimeout(function(){
//                                    $('#resultc').fadeOut();
//                                },2000);
                        }else {
                            $("#resultc").text(responseText);
                        }
                        
					}
                 
				});
            }
            
		});
	});
        
        
	</script> 
    
    

</body>

</html>

