

<?php
session_start();
include('header.php');
	 $naam = $_SESSION["naam"];
    
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
 ?>
 </div>	</div>
 <div class = "container" style="position: absolute;top:20%;left: 25%; text-align:left;">
 <form action="" method="POST" enctype="multipart/form-data">
  <br>
  <?php
  $naam = $_SESSION["naam"];
  echo "Avatar voor: " . $naam;
  ?>
<br>
Selecteer bestand:<br>
  <input type="file" name="image" ><br><br>
  <input type="submit" value="Opslaan" name="upload">
 
</form>	 
<?php
if(isset($_POST['upload'])){
	
	 $image=$_FILES['image']['name']; 
     $imageArr=explode('.',$image); //first index is file name and second index file type
     $rand=rand(10000,99999);
     $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
     $uploadPath="faces/".$newImageName;
     $isUploaded=move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
     if($isUploaded){
       echo 'upload was succesvol';
	   $sql = "UPDATE Namen SET Image = '$newImageName' WHERE Naam = '$naam'";
	   echo $naam . "-" . $newImageName;
	 $ret = $db->query($sql);}
     else {
	 echo 'er ging iets niet goed'; }
   





}
?>