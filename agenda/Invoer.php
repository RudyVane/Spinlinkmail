<?php
include('header.php');

class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('../SpinLinkMail.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      
   }  
?>
<div class = "overlay" style="position: fixed;top:10%;left: 25%; text-align:left; ">

<h9>Werkrooster</h9>
<br><br>

<p1>Invoer werktijden</p1>

<form action = "" method ="POST">
<table>
	<tr><td><p>Naam</td>
	<td>
<select name="Naam">
  

<?php 

$sql = "SELECT * FROM Namen WHERE `Rooster` = 'nee'";
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
</td></tr>
</select>
	<tr><td><p>Maandag</td><td><input type="time" name="ma1"></td><td>tot</td><td><input type="time" name="ma2"></td><td><input type="text" name="opm1" placeholder = "opmerking"></td></tr>
	<tr><td><p>Dinsdag</td><td><input type="time" name="di1"></td><td>tot</td><td><input type="time" name="di2"></td><td><input type="text" name="opm2" placeholder = "opmerking"></td></tr>
	<tr><td><p>Woensdag</td><td><input type="time" name="wo1"></td><td>tot</td><td><input type="time" name="wo2"></td><td><input type="text" name="opm3" placeholder = "opmerking"></td></tr>
	<tr><td><p>Donderdag</td><td><input type="time" name="do1"></td><td>tot</td><td><input type="time" name="do2"></td><td><input type="text" name="opm4" placeholder = "opmerking"></td></tr>
	<tr><td><p>Vrijdag</td><td><input type="time" name="vr1"></td><td>tot</td><td><input type="time" name="vr2"></td><td><input type="text" name="opm5" placeholder = "opmerking"></td></tr>
</table><br><br>
  	<input type="submit" name="OK" value="Verzenden" />
	<br><br>
</form>	
	

<p1>Wijzig werktijden:</p1>

<p>Selecteer de persoon</p><br>
<form action = "" method ="POST">
<?php

$sql = "SELECT * FROM Namen WHERE `Rooster` = 'ja'";
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
	


$sql2=<<<EOF
INSERT INTO Rooster (`Naam`,`maandag1`,`dinsdag1`,`woensdag1`,`donderdag1`,`vrijdag1`,`opm1`,`opm2`,`opm3`,`opm4`,`opm5`,`maandag2`,`dinsdag2`,`woensdag2`,`donderdag2`,`vrijdag2`) 
VALUES ('$naam','$md1','$did1','$wd1','$dod1','$vd1','$opm1','$opm2','$opm3','$opm4','$opm5','$md2','$did2','$wd2','$dod2','$vd2')
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   } else {
      
   }
$sql3=<<<EOF
UPDATE `Namen` SET `Rooster` = 'ja' WHERE `Naam` = '$naam';
EOF;
$ret3 = $db->exec($sql3);
   if(!$ret3) {
      echo $db->lastErrorMsg();
   } else {
      
   }        
}


?>
