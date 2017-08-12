<?php
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);

    $value="select name,reg.id,contactno,address,email,gender,bloodgroup,batch,fcaebookidname,facebookprofilelink,permit from user_login usg, registration reg where usg.id=reg.id and usertype='member' and permit='yes'";
	$ret=mysqli_query($con,$value);
	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("All_post");
	$doc->appendChild($root);
	
	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
		$node=$doc->createElement("ActiveMembers");
		$name=$doc->createElement("name");
		$id=$doc->createElement("id");
		$contactno=$doc->createElement("contactno");
		$address=$doc->createElement("address");
		$email=$doc->createElement("email");
		$gender=$doc->createElement("gender");
		$bloodgroup=$doc->createElement("bloodgroup");
		$batch=$doc->createElement("batch");
		$fcaebookidname=$doc->createElement("fcaebookidname");
		$facebookprofilelink=$doc->createElement("facebookprofilelink");
		$permit=$doc->createElement("permit");

		
		$name->appendChild($doc->createTextNode($row["name"]));
		$id->appendChild($doc->createTextNode($row["id"]));
		$contactno->appendChild($doc->createTextNode($row["contactno"]));
		$address->appendChild($doc->createTextNode($row["address"]));
		$email->appendChild($doc->createTextNode($row["email"]));
		$gender->appendChild($doc->createTextNode($row["gender"]));
		$bloodgroup->appendChild($doc->createTextNode($row["bloodgroup"]));
		$batch->appendChild($doc->createTextNode($row["batch"]));
		$fcaebookidname->appendChild($doc->createTextNode($row["fcaebookidname"]));
		$facebookprofilelink->appendChild($doc->createTextNode($row["facebookprofilelink"]));
		$permit->appendChild($doc->createTextNode($row["permit"]));
		
	$node->appendChild($name);
	$node->appendChild($id);
	$node->appendChild($contactno);
	$node->appendChild($address);
	$node->appendChild($email);
	$node->appendChild($gender);
	$node->appendChild($bloodgroup);
	$node->appendChild($batch);
	$node->appendChild($fcaebookidname);
	$node->appendChild($facebookprofilelink);
	$node->appendChild($permit);
        
	$root->appendChild($node);
	}
	echo $doc->saveXML();
?>