<?php
session_start();
$grp = $_SESSION['grp'];
$user = $_SESSION['user'];
if ($grp == ""){
$select = "ALLES";
}
else {
	$select = $grp;
}
unset($_SESSION['grp']);

if (!isset($_SESSION['user'])) {
        echo "Please Login again";
        echo "<a href='login.php'>Click Here to Login</a>";
    }
	else {	
	if ($user != "ADMIN"){
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
	}

	}

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>SpinLink</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">
<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 
<style>
#bg-image {
    height: 100%;
    width: 100%;
    position: absolute;
    background-color:#d7f7e0;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 50% 100%;
	
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
	border-radius: 10px;
	padding-left: 5px;
}		
a {
	color: #88CFBE;
}
p {
	font-size:0.8vw;
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
	border-radius: 10px;
	padding-left: 5px;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid #88CFBE;
  color: #333;
  border-radius: 10px;
  padding-left: 5px;
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
<script>
      function play() {
        var audio = document.getElementById("audio");
        audio.play();
      }
    </script>  
</head>
<body >
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
<div id="bg-image"></div>
<div class = "container" style="position: absolute;top:3%;left: 1%; text-align:left;">

<img src="spinlinktrans.png" width="15%" height="15%"><br><br>
<br>

	<div class = "btn-group">
				<button class="button" onclick="location='update.php'">Update appversie</button>
				<button class="button" onclick="location='user.php'">Invoer gebruikers</button>
				<button class="button" onclick="location='groep.php'">Invoer groepen</button>
				<button class="button" onclick="location='userherstel.php'">Wachtwoord veranderen</button>
				<button class="button" onclick="location='webverzenden.php'">Berichten verzenden</button>
				<button class="button" onclick="location='webberichten.php'">Berichten lezen</button>
				<button class="button" onclick="location='agenda/Invoer.php'">Agendabeheer</button>
				
			


