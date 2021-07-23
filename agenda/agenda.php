
<?php
session_start();
$titel = "Agenda Studio Spinlink";
include('header.php');
?>
<div style="position: absolute;top:10%; text-align:left;">
<a href="https://www.spinlink.nl/Start">Terug naar startpagina</a>
</div>
<?php

$sql = "SELECT * FROM Agenda WHERE Datum >= $d1 AND Datum <= $d2";
$ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){  
  
  $t = $row['Datum'];
  $ochtend = $row['Ochtend'];
  $middag = $row['Middag'];
  $avond = $row['Avond'];
  $oc = str_replace("*", "\n", $ochtend);
  $mi = str_replace("*", "\n", $middag);
  $av = str_replace("*", "\n", $avond);
  $dag = $t;
  $wd = date("w",$dag);
  $t1 = date("d",$dag);
  $wdnl = $dagen[$wd];
  $tm1 = date("n",$dag)-1;
  $tj = date("Y",$dag);
  $tm = $maanden[$tm1];
  $O="Ochtend";
  $M="Middag";
  $A="Avond";
  if($t1 == "01"){
	  echo "</table>";
	  ?>
	  <br><br>
	  <?php
	  echo "<h9>" . $tm . "  " . $tj; 
	  ?><br><br><br>
	  <?php
echo "<table>";
            echo "<tr>";
                echo "<th class='outside-while1'>Dag</th>";
                echo "<th class='outside-while3'>Datum</th>";
				echo "<th class='outside-while2'>Ochtend</th>";
				echo "<th class='outside-while2'>Middag</th>";
				echo "<th class='outside-while2'>Avond</th>";
				
            echo "</tr>";
  }

echo "<tr>";
                echo "<td class='inside-while1'>" . $wdnl . "</td>";
                echo "<td class='inside-while3'>" . $t1 . "</td>";
				echo nl2br('<td valign = "top" class="inside-while2"><a href="bewerk.php?datum=' .$t.'&dagdeel=' . $O .'&tekst=' . $ochtend .' "onclick="basicPopup(this.href);return false"><img src="bewerk.png" style="width:10px"; height:"10px";></a>' . "  " . $oc . '</td>');
				echo nl2br( '<td valign = "top" class="inside-while2"><a href="bewerk.php?datum=' .$t.'&dagdeel=' . $M .'&tekst=' . $middag .' "onclick="basicPopup(this.href);return false"><img src="bewerk.png" style="width:10px"; height:"10px";></a>' . "  " . $mi . '</td>');
				echo nl2br( '<td valign = "top" class="inside-while2"><a href="bewerk.php?datum=' .$t.'&dagdeel=' . $A .'&tekst=' . $avond .' "onclick="basicPopup(this.href);return false"><img src="bewerk.png" style="width:10px"; height:"10px";></a>' . "  " . $av . '</td>');
				                
            echo "</tr>";
        }
        echo "</table>";
  
	 
	
		?>



</body>

</html>

	