<?php
	header('Content-Type: text/xml;charset=utf-8');
	$host="localhost"; $user="root"; $pass=""; $database="myproject";
	$con=mysqli_connect($host,$user,$pass,$database);

    $value="select name,id,contactno,address,email,gender,bloodgroup,batch from user_login where usertype='user'";
	$ret=mysqli_query($con,$value);
	$num_results=mysqli_num_rows($ret);
	$doc=new DOMDocument();
	$doc->formatOutput=true;
	$root=$doc->createElement("All_members");
	$doc->appendChild($root);
	
//    if($num_results==0){
//        $node=$doc->createElement("Nodata");
//        $empty=$doc->createElement("contactno");
//        $empty->appendChild($doc->createTextNode("No data found"));
//        $node->appendChild($empty);
//        $root->appendChild($node);
//    }else{
	for ($i=0; $i<$num_results; $i++){
		$row=mysqli_fetch_array($ret, MYSQLI_ASSOC);
		$node=$doc->createElement("Members");
		
		$name=$doc->createElement("name");
	
		$id=$doc->createElement("id");
		$contactno=$doc->createElement("contactno");
		$address=$doc->createElement("address");
		$email=$doc->createElement("email");
		$gender=$doc->createElement("gender");
		$bloodgroup=$doc->createElement("bloodgroup");
		$batch=$doc->createElement("batch");
		
		$name->appendChild($doc->createTextNode($row["name"]));
		$id->appendChild($doc->createTextNode($row["id"]));
		$contactno->appendChild($doc->createTextNode($row["contactno"]));
		$address->appendChild($doc->createTextNode($row["address"]));
		$email->appendChild($doc->createTextNode($row["email"]));
		$gender->appendChild($doc->createTextNode($row["gender"]));
		$bloodgroup->appendChild($doc->createTextNode($row["bloodgroup"]));
		$batch->appendChild($doc->createTextNode($row["batch"]));

		
        $node->appendChild($name);
        $node->appendChild($id);
        $node->appendChild($contactno);
        $node->appendChild($address);
        $node->appendChild($email);
        $node->appendChild($gender);
        $node->appendChild($bloodgroup);
        $node->appendChild($batch);

        $root->appendChild($node);
	}
//    }
	echo $doc->saveXML();
?>