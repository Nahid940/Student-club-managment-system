<?php
                        $con = mysqli_connect("localhost","root","","myproject");
                        $query="select * from event where status='yes'";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows==0){
                        echo "
                        <span class='label label-danger'>No event is going on.</span>
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
                    
                     echo "<div class='table-responsive' id='c'>
                        <h2>Ongoing events</h2>
                        <center> <h4><span class='label label-success' id='deleteevent'></span></h4></center>
                       <table class='table alert'>
                            <tr class='warning'>
                                <th>Event name</th>
                                <th>Event date</th>
                                <th>Status</th>
                                <th>Delete event</th>
                                <th>Edit event</th>
                            </tr>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr class='success record'>";
                                        echo "<td>".$row['eventname']."</td>";
                                        echo "<td>". $row['eventdate']."</td>";
                                        echo "<td>".$row['status']."</td>";
                                        
                                        echo "<form action='' method='post'>";   
                                            echo "<td>";
                                            echo "<input type='hidden' name='eid' value=".$row['eid']." id='eid'/>";
											echo " <i class='fa fa-trash-o' aria-hidden='true'></i> <input type='button' value='Delete event' name='deletevent' class='btn btn-danger' id='button'/>";
                                            echo "</td>"; 
											
											echo "<td>";
                                            echo "<input type='hidden' name='eid' value=".$row['eid']." id='eid'/>";
											echo " <i class='fa fa-trash-o' aria-hidden='true'></i> <input type='button' value='Edit event' name='editevent' class='btn btn-primary' id='editbutton'/>";
                                            echo "</td>";
                                        echo "</form>";
                                        
                                    echo "</tr>";
                                }
                            
                        echo "</table>";
                    echo "</div>";
						}
						
?>