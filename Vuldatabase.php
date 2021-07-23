<?php
$tijd = array();
$dat = $_GET["datum"];$dat = "12-10-2020";
$tijd = $_GET["tijd"];$tijd = ["8.00","8.15"];
$naam = $_GET["naam"];$naam = "Riepe";

class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Vergaderzaal.db');
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

<link rel="stylesheet" href="stylessl.css">

<style>
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

</style>		
	</head>
	<?php
$len = count($tijd);
for ($i = 0; $i <= $len-1; $i++) {
    $sql =<<<EOF
		UPDATE `reserveer` SET '$tijd[$i]' = '$naam' WHERE `Datum` = '$dat';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      
   }
}
   
$dat = date("d-m-Y");

$sql = "SELECT * FROM `reserveer` WHERE `Datum` = '$dat'";
$ret = $db->query($sql);
        echo "<table>";
            
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            echo "<tr>";
			foreach ($row as $col => $val) {
                echo "<td class='inside-while'>" . $col . "</td>";
				echo "<td class='inside-while'>" . $val . "</td>";
				echo "</tr>";
			}
                
            
        }
        echo "</table>";

	?>