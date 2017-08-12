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

    <title>Tables</title>

    <!-- Bootstrap Core CSS -->
    <link href="../usercss/bootstrap.min.css" rel="stylesheet">

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
          
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name;?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                    <li>
                        <a href="deletedata.php"><i class="fa fa-trash" aria-hidden="true"></i> Manage accounts</a>
                    </li>
                 
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
             <h2>Information table</h2>
                <!-- Page Heading -->
<!--                   <div class="row">-->
                    <div class="col-lg-12">
                    <hr/>
                    <div class="panel panel-default">
                     
                        <div class="panel-heading"><h2>Member list</h2></div>
                      <div class="panel-body">
                          <div class="table-responsive">
                            <center><h4><span class="label label-success" id="disabledm"></span></h4></center>
                             <center><h4><span class="label label-success" id="deletedata"></span></h4></center>
                              <table class="table">
                                 <tr>
                                     <thead>
                                      <th>Name</th>
                                      <th>ID</th>
                                      <th>Course</th>
                                      <th>Usertype</th>
                                      <th>Confirmation</th>
                                      
                                      <th>Disable account</th>
                                  </thead>
                                  <?php 
                                    $query="select name,id,batch,usertype,permit from user_login where usertype='member' and permit='yes' and active='yes'";
                                    $result=mysqli_query($con,$query);
                                     $num_rows=mysqli_num_rows($result);
                                     if($num_rows>=1){
                                     while($row=mysqli_fetch_array($result)){
                                    
                                ?>
                                  <tbody>
                                      <tr class='record'>
                                          <td><?php echo $row['name']?></td>
                                          <td><?php echo $row['id']?></td>
                                          <td><?php echo $row['batch']?></td>
                                          <td><?php echo $row['usertype']?></td>
                                          <td><?php echo $row['permit']?></td>
                                       
                                          
                                          
                                          <td>
                                            <form action="" method="post">
                                              <input type="hidden" value="<?php echo $row['id']?>" id="id" name="id"/>
                                              <i class="fa fa-trash-o" aria-hidden="true"></i> <input type="button" class="btn btn-warning disablemem" value="Disable" id="disable"/>
                                            </form>
                                          </td>
                                      </tr>
                                      
                                  </tbody>
                                 </tr>
                                 <?php }
                                     }else{
                                  ?>
                                  <center><h3><span class="label label-warning">No data found !</span></h3></center>
                                  <?php }?>
                                  
                              </table>
                          </div>
                      </div>
                    </div>
                          
                    </div>
<!--                </div>-->
                
                
                
                  
                    <div class="col-lg-12">
<!--                     <div class="row">-->
                    <hr/>
                    <div class="panel panel-default">
                     
                        <div class="panel-heading"><h2>Non-registered user list</h2></div>
                        
                      <div class="panel-body">
                         <center><h4><span class="label label-success" id="disabled"></span></h4></center>
                          <div class="table-responsive">
                              <table class="table">
                                 <tr>
                                     <thead>
                                      <th>Name</th>
                                      <th>ID</th>
                                      <th>Course</th>
                                      <th>Usertype</th>
                                      <th>Delete</th>
                                      <th>Disable account</th>
                                  </thead>
                                  <?php 
                                    $query="select name,id,batch,usertype from user_login where usertype='user' and active='yes'";
                                    $result=mysqli_query($con,$query);
                                     $num_rows=mysqli_num_rows($result);
                                     if($num_rows>=1){
                                     while($row=mysqli_fetch_array($result)){
                                ?>
                                  <tbody>
                                      <tr class='records'>
                                          <td><?php echo $row['name']?></td>
                                          <td><?php echo $row['id']?></td>
                                          <td><?php echo $row['batch']?></td>
                                          <td><?php echo $row['usertype']?></td>
                                          <td>
                                            <form action="" method="post">
                                              <input type="hidden" value="<?php echo $row['id']?>" id="ids" name="ids" class="ids"/>
                                              <i class="fa fa-trash-o" aria-hidden="true"></i> <input type="button" class="btn btn-danger deleteuser" value="Delete" id="deleteuser"/>
                                            </form>
                                          </td>
                                          
                                          <td>
                                            <form action="" method="post">
                                              <input type="hidden" value="<?php echo $row['id']?>" id="sid" name="sid" class="id"/>
                                              <i class="fa fa-trash-o" aria-hidden="true"></i> <input type="button" class="btn btn-warning disable" value="Disable" id="disable"/>
                                            </form>
                                          </td>
                                      </tr>
                                      
                                  </tbody>
                                 </tr>
                                 <?php }
                                     }else {
                                  ?>
                                  
                                      <center><h3><span class="label label-warning">No data found !</span></h3></center>
                                  <?php }?>
                                  
                              </table>
                          </div>
                      </div>
                    </div>
                          
                    </div>
                    
                    
                    
                      <div class="col-lg-12" id="req">
                        <script>
                        if (window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                        }
                        else {
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.open("GET",'../xml/enableuser.php',false);
                        xmlhttp.send();
                        xmlDoc=xmlhttp.responseXML;

                        var x=xmlDoc.getElementsByTagName("Members");
                            
                            document.write("<table class='table table-bordered'>");
                            document.write("<tr>");
                            document.write("<h2>");
                            document.write("Disabled account");
                            document.write("</h2>");
                            document.write("</tr>");
                            document.write("</table>");
                            
                            document.write("<table class='table table-bordered'>");
                            document.write("<thead>");
                            document.write("<tr class='danger'>");
                            
                            document.write("<th>");
                            document.write("Name");
                            document.write("</th>");
                              
                            
                            document.write("<th>");
                            document.write("ID");
                            document.write("</th'>");
                            
                            
                            document.write("<th>");
                            document.write("Course");
                            document.write("</th>");
                            
                            document.write("<th>");
                            document.write("User tupe");
                            document.write("</th>");
                            
                            
                            
                            document.write("<th>");
                            document.write("Enable account");
                            document.write("</th>");
            
                            document.write("</tr>");
                            document.write("</thead'>");
                              
                            for(i=0;i<x.length;i++){
                            id=x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
                            name=x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
                            batch=x[i].getElementsByTagName("batch")[0].childNodes[0].nodeValue;
                            usertype=x[i].getElementsByTagName("usertype")[0].childNodes[0].nodeValue;
                            
                           
                              
                            document.write("<tbody>");
                            document.write("<tr class='active enable'>");
                                
                        
                            document.write("<td>");
                            document.write(name);
                            document.write("</td>");
                            
                            document.write("<td>");
                            document.write(id);
                            document.write("</td>");
                                
                            
                           
                            
                            document.write("<td>");
                            document.write(batch);
                            document.write("</td>");
                                
                                
                            document.write("<td>");
                            document.write(usertype);
                            document.write("</td>");
                                
                           
                            document.write("<td>");
                            document.write("<form method='post'>");
                            document.write("<input type='hidden' value="+id+" id='sidd' name='sidd'/>");
                            document.write("<i class='fa fa-check' aria-hidden='true'></i> <input type='button' value='Enable account' class='btn btn-success enalbe'>");
                            document.write("</form>");
                            document.write("</td>");
                            
                            document.write("</tr>");
                            document.write("</tbody'");
                            
                        }
                            document.write("</table>");
                           
                       
                    </script>
                </div>
<!--                </div>-->
                
                
                
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
<!--
             <div class="row">
                    <div class="col-lg-12">
                         
                    </div>
            </div>
-->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
<!--
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
-->
      <link rel="stylesheet" href="../usercss/jquery-ui.css"/> 
    <script src="../js/jquery-ui.min.js"></script>
    <script>
      
    
    $(document).ready(function() {
       $(".deleteuser").on('click',function(e) {
        e.preventDefault();
        var id = jQuery(this).prevAll('input[name="ids"]').val();
        if(confirm("Do you want to delete this user ?")){
        $.ajax({
        type:"POST",
        data:{
            id:id,
        },
        url: "../operation/deletedata.php",
         
        success: function(responseText){
            if(responseText==1){
               $("#deleteusers").text("Deleted !!");
                setTimeout(function(){
                    $('#deleteusers').fadeOut();
                    },2000);
            }
        }

        });
         $(this).parents(".records").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
        }
        });
      
    });
        
      $(document).ready(function() {
       $(".disable").on('click',function(e) {
        e.preventDefault();
        var id = jQuery(this).prevAll('input[name="sid"]').val();
        if(confirm("Do you want to disable this user ?")){
        $.ajax({
        type:"POST",
        data:{
            id:id,
        },
        url: "../operation/disableuser.php",
         
        success: function(responseText){
            if(responseText==1){
               $("#disabled").text("Account disabled !!");
                setTimeout(function(){
                    $('#disabled').fadeOut();
                    },2000);
            }
        }

        });
         $(this).parents(".records").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
        }
        });
    });
        
        
    $(document).ready(function() {
       $(".disablemem").on('click',function(e) {
        e.preventDefault();
        var id = jQuery(this).prevAll('input[name="id"]').val();
        if(confirm("Do you want to disable this member ?")){
        $.ajax({
        type:"POST",
        data:{
            id:id,
        },
        url: "../operation/disableuser.php",
         
        success: function(responseText){
            if(responseText==1){
               $("#disabledm").text("Account disabled !!");
                setTimeout(function(){
                    $('#disabledm').fadeOut();
                    },2000);
            }
        }

        });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
        }
        });
    });
        
        
        
        
     $(document).ready(function() {
       $(".enalbe").on('click',function(e) {
        e.preventDefault();
        var id = jQuery(this).prevAll('input[name="sidd"]').val();
        if(confirm("Do you want to enable this member ?")){
        $.ajax({
        type:"POST",
        data:{
            id:id,
        },
        url: "../operation/enableuser.php",
         
        success: function(responseText){
            if(responseText==1){
               $("#enabled").text("Account enabled !!");
                setTimeout(function(){
                    $('#enabled').fadeOut();
                    },2000);
            }
        }

        });
         $(this).parents(".enable").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
        }
        });
    });
    </script>

</body>

</html>
