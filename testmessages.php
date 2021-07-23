<?php 
session_start();

$user = $_SESSION['user'];
$grps = "ALLES";

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
$x = 3600*24*30;
$t = time()-$x;
$sql = "SELECT * FROM $user WHERE Tijd >= '$t' ORDER BY `ID`";
	$ret = $db->query($sql);	
		   
	$timestamp = array();
		
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        
		$timestamp = $row["Tijd"];
		
				
		}
	
	
//echo json_encode($response);
  
$myObj = new stdClass(); 

$myObj->tijd=$timestamp; 

   
$myJSON = json_encode($myObj); 
   
echo $myJSON; 
?> 