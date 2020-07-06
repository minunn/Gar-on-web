<?php
include_once 'bdd_util.php';
include_once('geoPHP/geoPHP.inc');

$bdd = connectDBS();
$query = "SELECT AsText(limites) AS limites FROM `liste_cartes` ";
$stmt = $bdd->prepare($query);
$stmt->execute();
$data = $stmt->fetch();
//var_dump($data);
$polygon = geoPHP::load($data["limites"]);
var_dump($polygon->out('json'));



//var_dump(strpos($data["limites"], "))"));
//please fucking kill me
//var_dump($data["limites"]);
 ?>
