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

    <title>Control panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../usercss/bootstrap.min.css" rel="stylesheet"/>
    <link href="../usercss/footer-distributed.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="../usercss/jquery-ui.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
  
    <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
  
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
                <a class="navbar-brand" href="admin.php">HOME</a>
                
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
                               Control
                            <small>activities</small>
                        </h1>
                    
                    </div>
                    
                </div>
                
                <div class="panel panel-info">
                    
                <div class="panel-body">
                
                <div class="row" id="mregistration">
                    <div class="col-lg-12">
                    <div class="alert alert-success">
                        <center><h3>Insert new member registration date</h3></center>
                    </div>
                       <span class="label label-danger">Each session interval 4 months</span>
                        <center><h3><span class="label label-success" id="result"></span></h3></center>
                       <span class="label label-danger" id="error"></span>
                       
                        <div class="form-group">
                        <form action="" method="post">
                            <label class="control-label col-lg-2">Select starting date: </label>
                            <div class="col-lg-3">
                                <input class="form-control"  name='startday' id='datepicker' />
                            </div>
                              
                            <label class="control-label col-lg-2">Select end date: </label>
                            <div class="col-lg-3">
                                <input class="form-control" name='endday' id='datepicker1'/>
                            </div>
                            <div class="col-lg-2">
                                <input class="btn btn-primary"  type="button" value="Add registration date" name="adddate" id="adddate"/>
                            </div>
                        </form>
                        </div>
                    </div>
                    <hr/>
                    &nbsp;
               
                </div>
                
                       <div class="row">
                        <div class="col-lg-8">
                    
                    <div class="panel panel-success">
                        <div class="panel-heading"><center>Registration session</center></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="registrationsession">
                                    <thead>
                                        <tr>
                                            <th>Session</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Edit date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        $regtable="select * from timelimit";
                                        $regresult=mysqli_query($con,$regtable);
                                        while($row=mysqli_fetch_array($regresult)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['recordid']?></td>
                                            <td><?php echo $row['startdate']?></td>
                                            <td><?php echo $row['enddate']?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type='hidden'  value="<?php echo $row['recordid']?>" id='recordid' name="recordid"/>
                                                    <input type='button' class='btn btn-primary editdate' value='Edit Date' data-toggle='modal' data-target='#view-modal'/>
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
                    
                    <div class="col-lg-4">
                        <div class='alert alert-info'>
                        <center><h4>Date remaining</h4></center>
                           <center><h3><span class="label label-primary" id="going"></span></h3></center>
                           <center><h3><span class="label label-danger" id="over"></span></h3></center>
                           
                            
                        </div>
                    </div>
                    
                    
                            
                    
            <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog"> 
                     <div class="modal-content"> 
                        <div class="modal-header"> 
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                           <h4 class="modal-title">
                               <i class="fa fa-pencil" aria-hidden="true"></i> Event details
                           </h4> 
                        </div> 

                        <div class="modal-body"> 
                          <span class="label label-danger" id="invalid"></span>                    
                           <div id="modal-loader" style="display: none; text-align: center;">
                           <!-- ajax loader -->
                           <img src="ajax-loader.gif">
                           </div>

                           <!-- mysql data will be load here -->                          
                           <div id="dynamic-content"></div>
                        </div> 

                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-primary" onclick="UpdateeventDetails()">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div> 

                    </div> 
                  </div>
            </div> 
                    
                    
                    
                    </div>
                    
                    
                    </div>
                    </div>
<!--                    <div>-->
        
                    
                <!-- /.row -->
                
            </div>
            
            
            <div class="panel panel-success">
                <div class="panel-heading"><center><h4>Session wise registration number</h4></center></div>
              <div class="panel-body">
                 <?php 
                    $query="select recordid from timelimit";
                  $result=mysqli_query($con,$query);
                  
                  ?>
                  <label for="">Select registration session: </label>
                  <select name="recordid" id="" onchange="showUser(this.value)" class="form-control">
                  <option value="">Select session number</option>
                  <?php while($row=mysqli_fetch_array($result)) { ?>
                      <option value="<?php echo $row['recordid']?>"><?php echo $row['recordid']?></option>
                 <?php }?>
                 </select>
                 
                 <div id="txtHint"></div>
              </div>
              
            </div>
            
            </div>
<!--                    </div>-->

                    
            <!-- /.container-fluid -->
            
<!--
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
					·
					<a href="#">Contact</a>
				</p>

				<p>Company Name &copy; 2017</p>
			</div>

		</footer>
-->

        </div>
        <!-- /#page-wrapper -->
        

<!--    </div>-->
    <!-- /#wrapper -->

    <!-- jQuery -->
<!--    <script src="js/jquery.js"></script>-->
   
   
   

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    
    <script>
   $(document).ready(function () {
    
    var dbDate = "";
    var date2 = new Date(dbDate);
    $("#datepicker").datepicker({ 
    dateFormat: 'yy-mm-dd',
     minDate:0
    }).datepicker('setDate', date2);
        
    $("#datepicker1").datepicker({ 
    dateFormat: 'yy-mm-dd',
     minDate:0
    }).datepicker('setDate', date2);
       
    $("#datepicker2").datepicker({ 
    dateFormat: 'yy-mm-dd',
     minDate:0
    }).datepicker('setDate', date2);
       
       $('#registrationsession').DataTable();
});
        
       
    </script>

 

    
     <script type="text/javascript">
         
    	$(document).ready(function(){
		$("#adddate").click(function(){
           
			var startday= $('#datepicker').val();
			var endday = $('#datepicker1').val();
            if(startday>endday){
                document.getElementById('error').innerHTML="Select date properly !!";
            }else{
            
				$.ajax({
					type: "POST",
					data:{
						startday: startday,
						endday: endday,
					},
                    url: "../operation/adddate.php",
                    
					success: function(responseText){
                        if(responseText==1){
                           $("#result").text("New registration session started !!");
//                            setTimeout(function(){
//                                $('#result').fadeOut();
                                location.reload();
//                                },2000);
                        }else if(responseText==0){
                            $("#result").text("Registration  is already going on !!");
                        }
                    }
                           
				});
              
            }
			
		});
	});
         
         
    $(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "../operation/remainingdate.php",

                success: function(responseText){
                    if(responseText==0){
                         $("#over").text("Registration date is over !!");
                        
                    }else{
                        $("#going").text(responseText);
                    }

                }

            });
		
	});
	
	</script>
   
  <script>
        $(document).ready(function() {
        $(".editdate").on('click', function(e) {
        // Get the record's ID via attribute
            e.preventDefault();
             var recordid = jQuery(this).prevAll('input[name="recordid"]').val();
            $('#dynamic-content').html('');
            $('#modal-loader').show();
            $('#modal-loader').hide();
             $.ajax({
              url: 'editregdate.php',
              type: 'POST',
              data: {
                  recordid:recordid,
              },
              dataType: 'html',
        
         }).done(function(data){
            
              console.log(data); 
              $('#dynamic-content').html(''); // blank before load.
              $('#dynamic-content').html(data); // load here
              $('#modal-loader').hide(); // hide loader  
         }).fail(function(){
          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          //$('#modal-loader').hide();
     });
            
        });
    });
      
      
      
    function UpdateeventDetails() {
    // get values
//    var recordid = jQuery(this).prevAll('input[name="recordidupdate"]').val();
    var recordid = $('#recordidupdate').val();
    var startdate = $('#startdates').val();
    var enddate = $('#enddates').val(); 
     
    // Update the details by requesting to the server using ajax
      
    $.post("../operation/updatregdate.php", {
            recordid: recordid,
            startdate: startdate,
            enddate: enddate,
        },
        function (data, status) {
            // hide modal popup
            $("#view-modal").modal("hide");
            location.reload();
            }
        );
    }
    </script>
    
        
<script>
    function showUser(str) {
        var xhttp;
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
            xmlhttp.open("GET","getsessionwiseregmember.php?r="+str,true);
            xmlhttp.send();
            
        }
    }
    
</script>
    

</body>

</html>

