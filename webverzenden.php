<?php
include('header.php');
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
?>
</div>	</div>
<div class = "container" style="position: absolute;top:6%;left: 25%; text-align:left;">
<h9>SpinLinkMail verzenden</h9>

<form action = "" method ="POST">
<br>
<p>Bericht aan:

<select name="send_to" >
  <option selected="selected">Kies een naam</option>
  <?php
  $sql = "SELECT * FROM Groepen ORDER BY 'Groep'"; 
	$ret = $db->query($sql);
	$grp["tekst"] = array();
	$x["tekst"] = array();
	array_push($x["tekst"], "STUDIOSPINLINK");
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	$grp["tekst"] = $row['Groep'];
	if($grp["tekst"]!="STUDIOSPINLINK"){
	array_push($x["tekst"], $grp["tekst"]);
	}
	}	
	$i=0;
    foreach($x["tekst"] as $name) { $i=$i+1;
	$sql6 = "SELECT * FROM $name"; 
	$ret6 = $db->query($sql6);
	if(!$ret) {
      echo $db->lastErrorMsg();
   }
	while($row = $ret6->fetchArray(SQLITE3_ASSOC) ){
		if ($row["Gebruikersnaam"] == $user){		
	?>
      <option value="<?= $i ?>"><?= $name ?></option>
  <?php
    }
	}
	}
	?> 
</select> 
<br>
<br>
<input type="tekst" name="onderwerp" placeholder="onderwerp" /><br>
<textarea name="message" style="height:100px;background: transparent;">
</textarea> 
<br> 
<input type="submit" name="OK" value="versturen" />
</p>
<?php

$t = time();

$token = "";
$user = $_SESSION['user'];
if(isset($_POST['OK'])){
$msg = htmlspecialchars($_POST["message"]);
if (!strlen(trim($_POST['message']))){
	
	echo "er is geen bericht getypt!";
	die;
}
$z = $_POST['send_to'];
if ($z == "Kies een naam"){
	$z = 1;
}
$ond = $_POST['onderwerp'];
	$i=0;
   	$name = $x["tekst"][$z-1];
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
}
	?>
	

</div>
</body>
</html>