<?php
include('headergeb.php');
		
?>

				<button class="button" style = "border-radius: 10px; padding-left: 5px;" onclick="location='SpinLinkMailMarkeren.php'">Markeer alle berichten als gelezen</button>
			</div><div style="line-height:30%;"><br><p>Zoeken op:</p>
<form method="POST" action="">
<input type="tekst" name="zoeken" style='width:25%; border-radius: 10px;'><br>
<input type="submit" name="find" style = "width:25%; border-radius: 10px;" value ="Zoeken" >
<br></div>
<p2>Selecteer groep</p2>
<br>
<?php
$grs = array();
$responsegrs = array();
array_push($responsegrs, "ALLES");

?>

<input type="submit" name="<?php echo $responsegrs[0] ?>" value ="ALLE GROEPEN"><br>
<div style="line-height:10%;">
<?php
$sql = "SELECT * FROM `Groepen` ";
	$ret = $db->query($sql);
	$ct = 0;
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	$grs = $row["Groep"];
	$sql5 = "SELECT * FROM $grs WHERE `Gebruikersnaam` = '$user'";
				$ret5 = $db->query($sql5);
				while($row = $ret5->fetchArray(SQLITE3_ASSOC) ){ 
				
				if($row['Gebruikersnaam'] == $user) {
	array_push($responsegrs, $grs);
	$ct++;
	?>
<input type="submit" name="<?php echo $responsegrs[$ct] ?>" value ="<?php echo $responsegrs[$ct] ?>"><br>
<?php
		}
	}
}
?>
</form>

<?php
for($ct1 = 0;$ct1 <= $ct; $ct1++){
if (isset($_POST["$responsegrs[$ct1]"])) {
	$select = $responsegrs[$ct1];
}
}
?>
<br>
<div class = "container" style="position: absolute; border: 2px solid #88cfbe; border-radius:25px; max-width:25%; text-align:center;">
<a href="SpinLink.apk" download>Klik hier om de<br><img src="post1.png" style="max-width:35%;height:auto;" class="center";><br>app te downloaden
</a>
</div></div></div>
<?php
if (isset($_POST["find"])) {
	$_SESSION["zoek"] = $_POST["zoeken"];
	echo "<script type='text/javascript'> document.location = 'Gezocht.php'; </script>";
}
?>
			</div></div>
			
			
<div class = "mob" style=" text-align:center">
<h9>Berichten</h9>
<br>
<div class = "overlay" style = "margin-top:40px; text-align:center">
<div id="" style="overflow:scroll; height:800px;">
<form method="POST" action="">
	
	
<?php

$x = 3600*24*100;
$t = time()-$x;

$sql = "SELECT * FROM $user WHERE Tijd >= '$t' ORDER BY `ID` DESC";
	$ret = $db->query($sql);	
	
	$ond = array();
	$send = array(); 	
	$gr1 = array();	
	$ids = array();
	$ber = array();
	$response["tekst"] = array();
	$response["tel"] = array();
	$id["text"] = array();
	$text["text"] = array();
	$bericht["text"] = array();
	$message["text"] = array();
	$tijd["text"] = array();
	$groep["text"] = array();
	$onderwerp["text"] = array();
	$sender["text"] = array();
	$new["text"] = array();
	$teller["text"] = array();
	$tel=0;
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $message["text"] = $row["Bericht"];
		$tijd["text"] = $row["Tijd"];
		$sender["text"] = $row["Afzender"];	
		$groep["text"] = $row["Groep"];
		$onderwerp["text"] = $row["Onderwerp"];			
		$id["text"] = $row["ID"];
		$new["text"] = $row["Status"];
		$num=$id["text"];
		if($groep["text"] == $select OR $select == "ALLES"){
		
		array_push($nummer["tekst"], $id["text"]);
		array_push($ids, $id["text"]);			
		
		$msgdecode = base64_decode($message["text"]);
  $bericht["text"] = str_replace("\\n","\n", $msgdecode); 
  array_push($ber,$bericht["text"]);
  array_push($send,$sender["text"]);
		array_push($ond,$onderwerp["text"]);
		array_push($gr1,$groep["text"]);
  $send1 = $sender["text"];
  $sql3 = "SELECT * FROM Namen WHERE `Naam` = '$send1'";
	if ($ret3 = $db->query($sql3)){
				
				while($row = $ret3->fetchArray(SQLITE3_ASSOC) ){ 
	$face = "faces/" . $row["Image"];
				}
	}
  ?>
  <div style="position: relative;top:1%;left: 5%; width:70%; height:200px; text-align:left; ">  
  <img src="<?php echo $face ?>" style="max-width:15%;height:auto; border-radius: 25px;">
  <div style="position: absolute;top:1%;left: 25%; width:100%; text-align:left;"> 
  <div style = "text-align:center; line-height: 100%; border-top-left-radius: 25px; border-top-right-radius: 25px; background-color:#88CFBE;">
  <p3>Van:<?php echo $send1 ?><br>
  <?php echo date('d-m-Y_H:i', $tijd["text"]) ?><br>
  Aan:<?php echo $groep["text"] ?><br>
  Onderwerp:<?php echo $onderwerp["text"] ?><br>
  </div>
  
  <?php
  if ($new["text"] == "Ongelezen"){
  ?>
  <textarea name="message"  style="height:100px; width: 100%; border:1px solid #88CFBE; text-align:center; padding:10px; color:black; border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;background: transparent;" readonly ><?php echo $bericht["text"] ?></textarea> 
  <input type="submit" name="<?php echo "mark" . $tel ?>" style = "width:60%; color:red; left: 20%; border-radius: 25px;" value ="Markeren als gelezen">
  <?php
  }
  else{
	  ?>
	  
  <textarea name="message"  style="height:100px; width: 100%; border:1px solid #88CFBE; text-align:center; padding:10px; color:white; border-bottom-right-radius: 25px;border-bottom-left-radius: 25px; background: gray;" readonly ><?php echo $bericht["text"] ?></textarea> 
  <?php
  }
  ?>
  <input type="submit" name="<?php echo "rea" . $tel ?>" style = "width:60%; left: 20%; border-radius: 25px;" value ="Reageren">
  </div></div>
  <br><br>
  <div>
  <?php 		
		}$tel++;	
	}
	
	
for ($a=0; $a <= $tel; $a++){
	$m = "mark" . $a;
	
if (isset($_POST["$m"])) {
	$user = $_SESSION['user'];
$id = $ids[$a];
$sql2=<<<EOF
UPDATE '$user' SET `Status` = 'Gelezen' WHERE ID = '$id';
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
	  
   }
  echo "<script type='text/javascript'> document.location = 'webberichten.php'; </script>";
}
}
for ($i=0; $i <= $tel; $i++){
	$rea = "rea" . $i;
if (isset($_POST["$rea"])) {
	$_SESSION['onderwerp'] = $ond[$i];
	$_SESSION['groep'] = $gr1[$i];
	$_SESSION['sender'] = $send[$i];
	$_SESSION['bericht'] = $ber[$i];
	echo "<script type='text/javascript'> document.location = 'webreactie.php'; </script>";
}
}


?>

</form>
</div></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script> 
var time = Date.now();

setInterval(function() {
      
var xmlhttp = new XMLHttpRequest(); 
   
xmlhttp.onreadystatechange = function() { 
    if (this.readyState == 4 && this.status == 200) { 
        myObj = JSON.parse(this.responseText); 
        var tijd = myObj.tijd * 1000;
	
		if(tijd > time){
		play();	
        alert("Er is een nieuw bericht op SpinLinkMail!");
		time = Date.now();
		location.reload();
        }
    } 
}; 
xmlhttp.open("GET", "testmessages.php", true); 
xmlhttp.send(); 
}, 10 * 1000);     
</script> 
</body>
</html>