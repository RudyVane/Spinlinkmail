<?php
session_start();
include('header.php');
$naam = $_SESSION['naam'];
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

<div style="position: fixed;top:10%;left: 25%; text-align:left; ">
<h9>SpinLink deelnemers</h9>
<br><br>

	
<p1>Wijzig werktijden<?php echo " " . $naam ?></p1>
<br>
<?php

$sql = "SELECT * FROM Rooster WHERE `Naam` = '$naam'";
$ret = $db->query($sql);
   
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
		$ma1 = $row["maandag1"];
		$di1 = $row["dinsdag1"];	
		$wo1 = $row["woensdag1"];	
		$do1 = $row["donderdag1"];
		$vr1 = $row["vrijdag1"];	
		$ma2 = $row["maandag2"];
		$di2 = $row["dinsdag2"];	
		$wo2 = $row["woensdag2"];	
		$do2 = $row["donderdag2"];
		$vr2= $row["vrijdag2"];
		$opm1 = $row["opm1"];
		$opm2 = $row["opm2"];
		$opm3 = $row["opm3"];
		$opm4 = $row["opm4"];
		$opm5 = $row["opm5"];
		
?>
<form action="" method="POST">
<table>
	<tr><td><p>Maandag</td><td><input type="time" value = "<?php echo $ma1 ?>" name="ma1"></td><td>tot</td><td><input type="time" value = "<?php echo $ma2 ?>" name="ma2"></td><td><input type="text" value = "<?php echo $opm1 ?>"name="opm1" placeholder = "opmerking"></td></tr>
	<tr><td><p>Dinsdag</td><td><input type="time" value = "<?php echo $di1 ?>" name="di1"></td><td>tot</td><td><input type="time" value = "<?php echo $di2 ?>" name="di2"></td><td><input type="text" value = "<?php echo $opm2 ?>"name="opm2" placeholder = "opmerking"></td></tr>
	<tr><td><p>Woensdag</td><td><input type="time"value = "<?php echo $wo1 ?>"  name="wo1"></td><td>tot</td><td><input type="time" value = "<?php echo $wo2 ?>" name="wo2"></td><td><input type="text" value = "<?php echo $opm3 ?>"name="opm3" placeholder = "opmerking"></td></tr>
	<tr><td><p>Donderdag</td><td><input type="time" value = "<?php echo $do1 ?>" name="do1"></td><td>tot</td><td><input type="time" value = "<?php echo $do2 ?>" name="do2"></td><td><input type="text" value = "<?php echo $opm4 ?>"name="opm4" placeholder = "opmerking"></td></tr>
	<tr><td><p>Vrijdag</td><td><input type="time" value = "<?php echo $vr1 ?>" name="vr1"></td><td>tot</td><td><input type="time" value = "<?php echo $vr2 ?>" name="vr2"></td><td><input type="text" value = "<?php echo $opm5 ?>"name="opm5" placeholder = "opmerking"></td></tr>
</table><br><br> 
<input type="submit" name="OK" value="OK" />
</form>
<?php
		
    }
if(isset($_POST['OK'])){
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
$sql =<<<EOF
UPDATE Rooster SET `maandag1` = '$md1',`dinsdag1` = '$did1',`woensdag1` = '$wd1',`donderdag1` = '$dod1',`vrijdag1` = '$vd1',`opm1` = '$opm1',`opm2` = '$opm2',`opm3` = '$opm3',`opm4` = '$opm4',`opm5` = '$opm5',`maandag2` = '$md2',`dinsdag2` = '$did2',`woensdag2` = '$wd2',`donderdag2` = '$dod2',`vrijdag2` = '$vd2' WHERE `Naam` = '$naam';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }

	echo "<script type='text/javascript'> document.location = 'Invoer.php'; </script>";


}
?>
