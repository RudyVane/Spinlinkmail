<?php
$naam = htmlspecialchars($_GET["name"]);
$psw = htmlspecialchars($_GET["psw"]);

$user = strtoupper($naam);


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
	


$response["tekst"] = array();
$pass["text"] = array();


 $sql = "SELECT * FROM Namen WHERE Naam='$user'"; 
	$ret = $db->query($sql);
	if($row = $ret->fetchArray(SQLITE3_ASSOC) ){
			
			if (password_verify($psw, $row["Wachtwoord"])){ 
 //Password OK
$pass["text"] = "OK" ;
  
}
else{
$pass["text"] = "PSWFalse" ;



}
		}else {
			$pass["text"] = "UserFalse" ;
		}
			
array_push($response["tekst"],  $pass);
		
		
echo json_encode($response);	

		


?>