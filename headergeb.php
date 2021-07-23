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
        echo "<p style = 'color:red; font-size:20;'>" . "Please Login again    ";?>
        <a href='login.php'>Inloggen</a>
		<?php
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
	$_SESSION['user']=$user;
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="apple-touch-icon" href="logowit.png">
<link rel="shortcut icon" href="logotrans.png">
<link rel="icon" type = "image/png" href="logotrans.png"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Berichten</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">
<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 
<style>
html, body {
	overflow-x: hidden;
}
#bg-image {
    height: 100%;
    width: 100%;
    position: absolute;
    background-image: linear-gradient(to left,#d7f7e0,#d7f7e0);
    background-position: center center;
    background-repeat: no-repeat;
	background-attachment: fixed;
    background-size: 100% 100%;
	z-index: -10;
    
}
table {
  width: 90%;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
li {
  display: block;
  width: 100%;
}
.mob {
	position: absolute;
	left:30%;
	top:15px;
}
.overlay {
    position: fixed;
    width:85%;
	margin-right:5%;
    height: auto;
    left: 20%;
    top: 20px;
    background: rgba(255,255,255,0.1);
    z-index: 10;
  }
  .knop {
  background-color: #88CFBE;
  border:1px solid #88CFBE;
  border-radius: 10px;
  color: black;
  padding: 5px 5px;
  text-align: center;
  font-size: 20px;
  cursor: pointer;
  height:auto;
  
}	

.button {
  background-color: #ffffff;
  border:1px solid #000000;
  color: #333;
  margin: 0px;
  text-align: left;
  text-decoration: none;
  display: inline-block;
  font-size: 1vw;
}
	.btn-group .button {
  background-color: #88CFBE;
  border: 1px solid #ffffff;
  color: #ffffff;
  margin-bottom:10px;
  text-align: center;
  text-decoration: none;
  font-size: 1.5vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.outside-while1{
        border:1px solid #a6a6a6;font-size:1.5vw;font-weight:500;
		color:#000000;
		background-color:#88CFBE;
		width:2%;
		padding:10px 10px 10px 10px;
		text-align: center;
    }
.outside-while2{
        border:1px solid #a6a6a6;font-size:1.5vw;font-weight:500;
		color:#000000;
		background-color:#88CFBE;
		
		padding:10px 10px 10px 10px;
		text-align: center;
    }
.outside-while3{
        border:1px solid #a6a6a6;font-size:1.5vw;font-weight:500;
		color:#000000;
		background-color:#88CFBE;
		width:2%;
		padding:10px 10px 10px 10px;
		text-align: center;
    }
.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#dcf7e3;
		width:2%;
		line-height:110%;
		font-size:2vw;
		font-weight:500;
		padding:10px 10px 10px 10px;
		text-align: left;
    }
.inside-while2a{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#edfcf1;
		width:20%;
		font-family:arial black;
		line-height:10%;
		font-size:2vw;
		font-weight:500;
		padding:10px 10px 10px 10px;
		text-align: left;
    }	

.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#edfcf1;
		width:20%;
		line-height:110%;
		font-size:1.2vw;
		font-weight:300;
		padding:10px 10px 10px 10px;
		text-align: left;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#dcf7e3;
		width:2%;
		line-height:110%;
		font-size:2vw;
		font-weight:500;
		padding:10px 10px 10px 10px;
		text-align: center;
    }
.container{
	font-size:4vw;
	width:100%;
}

input {
	position: relative;
	font-size:1.5vw;
	border: 1px solid #bebebe;
	
}
input[type=submit] {
  background-color: #88CFBE;
  border: 1px solid #ffffff;
  color: #ffffff;
  border-radius: 10px;
  text-align: center;
  text-decoration: none;
  font-size: 1.5vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
a {
  color: #333;
  width: 100%;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 1.5vw;
}

p {
	font-size:1vw;
	color:black;
}
p2 {
	font-size:1vw;
	color:red;
}
p3{
	font-size:0.8vw;
	color:white;
}
h9 {
	font-size:4vw;
	color: #88CFBE;
}
table, th, td {
  border: 2px solid black;
  font-size:1vw;
}
textarea {
	width:500px;
}
@media screen and (max-width: 600px) and (orientation: portrait){
	
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
li {
  display: inline;
  width: 100%;
}
.overlay {
    position: fixed;
    width:85%;
	margin-right:5%;
    height: auto;
    left: 25%;
    top: 2%;
    background: rgba(255,255,255,0.1);
    z-index: 10;
  }
.mob {
	position: absolute;
	left:25%;
	margin-top:1px;
	width:60%;
	text-align:center;
}
p {
	font-size:3vw;
	color:black;
}
p2 {
	font-size:3vw;
	color:red;
}
p3{
	font-size:3vw;
	color:white;
}
h9 {
	font-size:7vw;
	color: #88CFBE;
}
a {
	font-size:2vw;
}
table {
  width: 200%;
}

  


table, th, td {
  border: 1px solid black;
}
td {
	font-size:3vw;
}
input {
	font-size:8px;
}
input[type=submit] {
  background-color: #88CFBE;
  border: 1px solid #ffffff;
  color: #ffffff;
  border-radius: 10px;
  text-align: center;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 30%;
  padding: 10px 5px 10px 5px;
  display: inline;
	}
.container{
	font-size:3vw;
	width:85%;
}
.outside-while1{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#000000;
		font-size:3.5vw;
		width:80px;
		text-align: center;
		left: 0;
    position: sticky;

    /* Displayed on top of other rows when scrolling */
    z-index: 9999;
    }
.outside-while2{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#000000;
		font-size:3.5vw;
		width:200px;
		text-align: center;
    }
.outside-while3{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#000000;
		font-size:3.5vw;
		width:50px;
		text-align: center;
		left: 80px;
    position: sticky;

    /* Displayed on top of other rows when scrolling */
    z-index: 9999;
    }
.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		width:80px;
		line-height:110%;
		font-size:3.5vw;
		font-weight:300;
		padding:10px 10px 10px 10px;
		text-align: left;
		left: 0;
    position: sticky;

    /* Displayed on top of other rows when scrolling */
    z-index: 9999;
    }


.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		width:200px;
		line-height:110%;
		font-size:3vw;
		font-weight:300;
		padding:10px 10px 10px 10px;
		text-align: left;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		width:50px;
		line-height:110%;
		font-size:3.5vw;
		font-weight:300;
		padding:10px 10px 10px 10px;
		text-align: center;
		left: 80px;
    position: sticky;

    /* Displayed on top of other rows when scrolling */
    z-index: 9999;
    }
	
.knop {
  background-color: #88CFBE;
  border: none;
  color: black;
  padding: 5px 5px;
  text-align: center;
  font-size: 20px;
  cursor: pointer;
  height:100px;
}
.button {
  background-color: #ffffff;
  border: border: 1px solid #000000;
  color: #333;
  margin: 0px;
  text-align: left;
  text-decoration: none;
  display: inline-block;
  font-size: 1vw;
}

	.btn-group .button {
  background-color: #88CFBE;
  border: 1px solid #ffffff;
  color: #ffffff;
  padding: 10px 5px 10px 5px;
  text-align: center;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 20%;
  display: inline-block;
	}
.container{
	font-size:5vw;
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
<body>
<div id="bg-image"></div>
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
<script>play();</script>

    <audio id="audio" src="Alert-notification.mp3"></audio>

<div class = "container" style="position: absolute;top:3%;left: 1%; line-height:10%;text-align:left;">

<img src="spinlinktrans.png" width="15%" height="15%"><br><br>
<br>
<form action = "" method ="POST">
	<input type="submit" name="LU" value="Uitloggen" /><br>
	<input type="submit" name="PB" value="Planbord" /><br>
	<input type="submit" name="WR" value="Rooster" /><br>
	<input type="submit" name="BV" value="Bericht sturen" /><br>
	<input type="submit" name="BL" value="Berichten lezen" /><br>
</form>	
<?php
if(isset($_POST['LU'])){
	unset($_SESSION['user']);
	echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
if(isset($_POST['PB'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'agenda/Planner.php'; </script>";
}
if(isset($_POST['WR'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'agenda/Rooster.php'; </script>";
}
if(isset($_POST['BV'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'SpinLinkMailVerzenden.php'; </script>";
}
if(isset($_POST['BL'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'SpinLinkMailLezen.php'; </script>";
}
?>	
<div class = "btn-group">
	
				
				