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

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../usercss/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../usercss/footer-distributed.css" rel="stylesheet"/>
   
   

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
					
					<?php
                    echo $name;
                    ?>
					<b class="caret"></b></a>
					
					
                    <ul class="dropdown-menu">
                        <li>
                            <a href="registrationdata.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
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
                            <small>Welcome <?php echo $name?></small>
                        </h1>
                    </div>
                </div>
                
                <div class="row">
                   
                </div>
                
                
                <div class="row">
                  <div class="col-lg-8">

                          <div class="panel panel-info">
                              <div class="panel-heading"><center><h4>Total user and member</h4></center></div>
                              
                              <div class="panel-body">
                                  <div class="list-group">
                                      <li class="list-group-item"><strong>Total registered member :</strong> <span class="badge" id="member"></span></li>
                                      <li class="list-group-item"><strong>Total unregistered user :</strong> <span class="badge" id="user"></span></li>
                                      <li class="list-group-item"><strong>Total disabled account :</strong> <span class="badge" id="disableaccount"></span></li>
                                  </div>
                              </div>
                          </div>
                  </div>
                  
                  <div class="col-lg-4">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading"><center><h3>Activity overview</h3></center></div>
                        
                        <div class="panel-body colors">
                  
                                 <a href="tables.php#pending">New member request <span class="badge" id='y'></span> <span class="badge pendingrequest" id="pendingrequest"></span></a>
                                <hr/>
                                <a href="tables.php#req">Event participants request <span class="badge" id="z"></span> <span class="badge" id="eventparticicpantsreq"></span></a>
                            <hr/>
                                <a href="userfeedback.php">New user feedback <span class="badge" id="x"></span> <span class="badge" id='newuserfeedback'></span></a>
                                <hr/>
                                
                                
                            <a href="event.php#feedback">Event feedback <span class="badge" id="a"></span> <span class="badge b"></span></a>
                        
                        </div>
                        <div class="list-group">
                          <a href="controlpanel.php#mregistration" class="list-group-item list-group-item-success" id="regdate"></a>
                          <a href="event.php#eventrow" class="list-group-item list-group-item-success" id="eventcheck">No event is going on!</a>
                        </div>

                        </div>
                        
<!--                    <div class="panel panel-default">-->
                        
<!--                    <div class="row">-->
<!--                    </div>-->

                  </div>
                </div>
                
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                           <div class="panel panel-info">
                              <div class="panel-heading"><center><h4>Total member (Course wise)</h4></center></div>
                              
                              <div class="panel-body">
                                  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                        <th>IFY</th>
                                        <th>L4DC</th>
                                        <th>L5DC</th>
                                        <th>BIT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td id="IFY"></td>
                                        <td id="L4DC"></td>
                                        <td id="L5DC"></td>
                                        <td id="BIT"></td>
                                        </tr>
                                        </tbody>
                                        </table>
                              </div>
                          </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center><h3>Search user</h3></center></div>
                        
                        <div class="panel-body colors">
                        <div class="form-group">
                            <lable>Enter ID: </lable>
                            <table>
                                <tr>
                                    <td><i class="fa fa-search" aria-hidden="true"></i> <input type="text" class="form-coltrol" id='t1'/></td>
                                    <td> &nbsp;</td>
                                    <td> <input type="submit" name="search" class="btn btn-primary" id="b1" value="Search"/></td>
                                </tr>
                            </table>
                            
                            
                            <div id=msg></div>
                        </div>

                        </div>
                        
                        
                    </div>
                    </div>
                    </div>
                    
                    <div id="my_dialog" title="Student Information">
                        <div id=body></div>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                           <div class="panel panel-info">
                              <div class="panel-heading"><center><h4>View student information by course</h4></center></div>
                              
                            <div class="panel-body">
<!--                                   <div class="col-lg-6">-->
                            <form>
<!--                                    <div class="col-lg-2">-->
                                        
<!--                                    </div>-->
                                <div class="col-lg-6">
                                    <label for="">Search by course:</label>
                                        <select name="batch" onchange="showUser(this.value)" class="form-control">
                                              <option value="">Select a course name </option>
                                              <option value="IFY">IFY</option>
                                              <option value="L4DC">L4DC</option>
                                              <option value="L5DC">L5DC</option>
                                              <option value="BIT">BIT</option>
                                        </select>
                                </div>
                            </form>
                                    
<!--
                          
                                <div class="col-lg-6">
                                    <label for="">Search by blood group:</label>
                                        <select name="blood" id="blood" onchange="searchBybloodgroup(blood.value)" class="form-control">
                                            <option value="">Select Blood Group</option>
                                            <option value='A+'>A+</option>
                                            <option value='O+'>O+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="A-">A-</option>
                                            <option value="O-">O-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                </div>
                           
                                     </div>
                              </div>
                              <div id="txtHint"></div>
-->
                              
                              
                          </div>
                           <div id="txtHint"></div>
                        </div>
                    </div>
                </div>

<!--
                <div id="chartContainer" style="height: 300px; width: 50%;">
                 
                </div>
-->
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
        
        
<!--
        <footer class="footer-distributed">
			<div class="footer-right">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
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
-->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

     <link href="../usercss/jquery-ui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    
      <script>
       $(document).ready(function() {

            $(function() {
                $( "#my_dialog" ).dialog({
                    autoOpen: false,
            buttons: {
                    "Close ": function() {
                      $( this ).dialog( "close" );
                    }
                  }
            });
            });

            $("#b1").click(function(){
            $( "#my_dialog" ).dialog( "open" );
            $('#body').text('Wait..');
            var id=$('#t1').val();
            $('#body').load("data.php?id="+id);
            });
    })
    </script>
    
    
    
<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getuser.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
</script>


   
<script>
	$(document).ready(function(){
        $.ajax({
            url: "../operation/admindatecheck.php",

            success: function(responseText){
                if(responseText==1){
                   $("#regdate").text("Member registration is open !!");
                }else if(responseText==0){
                    $("#regdate").text("Member registration is closed !!");
                }
            }
        });

	});
        
    $(document).ready(function(){
    $.ajax({
        url: "../operation/eventcheck.php",
        success: function(responseText){
            $("#eventcheck").text(responseText);
        }
    });
	}); 
    
    $.ajax({
        url: "../operation/countmember.php",
        success: function(responseText){
            $("#member").text(responseText);
        }
    });
        
        
      $.ajax({
        url: "../operation/countuser.php",
        success: function(responseText){
            $("#user").text(responseText);
        }
    });
    $.ajax({
        url: "../operation/countdisableacc.php",
        success: function(responseText){
            $("#disableaccount").text(responseText);
        }
    });
        
    $.ajax({
        url: "../operation/l4dc.php",
        success: function(responseText){
            $("#L4DC").text(responseText);
        }
    });
    
        $.ajax({
        url: "countrows/newuserfeedback.php",
        success: function(responseText){
            if(responseText==0){
                $("#x").text(responseText);
            }else{
                $("#newuserfeedback").text(responseText);
            }
        }
    });
    
    
    
    $.ajax({
        url: "../operation/countunreadfeedback.php",
        success: function(responseText){
            if(responseText==0){
                $("#a").text(responseText);
            }else{
                $(".b").text(responseText);
            }
        }
    });
    $.ajax({
        url: "countrows/pendingmembers.php",
        success: function(responseText){
            if(responseText==0){
                $("#y").text(responseText);
            }else{
                $("#pendingrequest").text(responseText);
            }
        }
    }); 
    $.ajax({
        url: "countrows/eventparticipants.php",
        success: function(responseText){
            if(responseText==0){
                $("#z").text(responseText);
            }else{
                $("#eventparticicpantsreq").text(responseText);
            }
        }
    });
    
     $.ajax({
        url: "../operation/ify.php",
        success: function(responseText){
            $("#IFY").text(responseText);
        }
    });
     $.ajax({
        url: "../operation/l5dc.php",
        success: function(responseText){
            $("#L5DC").text(responseText);
        }
    });
        
     $.ajax({
        url: "../operation/bit.php",
        success: function(responseText){
            $("#BIT").text(responseText);
        }
    });

	</script>
	
	//.....................................................
	
</body>
</html>

