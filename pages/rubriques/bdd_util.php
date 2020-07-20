<?php
function connectDBS() {
try {
  $bdd = new PDO('mysql:host=amigaronndcartes.mysql.db; dbname=amigaronndcartes;charset=utf8', 'amigaronndcartes', 'LaGaronne47');
  return $bdd;
  }
catch (Exception $err) {
  echo 'Exception reçue : ', $err->getMessage(), "\n";
  return NULL;
  }
}

?>
