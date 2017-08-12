
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
    date_default_timezone_set("Asia/Dhaka");
    $today=date('Y-m-d',time());
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event registration</title>
    <link href="usercss/footer-distributed.css" rel="stylesheet">

    <!-- Bootstrap Core CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
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
<!--
    <script>
        
    function printPageArea(info){
    var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(info).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
    }
    </script> 
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
                            <small>Event registration</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-file"></i>  <a href="eventregistration.php">Event registration</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
<!--               <div class="col-lg-5">-->
                  
                    <?php
                            
                            $query="select * from event where status='yes' and reglastdate >= '$today'";
                            $result=mysqli_query($con,$query);
                            $numrows=mysqli_num_rows($result);
                            if($numrows>=1){
                    ?>

                   <div class="panel panel-primary">
                       <div class="panel-heading"><center><h4>On going event</h4></center></div>
                   <div class="panel-body">
                   
                   
<!--                   ...................................-->

                    
<!--                   ...................................-->
                   
                   
                    <h3><span class="label label-success" id="result"></span></h3>
                    <h3><span class="label label-danger" id="result1"></span></h3>
                    <form action="" method="post" name="form" id="eventform">
                        <div class="form-group">
                            <div class="col-lg-8">
                                <input type="hidden" id="id" placeholder="ID*" name="id" value="<?php echo $id?>"/> 
                                <div class="form-group">
                                <label class="control-label">Select event you want to participate: </label> 
                                <h3><span class="label label-danger" id="eventc"></span></h3>
                                <select id="event" class="form-control" name="event" onchange="showUser(this.value)" >
                                    <option value="">--Select event--</option>
                                    <?php
                                    
                                    $query="SELECT eid,eventname FROM event where status='yes' and reglastdate>='$today' ORDER BY eid";
                                    $result=mysqli_query($con,$query);

                                    while($row=mysqli_fetch_array($result)){
                                        ?>
                                        <option value="<?php echo $row['eventname'];?>"><?php echo $row['eventname'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                <button type="button" name="eventreg" class="btn btn-success button"  id="button"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Participate</button>
                            </div>
                        </div>
                    </form>
                       </div>
                       
                       <div id="txtHint"></div>
                       
                    </div>
                 
<!--            </div>-->
               
                
                <div class="col-bg-7">

                   <center><h4><span class="label label-info" id="cancelevent"></span></h4></center>
                    <?php
                    $query="select ev.eid,eventname,eventdate,eventtime,roomnumber,confirm from event ev, studentevent sev,user_login ulg where ev.eid=sev.eid and ulg.id=sev.id and sev.id='$id'";
                    $result=mysqli_query($con,$query);
//                    $row=mysqli_fetch_array($result);
//                    $eid=$row['eid'];
                    $rowcount=mysqli_num_rows($result);
                    
                   
                   // and confirm='yes'

                    if($rowcount==0){
                                echo
                                "<h4><span class='label label-danger'>You haven't registered for any event!</span></h4>";
                            }else {
                    ?>
                    <div class="table-responsive" id="info">
                        <h2>Events you have Participated</h2>
                        <table class="table success">
                            <tr class="warning">
<!--                                <th>Event name</th>-->
<!--                                <th>Event date</th>-->
<!--                                <th>Event time</th>-->
<!--                                <th>Room number</th>-->
<!--                                <th>Confirmation</th>-->
<!--                                <th>Option</th>-->
<!--
                                <th>Option</th>
                                <th>Token</th>
-->
                            </tr>
                            <?php
                                while ($row = mysqli_fetch_array($result))
                                {?>
                                    <tr class="success">
                                        <td><b>Event Name  : <?php echo $row['eventname']; ?></b></td>
                                        <td><b>Confirmation  :   <?php if( $row['confirm']=='yes'){echo "<h4><i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'>Confirmed</i></h4>";
                                          echo  "<form action='token.php' method='post'>
                                          <input type='hidden' value=$id name='studentid'>
                                         
                                          <input type='submit' value='Get token' id='token' class='btn btn-success token' name='token'>
                                          </form>";
                                        }
                                        else{ echo "<span class='label label-danger'><i class='fa fa-times' aria-hidden='true'></i> Not confirmed yet !</span>";};?></b>
                                        </td>
                                        <td></td>


<!--                                        <td>--><?php //echo $row['eventtime']; ?><!--</td>-->
<!---->
<!--                                        <td>--><?php //echo $row['roomnumber']; ?><!--</td>-->
<!---->
<!--                                        <td>--><?php //if( $row['confirm']=='yes'){echo "<h4><i class='fa fa-check-circle-o' aria-hidden='true' style='color:green;'> Confirmed</i></h4>";} else{ echo "<span class='label label-danger'>Not confirmed yet !</span>";};?><!--</td>-->
<!---->
<!--<!--                            </tr>-->
<!--                                       <td>-->
<!--                                           --><?php //if( $row['confirm']=='no'){?>
<!--                                            <form action="" method="post">-->
<!--                                                    <input type="hidden" value="--><?php //echo $row['eid']?><!--" name="eid" id="eid"/>-->
<!--                                                    <input type="hidden" value="--><?php //echo $id?><!--" name="id" id="id"/>-->
<!--                                                    <input type="button" class="btn btn-primary eventregbutton" value="Cancel your participation">-->
<!--                                            </form>-->
<!--                                            --><?php //}?>
<!--                                       </td>-->
                                    </tr>
                                    <tr class="success">
                                        <td><b>Event Time  : <?php echo $row['eventdate']; ?></b></td>
                                        <td><b>Event Location  : <?php echo $row['roomnumber']; ?></b></td>
                                        <td> <?php if( $row['confirm']=='no'){?>
                                                <form action="" method="post">
                                                <input type="hidden" value="<?php echo $row['eid']?>" name="eid" id="eid"/>
                                                <input type="hidden" value="<?php echo $id ?>" name="id" id="id"/>
                                                <input type="button" class="btn btn-danger eventregbutton" value="Cancel your participation">
                                                </form> <?php }?>
                                        </td>
                                    </tr>



                                <?php }
                            }
                                //<input type="button" value="Token"  class="btn btn-primary" onclick="printPageArea('info')">
                            ?>

                        </table>



                    </div>
                </div>
                       <?php
                   }
                   
                   else {
                       echo"
                       
                        <div class='alert alert-warning'>
                          <center><h3>Sorry ! </h3> No event is going on.</center>
                        </div>";
                        
                   }
                   ?>
                </div>
            </div>

            </div>
            
            
            <!-- /.container-fluid 

        </div>
        <!-- /#page-wrapper -->
        
        
          
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
    
    <script type="text/javascript" src="validation.js"></script>
    
<!--    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"/>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.button').on('click',function(e){
                e.preventDefault();
            var id = $('#id').val();
			var eventname = $('#event').val();
            
			if(eventname==''){
                document.getElementById("eventc").innerHTML="Select Event !!"; 
            }else{
                
				$.ajax({
					type: "POST",
					data:{
						id: id,
                        eventname: eventname
					},
                    url: "operation/eventreg.php",
                    
					success: function(responseText){
                        if(responseText==1){
                            $("#result").text("You are registered for this event. Thank you.");
                            setTimeout(function(){
                                    $('#result').fadeOut();
                                    location.reload();
                                },2000);
                        }else if(responseText==3){
                            $("#result1").text("Sorry ! Registration is closed as maximum sit is full !!");
                        }
                        else if(responseText==0){
                            $("#result1").text("You are already registered for this event !!.");
                        }
					}
                 
				});
			}
            });
            
//            $('.token').on('click',function(){
//                alert("ok");
//            });
        });
        
        
        
         $(document).ready(function(){
            $('.eventregbutton').on('click',function(e){
                e.preventDefault();
                
                var id = jQuery(this).prevAll('input[name="id"]').val();
                var eid = jQuery(this).prevAll('input[name="eid"]').val();
                if(confirm("Do you want to cancel your participation ?")){

				$.ajax({
					type: "POST",
					data:{
                        eid:eid,
						id: id,
					},
                    url: "operation/cancelparticipation.php",
                    
					success: function(responseText){
                        if(responseText==1){
                            $("#cancelevent").text("Participation canceled !!");
                            setTimeout(function(){
                                    $('#cancelevent').fadeOut();
                                    location.reload();
                                },2000);
                        }
//                      
					}
                 
				});
                $(this).parents(".success").animate({ backgroundColor: "#fbc7c7" }, "fast")
                .animate({ opacity: "hide" }, "slow");
			}
            });

        });
        
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
            xmlhttp.open("GET","geteventdetails.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>

</body>
</html>

