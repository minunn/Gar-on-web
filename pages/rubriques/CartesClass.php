<?php
/**
 *
 */
include_once 'bdd_util.php';

class CartesClass
{
  public function getCartes()
  {
    $bdd = connectDBS();
    $query = "SELECT nom_carte FROM `liste_cartes`";
    $stmt = $bdd->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }

  public function getLimitesCarte($nomCarte)
  {
    $bdd = connectDBS();
    $query = "SELECT limites FROM `liste_cartes` WHERE nom_carte = :nomcarte";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':carte',$nomCarte);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }

  public function getMarqueursFromNomCarte($nomCarte)
  {
    $bdd = connectDBS();
    $query = "SELECT marqueur FROM `cartes` WHERE nom_carte = :carte";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':carte',$nomCarte);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }

  public function getPlageFromNomCarte($nomCarte)
  {
    $bdd = connectDBS();
    $query = "SELECT plage FROM `cartes` WHERE nom_carte = :carte";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':carte',$nomCarte);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }



}


 ?>
