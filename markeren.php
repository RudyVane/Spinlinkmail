<?php

session_start();
$user = $_SESSION['user'];

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

 
$sql =<<<EOF
		UPDATE '$user' SET `Status` = "Gelezen";
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }
	
echo "<script type='text/javascript'> document.location = 'webberichten.php'; </script>";

?>


