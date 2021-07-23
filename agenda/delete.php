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

<form action = "" method ="POST">     
      
<p>Datum</p> 
<div class="row">
        <div class="col-xss-4">
          <div id="reserveren" data-toggle="calendar"></div>
		  
        </div>
        </div>
<input name="Datum" id="Datum" value="" readonly required>        

<br><br>

<input type="submit" name="OK" value="OK" /></td></tr>
</form>
 
<?php
	
if(isset($_POST['OK'])){
	$_SESSION['dat'] = $_POST["Datum"];
	echo "<script type='text/javascript'> document.location = 'delete2.php'; </script>";
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