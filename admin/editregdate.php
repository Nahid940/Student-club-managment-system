<?php
$con=mysqli_connect("localhost","root","","myproject");
if (($_POST['recordid'])) {
 $recordid = $_POST['recordid'];
 $query = "SELECT * from timelimit WHERE recordid='$recordid'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
 ?>
	 <div class="table-responsive">
<!--	 <form action="" method="post">-->
	 <input type="text" value="<?php echo $row['recordid']?>" id="recordidupdate" name="recordidupdate"/>
	 <table class="table table-striped table-bordered">
	 <tr>
	 <th>Start date</th>
	 <td><input type="text" class="form-control" value="<?php echo $row['startdate']?>" id="startdates" name="startdates"/></td>
	 </tr>
	 <tr>
	 <th>End date</th>
	 <td><input type="text" class="form-control" value="<?php echo $row['enddate']?>" id="enddates" name="enddates"/></td>
	</tr>
	 </table>
<!--	// </form>-->
	 </div>
<?php
} 
?>