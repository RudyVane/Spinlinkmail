<?php
session_start();
 $user = $_SESSION['user'];
 $sql=null;
 $sql2=null;
 $sql3=null;
 $sql4=null;
 
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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Berichten</title>
<link rel="apple-touch-icon" href="logowit.png">
<link rel="shortcut icon" href="logotrans.png">
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
	border: 1px solid #88CFBE;
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
			</div>	</div>
<div class = "container" style="position: absolute;top:10%;left: 25%; text-align:left;">
<h9>Bericht verzenden</h9>

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
$t = "";
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

$t = time();
	
$token = $msg;

  $cipher_method = 'AES-256-CTR';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $crypted_token = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
  unset($token, $cipher_method, $enc_key, $enc_iv);
    
 $status = "Ongelezen";
 $sql = "SELECT * FROM $name";
 $ret = $db->query($sql);
   if(!$ret) {
   echo $db->lastErrorMsg();}
 while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   $naar = $row['Gebruikersnaam'];
   $sql2 =<<<EOF
	   INSERT INTO $naar (`Afzender`, `Groep`, `Onderwerp`, `Bericht`,`Tijd`,`Status`) 
	   VALUES ('$user','$name', '$ond', '$crypted_token','$t','$status');
	   
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