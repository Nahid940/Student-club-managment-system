<?php
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);
	$query="SELECT * from userfeedback where flag='no'";
	$ret=mysqli_query($con,$query);
	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("All_post");
	$doc->appendChild($root);
	
	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
		$node=$doc->createElement("All_feedbacks");
		
		$id=$doc->createElement("id");
		$date=$doc->createElement("date");
		$experience=$doc->createElement("experience");
		$happy=$doc->createElement("happy");
		$content=$doc->createElement("content");
		
		$id->appendChild($doc->createTextNode($row["id"]));
		$date->appendChild($doc->createTextNode($row["date"]));
		$experience->appendChild($doc->createTextNode($row["experience"]));
		$happy->appendChild($doc->createTextNode($row["happy"]));
		$content->appendChild($doc->createTextNode($row["content"]));
		
	$node->appendChild($id);
	$node->appendChild($date);
	$node->appendChild($experience);
	$node->appendChild($happy);
	$node->appendChild($content);
        
	$root->appendChild($node);
	}
	echo $doc->saveXML();
?>