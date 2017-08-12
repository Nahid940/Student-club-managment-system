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

    <title>Feedback</title>

    <!-- Bootstrap Core CSS -->
    <link href="../usercss/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $name ?> <b class="caret"></b></a>
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
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-table"></i> <a href="userfeedback.php"> Feedback</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <hr/>
<!--
                        <script>
                        if (window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                        }
                        else {
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.open("GET",'../xml/userfeedback.php',false);
                        xmlhttp.send();
                        xmlDoc=xmlhttp.responseXML;
                        var x=xmlDoc.getElementsByTagName("All_feedbacks");
                            document.write("<table class='table table-bordered'>");
                             document.write("<center><h2>Recent feedbacks</h2></center>");
                            document.write("<thead>");
                            document.write("<tr>");
                            
                            document.write("<th>");
                            document.write("ID");
                            document.write("</th>");
                            
                            
                            document.write("<th>");
                            document.write("Date");
                            document.write("</th>");
                            
                            document.write("<th>");
                            document.write("Student experience");
                            document.write("</th'>");
                            
                            
                            document.write("<th>");
                            document.write("Satisfaction on club activity");
                            document.write("</th'>");
                            
                            
                            document.write("<th>");
                            document.write("Feedback");
                            document.write("</th>");
                            
                            document.write("<th>");
                            document.write("Check");
                            document.write("</th>");
                            
                            document.write("</tr>");
                            document.write("</thead'>");
                              
                            for(i=0;i<x.length;i++){
                            id=x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
                            date=x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue;
                            
                            experience=x[i].getElementsByTagName("experience")[0].childNodes[0].nodeValue;
                            happy=x[i].getElementsByTagName("happy")[0].childNodes[0].nodeValue;
                            content=x[i].getElementsByTagName("content")[0].childNodes[0].nodeValue;
                              
                            document.write("<tbody>");
                            document.write("<tr class='checked'>");
                                
                            document.write("<td>");
                            document.write(id);
                            document.write("</td>");
                                
                            document.write("<td>");
                            document.write(date);
                            document.write("</td>");
                                
                           
                                
                            document.write("<td>");
                            document.write(experience);
                            document.write("</td>");
                                
                            document.write("<td>");
                            document.write(happy);
                            document.write("</td>");
                            
                            document.write("<td>");
                            document.write(content);
                            document.write("</td>");
                                
                            document.write("<td>");
                            document.write("<form method='post'>");
                                
                            document.write("<input type='hidden' value="+id+" id='id' name='id'/>");
                            document.write("<input type='hidden' value="+date+" id='date' name='date'/>");
                            document.write("<i class='fa fa-check' aria-hidden='true'></i> <input type='button' value='checked' class='btn btn-success checked'>");
                            document.write("</form>");
                            document.write("</td>");
                                
                            
                            document.write("</tr>");
                            document.write("</tbody'");
                        }
                            document.write("</table>");
                       
                    </script>
-->
                   <div class="panel panel-success">
                       <div class="panel-heading"><center><h3>Recent feedback</h3></center></div>
                       <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-bordered">
                               <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Date</th>
                                       <th>Club experience</th>
                                       <th>Satisfactin on club activity</th>
                                       <th>Feedback</th>
                                       <th>Check</th>
                                   </tr>
                               </thead>
                               <?php 
                                    $newfeedback="SELECT * from userfeedback where flag='no'";
                                    $checked=mysqli_query($con,$newfeedback);
                                    $numrows=mysqli_num_rows($checked);
                        if($numrows>=1){
                               ?>
                               <tbody>
                                  <?php while($row=mysqli_fetch_array($checked)){?>
                                   <tr class='checked'>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['date']?></td>
                                       <td><?php echo $row['experience']?></td>
                                       <td><?php echo $row['happy']?></td>
                                       <td><?php echo $row['content']?></td>
                                       <td>
                                          <form action="" method="post">
                                           <input type='hidden' value="<?php echo $row['id']?>" id='id' name='id'/>
                                           <input type='hidden' value="<?php echo $row['date']?>" id='date' name='date'/>
                                           <i class='fa fa-check' aria-hidden='true'></i> <input type='button' value='checked' class='btn btn-success checked'/>
                                           </form>
                                       </td>
                                   </tr>
                                   <?php }
                        }else{
                                   ?>
                                   
                               </tbody>
                               <center> <h2>No new feedback!</h2></center>
                                   <?php }?>
                               </table>
                           </div>
                       </div>
                   </div>
                    </div>
                </div>
                
                
                
<!--
                <div class="row">
                    <div class="col-lg-12">
                        <hr/>
                        <script>
                        if (window.XMLHttpRequest){
                            xmlhttp=new XMLHttpRequest();
                        }
                        else {
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.open("GET",'../xml/olduserfeedback.php',false);
                        xmlhttp.send();
                        xmlDoc=xmlhttp.responseXML;
                        var x=xmlDoc.getElementsByTagName("All_feedbacks");
                            document.write("<table class='table table-bordered'>");
                            document.write("<center><h2>Old feedbacks</h2></center>");
                            document.write("<thead>");
                            document.write("<tr>");
                            
                            document.write("<th>");
                            document.write("ID");
                            document.write("</th>");
                            
                            document.write("<th>");
                            document.write("Date");
                            document.write("</th>");
                            
                            document.write("<th>");
                            document.write("Student experience");
                            document.write("</th'>");
                            
                            
                            document.write("<th>");
                            document.write("Satisfaction on club activity");
                            document.write("</th'>");
                            
                            
                            document.write("<th>");
                            document.write("Feedback");
                            document.write("</th>");
                            
                            document.write("</tr>");
                            document.write("</thead'>");
                              
                            for(i=0;i<x.length;i++){
                            id=x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
                            date=x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue;
                            experience=x[i].getElementsByTagName("experience")[0].childNodes[0].nodeValue;
                            happy=x[i].getElementsByTagName("happy")[0].childNodes[0].nodeValue;
                            content=x[i].getElementsByTagName("content")[0].childNodes[0].nodeValue;
                              
                            document.write("<tbody>");
                            document.write("<tr class='checked'>");
                                
                            document.write("<td>");
                            document.write(id);
                            document.write("</td>");
                                
                            document.write("<td>");
                            document.write(date);
                            document.write("</td>");
                                
                                
                            document.write("<td>");
                            document.write(experience);
                            document.write("</td>");
                                
                            document.write("<td>");
                            document.write(happy);
                            document.write("</td>");
                            
                            document.write("<td>");
                            document.write(content);
                            document.write("</td>");
                            
                            document.write("</tr>");
                            document.write("</tbody'");
                        }
                            document.write("</table>");
                       
                    </script>
                    </div>
                </div>
-->
                
                   <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <center><h3>Old feedbacks</h3></center>
                            </div>
                            <div class="panel-body">
                                <?php
                                    $query1="SELECT * from userfeedback where flag='yes'";
                                    $result=mysqli_query($con,$query1);
                                ?>
                                <div class="tabel-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Club experience</th>
                                                <th>Satisfaction</th>
                                                <th>Feedback</th>
                                            </tr>
                                        </thead>
                                        <?php while($row=mysqli_fetch_array($result)){?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td><?php echo $row['date']?></td>
                                                <td><?php echo $row['experience']?></td>
                                                <td><?php echo $row['happy']?></td>
                                                <td><?php echo $row['content']?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <center><h3>Feedback summary</h3></center>
                            </div>
                            <div class="panle-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Total feedback</th>
                                            <th>Good (Experience)</th>
                                            <th>Not so good (Experience)</th>
                                            <th>Bad (Experience)</th>
                                            <th>Happy on club activity</th>
                                            <th>Unhappy on club activity</th>
                                        </tr>
                                    </thead>
                                    <?php
                                       
                                    
                                        $query1="select  count(experience) as 'goodex' from userfeedback where flag='yes' and experience='good'";
                                        $query2="select  count(experience) as 'notsogoodex' from userfeedback where flag='yes' and experience='Not so good'";
                                        $query3="select  count(experience) as 'bad' from userfeedback where flag='yes' and experience='bad'";
                                    
                                        $result1=mysqli_query($con,$query1);
                                        $result2=mysqli_query($con,$query2);
                                        $result3=mysqli_query($con,$query3);
                                    
                                        $total="select count(flag) as 'total' from userfeedback where flag='yes'";
                                        $result4=mysqli_query($con,$total);
                                        $row4=mysqli_fetch_array($result4);
                                    
                                    
                                        $query4="select  count(happy) as 'happy' from userfeedback where flag='yes' and happy='yes'";
                                        $query5="select  count(happy) as 'nothappy' from userfeedback where flag='yes' and happy='no'";
                                        $result5=mysqli_query($con,$query4);
                                        $result6=mysqli_query($con,$query5);
                                       
                                    
                                        $row1=mysqli_fetch_array($result1);
                                        $row2=mysqli_fetch_array($result2);
                                        $row3=mysqli_fetch_array($result3);
                                    
                                        
                                        
                                        
                                        $row5=mysqli_fetch_array($result5);
                                        $row6=mysqli_fetch_array($result6);
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row4['total']?></td>
                                            <td><?php echo $row1['goodex']?></td>
                                            <td><?php echo $row2['notsogoodex']?></td>
                                            <td><?php echo $row3['bad']?></td>
                                            <td><?php echo $row5['happy']?></td>
                                            <td><?php echo $row6['nothappy']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

             
                <!-- /.row -->

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
    
    <script>
        $(document).ready(function() {
            $('.checked').on('click',function(){
                var id = jQuery(this).prevAll('input[name="id"]').val();
                var dates = jQuery(this).prevAll('input[name="date"]').val();
                
                $.ajax({
					type: "POST",
					data:{
						id: id,
                        dates: dates,
					},
                    url: "../operation/checkfeedback.php",                    
					success: function(responseText){
                        if(responseText==1){
                        }
               
					}
                 
				});
               
                 $(this).parents(".checked").animate({ backgroundColor: "#27AC3F" }, "fast")
                .animate({ opacity: "hide" }, "slow");
            });
            
        });
        
    </script>

</body>

</html>
