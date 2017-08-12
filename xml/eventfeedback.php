<?php
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);
	$query="SELECT eventname,eventdate,ulg.id,name,batch,date,eventquality,eventsuccess,helpful,content from event evt, user_login ulg,  eventfeedback evtf  where ulg.id=evtf.id and evt.eid=evtf.eid and flag='no'";
	$ret=mysqli_query($con,$query);
	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("All_feedback");
	$doc->appendChild($root);
	
	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
		$node=$doc->createElement("All_feedbacks");
		
		$eventname=$doc->createElement("eventname");
		$eventdate=$doc->createElement("eventdate");
		$id=$doc->createElement("id");
		$name=$doc->createElement("name");
		$batch=$doc->createElement("batch");
		$date=$doc->createElement("date");
		$eventquality=$doc->createElement("eventquality");
		$eventsuccess=$doc->createElement("eventsuccess");
		$helpful=$doc->createElement("helpful");
		$content=$doc->createElement("content");
		
		$eventname->appendChild($doc->createTextNode($row["eventname"]));
		$eventdate->appendChild($doc->createTextNode($row["eventdate"]));
		$id->appendChild($doc->createTextNode($row["id"]));
		$name->appendChild($doc->createTextNode($row["name"]));
		$batch->appendChild($doc->createTextNode($row["batch"]));
		$date->appendChild($doc->createTextNode($row["date"]));
		$eventquality->appendChild($doc->createTextNode($row["eventquality"]));
		$eventsuccess->appendChild($doc->createTextNode($row["eventsuccess"]));
		$helpful->appendChild($doc->createTextNode($row["helpful"]));
		$content->appendChild($doc->createTextNode($row["content"]));
		
	$node->appendChild($eventname);
	$node->appendChild($eventdate);
	$node->appendChild($id);
	$node->appendChild($name);
	$node->appendChild($batch);
	$node->appendChild($date);
	$node->appendChild($eventquality);
	$node->appendChild($eventsuccess);
	$node->appendChild($helpful);
	$node->appendChild($content);
        
	$root->appendChild($node);
	}
	echo $doc->saveXML();
?>