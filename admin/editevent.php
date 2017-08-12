<?php
$con=mysqli_connect("localhost","root","","myproject");
if (($_POST['id'])) {
 $id = $_POST['id'];
 $query = "SELECT eid,eventname,eventtime,eventdate,reglastdate,roomnumber,status,sitlimit,enablefeedback FROM event WHERE eid='$id'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
 ?>
	 <div class="table-responsive">
	 <input type="hidden" value="<?php echo $row['eid']?>" id="editeventid"/>
	 <table class="table table-striped table-bordered">
	 <tr>
	 <th>Event name</th>
	 <td><input type="text" class="form-control" value="<?php echo $row['eventname']?>" id="eventnames"/></td>
	 </tr>
	 <tr>
	 <th>Event time</th>
	 <td><input type="text" class="form-control" value="<?php echo $row['eventtime']?>" id="eventtimes"/></td>
	</tr>
	 <tr>
	 <th>Room number</th>
	 <td><input type="text" class="form-control" value="<?php echo $row['roomnumber']?>" id="roomnumbers"/></td>
	</tr>
	<tr>
         <th>Event date</th>
         <td> <input type="text" class="form-control" id="datepicker5" name='eventdate' value="<?php echo $row['eventdate']?>"/></td>
	</tr>
	<tr>
         <th>Registration last date</th>
         <td> <input type="text" class="form-control" id="reglastdate" name='reglastdate' value="<?php echo $row['reglastdate']?>"/></td>
	</tr>
	<tr>
	<th>Status</th>
	<td> 
	<div class="radio">
	<label><input type="radio" name="statuss" <?php if($row['status']=='yes') { echo "checked=checked";}?> value='yes' id="statuss"/>Yes</label>
	</div>
	<div class="radio">
	<label><input type="radio" name="statuss" <?php if($row['status']=='no') { echo "checked=checked";}?> value='no' id="statuss"/>No</label>
	</div> 
	</td>
	</tr> 
	<tr><th>Sit limit</th>
	<td><input type="text" name='sitlimit' id='sitlimit' value="<?php echo $row['sitlimit']?>" class="form-control"></td></tr>
	<tr>
	   <th>Enable userfeedback</th>
	   <td>
    <div class="radio">
	<label><input type="radio" name="enablefeedback" <?php if($row['enablefeedback']=='yes') { echo "checked=checked";}?> value='yes' id="enablefeedback"/>Yes</label>
	</div>
	<div class="radio">
	<label><input type="radio" name="enablefeedback" <?php if($row['enablefeedback']=='no') { echo "checked=checked";}?> value='no' id="enablefeedback"/>No</label>
	
	</div> 
	</td>
	</tr>
	 </table>
	 </div>
<?php
} 
?>