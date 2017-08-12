<?php
    $today=date('Y-m-d',time());
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);
	$query="SELECT recordid,startdate,enddate from timelimit where status='open'";
	$ret=mysqli_query($con,$query);

  

	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("Dates");
	$doc->appendChild($root);
	
	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
        
		$node=$doc->createElement("date");
		
		$recordid=$doc->createElement("recordid");
		$startdate=$doc->createElement("startdate");
		$enddate=$doc->createElement("enddate");

		$recordid->appendChild($doc->createTextNode($row["recordid"]));
		$startdate->appendChild($doc->createTextNode($row["startdate"]));
		$enddate->appendChild($doc->createTextNode($row["enddate"]));


		
	$node->appendChild($recordid);
	$node->appendChild($startdate);
	$node->appendChild($enddate);     
	$root->appendChild($node);
	}
    
	echo $doc->saveXML();
?>