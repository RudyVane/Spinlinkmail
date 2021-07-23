<?php
$user = htmlspecialchars($_GET["name"]);

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

    $sql = "SELECT * FROM `Berichten` WHERE `Afzender` = '$user'";
	$ret = $db->query($sql);
    
	$response["tekst"] = array();
	$text["text"] = array();
	$bericht["text"] = array();
	$timestamp["text"] = array();
	$new["text"] = array();
	
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $text["text"] = $row["Bericht"];
		$timestamp["text"] = $row["Tijd"];
		$sender["text"] = $row["Groep"];	
		$new["text"] = $row["Status"];		
		$crypted_token = $text["text"];
		$id["text"] = $row["Id"];
		 
	
		
		
list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
  $cipher_method = 'AES-256-CTR';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $bericht["text"] = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
  
  array_push($response["tekst"],  $id, $sender, $timestamp, $bericht, $new);
  
    }


echo json_encode($response);
  
?> 