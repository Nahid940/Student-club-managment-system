
<?php
$con=mysqli_connect("localhost","root","");
	$query="drop database if exists myproject";
if(mysqli_query($con,$query)){
	echo "Database Dropped </br>";
} 

	$query="create database myproject";
	mysqli_query($con,$query);
	$con=mysqli_connect("localhost","root","","myproject");

		
			
$table7="CREATE TABLE timelimit (
recordid int(5) NOT NULL AUTO_INCREMENT,
  startdate date DEFAULT NULL,
  enddate date DEFAULT NULL,
  status varchar(5) DEFAULT NULL,
  PRIMARY KEY (recordid))";
  if(mysqli_query($con,$table7)) echo "timelimit Table Created </br>";
else echo mysqli_error($con);








	
	$table8="CREATE TABLE user_login (
	name varchar(50) DEFAULT NULL,
  password varchar(100) DEFAULT NULL,
  id varchar(20) NOT NULL DEFAULT '',
  contactno varchar(20) DEFAULT NULL,
  address varchar(100) DEFAULT NULL,
  email varchar(25) DEFAULT NULL,
  gender varchar(8) DEFAULT NULL,
  bloodgroup varchar(3) DEFAULT NULL,
  batch varchar(10) DEFAULT NULL,
  usertype varchar(10) DEFAULT NULL,
  permit varchar(5) DEFAULT NULL,
  active varchar(5) DEFAULT NULL,
  PRIMARY KEY (id))";
  
  if(mysqli_query($con,$table8)) echo "user_login Table Created </br>";
	else echo mysqli_error($con);

	
	$table1="CREATE TABLE admin (
	 email varchar(100) NOT NULL,
	 name varchar(50) NOT NULL,
	password varchar(50) NOT NULL,
	  PRIMARY KEY (email))";
	if(mysqli_query($con,$table1)) echo "admin Table Created </br>";
	else echo mysqli_error($con);
	
	
	$table2="CREATE TABLE event (
  eid int(5) NOT NULL AUTO_INCREMENT,
  eventname varchar(25) DEFAULT NULL,
  eventdate date DEFAULT NULL,
  eventtime varchar(6) DEFAULT NULL,
  reglastdate date DEFAULT NULL,
  roomnumber varchar(6) DEFAULT NULL,
  status varchar(5) DEFAULT NULL,
  sitlimit int(5) DEFAULT NULL,
  enablefeedback varchar(5) DEFAULT NULL,
  PRIMARY KEY (eid))";
  
  if(mysqli_query($con,$table2)) echo "event Table Created </br>";
	else echo mysqli_error($con);
	
	$table3="CREATE TABLE files (
	title varchar(50) DEFAULT NULL,
	date date DEFAULT NULL,
	file varchar(200) NOT NULL,
	type varchar(30) NOT NULL)";
  
  if(mysqli_query($con,$table3)) echo "files Table Created </br>";
	else echo mysqli_error($con);
	
	
	$table4="CREATE TABLE post (
	id int(100) unsigned NOT NULL AUTO_INCREMENT,
  posttitle varchar(1000) NOT NULL,
  date varchar(20) NOT NULL,
  authorname varchar(300) NOT NULL,
  keywords varchar(500) NOT NULL,
  content varchar(10000) NOT NULL,
  PRIMARY KEY (id))";
  
  if(mysqli_query($con,$table4)) echo "post Table Created </br>";
	else echo mysqli_error($con);
	
$table5="CREATE TABLE registration (
	id varchar(20) NOT NULL,
  reasonofjoining varchar(200) NOT NULL,
  fcaebookidname varchar(200) DEFAULT NULL,
  facebookprofilelink varchar(200) DEFAULT NULL,
  image varchar(200) DEFAULT NULL,
  recordid int(5) DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (recordid) REFERENCES timelimit (recordid) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id) REFERENCES user_login (id) ON DELETE CASCADE ON UPDATE CASCADE)";
  
  if(mysqli_query($con,$table5)) echo "registration Table Created </br>";
	else echo mysqli_error($con);	
	
	
	
$table6="CREATE TABLE studentevent (
eid int(5) NOT NULL,
id varchar(20) NOT NULL,
confirm varchar(5) NOT NULL,
PRIMARY KEY (eid,id),
FOREIGN KEY (eid) REFERENCES event (eid) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (id) REFERENCES user_login (id) ON DELETE CASCADE ON UPDATE CASCADE)";
  
  if(mysqli_query($con,$table6)) echo "studentevent Table Created </br>";
	else echo mysqli_error($con);
	

	

	$table9="CREATE TABLE userfeedback (
	id varchar(20) DEFAULT NULL,
  date date DEFAULT NULL,
  experience varchar(12) DEFAULT NULL,
  happy varchar(4) DEFAULT NULL,
  content varchar(1000) DEFAULT NULL,
  flag varchar(3) DEFAULT NULL)";
  
	  if(mysqli_query($con,$table9)) echo "userfeedback Table Created </br>";
		else echo mysqli_error($con);
		
	$table10="CREATE TABLE eventfeedback (
	  feedbackno int(5) NOT NULL AUTO_INCREMENT,
	  eid int(5) DEFAULT NULL,
	  id varchar(20) DEFAULT NULL,
	  eventquality varchar(14) DEFAULT NULL,
	  eventsuccess varchar(14) DEFAULT NULL,
	  helpful varchar(5) DEFAULT NULL,
	  content varchar(500) DEFAULT NULL,
	  date date DEFAULT NULL,
	  flag varchar(4) DEFAULT NULL,
	  PRIMARY KEY (feedbackno),

	  FOREIGN KEY (eid) REFERENCES event (eid) ON DELETE NO ACTION ON UPDATE NO ACTION,
	   FOREIGN KEY (id) REFERENCES user_login (id) ON DELETE NO ACTION ON UPDATE NO ACTION
	)";

	if(mysqli_query($con,$table10)) echo "eventfeedback Table Created </br>";
	else echo mysqli_error($con);

?>


