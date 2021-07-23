<?php
session_start();

class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Deelnemers.db');
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

<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 

<style>

@media screen and (max-width: 600px) {	

html, body {
	height: 100%;
	overflow: scroll;
}

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
<div style="position: fixed;top:10%;left: 20%; text-align:left; ">
<h9>SpinLink deelnemers</h9>
<br><br>

	
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
	<input type="submit" name="Submit" value="Wijzigen" />
<br><br><br>

<?php


if(isset($_POST['Submit'])){
	$naam = $_POST['radio'];
	$_SESSION['naam'] = $naam;
	echo "<script type='text/javascript'> document.location = 'Aanpassen.php'; </script>";


}
?>
