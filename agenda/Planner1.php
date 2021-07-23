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
         $this->open('Agenda.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      
   }  
if($naam != ""){
$_SESSION['user']="@";
}
else{
$_SESSION['user']=$user;
}
?>

<div class = "btn-group">
<form action="" method="POST">
<ul>
<?php 
$groep = "Alles";
if($user !="@" AND $naam != "@"){
	?>				
				<li><input type="submit" name="LU" value="Uitloggen" /></li><br>
				<li><input type="submit" name="WR" value="Werkrooster" /></li>
				<li><input type="submit" name="BV" value="Berichten verzenden" /></li>
				<li><input type="submit" name="BL" value="Berichten lezen" /></li><br>
				<button class="button" style = "border-radius: 10px; padding-left: 5px;"onclick="basicPopup('database_agenda.php');return false">Punt toevoegen</button>
				<button class="button" style = "border-radius: 10px; padding-left: 5px;"onclick="basicPopup('delete.php');return false">Punt verwijderen</button>
				<br>
				<li><input type="submit" name="Alles" value="Alle groepen" /></li>
				<li><input type="submit" name="AL" value="Algemeen" /></li>
				<li><input type="submit" name="AV" value="AV" /></li>
				<li><input type="submit" name="SM" value="Social Media" /></li>
				<li><input type="submit" name="GR" value="Grafisch" /></li>
				
				
<?php
}else{
?>
				<li><input type="submit" name="WR" value="Werkrooster" /></li><br>
				<li><button class="button" style = "border-radius: 10px; padding-left: 5px;"onclick="basicPopup('database_agenda.php');return false">Punt toevoegen</button></li>
				<li><button class="button" style = "border-radius: 10px; padding-left: 5px;"onclick="basicPopup('delete.php');return false">Punt verwijderen</button></li>
				<br>
				<li><input type="submit" name="Alles" value="Alle groepen" /></li>
				<li><input type="submit" name="AL" value="Algemeen" /></li>
				<li><input type="submit" name="AV" value="AV" /></li>
				<li><input type="submit" name="SM" value="Social Media" /></li>
				<li><input type="submit" name="GR" value="Grafisch" /></li>

<?php
}
if(isset($_POST['LU'])){
	unset($_SESSION['user']);
	echo "<script type='text/javascript'> document.location = '/SpinLinkMail/login.php'; </script>";
}
if(isset($_POST['WR'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'Rooster.php'; </script>";
}
if(isset($_POST['BV'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = '/SpinLinkMail/SpinLinkMailVerzenden.php'; </script>";
}
if(isset($_POST['BL'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = '/SpinLinkMail/SpinLinkMailLezen.php'; </script>";
}
if(isset($_POST['Alles'])){
	$groep = "Alles";
}
if(isset($_POST['AL'])){
	$groep = "Algemeen";
}
if(isset($_POST['AV'])){
	$groep = "AV";
}
if(isset($_POST['SM'])){
	$groep = "Socials";
}
if(isset($_POST['GR'])){
	$groep = "Grafisch";
}
?>

</div>
</form>	</ul>
<div class = "mob" style=" text-align:right">

<h9>Planbord</h9>

<div class = "overlay" style = "margin-top:35px; text-align:center">



<div id="" style="overflow:scroll; height:800px;">
<?php

$days_count = date('t');
$current_day = date('d');

$count = date('Y-m-01');
	
  $dag_vd_week = date("w");
  $mnd = date("m");
  $maand_vh_jaar = date("n")-1;
  $jaar = date("Y");
  $datum = date("d");
  $dagen = array('zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag');
  $maanden = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
  $dag = $dagen[$dag_vd_week];
  $maand = $maanden[$maand_vh_jaar];
  $d1 = mktime(0, 0, 0, $mnd, 01, $jaar);
  $d2 = mktime(0, 0, 0, $mnd, 01, $jaar + 1);
  $dag1 = date('d-m-Y h:i:s',$d1);
  $weekdag = date("w",$dag1);


for ($w = 0; $w <= 365; $w++){
  $month = date('n', strtotime($count. ' + ' . $w . ' days'));
  $year = date('Y', strtotime($count. ' + ' . $w . ' days'));
  $t = date('Y-n-j', strtotime($count. ' + ' . $w . ' days'));
  $t1 = date('Y-m-d', strtotime($count. ' + ' . $w . ' days'));
  $tijd1 = array();
  $tijd2= array();
  $tijd3 = array();
  $tijd4 = array();
  $sql = "SELECT * FROM Calendar WHERE datum = '$t1'";
  $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){  
	$dd = $row['Groep'];
	$tx = $row['Tekst'] . "*";
	if($dd == "SL"){
	array_push($tijd1,$tx);
}
if($dd == "AV"){
array_push($tijd2,$tx);
}
if($dd == "SM"){
array_push($tijd3,$tx);
	}
if($dd == "GR"){
array_push($tijd4,$tx);
	}		
}

sort($tijd1);
sort($tijd2);
sort($tijd3);
sort($tijd4);
$SSL = implode($tijd1);
$AV = implode($tijd2);
$SOC = implode($tijd3);
$GRA = implode($tijd4);


  $sl = str_replace("*", "\n", $SSL);
  $film = str_replace("*", "\n", $AV);
  $sm = str_replace("*", "\n", $SOC);
  $gr = str_replace("*", "\n", $GRA);
  $dag = $t;
  $wd = date('w', strtotime($count. ' + ' . $w . ' days'));
  $t1 = date('d', strtotime($count. ' + ' . $w . ' days'));
  $wdnl = $dagen[$wd];
  $tm1 = date('n', strtotime($count. ' + ' . $w . ' days'))-1;
  $tj = date("Y",$dag);
  $tm = $maanden[$tm1];
  
  if($t1 == "01"){
	  echo "<table>";
	  ?>
	  <br><br>
	  <?php
	  echo "<h9>" . $maanden[$month-1] . "  " . $year; 
	  ?><br><br>
	  <?php
echo "<table>";
            echo "<tr>";
                echo "<th class='outside-while1'>Dag</th>";
                echo "<th class='outside-while3'>Datum</th>";
				if($groep == "Algemeen" OR $groep == "Alles"){
				echo "<th class='outside-while2'>SpinLink algemeen</th>";}
				if($groep == "AV" OR $groep == "Alles"){
				echo "<th class='outside-while2'>AV</th>";}
				if($groep == "Socials" OR $groep == "Alles"){
				echo "<th class='outside-while2'>Socials</th>";}
				if($groep == "Grafisch" OR $groep == "Alles"){
				echo "<th class='outside-while2'>Grafisch</th>";}
				
            echo "</tr>";
  }

echo "<tr>";
                echo "<td class='inside-while1'>" . $wdnl . "</td>";
                echo "<td class='inside-while3'>" . $t1 . "</td>";
				if($groep == "Algemeen" OR $groep == "Alles"){
				echo nl2br('<td valign = "top" class="inside-while2">' . $sl . '</td>');}
				if($groep == "AV" OR $groep == "Alles"){
				echo nl2br('<td valign = "top" class="inside-while2">' . $film . '</td>');}
				if($groep == "Socials" OR $groep == "Alles"){
				echo nl2br('<td valign = "top" class="inside-while2">' . $sm . '</td>');}
				if($groep == "Grafisch" OR $groep == "Alles"){
				echo nl2br('<td valign = "top" class="inside-while2">' . $gr . '</td>');}          
            echo "</tr>";
        }
        echo "</table>";
  
	 
	
		?>

</body>

</html>

	