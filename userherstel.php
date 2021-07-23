<?php
include('header.php');
?>
</div>	</div>
<div class = "container" style="position: absolute;top:10%;left: 25%; text-align:left;">

<h9>SpinLinkMail gebruikers</h9>
<br><br>

<p1>Wachtwoord herstellen:</p1>
<p>wachtwoord moet bestaan uit minimaal 8, maximaal 16 karakters; minimaal 1 hoofdletter, 1 cijfer en 1 teken uit de reeks @#\-_$%^&+=§!\?</p>
<form action = "" method ="POST">
<table style="width:50%">
  <tr>
    <td>Gebruikersnaam</td>
    <td><input type="text" name="user" required/></td>
  </tr>
  <tr>
    <td>Nieuw wachtwoord</td>
	<td><input type="password" name="ww" required/></td></tr> 
  <tr>
    <td>Herhaal wachtwoord</td>
	<td><input type="password" name="ww2" required/>
	<input type="submit" name="Herstel" value="Wachtwoord herstellen" />
	</td>
	  </tr>
</table> </p><br><br>

<?php

if(isset($_POST['Herstel'])){
$naam = htmlspecialchars($_POST["user"]);
$ww = htmlspecialchars($_POST["ww"]);
$ww2 = htmlspecialchars($_POST["ww2"]);
$user = strtoupper($naam);      

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

$wachtwoord= password_hash($ww, PASSWORD_DEFAULT);
$sql =<<<EOF
		UPDATE Namen SET 'Wachtwoord' = '$wachtwoord' WHERE Naam ='$user';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }

}




	




?>