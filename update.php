<?php
include('header.php');
		
?>
</div>	</div>
<div class = "container" style="position: absolute;top:6%;left: 25%; text-align:left;">
<h9>Nieuwe Appversie</h9>
<br><br>

<form action = "" method ="POST">
<table style="width:40%">
  <tr>
    <td>Versie</td>
    <td><input type="text" name="versie" required/ ></td>
	<td><input type="submit" name="OK" value="Verzend" />
  </tr>	  
</table>
<?php
if(isset($_POST['OK'])){
$versie = htmlspecialchars($_POST["versie"]);

$sql=<<<EOF
UPDATE 'Versie' SET `Appversie` = '$versie';
EOF;
$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   }
	  
}	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  