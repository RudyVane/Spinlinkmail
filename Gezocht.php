<?php
include('headergeb.php');
		
?>

				
			</div>	<br><p>Zoeken op:</p>
<form method="POST" action="">
<input type="tekst" name="zoeken" style='width:25%;border-radius: 10px;'><br>
<input type="submit" name="find" value ="Zoeken" >
<br><br>
</form>
<?php
if (isset($_POST["find"])) {
	$_SESSION["zoek"] = $_POST["zoeken"];
	
	echo "<script type='text/javascript'> document.location = 'Gezocht.php'; </script>";
}
?>
			</div>
<div class = "container" style="position: absolute;top:6%;left: 25%; width:70%; text-align:left;">
<div style = "margin-left:15%;"><h9>Berichten</h9></div>
<br><br>
<div class="scroll">
<form method="POST" action="">
	
<div style = "margin-left:15%;">	
<?php
$zoek = $_SESSION["zoek"];
echo "zoekterm = " . $zoek;
?>
</div>
<div style="overflow: auto;">
<?php	
$sql = "SELECT * FROM $user ORDER BY `ID` DESC";
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
        
        $text["text"] = $row["Bericht"];
		$tijd["text"] = $row["Tijd"];
		$sender["text"] = $row["Afzender"];	
		$groep["text"] = $row["Groep"];
		$onderwerp["text"] = $row["Onderwerp"];			
		$crypted_token = $text["text"];
		$id["text"] = $row["ID"];
		$new["text"] = $row["Status"];
		$num=$id["text"];
		
		array_push($nummer["tekst"], $id["text"]);
		array_push($ids, $id["text"]);			
		
			list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
  $cipher_method = 'AES-256-CTR';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $message["text"] = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
  $bericht["text"] = str_replace("\\n","\n", $message["text"]); 
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
  
  if (strcasecmp($sender["text"], $zoek) == 0 or strcasecmp($groep["text"], $zoek) == 0 or (preg_match("/\b".$zoek."\b/i", $onderwerp['text'])) or strcasecmp($new["text"], $zoek) == 0 or (preg_match("/\b".$zoek."\b/i", $bericht['text']))){	
	 		
  ?>
  <div style="position: relative;top:1%;left: 1%; width:70%; height:200px; text-align:left;">  
  <img src="<?php echo $face ?>" style="width:10%;height:auto;">
  <div class = "btn-mail" style="position: absolute;top:1%;left: 15%; width:70%; text-align:left;"> 
  <button class="button">Van:<?php echo $send1 ?></button>
  <button class="button"><?php echo date('d-m-Y_H:i', $tijd["text"]) ?></button>
  <button class="button">Aan:<?php echo $groep["text"] ?></button>
  <button class="button">Onderwerp:<?php echo $onderwerp["text"] ?></button>
  <button class="button">Status:<?php echo $new["text"] ?></button>
  
  <?php
  if ($new["text"] == "Ongelezen"){
  ?>
  <textarea name="message"  style="height:100px; border:1px solid #88CFBE; text-align:center; color:black; background: transparent;" readonly ><?php echo $bericht["text"] ?></textarea> 
  <input type="submit" name="<?php echo "mark" . $tel ?>" style = "color:red; width:50%;" value ="Markeren als gelezen">
  <?php
  }
  else{
	  ?>
	  
  <textarea name="message"  style="height:100px; border:1px solid #88CFBE; text-align:center; color:white; background: gray;" readonly ><?php echo $bericht["text"] ?></textarea> 
  <?php
  }
  ?>
  <input type="submit" style="width:50%;" name="<?php echo "rea" . $tel ?>" value ="Reageren">
  </div></div>
  <br><br>
  <div>
  <?php 		
		}$tel++;	
	}
	
	
for ($i=0; $i <= $tel; $i++){
	$rea = "rea" . $i;
if (isset($_POST["$rea"])) {
	$_SESSION['onderwerp'] = $ond[$i];
	$_SESSION['groep'] = $gr1[$i];
	$_SESSION['sender'] = $send[$i];
	$_SESSION['bericht'] = $ber[$i];
	echo "<script type='text/javascript'> document.location = 'SpinLinkMailReageren.php'; </script>";
}
}


?>

</form>
</div></div>
</body>
</html>
