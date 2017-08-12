<?php
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);
	$query="SELECT * from post";
	$ret=mysqli_query($con,$query);
	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("All_post");
	$doc->appendChild($root);
	
	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
		$node=$doc->createElement("post");
		
		$posttitle=$doc->createElement("posttitle");
		$date=$doc->createElement("date");
		$authorname=$doc->createElement("authorname");
		$content=$doc->createElement("content");
		
		$posttitle->appendChild($doc->createTextNode($row["posttitle"]));
		$date->appendChild($doc->createTextNode($row["date"]));
		$authorname->appendChild($doc->createTextNode($row["authorname"]));
		$content->appendChild($doc->createTextNode($row["content"]));
		
	$node->appendChild($posttitle);
	$node->appendChild($date);
	$node->appendChild($authorname);
	$node->appendChild($content);
        
	$root->appendChild($node);
	}
	echo $doc->saveXML();
?>