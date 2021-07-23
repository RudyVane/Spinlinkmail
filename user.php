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

<h9>SpinLink deelnemers</h9>
<br><br>


<p1>Registreer nieuwe gebruikers met een gebruikersnaam en wachtwoord:
</p1>
<p>wachtwoord moet bestaan uit minimaal 8, maximaal 16 karakters; minimaal 1 hoofdletter, 1 cijfer en 1 teken uit de reeks @#\-_$%^&+=§!\?</p>
<form action = "" method ="POST">
<table style="width:40%">
  <tr>
    <td>Gebruikersnaam</td>
    <td><input type="text" name="user" required/></td>
  </tr>
  <tr>
    <td>Wachtwoord</td>
	<td><input type="password" name="ww" required/></td></tr> 
  <tr>
    <td>Herhaal wachtwoord</td>
	<td><input type="password" name="ww2" required/>
	<input type="submit" name="OK" value="Registreer" />
	</td>
	  </tr>
</table> </p><br><br>
</form>

  <p1>Voeg avatar toe</p1><br>
  <p>Selecteer de persoon</p>
<form action = "" method ="POST">
<?php
$ww="";
$ww2="";
$sql = "SELECT * FROM Namen";
$ret = $db->query($sql);
   
		$responseidpva = array();
		$responsenmpva = array();
		$textidpva = array();
		$textnmpva = array();
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $textidpva = $row["Id"]; 
		$textnmpva = $row["Naam"];
		 
        array_push($responseidpva, $textidpva);
		array_push($responsenmpva, $textnmpva);
		
    }
$i = 0;
foreach($responseidpva as $id){

?>
<input type="radio" name="check_list_ava[]" value="<?php echo $i?>"<label><?php echo $responsenmpva[$i]?></label><br/>
<?php
$i++;
}
$_SESSION["idva"] = $responseidpva;
$_SESSION["nmva"] = $responsenmpva;
?> 
	<input type="submit" name="select" value="Bevestig" /><br>
<?php
if(isset($_POST['select'])){//to run PHP script on submit
			
	if(!empty($_POST['check_list_ava'])){
	$residva = array();
	$resnmva = array();
	$residva = $_SESSION["idva"];
	$resnmva = $_SESSION["nmva"];
foreach($_POST['check_list_ava'] as $selected){
	$i = $selected; 
	$nmva = $resnmva[$i]; 
	$idva = $residva[$i];
	$_SESSION["naam"] = $nmva;
	}unset($_POST['select']);

	echo "<script type='text/javascript'> document.location = 'opladen.php'; </script>";
}

}	
?>	
	

<br><br>

<p1>Verwijder gebruikers:</p1>

<p>Selecteer de persoon/personen</p><br>
<form action = "" method ="POST">
<?php

$sql = "SELECT * FROM Namen";
$ret = $db->query($sql);
   
		$responseidpv = array();
		$responsenmpv = array();
		$textidpv = array();
		$textnmpv = array();
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $textidpv = $row["Id"]; 
		$textnmpv = $row["Naam"];
		if ($textnmpv != "ADMIN"){
 
        array_push($responseidpv, $textidpv);
		array_push($responsenmpv, $textnmpv);
		}
    }
$i = 0;
foreach($responseidpv as $id){

?>
<input type="checkbox" name="check_list[]" value="<?php echo $i?>"<label><?php echo $responsenmpv[$i]?></label><br/>
<?php
$i++;
}
$_SESSION["idv"] = $responseidpv;
$_SESSION["nmv"] = $responsenmpv;
?> 
	<input type="submit" name="Submit" value="Verwijderen" />
<br><br><br>
</div>
</div>
<?php

if(isset($_POST['OK'])){
$naam = htmlspecialchars($_POST["user"]);
$ww = htmlspecialchars($_POST["ww"]);
$ww2 = htmlspecialchars($_POST["ww2"]);
$user = strtoupper($naam);
$_SESSION["user"] = "ADMIN";        

if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,16}$/',$ww)) {
?><p style = "color:red; font-size:16;"><?php
   echo 'Het wachtwoord voldoet niet aan de eisen';die;
}
else
{
if ($ww != $ww2){
?><p style = "color:red; font-size:16;"><?php
	echo "wachtwoorden komen niet overeen, probeer opnieuw";
	die;
}}

// array for JSON response
$response = array();
 

 $sql = "SELECT * FROM Namen"; 
	$ret = $db->query($sql);
	
	$response = array();
	
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $text = array();
     
		$text["text"] = $row["Naam"];
		
        // push single text into final response array
		if($row["Naam"] == $user){
		
			array_push($response["false"]);
		}    
}

if ($response != null){
?>
<p style = "color:red; font-size:16;">
<?php
echo "Gebruikersnaam bestaat al, kies een andere!";
die;
}
$wachtwoord= password_hash($ww, PASSWORD_DEFAULT);
$sql =<<<EOF
		INSERT INTO `Namen` (`Naam`,`Wachtwoord`,`Rooster`) 
		VALUES ('$user','$wachtwoord','nee');
EOF;
	
	$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   }
   
$sql5 =<<<EOF
		INSERT INTO `Registratie` (`Naam`) 
		VALUES ('$user');
EOF;
	
	$ret5 = $db->exec($sql5);
   if(!$ret5) {
      echo $db->lastErrorMsg();
   }
   
$sql1 =<<<EOF
		CREATE TABLE $user (ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
							Afzender  VARCHAR(100) NOT NULL,
							Groep	  VARCHAR(100) NOT NULL,
							Onderwerp VARCHAR(100),
							Bericht   TEXT,
							Tijd	  VARCHAR(100) NOT NULL,
							Status	  VARCHAR(100) NOT NULL);
EOF;
 $ret1 = $db->exec($sql1);
   if(!$ret1) {
      echo $db->lastErrorMsg();
   }
   $tijd = time(); $afz = "ADMIN"; $grp = "STUDIOSPINLINK"; $ond = "Welkom"; $ber = "Welkom op de SpinLinkMail App!"; $status = "Ongelezen";
   $token = $ber;

  $cipher_method = 'AES-256-CTR';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $crypted_token = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
  unset($token, $cipher_method, $enc_key, $enc_iv);
$sql4 =<<<EOF
		INSERT INTO '$user' (Afzender,Groep,Onderwerp,Bericht,Tijd,Status) 
		VALUES ('$afz','$grp','$ond','$crypted_token','$tijd','$status');
EOF;
	
	$ret4 = $db->exec($sql4);
   if(!$ret4) {
      echo $db->lastErrorMsg();
   }    
   
$sql2 = "SELECT * FROM Namen WHERE `Naam` = '$user'";
$ret2 = $db->query($sql2);
$id = array();
   while($row = $ret2->fetchArray(SQLITE3_ASSOC) ){
	   $id = $row['Id'];
   }
   $userid = $id;
$sql3 =<<<EOF
		INSERT INTO `STUDIOSPINLINK` (Gebruikers_ID,Gebruikersnaam) 
		VALUES ('$userid','$user');
EOF;
	
	$ret3 = $db->exec($sql3);
   if(!$ret3) {
      echo $db->lastErrorMsg();
   }
	echo "<script type='text/javascript'> document.location = 'user.php'; </script>";

}

if(isset($_POST['Submit'])){//to run PHP script on submit
			
	if(!empty($_POST['check_list'])){
	$residv = array();
	$resnmv = array();
	$residv = $_SESSION["idv"];
	$resnmv = $_SESSION["nmv"];
foreach($_POST['check_list'] as $selected){
	$i = $selected; 
	$nmv = $resnmv[$i]; 
	$idv = $residv[$i]; 
	$sql="DELETE FROM Namen WHERE Id = $idv";
	$ret = $db->query($sql);
	$sql5="DROP TABLE '$nmv'";
	$ret5 = $db->query($sql5);
	$sql6 = "SELECT * FROM Groepen";
	$ret6 = $db->query($sql6);
	while($row = $ret6->fetchArray(SQLITE3_ASSOC) ){
	   $g = $row['Groep'];
	   $sql8 = "DELETE FROM $g WHERE Gebruikersnaam = '$nmv'";
		$ret8 = $db->query($sql8);	   
   }
  }	
}

echo "<script type='text/javascript'> document.location = 'user.php'; </script>";
}
	
?>


