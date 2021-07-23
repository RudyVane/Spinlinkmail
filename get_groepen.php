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
 
 $sql = "SELECT * FROM `Groepen`";  
 $ret = $db->query($sql);	
    
	$response["groep"] = array();
	$groep["text"] = array();
	$groep["text"] = "STUDIOSPINLINK";
	array_push($response["groep"], $groep);
	
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
		$groep["text"] = $row["Groep"];	$gr = $groep["text"];	
		if($groep["text"]!="STUDIOSPINLINK"){
			$sql2 = "SELECT * FROM $gr ";
			$ret2 = $db->query($sql2);
			 while($row = $ret2->fetchArray(SQLITE3_ASSOC) ){
				 if($row["Gebruikersnaam"] == $user){
					array_push($response["groep"], $groep);
  }
  
    }

	}	
		
	}
echo json_encode($response);


	
	?>