<?php
session_start();

$user = $_SESSION['user'];$user = "TESTRUDY";
$select = "ALLES";
if (!isset($_SESSION['user'])) {
        echo "<p style = 'color:red; font-size:20;'>" . "Please Login again    ";
        echo "<a href='login.php'>Click Here to Login</a>";
    }
	else {	
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
	}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="apple-touch-icon" href="logowit.png">
<link rel="shortcut icon" href="logotrans.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Berichten</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">
<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 
<style>
.button {
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 500px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:500px;
}
input {
	font-size:14px;
	border: 1px solid #bebebe;
}		
a {
	color: #88CFBE;
}
@media screen and (max-width: 600px) {
p {
	font-size:4vw;
}
p1 {
	font-size:3vw;
}
h9 {
	font-size:6vw;
}
a {
	font-size:2vw;
}
td {
	font-size:4vw;
}
input {
	font-size:8px;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid #88CFBE;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.btn-mail .button{
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 200px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:200px;
}	
}
</style> 
</head>
<body >

<div class = "container" style="position: absolute;top:5%;left: 1%; text-align:left;">

<img src="spinlinklogo.jpg" style="width:25%;height:auto;"; class = "center">
<br>




	<div class = "btn-group">
				<button class="button" onclick="location='SpinLinkMailVerzenden.php'">Berichten verzenden</button>
				<button class="button" onclick="location='SpinLinkMailLezen.php'">Berichten lezen</button>
				<button class="button" onclick="location='SpinLinkMailMarkeren.php'">Markeer alle berichten als gelezen</button>
			</div>	<p>Zoeken op:</p>
<form method="POST" action="">
<input type="tekst" name="zoeken" style='width:10em;'><br>
<input type="submit" name="find" value ="Zoeken" >
<br><br>
<p1>Selecteer groep</p1>
<br>
<?php
$grs = array();
$responsegrs = array();
array_push($responsegrs, "ALLES");

?>
<input type="submit" name="<?php echo $responsegrs[0] ?>" style='width:10em;' value ="ALLE GROEPEN"><br>
<?php
$sql = "SELECT * FROM `Groepen` ";
	$ret = $db->query($sql);
	$ct = 0;
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	$grs = $row["Groep"];
	$sql5 = "SELECT * FROM $grs WHERE `Gebruikersnaam` = '$user'";
				$ret5 = $db->query($sql5);
				while($row = $ret5->fetchArray(SQLITE3_ASSOC) ){ 
				
				if($row['Gebruikersnaam'] == $user) {
	array_push($responsegrs, $grs);
	$ct++;
	?>
<input type="submit" name="<?php echo $responsegrs[$ct] ?>" style='width:10em;' value ="<?php echo $responsegrs[$ct] ?>"><br>
<?php
		}
	}
}
?>
</form>
<?php
for($ct1 = 0;$ct1 <= $ct; $ct1++){
if (isset($_POST["$responsegrs[$ct1]"])) {
	$select = $responsegrs[$ct1];
}
}
?>
<div class = "container" style="position: absolute;left: 2%; text-align:left;">
<a href="SpinLinkMail.apk" download>Klik hier om de<br><img src="spinlinklogo2.jpg" style="max-width:20%;height:auto;" class="center";>
<br>
app te downloaden</a>
</div></div>
<?php
if (isset($_POST["find"])) {
	$_SESSION["zoek"] = $_POST["zoeken"];
	echo "<script type='text/javascript'> document.location = 'Gezocht.php'; </script>";
}
?>
			</div>
			
			
<div class = "container" style="position: absolute;top:10%;left: 25%; width:70%; text-align:left;">
<h9>Berichten</h9>
<br><br>
<form method="POST" action="">
	
	
<?php

$x = 3600*24*30;
$t = time()-$x;

$sql = "SELECT * FROM 'TESTRUDY' WHERE Tijd >= '$t' ORDER BY `Id` DESC";
	$ret = $db->query($sql);	
	
	$ond = array();
	$send = array(); 	
	$gr1 = array();	
	$ids = array();
	$ber = array();
	$response["tekst"] = array();
	$response["tel"] = array();
	$id["text"] = array();
	$text["text"] = array();
	$bericht["text"] = array();
	$message["text"] = array();
	$tijd["text"] = array();
	$groep["text"] = array();
	$onderwerp["text"] = array();
	$sender["text"] = array();
	$new["text"] = array();
	$teller["text"] = array();
	$tel=0;
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $text["text"] = $row["Bericht"];
		$tijd["text"] = $row["Tijd"];
		$sender["text"] = $row["Afzender"];	
		$groep["text"] = $row["Groep"];
		$onderwerp["text"] = $row["Onderwerp"];			
		$crypted_token = $text["text"];
		$id["text"] = $row["Id"];
		$new["text"] = $row["$user"];
		$num=$id["text"];
		if($groep["text"] == $select OR $select == "ALLES"){
		
		array_push($nummer["tekst"], $id["text"]);
		array_push($ids, $id["text"]);			
		
			list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
  $cipher_method = 'AES-256-CTR';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $message["text"] = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
  $bericht["text"] = str_replace("\\n","\n", $message["text"]); 
  array_push($ber,$bericht["text"]);
  array_push($send,$sender["text"]);
		array_push($ond,$onderwerp["text"]);
		array_push($gr1,$groep["text"]);
  $send1 = $sender["text"];
  $sql3 = "SELECT * FROM Namen WHERE `Naam` = '$send1'";
	if ($ret3 = $db->query($sql3)){
				
				while($row = $ret3->fetchArray(SQLITE3_ASSOC) ){ 
	$face = "faces/" . $row["Image"];
				}
	}
  ?>
  <div style="position: relative;top:1%;left: 1%; width:70%; height:200px; text-align:left;">  
  <img src="<?php echo $face ?>" style="width:10%;height:auto;">
  <div class = "btn-mail" style="position: absolute;top:1%;left: 15%; width:70%; text-align:left;"> 
  <button class="button">Van:<?php echo $send1 ?></button>
  <button class="button"><?php echo date('d-m-Y_H:i', $tijd["text"]) ?></button>
  <button class="button">Aan:<?php echo $groep["text"] ?></button>
  <button class="button">Onderwerp:<?php echo $onderwerp["text"] ?></button>
  <button class="button">Status:<?php echo $new["text"] ?></button>
  <?php
  if ($new["text"] == "Ongelezen"){
  ?>
  <textarea name="message"  style="height:100px; border:1px solid #88CFBE; text-align:center; color:black; background: transparent;" readonly ><?php echo $bericht["text"] ?></textarea> 
  <input type="submit" name="<?php echo "mark" . $tel ?>" style = "color:red" value ="Markeren als gelezen">
  <?php
  }
  else{
	  ?>
	  
  <textarea name="message"  style="height:100px; border:1px solid #88CFBE; text-align:center; color:white; background: gray;" readonly ><?php echo $bericht["text"] ?></textarea> 
  <?php
  }
  ?>
  <input type="submit" name="<?php echo $tel ?>" value ="Reageren">
  </div></div>
  <br><br>
  <div>
  <?php
		
		}	
	}
	
	
for ($a=1; $a <= $tel; $a++){
	$m = "mark" . $a;
	
if (isset($_POST["$m"])) {
$id = $ids[$a-1];	
$sql2=<<<EOF
UPDATE $user SET `Status` = 'Gelezen' WHERE Id = '$id';
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
	  
   }
   echo "<script type='text/javascript'> document.location = 'SpinLinkMailLezen.php'; </script>";
}
}
for ($i=1; $i <= $tel; $i++){
	
if (isset($_POST["$i"])) {
	$_SESSION['onderwerp'] = $ond[$i-1];
	$_SESSION['groep'] = $gr1[$i-1];
	$_SESSION['sender'] = $send[$i-1];
	$_SESSION['bericht'] = $ber[$i-1];
	echo "<script type='text/javascript'> document.location = 'SpinLinkMailReageren.php'; </script>";
}
}


?>

</form>
</div>
</body>
</html>
