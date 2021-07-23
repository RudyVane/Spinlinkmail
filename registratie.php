<?php
$user = strtoupper(htmlspecialchars($_GET["name"]));
$aan = strtoupper(htmlspecialchars($_GET["aan"]));
$reg = strtoupper(htmlspecialchars($_GET["reg"]));
$dat = date("d-m-Y H:i");


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
if($aan == "AANWEZIG"){ 
$sql=<<<EOF
UPDATE 'Registratie' SET `Aanwezigheid` = '$aan', `Datum`= '$dat' WHERE `Naam` = '$user';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   }
}
else{
	$sql=<<<EOF
UPDATE 'Registratie' SET `Aanwezigheid` = '$aan', `Afwezig`= '$dat' WHERE `Naam` = '$user';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   }
}
	echo json_encode($aan);
	
	?>