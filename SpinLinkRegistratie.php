<?php

include('headergeb.php');
		

$dat = date("d-m-Y H:i");

   
$sql = "SELECT * FROM Registratie WHERE `Naam` = '$user'";

$ret = $db->query($sql);
$aan1 = array();
$responseaan = array();
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ 
$aan1 = $row["Aanwezigheid"]; 
array_push($responseaan, $aan1);
}
$aan = $responseaan[0];
if($aan == "AANWEZIG"){
$uit = "Ik ga nu weg";	

}
else{
	$uit = "Ik ben er nu";
	
}
	

	?>
	
<div class = "container" style="position: absolute;top:8%;left: 25%; width:70%; text-align:center;">
<div style = "margin-left:25%;"><h9>Aanwezigheidsregistratie</h9><br><br><br>	
<p1>Je bent nu geregistreerd als</p1><br><br>
<h9><?php echo $aan ?></h9><br><br><br>
<form method="POST" action="">
<input type="submit" name="ok" style = "border-radius: 25px;padding: 5px;font-size: 36px;color: #ffffff;background-color:#88cfbe;" value ="<?php echo $uit ?>" >
<?php
if (isset($_POST["ok"])) {
if($aan == "AANWEZIG"){ 
$sql=<<<EOF
UPDATE 'Registratie' SET `Aanwezigheid` = 'AFWEZIG', `Afwezig`= '$dat' WHERE `Naam` = '$user';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   }
}
else{
	$sql=<<<EOF
UPDATE 'Registratie' SET `Aanwezigheid` = 'AANWEZIG', `Datum`= '$dat' WHERE `Naam` = '$user';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   }
}
echo "<script type='text/javascript'> document.location = 'SpinLinkRegistratie.php'; </script>";
}

?>
<br><br>
</div>
<div class = "container" style="text-align:left;">
<script src="https://cdn.htmlgames.com/embed.js?game=OfficeHiddenObjects&amp;bgcolor=white"></script>
</div>