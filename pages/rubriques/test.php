<?php
include_once 'bdd_util.php';
include_once('geoPHP/geoPHP.inc');

$bdd = connectDBS();
$query = "SELECT AsText(polygon) AS limites FROM `plages` WHERE ID_plage = 7";
$stmt = $bdd->prepare($query);
$stmt->execute();
$data = $stmt->fetch();
//var_dump($data);
echo "<br>";
if ($data["limites"] != NULL) {
  $polygon = geoPHP::load($data["limites"]);
  $kmlPoly = $polygon->out('kml');
  //echo $kmlPoly;
  $poly = kmlToJsVarAsString($kmlPoly);
  var_dump($poly);
}
/*foreach ($data as $value) {
  //var_dump($value["limites"]);


}*/

function kmlToJsVarAsString($kmlPoly)
{
  $arrPoly = explode(" ", $kmlPoly);
  $stringPoly = '[';
  foreach ($arrPoly as $polyact) {
    $stringPoly .= "[$polyact],";
  }
  $stringPoly = substr($stringPoly, 0, -1);
  $stringPoly .= "]";
  return $stringPoly;
}
// UPDATE `plages`
// SET `polygon` = ST_PolyFromText('POLYGON((0 0,1 0,1 1,0 0))',0)
// WHERE `plages`.`ID_plage` = 7
 ?>
