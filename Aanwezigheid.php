<?php

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
   
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="apple-touch-icon" href="logowit.png">
<link rel="shortcut icon" href="logotrans.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Registratie</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">

<style>
.outside-while{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		padding:15px; 
		color:#333;
		text-align: center;
    }

.inside-while{
        border:1px solid #a6a6a6;
		color:#333;
		padding:5px;
		font-size:1.2vw;
		font-weight:300;
		text-align: center;
    }
div.scroll { 
                margin:4px, 4px; 
                padding:4px; 
                width: 500px; 
                height: 800px; 
                overflow-x: hidden; 
                overflow-y: auto; 
                text-align:justify; 
            } 
body {
    background-image: url(Gebouw.png);
    background-position: center center;
    background-repeat: no-repeat;
	background-attachment: fixed;
    background-size: 100% 100%;
	
}
.button {
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 500px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:500px;
}
input {
	font-size:14px;
	border: 1px solid #bebebe;
}		
a {
	color: #88CFBE;
}
@media screen and (max-width: 600px) {
p {
	font-size:4vw;
}
p1 {
	font-size:3vw;
}
p3 {
	font-size:2.8vw;
}
h9 {
	font-size:6vw;
}
a {
	font-size:2vw;
}
td {
	font-size:4vw;
}
input {
	font-size:8px;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid #88CFBE;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.btn-mail .button{
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 200px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:200px;
}	
}
</style> 

</head>
<body>

<div class = "container" style="position: absolute;top:3%;left: 10%; text-align:left;">
<img src="logotrans.png" style="width:10%;height:auto;"; class = "center">
<h9>Aanwezig vandaag</h9>
<br><br><br><br>
<div class="scroll">
<?php
$sql = "SELECT * FROM `Registratie` ";
	$ret = $db->query($sql);
	$ct = 0;
	echo "<table>";
            echo "<tr>";
                
                echo "<th style='color: #88CFBE ; background-color: #FFFFFF' class='outside-while'>Naam</th>";
				echo "<th style='color: #88CFBE ; background-color: #FFFFFF' class='outside-while'>Ingeklokt</th>";
				echo "<th style='color: #88CFBE ; background-color: #FFFFFF' class='outside-while'>Uitgeklokt</th>";  				
            echo "</tr>";
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	$name = $row["Naam"];
	$aan = $row["Aanwezigheid"];
	$datum = $row["Datum"];
	$uit = $row["Afwezig"];
	$dat = substr($datum,0,10);
	$today = date("d-m-Y");
	if($aan == "AFWEZIG" AND $dat != $today){
			$datum="";
			$color = "#FFFFFF";
			$coltxt = "#88CFBE";
	}
	
	if($aan == "AANWEZIG" AND $dat == $today){
			if($uit < $datum){
				$uit="";
			}
			
			$color = "#2abd36";
			$coltxt = "#333";
		
	}
		if($aan == "AANWEZIG" AND $dat != $today){
			$color = "#FF0000";
			$coltxt = "#88CFBE";
		}
		if($aan == "AFWEZIG" AND $dat == $today){
			$color = "#FFFFFF";
			$coltxt = "#88CFBE";
		}
		echo "<tr>";
                
                echo '<td style="color:'.$coltxt.'; background-color:'.$color.'" class="inside-while">' . $name . '</td>';
				echo '<td style="color:'.$coltxt.'; background-color:'.$color.'" class="inside-while">' . $datum . '</td>';
				echo '<td style="color:'.$coltxt.'; background-color:'.$color.'" class="inside-while">' . $uit . '</td>';
            echo "</tr>";
        
   
         
		}
	echo "</table>"; 
	
	?>








	