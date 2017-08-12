<?php
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);

    $value="select ulg.id,name,batch,eventname,usertype from user_login ulg, event ev, studentevent sev where ulg.id=sev.id and ev.eid=sev.eid and confirm='no'";
	$ret=mysqli_query($con,$value);
	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("Participants");
	$doc->appendChild($root);
	

	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
		$node=$doc->createElement("Members");
        $id=$doc->createElement("id");
		$name=$doc->createElement("name");
		$batch=$doc->createElement("batch");
		$usertype=$doc->createElement("usertype");
		$eventname=$doc->createElement("eventname");
		
		
        $id->appendChild($doc->createTextNode($row["id"]));
		$name->appendChild($doc->createTextNode($row["name"]));
		$batch->appendChild($doc->createTextNode($row["batch"]));
		$usertype->appendChild($doc->createTextNode($row["usertype"]));
		$eventname->appendChild($doc->createTextNode($row["eventname"]));
        
		$node->appendChild($id);
        $node->appendChild($name);
        $node->appendChild($batch);
        $node->appendChild($usertype);
        $node->appendChild($eventname);
        

        $root->appendChild($node);
	}

	echo $doc->saveXML();
?>