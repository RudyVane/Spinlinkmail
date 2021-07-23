<?php
include('header.php');
		
?>
</div>	</div>
<div class = "container" style="position: absolute;top:6%;left: 25%; text-align:left;">
<h9>Registratie groepen</h9>
<br><br>
<p1>Nieuwe groep</p1><br>
<p>Gebruik geen streepjes, punten e.d. in de groepsnaam!</p>
<form action = "" method ="POST">
<table style="width:40%">
  <tr>
    <td>Groepsnaam</td>
    <td><input type="text" name="groepnm" required/ ></td>
	<td><input type="submit" name="OK" value="Registreer" />
  </tr>	  
</table>

 

<br>
</form>
<p1>Gebruikers toevoegen</p1>

<p>Selecteer de groep</p>

<form action = "" method ="POST">

<?php

$sql = "SELECT * FROM Groepen";
$ret = $db->query($sql);
   
		$responseid = array();
		$responsenm = array();
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $textid = array();
		$textnm = array();
        $textid = $row["Id"];
		$textnm = $row["Groep"];
 
        array_push($responseid, $textid);
		array_push($responsenm, $textnm);
		}
    
$i = 0;
foreach($responseid as $id){
if ($responsenm[$i]!="STUDIOSPINLINK") {
?>
<input type="submit" name="groep" style="width:150px" value="<?php echo $responsenm[$i]?>"><br>

<?php
}
$i++;
}

if(isset($_POST['groep'])){//to run PHP script on submit
		$naam = htmlspecialchars($_POST["groep"]);
		$grp = strtoupper($naam); 
		$_SESSION['grp'] = $grp;
?>

<p>Selecteer de persoon/personen</p>

<?php

$sql1 = "SELECT * FROM Namen";
$ret1 = $db->query($sql1);
   
		$responseidp = array();
		$responsenmp = array();
    while($row = $ret1->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $textidp = array();
		$textnmp = array();
        $textidp = $row["Id"];
		$textnmp = $row["Naam"];
 
        array_push($responseidp, $textidp);
		array_push($responsenmp, $textnmp);
		}
    
$i = 0;
foreach($responseidp as $id){

?>
<input type="checkbox" name="check_list1[]" value="<?php echo $i?>"<label><?php echo $responsenmp[$i]?></label><br/>
<?php
$i++;
}
$_SESSION["idp"] = $responseidp;
$_SESSION["nmp"] = $responsenmp;
?> 
	<input type="submit" name="Start" value="Toevoegen" />
	</p>
</form>
<?php
}
?>
<br>
<p1>Gebruikers verwijderen</p1>

<p>Selecteer de groep</p>

<form action = "" method ="POST">

<?php

$sql2 = "SELECT * FROM Groepen";
$ret2 = $db->query($sql2);
   
		$responseidv = array();
		$responsenmv = array();
    while($row = $ret2->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $textidv = array();
		$textnmv = array();
        $textidv = $row["Id"];
		$textnmv = $row["Groep"];
 
        array_push($responseidv, $textidv);
		array_push($responsenmv, $textnmv);
		}
    
$i = 0;
foreach($responseidv as $id){
if ($responsenmv[$i]!="STUDIOSPINLINK") {
?>
<input type="submit" name="gr" style="width:150px" value="<?php echo $responsenmv[$i]?>"><br>
<?php
}
$i++;
}
if(isset($_POST['gr'])){//to run PHP script on submit
		$naamv = htmlspecialchars($_POST["gr"]);
		$grpv = strtoupper($naamv); 
		$_SESSION['grpv'] = $grpv;
?>
<p>Selecteer de persoon/personen</p>

<?php

$sql3 = "SELECT * FROM '$grpv'";
$ret3 = $db->query($sql3);
   
		$responseidpv = array();
		$responsenmpv = array();
    while($row = $ret3->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $textidpv = array();
		$textnmpv = array();
        $textidpv = $row["Gebruikers_ID"];
		$textnmpv = $row["Gebruikersnaam"];
 
        array_push($responseidpv, $textidpv);
		array_push($responsenmpv, $textnmpv);
		}
    
$i = 0;
foreach($responseidpv as $id){

?>
<input type="checkbox" name="check_list[]" value="<?php echo $i?>"<label><?php echo $responsenmpv[$i]?></label><br/>
<?php
$i++;
}
$_SESSION["idpv"] = $responseidpv;
$_SESSION["nmpv"] = $responsenmpv;
?> 
	<input type="submit" name="Submit" value="Verwijderen" />
	</p>
</form> 
<?php
}
?>


<br>
<p1>Groepen verwijderen</p1>

<p>Selecteer de groep</p>

<form action = "" method ="POST">

<?php

$sql4 = "SELECT * FROM Groepen";
$ret4 = $db->query($sql4);
   
		$responseidg = array();
		$responsenmg = array();
    while($row = $ret4->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $textidg = array();
		$textnmg = array();
        $textidg = $row["Id"];
		$textnmg = $row["Groep"];
 
        array_push($responseidg, $textidg);
		array_push($responsenmg, $textnmg);
		}
    
$i = 0;
foreach($responseidg as $id){
if ($responsenmg[$i]!="STUDIOSPINLINK") {
?>
<input type="checkbox" name="check_list2[]" value="<?php echo $i?>"<label><?php echo $responsenmg[$i]?></label><br/>
<?php
}
$i++;
}
$_SESSION["idg"] = $responseidg;
$_SESSION["nmg"] = $responsenmg;
?>
<input type="submit" name="Verwg" value="Verwijderen" />
</form> 
</div>
</div>
<?php



if(isset($_POST['OK'])){
$nmg = htmlspecialchars($_POST["groepnm"]);
$grnm = strtoupper($nmg);
     

// array for JSON response

 $sql5 = "SELECT * FROM Groepen"; 
	$ret5 = $db->query($sql5);
	
	$response = array();
	
    while($row = $ret5->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        $text = array();
		
		$text = $row["Groep"];
		$false = "false";
        // push single text into final response array
		if($text == $grnm){
		
			array_push($response, $false);
		}    
}

if ($response[0] == 'false'){
?><p style = "color:red; font-size:24pt;"><?php
echo "Groepsnaam bestaat al, kies een andere!";
die;
}

$sql6 =<<<EOF
		INSERT INTO `Groepen` (`Groep`) 
		VALUES ('$grnm');
EOF;
	
	$ret6 = $db->exec($sql6);
   if(!$ret6) {
      echo $db->lastErrorMsg();
   }
   
$sql7 =<<<EOF
      CREATE TABLE $grnm (
      Id             INTEGER       PRIMARY KEY AUTOINCREMENT NOT NULL,
	  Gebruikers_ID  INT           NOT NULL,
      Gebruikersnaam VARCHAR (255) NOT NULL
);
EOF;

   $ret7 = $db->exec($sql7);
   if(!$ret7){
      echo $db->lastErrorMsg();
   } else {
      
   }   
   
   
	echo "<script type='text/javascript'> document.location = 'groep.php'; </script>";

}

if(isset($_POST['Start'])){
	$grp = $_SESSION['grp'];
	$residp = array();
	$resnmp = array();
	$residp = $_SESSION["idp"];
	$resnmp = $_SESSION["nmp"];
	//to run PHP script on submit
	if(!empty($_POST['check_list1'])){


foreach($_POST['check_list1'] as $selected){
	$i = $selected; 
	$nm = $resnmp[$i]; 
	$idp = $residp[$i]; 
$sql8 =<<<EOF
      INSERT INTO $grp (Gebruikers_ID,Gebruikersnaam)
      VALUES ('$idp', '$nm');
EOF;

   $ret8 = $db->exec($sql8);
   if(!$ret8) {
      echo $db->lastErrorMsg();
   } else {
      
   }
}	
}echo "<script type='text/javascript'> document.location = 'groep.php'; </script>";
}


if(isset($_POST['Submit'])){//to run PHP script on submit
		$residpv = array();
		$resnmpv = array();
		$residpv = $_SESSION["idpv"];
		$resnmpv = $_SESSION["nmpv"];
		$grpv = $_SESSION["grpv"];	
if(!empty($_POST['check_list'])){
foreach($_POST['check_list'] as $selected){
	$i = $selected;
	$nmv = $resnmpv[$i]; 
	$idv = $residpv[$i]; 
	$sql="DELETE FROM $grpv WHERE Gebruikers_ID = $idv";
	$ret = $db->query($sql);

   
}	
}echo "<script type='text/javascript'> document.location = 'groep.php'; </script>";
}
if(isset($_POST['Verwg'])){//to run PHP script on submit
		$residg = array();
		$resnmg = array();
		$residg = $_SESSION["idg"];
		$resnmg = $_SESSION["nmg"];
		
if(!empty($_POST['check_list2'])){
foreach($_POST['check_list2'] as $selected){
	$i = $selected;
	$nmv = $resnmg[$i]; 
	$idv = $residg[$i]; 
	$sql="DELETE FROM Groepen WHERE Id = $idv";
	$ret = $db->query($sql);
	$sql="DROP TABLE $nmv ";
	$ret = $db->query($sql);
	if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }
   
}	
}echo "<script type='text/javascript'> document.location = 'groep.php'; </script>";
}

?>