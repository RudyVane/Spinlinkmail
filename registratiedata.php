<?php
$user = strtoupper(htmlspecialchars($_GET["name"]));


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
$sql = "SELECT * FROM `Registratie` WHERE `Naam` = '$user' ";
	$ret = $db->query($sql);
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	$response = $row["Aanwezigheid"];
	}
	echo json_encode($response);
	
	
	?>