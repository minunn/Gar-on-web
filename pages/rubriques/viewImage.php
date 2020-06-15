<?php
$db = new PDO('mysql:host=localhost;dbname=websitedatabase', 'root', '');
    if(isset($_GET['image_id'])) {
      $sql = "SELECT Photo,Image_type FROM `marqueurs` WHERE ID_marqueur = :id" ;
      $result = $db->prepare($sql);
      $result->bindValue(":id",$_GET['image_id']);
      $result->execute();
      $data = $result ->fetch();
      //var_dump($data);
      //var_dump($_GET['image_id']);

  		header("Content-type: " . $data["Image_type"]);
      echo $data["Photo"];
	  }
?>
