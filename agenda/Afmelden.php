<?php
session_start();

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

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="stylesheet" href="css/styledate.css">
<link rel="stylesheet" href="css/timepicker.css"/>
<script type="text/javascript" src="https://ZulNs.github.io/libs/timepicker.js"></script>
<link rel='stylesheet' id='chld_thm_cfg_parent-css'  href='https://spinlink.nl/wp-content/themes/Divi/style.css?ver=5.2.2' type='text/css' media='all' /> 
<script language="javascript" type="text/javascript">
<!--
function initInput()
	{
	var variable1 = res1;
	var variable2 = res2;
	document.forms[0].Datum1.value = variable1;
	document.forms[0].Datum2.value = variable2;
	}
//-->
</script>
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
	font-size:3vw;
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
.datetimepicker .paging .month-name {
font-size:3vw;
}
}
</style>		
	</head>
<body onLoad="initInput()">

<div class = "overlay" style="position: absolute;top:0%;left:1%; text-align:left;">
<img src="spinlinklogo.jpg" width="15%" height="15%"><br>
</div>
<div style="position: fixed;top:2%;left: 20%; text-align:left; ">

<p1>Afmelden:</p1>

<form action = "" method ="POST">
<p1>
Wie meldt zich af<br>
<select name="Namen">
  

<?php

$sql = "SELECT * FROM Namen";
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
	<input type = "hidden"><br>
	<p1>Van<br>
	<div class="row">
        <div class="col-xss-4">
          <div id="reserveren" data-toggle="calendar"></div>
		  
        </div>
        </div>
<input name="Datum1" id="Datum" value="" required>     <br>
	Tot en met<br>
	<div class="row">
        <div class="col-xss-4">
          <div id="reserveren2" data-toggle="calendar"></div>
		  
        </div>
        </div>
<input name="Datum2" id="Datum" value="" required>     <br><br>
	<input type = "text" name = "reden" id="reden" placeholder="reden" required><br><br>
	
	<input type="submit" name="Submit" value="Afmelden" />
<br><br><br>
</select>
</p>
</form>
<script type="text/javascript" src="scripts/components/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/dateTimePicker.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $('#basic').calendar();
      
      $('#reserveren').calendar(
      {
        day_first: 1,
        unavailable: ['2019-08-30'],
        onSelectDate: function(date, month, year)
        {
          var res1 = ""+ year + "-" + month + "-" + date + "";
		  
		  document.forms[0].Datum1.value = res1;
        }
      });
	  $('#reserveren2').calendar(
      {
        day_first: 1,
        unavailable: ['2019-08-30'],
        onSelectDate: function(date, month, year)
        {
          var res2 = ""+ year + "-" + month + "-" + date + "";
		  
		  document.forms[0].Datum2.value = res2;
        }
      });
      
    });
    </script>
<?php


if(isset($_POST['Submit'])){
	$naam = $_POST['Namen'];
	$datum1 = $_POST['Datum1'];
	$datum2 = $_POST['Datum2'];
	$reden = $_POST['reden'];
	$txt = "Afmelding van " . $naam . " op " . $datum1 . " tot " . $datum2 . " vanwege " . $reden;
	//mail('n.deJager@werkpro.nl', 'Afmelding', $txt);
	
	$B = strtotime ($datum1);
	$E = strtotime ($datum2);
	$a = ($E - $B)/86400; 
	
	for ($x = 0; $x <= $a; $x++) {
	$dag = date('w', strtotime($datum1. ' + ' . $x . ' days'));
	$datum = date('Y-m-d', strtotime($datum1. ' + ' . $x . ' days'));
	if($datum == $datum2){
		$x=101;
	}
if($dag != 0 AND $dag != 6){
	
$sql =<<<EOF
INSERT INTO Afmelding (`Datum`,`Naam`) 
VALUES ('$datum','$naam');
EOF;
$ret = $db->exec($sql);
  if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
}
}
}	
	echo "<script type=\"text/javascript\" charset=\"utf-8\">window.opener.location.reload();window.self.close()</script>";
	
}
?>
