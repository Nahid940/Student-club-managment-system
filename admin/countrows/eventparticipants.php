<?php
    $con= mysqli_connect("localhost","root","","myproject");
      $query2="Select COUNT(confirm) AS pendingreq from studentevent where confirm='no'";
		$result2=mysqli_query($con,$query2);
		$row2=mysqli_fetch_array($result2);
    if($row2['pendingreq'] >=1){
        echo $row2['pendingreq'];
    }else if($row2['pendingreq']==0){
        echo 0;
    }
?>