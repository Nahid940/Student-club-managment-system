<?php
  $con=mysqli_connect("localhost","root","","myproject");

       
if(isset($_POST['token'])){
    $id=$_POST['studentid'];
//     $query="select name,batch from user_login where id=$id";
   $query="select name,ev.eid,eventname,eventdate,eventtime,roomnumber,confirm from event ev, studentevent sev,user_login ulg where ev.eid=sev.eid and ulg.id=sev.id and sev.id='$id'";
		$result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);
        $eventname=$row['eventname'];
        $eventdate=$row['eventdate'];
        $name=$row['name'];
require('fpdf/fpdf.php');
    

class PDF extends FPDF
{
    function Header()
    {
        // Logo
       // $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(5);
        // Title
        $this->Cell(0,10,'Event participation copy',0,10,'C');
        $this->Cell(0,10,'Date :'.$today = date("d.m.y"),0,10,'C');
       
        // Line break
        $this->Ln(20);
    }
    
    
        function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,0,'Authority Signature ________________________________        Student Signature _____________________________',0,0);
        //$this->Cell(40,10,'',0,0);
        //$this->Cell(0,10,,0,0);
    }
}
    
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0, 0, 'Event name : '.$eventname, 0, 0);
$pdf->Ln();
$pdf->Ln(); 
$pdf->Cell(0, 20, 'Name : '.$name . '   ID : ' .$id, 0, 0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,15,'Event date :'.$eventdate, 0, 0);
$pdf->Ln();

$pdf->Output();
}
?>



