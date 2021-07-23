<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>SpinLink</title>
<link rel="apple-touch-icon" href="logowit.png">
<link rel="shortcut icon" href="logotrans.png">
<link rel="stylesheet" type="text/css" href="stylessl.css">
<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 
<style>
#bg-image {
    height: 100%;
    width: 100%;
    position: absolute;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 50% 100%;
	background-color:#d7f7e0;
    opacity: 0.3;
}
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
	font-size:2.5vw;
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
<body>
<div id="bg-image"></div>
<div class = "container" style="position: absolute;top:3%;left: 1%; text-align:left;">

<img src="spinlinktrans.png" width="15%" height="15%"><br><br>
<br><br><br><br><br><br>
<div class = "container" style="position: absolute;left: 2%; text-align:left;">
<a href="SpinLink.apk" download>Klik hier om de<br><img src="post1.png" style="max-width:10%;height:auto;" class="center";><br>app te downloaden
</a>
</div></div>

<div class = "container" style="position: absolute;top:6%;left: 25%; width:70%; text-align:left;">

<h9>Welkom bij de SpinLink WebApp</h9>
<br><br>
<p>Hier vind je het planbord, het werkrooster en de berichtenapp.<br>
<p>De berichtenapp is voor PC, laptop, tablet en smartphone!<br>
Verstuur en lees berichten vanaf je PC, laptop, tablet of smartphone, waar je ook bent. <br>
De app is niet gebonden aan een toestelnummer of iets dergelijks.<br>
<br>
Hier kun je inloggen voor het gebruik van de app om berichten te lezen en/of te verzenden via de website.</p>

<br>

<br>

<form action = "" method ="POST">
 <table style="width:40%"><p>
  <tr>
    <td>Gebruikersnaam</td>
    <td><input type="text" name="user" size="10" required/></td>
  </tr>
  <tr>
    <td>Wachtwoord</td>
    <td><input type="password" name="psw" size="10" required/>
	<input type="submit" name="Start" value="Login" />
	</td>
	  </tr>
  </table> </p>


</form>
</div>
</div>

<?php

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
	
if(isset($_POST['Start'])){
$naam = htmlspecialchars($_POST["user"]);
$psw = htmlspecialchars($_POST["psw"]);
$user = strtoupper($naam);
$_SESSION["user"] = $user;
$response = array();
 

 $sql = "SELECT * FROM Namen WHERE Naam='$user'"; 
	$ret = $db->query($sql);
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
			
			if (password_verify($psw, $row["Wachtwoord"])){ 
  //Password OK
  if ($user == "ADMIN"){
  echo "<script type='text/javascript'> document.location = 'user.php'; </script>";
}else {
	echo "<script type='text/javascript'> document.location = 'SpinLinkMailLezen.php'; </script>";
}
			}
else{
?>	<p style = "color:red; font-size:16;"><?php
  echo "Wachtwoord is ongeldig!";
					die;
}
			
				
	
		
		}
?>	<p style = "color:red; font-size:16;"><?php
			echo "Deze gebruikersnaam bestaat niet!";
			die;
				

}


	




?>