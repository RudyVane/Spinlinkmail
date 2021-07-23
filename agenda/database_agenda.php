<?php
session_start();

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
<link rel="apple-touch-icon" href="logowit.png">
<link rel="shortcut icon" href="logotrans.png">
<link rel="icon" type = "image/png" href="logotrans.png"/>
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
.overlay {
    position: fixed;
    width:85%;
	margin-right:5%;
    height: auto;
    left: 20%;
    top: 20px;
    background: rgba(255,255,255,0.1);
    z-index: 10;
  }
input {
	font-size:2vw;
	border: 1px solid #bebebe;
}	
td {
	color: #000000;
	font-size:3vw;
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

}
@media screen and (min-width: 600px) {	
.overlay {
    position: fixed;
    width:85%;
	margin-right:5%;
    height: auto;
    left: 20%;
    top: 20px;
    background: rgba(255,255,255,0.1);
    z-index: 10;
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
#tijd{
 width:120px; 
 font-size:18px; 
}
}
</style>		
	</head>
<body onLoad="initInput()">
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
<div class = "overlay" style="position: absolute;top:0%;left:1%; text-align:left;">
<img src="spinlinklogo.jpg" width="15%" height="15%"><br>
</div>
<div style="position: fixed;top:5%;left: 20%; text-align:left; ">

<form action = "" method ="POST">     
      <p>Datum<br>
<div class="row">
        <div class="col-xss-4">
          <div id="reserveren" data-toggle="calendar"></div>
		  
        </div>
        </div>
   
      
<table><tr>     
<td><input name="Datum" id="Datum" value="" readonly required>     </td></tr>
<tr><td>Tijd</td></tr>
<tr><td><SELECT NAME="Tijd" id = "tijd"> 
<OPTION VALUE="09.00">09.00</OPTION>
<OPTION VALUE="09.15">09.15</OPTION>
<OPTION VALUE="09.30">09.30</OPTION>
<OPTION VALUE="09.45">09.45</OPTION>
<OPTION VALUE="10.00">10.00</OPTION>
<OPTION VALUE="10.15">10.15</OPTION>
<OPTION VALUE="10.30">10.30</OPTION>
<OPTION VALUE="10.45">10.45</OPTION>
<OPTION VALUE="11.00">11.00</OPTION>
<OPTION VALUE="11.15">11.15</OPTION>
<OPTION VALUE="11.30">11.30</OPTION>
<OPTION VALUE="11.45">11.45</OPTION>
<OPTION VALUE="12.00">12.00</OPTION>
<OPTION VALUE="12.15">12.15</OPTION>
<OPTION VALUE="12.30">12.30</OPTION>
<OPTION VALUE="12.45">12.45</OPTION>
<OPTION VALUE="13.00">13.00</OPTION>
<OPTION VALUE="13.15">13.15</OPTION>
<OPTION VALUE="13.30">13.30</OPTION>
<OPTION VALUE="13.45">13.45</OPTION>
<OPTION VALUE="14.00">14.00</OPTION>
<OPTION VALUE="14.15">14.15</OPTION>
<OPTION VALUE="14.30">14.30</OPTION>
<OPTION VALUE="14.45">14.45</OPTION>
<OPTION VALUE="15.00">15.00</OPTION>
<OPTION VALUE="15.15">15.15</OPTION>
<OPTION VALUE="15.30">15.30</OPTION>
<OPTION VALUE="15.45">15.45</OPTION>
<OPTION VALUE="16.00">16.00</OPTION>
<OPTION VALUE="16.15">16.15</OPTION>
<OPTION VALUE="16.30">16.30</OPTION>
<OPTION VALUE="16.45">16.45</OPTION>
<OPTION VALUE="17.00">17.00</OPTION>
<OPTION VALUE="17.15">17.15</OPTION>
<OPTION VALUE="17.30">17.30</OPTION>
<OPTION VALUE="17.45">17.45</OPTION>
<OPTION VALUE="18.00">18.00</OPTION>
</SELECT></td><br></td></tr>
<tr><td>Groep</td></tr>
<td><input type="radio" name="groep" id="g1" value="SL" checked="checked"/><label for="g1">SpinLink algemeen</label></td><td></td></tr>
<td><input type="radio" name="groep" id="g2" value="AV" /><label for="g2">AV</label></td><td></td></tr>
<td><input type="radio" name="groep" id="g3" value="SM" /><label for="g3">Socials</label></td><td></td></tr>
<td><input type="radio" name="groep" id="g4" value="GR" /><label for="g4">Grafisch</label></td><td></td></tr>
<tr><td>Item</td></tr>
<tr><td><input type = "text" name = "Msg" value="" required></td></tr>
<tr><td><br></td></tr><tr>
<td><input type="radio" name="rep" id="rep1" value="1" checked="checked"/><label for="rep1">1 keer</label></td><td></td></tr>
<tr><td><input type="radio" name="rep" id="rep2" value="d"/><label for="rep2">dagelijks (behalve weekend)</label></td>
<td><input type = "number" name="d" min="1" max="365" /> aantal dagen </td></tr>

<tr><td><input type="radio" name="rep" id="rep3" value="w"/><label for="rep3">wekelijks</label></td>
<td><input type = "number" name="w" min="1" max="52" /> aantal weken <br></td></tr>
<tr><td><input type="radio" name="rep" id="rep4" value="m"/><label for="rep4">maandelijks</label></td>
<td><input type = "number" name="m" min="1" max="12" /> aantal maanden <br></td></tr>
<tr><td><br></td></tr>

<tr><td><input type="submit" name="OK" value="OK" /></td></tr>
</form>
</table>
<?php
	
if(isset($_POST['OK'])){
	$dat = $_POST["Datum"];
	$tijd = $_POST["Tijd"];
	$msg = $_POST["Msg"];
	$radio = $_POST["rep"];
	$groep = $_POST["groep"];
	$d = $_POST["d"];
	$w = $_POST["w"];
	$m = $_POST["m"];
	$frid = time();
	$tekst = $tijd . ": " . $msg;
	

	if ($radio == 1){
		$date = date('Y-m-d', strtotime($dat));
$sql =<<<EOF
INSERT INTO Calendar (`Datum`,`Tijd`,`Agendapunt`,`Frequentie`,`Groep`,`Freq_id`,`Tekst`) 
VALUES ('$date','$tijd','$msg','$radio','$groep','$frid','$tekst');
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }
	}
	if ($radio == "d"){
for($i=0;$i<=$d - 1;$i++){
	
$dag = date('w', strtotime($dat. ' + ' . $i . ' days'));
if($dag != 0 AND $dag != 6){
	$date = date('Y-m-d', strtotime($dat. ' + ' . $i . ' days'));
$sql =<<<EOF
INSERT INTO Calendar (`Datum`,`Tijd`,`Agendapunt`,`Frequentie`,`Groep`,`Freq_id`,`Tekst`) 
VALUES ('$date','$tijd','$msg','$radio','$groep','$frid','$tekst');
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }
	}
}
	}
	if ($radio == "w"){
		for($i=0;$i<=$w-1;$i++){
			$x=$i*7;
			$date = date('Y-m-d', strtotime($dat. ' + ' . $x . ' days'));
$sql =<<<EOF
INSERT INTO Calendar (`Datum`,`Tijd`,`Agendapunt`,`Frequentie`,`Groep`,`Freq_id`,`Tekst`) 
VALUES ('$date','$tijd','$msg','$radio','$groep','$frid','$tekst');
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }
	}
	}
	if ($radio == "m"){
		for($i=0;$i<=$m-1;$i++){
			$date = date('Y-m-d', strtotime($dat. ' + ' . $i . ' months'));
		
$sql =<<<EOF
INSERT INTO Calendar (`Datum`,`Tijd`,`Agendapunt`,`Frequentie`,`Groep`,`Freq_id`) 
VALUES ('$date','$tijd','$msg','$radio','$groep','$frid');
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