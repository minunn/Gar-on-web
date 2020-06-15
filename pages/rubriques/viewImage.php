<?php
$db = new PDO('mysql:host=localhost;dbname=garonweb-db-new', 'root', '');
    if(isset($_GET['image_id'])) {
    $sql = "SELECT Photo,Image_type FROM `marqueurs` WHERE ID_marqueur =" . $_GET['image_id'];
    $result = $db->prepare($sql);
    $result -> execute();
    $data = $result -> fetchAll();
		header("Content-type: " . $data[0]["Image_type"]);
        echo $data[0]["Photo"];
	}
?>
