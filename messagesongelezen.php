<?php
$user = strtoupper(htmlspecialchars($_GET["name"]));
$user="RUDY";
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


    $sql = "SELECT * FROM `Berichten` ORDER BY `Id`";
	$ret = $db->query($sql);	
	
	   
	$response["id"] = array();
	$response["groep"] = array();
	$response["sender"] = array();
	$response["bericht"] = array();
	$response["onderwerp"] = array();
	$response["time"] = array();
	$response["new"] = array();
	$response["tel"] = array();
	$text = array();
	$bericht = array();
	$timestamp = array();
	$groep = array();
	$onderwerp = array();
	$sender = array();
	$new = array();
	$teller = array();
	$tel = 0;
	$aantal = 0;
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $text = $row["Bericht"]; 
		$timestamp = $row["Tijd"];
		$sender = $row["Afzender"];	
		$groep = $row["Groep"];
		$onderwerp = $row["Onderwerp"];			
		$crypted_token = $text;
		$id = $row["Id"];
		$new = $row["$user"];
		$num=$id;
		if ($new == "Ongelezen") {
			$tel = $tel + 1;
			
		
		array_push($nummer["tekst"], $id);	
		$grp = $groep;
		$sql2 = "SELECT * FROM $grp WHERE `Gebruikersnaam` = '$user'";
				$ret2 = $db->query($sql2);
				while($row = $ret2->fetchArray(SQLITE3_ASSOC) ){ 
				
				if($row['Gebruikersnaam'] == $user) {
				
				
			list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
  $cipher_method = 'AES-256-CTR';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $bericht = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
  
  array_push($response["id"],$id);
  array_push($response["groep"],$groep);
  array_push($response["sender"],$sender);
  array_push($response["time"],$timestamp);
  array_push($response["onderwerp"],$onderwerp);
  array_push($response["bericht"],$bericht);
  array_push($response["new"],$new);
  
		} 
	}
		}else{
			$grp = $groep;
		$sql2 = "SELECT * FROM $grp WHERE `Gebruikersnaam` = '$user'";
				$ret2 = $db->query($sql2);
				while($row = $ret2->fetchArray(SQLITE3_ASSOC) ){ 
				
				if($row['Gebruikersnaam'] == $user) {
				
				
			list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
  $cipher_method = 'AES-256-CTR';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $bericht = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
  
  array_push($response["id"],$id);
  array_push($response["groep"],$groep);
  array_push($response["sender"],$sender);
  array_push($response["time"],$timestamp);
  array_push($response["onderwerp"],$onderwerp);
  array_push($response["bericht"],$bericht);
  array_push($response["new"],$new);
  
		} 
	}
		}
}
$teller["text"] = "$tel";

	array_push($response["tel"],  $teller);
	
	
echo json_encode($response);
  
?> 
