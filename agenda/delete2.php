<?php
session_start();
$dat = $_SESSION['dat'];
class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Agenda.db');
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

<script type="text/javascript" src="https://ZulNs.github.io/libs/timepicker.js"></script>

<script language="javascript" type="text/javascript">
<!--
function initInput()
	{
	var variable1 = res1;
	var variable2 = res2;
	document.forms[0].Datum.value = variable1;
	document.forms[0].Terug.value = variable2;
	}
//-->
</script>
<style>
@media screen and (max-width: 600px) {	

html, body {
	height: 100%;
	overflow: scroll;
}
.grid-container {
  display: grid;
  width:90%;
  grid-template-columns: 25% 25% 25% 25%;
  background-color: #88CFBE;
  padding: 1px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 1px;
  font-size: 12px;
  text-align: center;
}
.knop {
  background-color: #FFFFFF;
  border: none;
  color: #88CFBE;
  padding: 5px 5px;
  text-align: center;
  font-size: 12px;
  cursor: pointer;
  height:100px;
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
}
p {
	font-size:3vw;
}
p1 {
	font-size:3vw;
}
.btn-group .button {
  background-color: white;
  border: 1px solid #88CFBE;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 1.5vw;
  cursor: pointer;
  width: 20%;
  
  display: block;
	}
	.btn-group .button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color: #88CFBE;
  color:white;
}
}
@media screen and (min-width: 600px) {	
.grid-container {
  display: grid;
  width:90%;
  grid-template-columns: 25% 25% 25% 25%;
  background-color: #88CFBE;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
.knop {
  background-color: #FFFFFF;
  border: none;
  color: #88CFBE;
  padding: 5px 5px;
  text-align: center;
  font-size: 20px;
  cursor: pointer;
  height:100px;
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
        border:1px solid #a6a6a6;font-size:0.75vw;font-weight:500;
		color:#a6a6a6;
		text-align: center;
    }

    .inside-while{
        border:1px solid #a6a6a6;
		color:#a6a6a6;
		font-size:0.75vw;
		font-weight:300;
		text-align: center;
    }
td {
	color:#000000;
	font-size:16px;
}
.btn-group .button {
  background-color: white;
  border: 1px solid #88CFBE;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 1.5vw;
  cursor: pointer;
  width: 20%;
  
  display: block;
	}
	.btn-group .button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color: #88CFBE;
  color:white;
}
}
</style>		
	</head>
<body onLoad="initInput()">
<div class = "overlay" style="position: absolute;top:0%;left:1%; text-align:left;">
<img src="spinlinklogo.jpg" width="15%" height="15%"><br>
</div>
<div style="position: fixed;top:10%;left: 20%; text-align:left; ">
<p1>Welk punt moet verwijderd worden?</p1><br>
<form action = "" method ="POST">     
    <?php
	$dat = $_SESSION['dat'];
	$t1 = date('Y-m-d', strtotime($dat));
	$sql = "SELECT * FROM `Calendar` WHERE `Datum` = '$t1'";
	$ret = $db->query($sql);
	$tekstid = array();
	$teksttd = array();
	$tekstpt = array();
	$tekstfr = array();
	$tekstfrid = array();
	$tekstgrp = array();

		while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
			$id = $row['id'];
			$tijd = $row['Tijd'];
			$punt = $row['Agendapunt'];
			$freq = $row['Frequentie'];
			$groep = $row['Groep'];
			$frid = $row['Freq_id'];
			array_push($tekstid, $id);
			array_push($teksttd, $tijd);
			array_push($tekstpt, $punt);
			array_push($tekstfr, $freq);
			array_push($tekstfrid, $frid);
			if($groep == "SL"){$grp = "SpinLink algemeen";}
			if($groep == "SM"){$grp = "Social Media";}
			if($groep == "AV"){$grp = "Audio/video";}
			if($groep == "GR"){$grp = "Grafisch";}
			array_push($tekstgrp, $grp);			
		}
		
	$i=0;		
	foreach($tekstid as $id){	
			
?>			
	<br>
	<input type="checkbox" name="check[]" value="<?php echo $i?>"<label><?php echo $tekstgrp[$i] . "-" . $teksttd[$i] . "-" . $tekstpt[$i] ?></label>
<?php
$i++;
}

?>
<br>
<input type="submit" name="1" value="Eenmalig" />
<input type="submit" name="2" value="Alles vanaf deze datum" />
</form>
<?php
if(isset($_POST['1'])){
	if(!empty($_POST['check'])){
	$i = 0;
	foreach($_POST['check'] as $selected){
	$del = $selected; 
	$id = $tekstid[$del];
	$fr = $tekstfr[$del];
	$frid1 = $tekstfrid[$del];
	
$sql =<<<EOF
DELETE FROM Calendar WHERE `id` = $id ;
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
if(isset($_POST['2'])){
	foreach($_POST['check'] as $selected){
	$del = $selected;
	$id = $tekstid[$del];
	$fr = $tekstfr[$del];
	$frid1 = $tekstfrid[$del];
	
$sql =<<<EOF
DELETE FROM Calendar WHERE `Freq_id` = $frid1 AND `id` >= $id;
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }
	}	
echo "<script type=\"text/javascript\" charset=\"utf-8\">window.opener.location.reload();window.self.close()</script>";
}
?>
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
		  
		  document.forms[0].Datum.value = res1;
        }
      });
      
    });
    </script>



</div></div>

					
</body>
</html>