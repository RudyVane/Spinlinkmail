<?php
session_start();
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

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="apple-touch-icon" href="logowit.png">
<link rel="shortcut icon" href="logotrans.png">
<link rel="icon" type = "image/png" href="logotrans.png"/>
<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 

<style>
html, body {
	overflow: hidden;
}
.overlay {
    position: fixed;
    width: 97%;
    height: auto;
    left: 0;
    top: 5%;
    background: rgba(255,255,255,0.1);
    z-index: 10;
  }
@media screen and (max-width: 600px) {	



input {
	font-size:14px;
	border: 1px solid #bebebe;
}	
td {
	color: #000000;
	font-size:4vw;
	
}

h9 {
	font-size:4vw;
	color: #88CFBE;
}
p {
	font-size:3vw;
}
p1 {
	font-size:3vw;
	color: #88CFBE;
}

}
@media screen and (min-width: 600px) {	
h9 {
	font-size:3vw;
	color: #88CFBE;
}
p {
	font-size:1vw;
}
p1 {
	font-size:1.5vw;
	color: #88CFBE;
}
input {
	font-size:14px;
	border: 1px solid #bebebe;
}	
input.number {
	size:5;
	color:red;
	
}
   .outside-while{
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#a6a6a6;
		text-align: center;
    }

    .inside-while{
        border:1px solid #a6a6a6;
		color:#a6a6a6;
		font-size:1vw;
		font-weight:300;
		text-align: center;
    }
td {
	color:#000000;
	font-size:16px;
}

}
</style>		
	</head>
<body>
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
<div class = "overlay" style="position: absolute;top:0%;left:1%; text-align:left;">
<img src="spinlinklogo.jpg" width="15%" height="15%"><br>
</div>
<div class = "overlay" style="position: fixed;top:10%;left: 20%; text-align:left; ">

<h9>Werkrooster</h9>
<br><br>

<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
<div class = "overlay" style="position: absolute;top:0%;left:1%; text-align:left;">
<img src="spinlinklogo.jpg" width="15%" height="15%"><br>
</div>
<div class = "overlay" style="position: fixed;top:10%;left: 20%; text-align:left; ">
<div id="" style="overflow:scroll; height:800px;">
<p1>Invoer rooster</p1>

<form action = "" method ="POST"><br>
<select name="Naam">
<br>
  

<?php

$sql = "SELECT * FROM Namen";
$ret = $db->query($sql);
   
		$id = array();
		$nm = array();
		$rid = array();
		$rnm = array();
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $id = $row["Id"]; 
		$nm = $row["Naam"];
		array_push($rid, $id);
		array_push($rnm, $nm);
		
    }
$i = 0;
foreach($rid as $id){
?>
<option value="<?php echo $rnm[$i] ?>"><?php echo $rnm[$i] ?></option>
  
<?php
$i++;
}

?> 
<div style="position: absolute;top:20%;left: 20%; text-align:left; ">
<table>
    <tr><td><p>Maandag</td><td><input type="time" name="ma1"></td><td>tot</td><td><input type="time" name="ma2"></td><td><input type="text" name="opm1" placeholder = "opmerking"></td></tr>
	<tr><td><p>Dinsdag</td><td><input type="time" name="di1"></td><td>tot</td><td><input type="time" name="di2"></td><td><input type="text" name="opm2" placeholder = "opmerking"></td></tr>
	<tr><td><p>Woensdag</td><td><input type="time" name="wo1"></td><td>tot</td><td><input type="time" name="wo2"></td><td><input type="text" name="opm3" placeholder = "opmerking"></td></tr>
	<tr><td><p>Donderdag</td><td><input type="time" name="do1"></td><td>tot</td><td><input type="time" name="do2"></td><td><input type="text" name="opm4" placeholder = "opmerking"></td></tr>
	<tr><td><p>Vrijdag</td><td><input type="time" name="vr1"></td><td>tot</td><td><input type="time" name="vr2"></td><td><input type="text" name="opm5" placeholder = "opmerking"></td></tr>
</table><br><br>
  	<input type="submit" name="OK" value="Verzenden" />
	<br><br>
</form>	
	
<p1>Verwijder deelnemers:</p1>

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
	<br><input type="submit" name="Del" value="Verwijderen" />
<br><br><br>
</form>
<p1>Wijzig werktijden:</p1>

<p>Selecteer de persoon</p><br>
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
<input type="radio" name="radio" value="<?php echo $responsenmpv[$i]?>"<label><?php echo $responsenmpv[$i]?></label><br/>
<?php
$i++;
}

?> 
	<br><input type="submit" name="Submit" value="Wijzigen" />
<br><br><br>

<?php


if(isset($_POST['Submit'])){
	$naam = $_POST['radio'];
	$_SESSION['naam'] = $naam;
	echo "<script type='text/javascript'> document.location = 'Aanpassen.php'; </script>";


}
?>
<?php
if(isset($_POST['OK'])){
$naam = htmlspecialchars($_POST["Naam"]);
	$md1 = $_POST['ma1'];
	$did1 = $_POST['di1'];
	$wd1 = $_POST['wo1'];
	$dod1= $_POST['do1'];
	$vd1 = $_POST['vr1'];
	$md2 = $_POST['ma2'];
	$did2 = $_POST['di2'];
	$wd2 = $_POST['wo2'];
	$dod2 = $_POST['do2'];
	$vd2 = $_POST['vr2'];
	$opm1 = $_POST['opm1'];
	$opm2 = $_POST['opm2'];
	$opm3 = $_POST['opm3'];
	$opm4 = $_POST['opm4'];
	$opm5= $_POST['opm5'];
$sql = "SELECT * FROM Namen"; 
	$ret = $db->query($sql);
	
	$response = array();
	
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $text = array();
     
		$text["text"] = $row["Naam"];
		
        // push single text into final response array
		if($row["Naam"] == $naam){
		
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
$ma = $md1 . "-" . $md2;
$di = $did1 . "-" . $did2;
$wo = $wd1 . "-" . $wd2;
$do = $dod1 . "-" . $dod2;
$vr = $vd1 . "-" . $vd2;
$sql2=<<<EOF
INSERT INTO namen (`Naam`,`maandag`,`dinsdag`,`woensdag`,`donderdag`,`vrijdag`,`opm1`,`opm2`,`opm3`,`opm4`,`opm5`) 
VALUES ('$naam','$ma','$di','$wo','$do','$vr','$opm1','$opm2','$opm3','$opm4','$opm5')
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   } else {
      
   }

        
}

if(isset($_POST['Del'])){
			
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
	
  }	
}
}
?>
