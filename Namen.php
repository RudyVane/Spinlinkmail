<?php
session_start();


if (!isset($_SESSION['admin'])) {
        echo "Please Login again";
        echo "<a href='Login.php'>Click Here to Login</a>";
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
<link rel="stylesheet" type="text/css" href="stylessl.css">
<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 
 
</head>
<body >

<div class="menu">
<div class = "container" style="position: absolute;top:0%;left: 1%; text-align:left;">
<?php
echo $user;
?>
</div>
<br>
<div class = "container" style="position: absolute;top:5%;left: 1%; text-align:left;">

<img src="spinlinklogo.jpg" style="width:25%;height:auto;"; class = "center">

<br>
<div class = "btn-group">
				
				<button class="button" onclick="location='webverzenden.php'">Berichten sturen</button>
</div>
</div></div>
<br><br>
<div class = "container" style="position: absolute;top:10%;left: 20%; text-align:left;">

<h9>SpinLinkMail Berichten</h9>
<br><br>
<form action = "" method ="POST"><br>

	<p>Naam:<br>
    <input type="text" name="Naam" size="50"  autofocus required /><br>
	Email:<br>
	<input type="text" name="Email" size="50"  required  /><br>
	Opmerkingen:<br>
	<input type="text" name="Opmerkingen" size="50"  required /><br>
	Uitleenniveau:<br>
	<input type="text" name="Status" size="50"  required /><br><br>
	wachtwoord moet bestaan uit minimaal 8, maximaal 16 karakters; minimaal 1 hoofdletter, 1 cijfer en 1 teken uit de reeks @#\-_$%^&+=ยง!\?<br>
	Wachtwoord:<br>
	<input type="password" name="Wacht" size="50"  required /><br><br>
	Herhaal wachtwoord:<br>
	<input type="password" name="Wacht2" size="50"  required /><br><br>
	
	
  	<input type="submit" name="OK" value="Verzenden" />
	 
<br>
</form>
			

<?php

if(isset($_POST['OK'])){
	$naam = $_POST[Naam];
	$mail = $_POST[Email];
	$opm = $_POST[Opmerkingen];
	$status = $_POST[Status];
	$ww = $_POST[Wacht];
	$ww2 = $_POST[Wacht2];
	if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=ยง!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=ยง!\?]{8,16}$/',$ww)) {
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
	
	
	$wachtwoord= password_hash($ww, PASSWORD_DEFAULT);
// Attempt insert query execution
$sql="SELECT * FROM personen";
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      if ($row['Naam'] == $naam){
		  ?><p style = "color:red; font-size:16;"><?php
		  echo "Deze naam bestaat al! Kies een andere naam.";
		  die;
   }
   }

$sql="SELECT * FROM personen";
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      $i = $row['Id'];
   }
$id=$i+1;
$sql2=<<<EOF
INSERT INTO personen (Id,`Naam`,`Email`,`Opmerkingen`,`Status`,`Wachtwoord`) 
VALUES ('$id','$naam','$mail','$opm','$status','$wachtwoord');
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   } else {
      
   }
 
$sql = "SELECT * FROM personen";
$ret = $db->query($sql);
        echo "<table>";
            echo "<tr>";
                echo "<th class='outside-while'>Id</th>";
                echo "<th class='outside-while'>Naam</th>";
				echo "<th class='outside-while'>Email</th>";
				echo "<th class='outside-while'>Opmerkingen</th>";
				echo "<th class='outside-while'>Uitleenniveau</th>";
                
            echo "</tr>";
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            echo "<tr>";
                echo "<td class='inside-while'>" . $row['Id'] . "</td>";
                echo "<td class='inside-while'>" . $row['Naam'] . "</td>";
				echo "<td class='inside-while'>" . $row['Email'] . "</td>";
				echo "<td class='inside-while'>" . $row['Opmerkingen'] . "</td>";
				echo "<td class='inside-while'>" . $row['Status'] . "</td>";
                
            echo "</tr>";
        }
        echo "</table>";
        



// Close connection
$db->close();
$_POST['OK'] = NULL;
	}
?>
</div></div>
<div style="position: absolute;top:5%;left: 75%;text-align:left;">

<img src="https://spinlink.nl/wp-content/uploads/2017/11/Studio-SpinLink-logo-definitief.png" alt="Studio SpinLink" id="logo"/>
</body>
</html>