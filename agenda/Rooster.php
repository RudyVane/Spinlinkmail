<?php
$naam = strtoupper(htmlspecialchars($_GET["name"]));
session_start();
$user = $_SESSION['user'];
include('headergeb.php');
if($naam == "" AND $user == ""){
	echo "<script type='text/javascript'> document.location = '/SpinLinkMail/login.php'; </script>";
}
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
if($naam == "@"){
$_SESSION['user']="@";
}
else{
$_SESSION['user']=$user;
}
?>

<script>
function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=750,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
	}

</script>
<div class = "btn-group">
<form action="" method="POST">
<ul>
<?php 
if($user !="@" AND $naam != "@"){
	?>
				<li><input type="submit" name="PB" value="Planbord" /></li>
				<li><input type="submit" name="BV" value="Berichten verzenden" /></li>
				<li><input type="submit" name="BL" value="Berichten lezen" /></li><br>
			
				<button class="button" style = "border-radius: 10px; padding-left: 5px;"onclick="basicPopup('Afmelden.php');return false">Afmelden</button>
<?php
}else{
?>
				<li><input type="submit" name="PB" value="Planbord" /></li><br>
				<button class="button" style = "border-radius: 10px; padding-left: 5px;"onclick="basicPopup('Afmelden.php');return false">Afmelden</button></li>
<?php
}


if(isset($_POST['PB'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'Planner.php'; </script>";
}
if(isset($_POST['BV'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = '/SpinLinkMail/SpinLinkMailVerzenden.php'; </script>";
}
if(isset($_POST['BL'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = '/SpinLinkMail/SpinLinkMailLezen.php'; </script>";
}
?>
</div>
<form>
</ul>

<div class = "mob" style=" text-align:right">

<h9>Rooster</h9>

<div class = "overlay" style = "margin-top:35px; text-align:center">


<br>
<div id="" style="overflow-y:scroll; height:800px;">

<?php

$days_count = date('t');
$current_day = date('d');

$count = date('Y-m-01');
	
  $dag_vd_week = date("w");
  $mnd = date("m");
  $maand_vh_jaar = date("n")-1;
  $jaar = date("Y");
  $datum = date("d");
  $opmerking = array('zondag','opm1', 'opm2', 'opm3', 'opm4', 'opm5', 'zaterdag');
  $dagen = array('zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag');
  $maanden = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
  $dag = $dagen[$dag_vd_week];
  $maand = $maanden[$maand_vh_jaar];
  $d1 = mktime(0, 0, 0, $mnd, 01, $jaar);
  $d2 = mktime(0, 0, 0, $mnd, 01, $jaar + 1);
  $dag1 = date('d-m-Y h:i:s',$d1);
  $weekdag = date("w",$dag1);


for ($w = 0; $w <= 90; $w++){
  $month = date('n', strtotime($count. ' + ' . $w . ' days'));
  $year = date('Y', strtotime($count. ' + ' . $w . ' days'));
  $t = date('Y-n-j', strtotime($count. ' + ' . $w . ' days'));
  $t1 = date('Y-m-d', strtotime($count. ' + ' . $w . ' days'));
  $wd = date('w', strtotime($count. ' + ' . $w . ' days'));
  $wdn1= $dagen[$wd]."1";
  $wdn2= $dagen[$wd]."2";
  $opm= $opmerking[$wd];
  $tijd0 = array();
$sql = "SELECT * FROM Rooster ORDER BY `Naam`";
  $ret = $db->query($sql);
	$tel=0;
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ 
	
	$nm = $row['Naam'];
	$nm1 = ucfirst(strtolower($nm));
	$opm1 = $row[$opm];	
	$dag1 = $row[$wdn1];
	$dag2 = $row[$wdn2];
	$dag = $dag1 . "-" . $dag2;
	$color = "<p>";
	$sql2 = "SELECT * FROM Afmelding WHERE `Datum`= '$t1' AND `Naam`= '$nm'";
	$ret2 = $db->query($sql2);
	while($row2 = $ret2->fetchArray(SQLITE3_ASSOC) ){
	$dag = ":";
	$opm1 = "afwezig";
	$color = "<p style='color:red'>";
	}
	
	if($dag =="-" OR $dag == NULL){
	$tx = "0";	
	} else{
					
	$tx = $color . $nm1 . " " . $dag . " " . $opm1 . "*";
		}
	if($tx != "0"){
	array_push($tijd0,$tx);}
	
	
	
}	

$S01 = implode($tijd0);

  $S0 = str_replace("*", "\n", $S01);
  $dag = $t;
  $wd = date('w', strtotime($count. ' + ' . $w . ' days'));
  $t1 = date('d', strtotime($count. ' + ' . $w . ' days'));
  $wdnl = $dagen[$wd];
  $tm1 = date('n', strtotime($count. ' + ' . $w . ' days'))-1;
  $tj = date("Y",$dag);
  $tm = $maanden[$tm1];
  
  if($t1 == "01"){
	  echo "</table>";
	  ?>
	  <br>
	  <?php
	  echo "<h9>" . $maanden[$month-1] . "  " . $year; 
	  ?><br><br>
	  <?php
echo "<table>";
            echo "<tr>";
                echo "<th class='outside-while1'>Dag</th>";
                echo "<th class='outside-while3'>Datum</th>";
				echo "<th class='outside-while2'></th>";
				
            echo "</tr>";
  }

echo "<tr>";
                echo "<td class='inside-while1'>" . $wdnl . "</td>";
                echo "<td class='inside-while3'>" . $t1 . "</td>";
				echo nl2br('<td valign = "top" class="inside-while2a">' . $S0 . '</td>');
							
            echo "</tr>";
        }
        echo "</table>";
  
	 
	
		?>



</body>

</html>

	