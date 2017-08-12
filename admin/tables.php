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
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $name?> <b class="caret"></b></a>
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

                   
                     <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><center><h3>Registered members</h3></center></div>
                      <div class="panel-body">
                         <?php 
                            $regmembers="select name,id,contactno,address,email,gender,bloodgroup,batch,fcaebookidname,facebookprofilelink from user_login where usertype='member' and permit='yes'";
                        
                            $getvaluesss=mysqli_query($con, $regmembers);
                          ?>
                          <div class="table-responsive">
                          <table class="table" id="registeredmember">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact no.</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Blood group</th>
                                        <th>Course</th>
                                        <th>Facebook ID name</th>
                                        <th>Facebook profile name</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                   <?php while($row=mysqli_fetch_array($getvaluesss)){?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['contactno']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><?php echo $row['bloodgroup']?></td>
                                        <td><?php echo $row['batch']?></td>
                                        <td><?php echo $row['fcaebookidname']?></td>
                                        <td><?php echo $row['facebookprofilelink']?></td>
                                       
                                    </tr>
                                    <?php }?>
                                </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                </div>
                    
                    
             <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><center><h3>User list</h3></center></div>
                      <div class="panel-body">
                         <?php 
                            $values="select name,id,contactno,address,email,gender,bloodgroup,batch from user_login where usertype='user'";
                            $getvalues=mysqli_query($con,$values);
                            
                          ?>
                          <div class="table-responsive">
                          <table class="table" id="usertable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact no</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Blood group</th>
                                        <th>Course</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                   <?php while($row=mysqli_fetch_array($getvalues)){?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['contactno']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><?php echo $row['bloodgroup']?></td>
                                        <td><?php echo $row['batch']?></td>
                                        
                                    </tr>
                                    <?php }?>
                                </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                </div>
              

             
              <div class="col-lg-12" id="pending">
                    <div class="panel panel-info">
                        <div class="panel-heading"><center><h3>Pending member request</h3></center></div>
                      <div class="panel-body">
                         <?php 
                            $confirmmember="select name,reg.id,batch,permit from user_login usg, registration reg where usg.id=reg.id and usertype='member' and permit='no'";
                            $getvaluess=mysqli_query($con,$confirmmember);
                          ?>
                          <div class="table-responsive">
                          <table class="table" id="pendingmemberrequest">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Confirm membership</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                   <?php while($row=mysqli_fetch_array($getvaluess)){?>
                                    <tr class="permit">
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['batch']?></td>
                                        
                                        <td>
                                            <form action="" method="post">
                                                <input type='hidden' value="<?php echo $row['id']?>" id='id' name='id'/>
                                                <i class='fa fa-check' aria-hidden='true'></i> <input type='button' value='Confirm' class='btn btn-success confirm'/>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                </div>
              
               
                <!-- /.row -->
                <div class="col-lg-12" id="req">
                    <div class="panel panel-info">
                        <div class="panel-heading"><center><h3>Pending participants request</h3></center></div>
                      <div class="panel-body">
                         <?php 
                            $value="select ulg.id,ev.eid,name,batch,eventname,usertype from user_login ulg, event ev, studentevent sev where ulg.id=sev.id and ev.eid=sev.eid and confirm='no'";
                            $getvalue=mysqli_query($con,$value);
                            
                          ?>
                          <div class="table-responsive">
                          <table class="table" id="pendingrequest">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>User type</th>
                                        <th>Event name</th>
                                        <th>Confirm</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                   <?php while($row=mysqli_fetch_array($getvalue)){?>
                                    <tr class="confirm">
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['batch']?></td>
                                        <td><?php echo $row['usertype']?></td>
                                        <td><?php echo $row['eventname']?></td>
                                        <td>
                                           <form action="" method="post">
                                            <input type='hidden' value="<?php echo $row['id']?>" id='sid' name='sid'/>
                                            <input type='hidden' value="<?php echo $row['eid']?>" id='eid' name='eid'/>
                                            <i class='fa fa-check' aria-hidden='true'></i> <input type='button' value='Confirm' class='btn btn-success eventconfirm'/>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->
             
                 

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.confirm').on('click',function(){
                var id = jQuery(this).prevAll('input[name="id"]').val();
                $.ajax({
					type: "POST",
					data:{
						id: id,
					},
                    url: "../operation/confirmembership.php",                    
					success: function(responseText){
                        if(responseText==1){
                        }
               
					}
                 
				});
                 $(this).parents(".permit").animate({ backgroundColor: "#27AC3F" }, "fast")
                .animate({ opacity: "hide" }, "slow");
            });
            
            
            $("#usertable").DataTable();
            $("#pendingrequest").DataTable();
            $("#pendingmemberrequest").DataTable();
            $("#registeredmember").DataTable();
            
        });
        
        
        
          $(document).ready(function() {
            $('.eventconfirm').on('click',function(){
                var sid = jQuery(this).prevAll('input[name="sid"]').val();
                var eid = jQuery(this).prevAll('input[name="eid"]').val();
                $.ajax({
					type: "POST",
					data:{
						sid: sid,
						eid: eid,
					},
                    url: "../operation/confirmeventparticipants.php",                    
					success: function(responseText){
                        if(responseText==1){
//                            $(this).parents(".confirm").html("ok");
                        }
					}
                 
				});
                 $(this).parents(".confirm").animate({ backgroundColor: "#27AC3F" }, "fast")
                .animate({ opacity: "hide" }, "slow");
               
            });
            
        });
        
    </script>

</body>

</html>
