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
    <link href="../usercss/jquery-ui.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>-->
<!--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <script src="../js/jquery.js"></script>
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
                               Manage
                            <small>events</small>
                        </h1>
                    
                    </div>
                    
                </div>
                
               
<!--                    <div>-->
          
             
                  <div class="row" id="eventrow">
                   
                    <div class="col-lg-12">
                    <div class="alert alert-success">
                        <center><h3>Add new event</h3></center>
                    </div>
                    <center><h3><span class="label label-success" id="addeventresult"></span></h3></center>
                       <span class="label label-danger" id="checkeventfield"></span>
                       
                        <form action="" method="post" id="event">
                          
                          
                          <div class="row">
                          <div class="col-lg-4">
                           <div class="form-group">
                            <label class="control-label">Event name  * </label>

                               <input type="text" class="form-control"  placeholder="Eventname" name="eventname" id="eventname">
                           
                            </div>
                            </div>
                            
                            <div class="col-lg-4">
                            <div class="form-group">
                            <label class="control-label">Event time  * </label>
                               <input type="text" class="form-control"  placeholder="Eventime" name="eventtime" id="eventtime"/>
                            </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label">Registration last date <span class="redmark"> * </span></label>
                               <input  class="form-control"  placeholder="Registration last date" name="reglastdate" id="datepicker3"/>
                            </div>
                            </div>
                            
                            </div>
                            
                            <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                            <label class="control-label">Event date </label>
                               <input class="form-control" id="datepicker2" name='eventdate'/>
                            </div>
                            </div>
                            
                            
                             <div class="col-lg-6">
                            <div class="form-group">
                            <label class="control-label">Room number * </label>
                               <input class="form-control" type='text' name='roomnumber' id="roomnumber"  placeholder="Room number"/>
                            </div>
                            
                            </div>
                            
                                <center> <input  type="button" class="btn btn-primary"  value="Add event" name="addevent" id='addevent'/></center>
                            
                            </div>
                        </form>
<!--                        </div>-->
                    </div>
                </div>
                    
                    &nbsp;
                    <div class="row">
                    
                    <div class="col-lg-12">
                
                    
                    <?php
                        
                        $query="select * from event where status='yes'";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows==0){
                        echo "
                        <center><h3><span class='label label-danger'>No event is going on !!</span></h3></center>
                       ";
                        }
                        
                        $query="select * from event";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows==0){
                            echo "<div class='alert alert-danger'>
                               No event has been added yet.
                            </div>";
                        }else{
                        
                    ?>
                     <div class="table-responsive" id="c">
                         <center><h2>Ongoing events</h2></center>
                         <center> <h4><span class="label label-success" id="deleteevent"></span></h4></center>
                        <table class="table alert" id="example">
                            <tr class="warning">
                                <th>Event name</th>
                                <th>Event date</th>
                                <th>Event Time</th>
                                <th>Registration last date</th>
                                <th>Room no.</th>
                                <th>Status</th>
                                <th>Seat limit</th>
                                <th>Enable userfeedback</th>
                                <th>Delete event</th>
                                <th>Edit event</th>
                            </tr>
                            <?php
                                while ($row = mysqli_fetch_array($result)) {?>
                                    <tr class="success record">
                                        <td><?php echo $row['eventname']; ?></td>
                                        <td><?php echo $row['eventdate']; ?></td>
                                        <td><?php echo $row['eventtime']; ?></td>
                                        <td><?php echo $row['reglastdate']; ?></td>
                                        <td><?php echo $row['roomnumber']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['sitlimit']; ?></td>
                                        <td><?php echo $row['enablefeedback']; ?></td>
                                        <form action="" method="post">       
                                            <td>
                                            <input type="hidden" value="<?php echo $row['eid']?>" name="eidd" id="eid"/>
                                                <i class="fa fa-trash-o" aria-hidden="true"> </i><input type="button" value="Delete event" name="deletevent" class="btn btn-danger deleteevent" id="button"/>

                                            </td>
                                        </form>
                                        
                                        <td>
                                        <form action="" method="post">
                                        <input type="hidden" value="<?php echo $row['eid']?>" name="eids" id="eids" class="eids"/>
                                        <i class="fa fa-pencil" aria-hidden="true"></i> <input type="button" data-toggle="modal" data-target="#view-modal" value="Update" name="edit" data-id="<?php echo $row['eid']; ?>"  class="btn btn-primary editevent" id="editevent" />
                                        </form></td>
                                    </tr>
                                <?php 
                                 }
                            ?>
                        </table>
                    </div>
                    <?php 
                        }
                    ?>
                    </div>
                          
<!--                        <div class="panel-group">-->
                         <div class="col-lg-12">
                          <div class="panel panel-success">
                              <div class="panel panel-heading"><center><h3>View event participant</h3></center></div>
                            <div class="panel-body">
                                <?php 
                                    $query="select eventname,eid from event";
                                    $result=mysqli_query($con,$query);
                                   
                                ?>
                                <label for="">Select event: </label>
                                <select name="" id="" onchange="showParticipants(this.value)" class="form-control">
                                  <option value="">Select event name</option>
                                   <?php  while($row=mysqli_fetch_array($result)){?>
                                    <option value="<?php echo $row['eventname']?>"><?php echo $row['eventname']?></option>
                                    <?php }?>
                                </select>
                                
                                
                                <div id="txtHints"></div>
                            </div>
                        </div>
                        </div>
                          
                          &nbsp;
                           <div class="col-lg-12"  id="feedback">
                               <div class="panel panel-success">
                                   <div class="panel-heading"><center><h3>Recent feedback on events</h3></center></div>
                                   <?php
                                    
                                    $query="SELECT evt.eid ,eventname,ulg.id,name,batch,date,eventquality,eventsuccess,helpful,content from event evt, user_login ulg,  eventfeedback evtf  where ulg.id=evtf.id and evt.eid=evtf.eid and flag='no'";
                                    $result=mysqli_query($con,$query);
                                    $numrows=mysqli_num_rows($result);
//                                   if($numrows>1){
                                    $c="select count(feedbackno) as unread from eventfeedback where flag='no'";
                                    $r=mysqli_query($con,$c);
                                    $rows=mysqli_fetch_array($r);
                                   if($rows['unread']>=1){
                                   ?>
                                  <div class="panel-body">
                                      <div class="table-responsive">          
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th>Evnet name</th>
                                                     
                                                      <th>ID</th>
                                                      <th>Name</th>
                                                      <th>Batch</th>
                                                      <th>Date</th>
                                                      <th>Event quality</th>
                                                      <th>Event success</th>
                                                      <th>Helpful</th>
                                                      <th>Content</th>
                                                      <th>Checked</th>
                                                      
                                                  </tr>
                                              </thead>
                                              <?php  while($row=mysqli_fetch_array($result)){?>
                                              <tbody>
                                                 
                                                  <tr class="records">
                                                      <td><?php echo $row['eventname']?></td>
                                                    
                                                      <td><?php echo $row['id']?></td>
                                                      <td><?php echo $row['name']?></td>
                                                      <td><?php echo $row['batch']?></td>
                                                      <td><?php echo $row['date']?></td>
                                                      <td><?php echo $row['eventquality']?></td>
                                                      <td><?php echo $row['eventsuccess']?></td>
                                                      <td><?php echo $row['helpful']?></td>
                                                      <td><?php echo $row['content']?></td>
                                                      <td><form action="" method="post">
                                                          <input type="hidden" name='eventid' id="eventid" value="<?php echo $row['eid']?>"/>
                                                          <input type="hidden" name='studentid' id="studentid" value="<?php echo $row['id']?>"/>
                                                          <i class="fa fa-check-square-o" aria-hidden="true"></i> <input type="button" class="btn btn-success checkfeedback" value="Checked" id="check"/>
                                                      </form></td>
                                                  </tr>
                                              </tbody>
                                              <?php }?>
                                          </table>
                                      </div>
                                  </div>
                                  <?php 
                                       
                                    }else{
                                       
                                   
                                   ?>
                                   <h3><center><span class="label label-warning">No feedback found yet !</span></center></h3>
                                   <?php }?>
                                 
                                </div>
                           </div>
                           
                           
                             <div class="col-lg-12">
                               <div class="panel panel-success">
                                   <div class="panel-heading"><center><h3>Old feedback on events</h3></center></div>
                                   <?php
                                    
                                    $query="SELECT evt.eid ,eventname,ulg.id,name,batch,date,eventquality,eventsuccess,helpful,content from event evt, user_login ulg,  eventfeedback evtf  where ulg.id=evtf.id and evt.eid=evtf.eid and flag='yes'";
                                    $result=mysqli_query($con,$query);
                                    $numrows=mysqli_num_rows($result);
//                                   if($numrows>1){
                                    $cc="select count(flag) as 'read' from eventfeedback where flag='yes'";
                                    $rs=mysqli_query($con,$cc);
                                    $rows=mysqli_fetch_array($rs);
                                   if($rows['read']>=1){
                                   
                                   ?>
                                  <div class="panel-body">
                                      <div class="table-responsive">          
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th>Evnet name</th>
                                                      <th>ID</th>
                                                      <th>Name</th>
                                                      <th>Batch</th>
                                                      <th>Date</th>
                                                      <th>Event quality</th>
                                                      <th>Event success</th>
                                                      <th>Helpful</th>
                                                      <th>Content</th>
<!--                                                      <th>Checked</th>-->
                                                      
                                                  </tr>
                                              </thead>
                                              <?php  while($row=mysqli_fetch_array($result)){?>
                                              <tbody>
                                                 
                                                  <tr class="records">
                                                      <td><?php echo $row['eventname']?></td>
                                                      
                                                      <td><?php echo $row['id']?></td>
                                                      <td><?php echo $row['name']?></td>
                                                      <td><?php echo $row['batch']?></td>
                                                      <td><?php echo $row['date']?></td>
                                                      <td><?php echo $row['eventquality']?></td>
                                                      <td><?php echo $row['eventsuccess']?></td>
                                                      <td><?php echo $row['helpful']?></td>
                                                      <td><?php echo $row['content']?></td>

                                                  </tr>
                                              </tbody>
                                              <?php }?>
                                          </table>
                                      </div>
                                  </div>
                                  <?php 
                                       
                                    }
                                   else{
                                       
                                   
                                   ?>
                                   <h3><center><span class="label label-warning">No feedback found yet !</span></center></h3>
                                 <?php }?>
                                 
                                </div>
                           </div>
                        
<!--                    </div>-->
                    
                  

                    <div id="test">
                        
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
   
                <!-- /.row -->
    
                
            </div>
            </div>
                    
            <!-- /.container-fluid -->
            
        

        </div>
<!--
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
					·
					<a href="#">Contact</a>
				</p>
				<p>Company Name &copy; 2017</p>
			</div>

		</footer>
-->
        
      
        <!-- /#page-wrapper -->
        </div>
        
<!--
        
 
-->

<!--    </div>-->
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
   
    
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
       
       
    $("#datepicker3").datepicker({ 
    dateFormat: 'yy-mm-dd',
     minDate:0
    }).datepicker('setDate', date2); 
});  
    </script>
    
    
    
    <script>
        $(document).ready(function() {
             $('#event').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
                 
        fields: {
            eventname: {
                validators: {
                    notEmpty: {
                        message: 'Enter event name!!'
                    }
                }
            },
        }  
        });
        });
        

    </script>
    
  
<!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->

   

   
   <script>
    function showParticipants(str) {
        if (str == "") {
            document.getElementById("txtHints").innerHTML = "";
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
                    document.getElementById("txtHints").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getParticipants.php?q="+str,true);
            xmlhttp.send();
        }
    }
    
</script>
    
   
    <script type="text/javascript">
        
	$(document).ready(function(){
		$("#addevent").click(function(){
			var eventname= $('#eventname').val();
			var eventdate= $('#datepicker2').val();
			var eventtime= $('#eventtime').val();
			var datepicker3= $('#datepicker3').val();
			var roomnumber= $('#roomnumber').val();
            if(eventname != '' && eventdate != '' && eventtime!='' && roomnumber!=''){
				$.ajax({
					type: "POST",
					data:{
						eventname: eventname,
						eventdate: eventdate,
						eventtime: eventtime,
						datepicker3: datepicker3,
						roomnumber: roomnumber,
					},
                    url: "../operation/addevent.php",
					success: function(responseText){
                        if(responseText==1){
                           $("#addeventresult").text("New event added !!");
                            setTimeout(function(){
                                $('#addeventresult').fadeOut();
                                location.reload();
                                },2000);
                        }
                    }
                    
                           
				});
            }else{
                document.getElementById("checkeventfield").innerHTML="Fill up each field properly !!";
            }
			
		});
	});
         
    $(document).ready(function(){
		$(".deleteevent").on('click',function(e){
            e.preventDefault();
            var eid = jQuery(this).prevAll('input[name="eidd"]').val();
            

            if(confirm("Do you want to delete this event ?")){
				$.ajax({
					type: "POST",
					data:{
						eid: eid,
					},
                    url: "deleteevent.php",
                    
					success: function(responseText){
                        if(responseText==1){
                           $("#deleteevent").text("Event deleted !!");
                            setTimeout(function(){
                                $('#deleteevent').fadeOut();
                                },2000);
                        }
                    }
                           
				});
            $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
            .animate({ opacity: "hide" }, "slow");
            }

		});
	});
        
        
       $(document).ready(function(){
		$(".checkfeedback").on('click',function(e){
            e.preventDefault();
            
			var eid = jQuery(this).prevAll('input[name="eventid"]').val();
			var sid = jQuery(this).prevAll('input[name="studentid"]').val();
				$.ajax({
					type: "POST",
					data:{
						eid: eid,
						sid: sid,
					},
                    url: "checkeventfeedback.php",
                    
					success: function(responseText){
                      
                    }     
				});
            $(this).parents(".records").animate({ backgroundColor: "#fbc7c7" }, "fast")
            .animate({ opacity: "hide" }, "slow");
           

		});
	});
	</script>
   
    <script>

    </script>
    
    
    <script>
        $(document).ready(function() {
            
        $(".editevent").on('click', function(e) {
        // Get the record's ID via attribute
            e.preventDefault();
            var id = $(this).attr('data-id');
            $('#dynamic-content').html('');
            $('#modal-loader').show();
            $('#modal-loader').hide();
            
             $.ajax({
              url: 'editevent.php',
              type: 'POST',
              data: {
                  id:id,
              },
              dataType: 'html'
         }).done(function(data){
              console.log(data); 
              $('#dynamic-content').html(''); // blank before load.
              $('#dynamic-content').html(data); // load here
              $('#modal-loader').hide(); // hide loader  
         }).fail(function(){
          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });
            
        });
    });
    </script>
    
<script>
    function UpdateeventDetails() {
    // get values
    var eid = $('#editeventid').val();
    var eventname = $('#eventnames').val();
    var datepicker5 = $('#datepicker5').val();
    var eventtime = $('#eventtimes').val();
    var reglastdate = $('#reglastdate').val();
    var roomnumber = $('#roomnumbers').val();
    var statuss = $('input[name=statuss]:checked').val();
    var sitlimit = $('#sitlimit').val();
    var enablefeedback = $('input[name=enablefeedback]:checked').val();

    // Update the details by requesting to the server using ajax
    $.post("../operation/updateevent.php", {
            eid: eid,
            eventname: eventname,
            datepicker5: datepicker5,
            eventtime: eventtime,
            reglastdate: reglastdate,
            roomnumber: roomnumber,
            statuss: statuss,
            sitlimit: sitlimit,
            enablefeedback: enablefeedback,
        },
        function (data, status) {
            // hide modal popup
            $("#view-modal").modal("hide");
            location.reload();
            }
        );
    }
        
</script>
   
</body>

</html>

