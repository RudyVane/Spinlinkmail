<?php
$sender = htmlspecialchars($_GET["username"]);
$naam = htmlspecialchars($_GET["send_to"]);
$ond = htmlspecialchars($_GET["onderwerp"]);
$msg = htmlspecialchars($_GET["bericht"]);


$name = strtoupper($naam);
$user = strtoupper($sender);
$token = "";
$t = time();



class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('SpinLinkMail.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      
   }    


		
	
$msgcode = base64_encode($msg);
  
 $status = "Ongelezen";
 $sql = "SELECT * FROM $name";
 $ret = $db->query($sql);
   if(!$ret) {
   echo $db->lastErrorMsg();}
 while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   $naar = $row['Gebruikersnaam'];
   $sql2 =<<<EOF
	   INSERT INTO $naar (`Afzender`, `Groep`, `Onderwerp`, `Bericht`,`Tijd`,`Status`) 
	   VALUES ('$user','$name', '$ond', '$msgcode','$t','$status');
	   
EOF;
	$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   }
   }
	
	?>
	
	
	
	
	
