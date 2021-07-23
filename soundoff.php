<?php

$user = strtoupper(htmlspecialchars($_GET["name"]));
$id = htmlspecialchars($_GET["id"]);

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
$sql = "SELECT * FROM $user WHERE ID = $id";
	$ret = $db->query($sql);	
	
	$lees = array();
	
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $lees = $row["Status"];

if($lees == "Ongelezen"){
	$new = "Gelezen";
}else {
	$new = "Ongelezen";
}
$sql2=<<<EOF
UPDATE '$user' SET `Status` = '$new' WHERE ID = '$id';
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
	}
	}
?>


