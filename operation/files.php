<?php
$con=mysqli_connect("localhost","root","","myproject");
$query="select * from files";
$result=mysqli_query($con,$query);
$numrows=mysqli_num_rows($result);
if($numrows>0){
    if($numrows>1){
        echo $numrows." new files";
    }else if($numrows==1){
        echo $numrows." new file";
    }
}else{
    echo 0;
}

?>