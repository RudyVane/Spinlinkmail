<?php
include('headergeb.php');
$groep = $_SESSION['groep'];		
?>

			</div>	</div>
<div class = "container" style="position: absolute;top:6%;left: 25%; text-align:left;">
<h9>Reactie sturen</h9>




<form action = "" method ="POST">
<br>
<p>Bericht aan:
<?php
	echo $groep;

?>
<br>
<?php

$ber = $_SESSION['bericht'];
$send = $_SESSION['sender'];
$ond = $_SESSION['onderwerp'];
if (strpos($ond, 'RE:') !== false) {
$onderwerp = $ond;
$mes = $ber . PHP_EOL . $user;

}
else{
$onderwerp = "RE: " . $ond;	
$mes = "(" . $send . ":" . $ber . ")" . PHP_EOL . $user;

}
echo "Oorspronkelijk bericht: ". $ber;
?>
<br>
<input type="tekst" name="onderwerp" value="<?php echo $onderwerp ?>" /><br>
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
$msg = $mes . ":" . htmlspecialchars($_POST["message"]);	
if (!strlen(trim($_POST['message']))){
	
	echo "er is geen bericht getypt!";
	die;
}
$groep = $_SESSION['groep'];


$t = time();
	
$msgcode = base64_encode($msg);
 $status = "Ongelezen";
 $sql = "SELECT * FROM $groep";
 $ret = $db->query($sql);
   if(!$ret) {
   echo $db->lastErrorMsg();}
 while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
   $naar = $row['Gebruikersnaam'];
   $sql2 =<<<EOF
	   INSERT INTO $naar (`Afzender`, `Groep`, `Onderwerp`, `Bericht`,`Tijd`,`Status`) 
	   VALUES ('$user','$groep', '$onderwerp', '$msgcode','$t','$status');
	   
EOF;
	$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   }
   }
   $_SESSION['grp'] = $groep;
   header('Location: SpinLinkMailLezen.php');
}
	?>
	

</div>
</body>
</html>