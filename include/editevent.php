

 <div class="row">
 <span id="updateevents" class="label label-success"></span>
                   
                    <div class="col-lg-12">
                    
                    <?php
                       
                        
                        $query="select * from event";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows==0){
                        echo "
                        <span class='label label-danger'>No event is going on.</span>
                       ";
                        }
                        
                        $query="select * from event where eid='$eid'";
                        $result=mysqli_query($con,$query);
                        $numrows=mysqli_num_rows($result);
                        if($numrows==0){
                            echo "<div class='alert alert-danger'>
                               No event has been added yet.
                            </div>";
                        }else{
                        
                    ?>
                     <div class="table-responsive">
                       <span class="label label-primary">Update event</span>
                        <h2>Events</h2>
                        <table class="table alert">
                            <tr class="warning">
                                <th>Event name</th>
                                <th>Event date</th>
                                <th>Change Status</th>
                                <th>Action</th>
                                
                            </tr>
                            <?php

                                while ($row = mysqli_fetch_array($result)) {?>
                                    <tr class="success">
                                       
                                        <form action="../operations.php" method="post"> 
                                         <td><input type="text" class="form-control" value="<?php echo $row['eventname']; ?>" id="eventname"/></td>
                                        <td><input id="datepicker" input="text" value="<?php echo $row['eventdate']; ?>" id="eventdate"/></td>
                                          <td> 
                                           <div class="radio">
                                              <label><input type="radio" name="status" <?php if($row['status']=='yes') { echo "checked=checked";}?> value='yes' id="status">Yes</label>
                                            </div>
                                            <div class="radio">
                                              <label><input type="radio" name="status" <?php if($row['status']=='no') { echo "checked=checked";}?> value='no' id="status">No</label>
                                            </div>  
                                            </td>   
                                            <td>
                                            <input type="text" value="<?php echo $row['eid']?>" name="eid"/>
                                            <input type="button" value="Update event information" name="editevent"  class="btn btn-primary" id="updateevent"/>
                                            </td>
                                        </form>
                                        <?php }
                                        ?>
                                        
                                    </tr>
                                    
                        </table>
                        
                    </div>
                    <?php }
                    ?>
                    </div>
                    </div>
			
					