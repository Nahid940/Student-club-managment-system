<?php
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);

    $value="select name,reg.id,batch,permit from user_login usg, registration reg where usg.id=reg.id and usertype='member' and permit='no'";
	$ret=mysqli_query($con,$value);
	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("All_post");
	$doc->appendChild($root);
	
	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
		$node=$doc->createElement("Members");
		
		$name=$doc->createElement("name");
		$id=$doc->createElement("id");
		$batch=$doc->createElement("batch");
		$permit=$doc->createElement("permit");

		
		$name->appendChild($doc->createTextNode($row["name"]));
		$id->appendChild($doc->createTextNode($row["id"]));
		$batch->appendChild($doc->createTextNode($row["batch"]));
		$permit->appendChild($doc->createTextNode($row["permit"]));
		
	$node->appendChild($name);
	$node->appendChild($id);
	$node->appendChild($batch);
	$node->appendChild($permit);
        
	$root->appendChild($node);
	}
	echo $doc->saveXML();
?>