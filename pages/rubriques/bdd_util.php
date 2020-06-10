<?php
function connectDBS() {
try {
  $bdd = new PDO('mysql:host=localhost; dbname=websitedatabase;charset=utf8', 'root', '');
  return $bdd;
  }
catch (Exception $err) {
  echo 'Exception reçue : ', $err->getMessage(), "\n";
  return NULL;
  }
}

?>
