<?php
$user = strtoupper(htmlspecialchars($_GET["name"]));
$grps = strtoupper(htmlspecialchars($_GET["grps"]));

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
$x = 3600*24*30;
$t = time()-$x;
$sql = "SELECT * FROM $user ORDER BY `ID`";
	$ret = $db->query($sql);	
	 
	$response["id"] = array();
	$response["groep"] = array();
	$response["groepen"] = array();
	$response["sender"] = array();
	$response["image"] = array();
	$response["bericht"] = array();
	$response["onderwerp"] = array();
	$response["time"] = array();
	$response["new"] = array();
	$response["versie"] = array();
	$versie = array();
	$text = array();
	$bericht = array();
	$timestamp = array();
	$groep = array();
	$groepen = array();
	$onderwerp = array();
	$sender = array();
	$image = array();
	$new = array();
	
	array_push($response["groepen"],"ALLES");
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $text = $row["Bericht"]; 
		$bericht = base64_decode($text);
		$timestamp = $row["Tijd"];
		$t = date('d-m-Y_H:i', $timestamp);
		$sender = $row["Afzender"];	
		$groep = $row["Groep"];
		$onderwerp = $row["Onderwerp"];			
		$id = $row["ID"];
		$new = $row["Status"];
		if ($new != null){
			
		$num=$id; 
		
		$grp = $groep;
				reset($response["groepen"]);
				if (in_array($groep,$response["groepen"],TRUE)){
				}else{
				array_push($response["groepen"],$grp);
					}
					if ($grps == "ALLES" OR $grp == $grps){
												
			
  
  
  array_push($response["id"],$id);
  array_push($response["groep"],$groep);
  array_push($response["sender"],$sender);
  array_push($response["time"],$t);
  array_push($response["onderwerp"],$onderwerp);
  array_push($response["bericht"],$bericht);
  array_push($response["new"],$new);
  $sql3 = "SELECT * FROM Namen WHERE `Naam` = '$sender'";
	if ($ret3 = $db->query($sql3)){
				
				while($row = $ret3->fetchArray(SQLITE3_ASSOC) ){ 
	$image = $row["Image"];
	array_push($response["image"],$image);
		
		
		}
		
		}		
	
	
	
	}
	}
	}
$sql4 = "SELECT * FROM Versie";
	$ret4 = $db->query($sql4);
	
	while($row = $ret4->fetchArray(SQLITE3_ASSOC) ){
		$versie = $row["Appversie"];
		array_push($response["versie"],$versie);
	}
		
echo json_encode($response);
  
?> 
