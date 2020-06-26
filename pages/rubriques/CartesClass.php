<?php
/**
 *
 */
include_once 'bdd_util.php';
require_once 'MarqueurClass.php';


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
  // TODO: utiliser les id des marqueurs et pas le nom
  public function getMarqueursFromNomCarte($nomCarte)
  {
    $bdd = connectDBS();
    $query = "SELECT ID_marqueur FROM `cartes` WHERE nom_carte = :carte";
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

  public function setMarqueurCarte($nomCarte,$idMarqueur,$newIdMarqueur)
  {
    $bdd = connectDBS();
    $query = "SELECT ID_cartes FROM `cartes` WHERE marqueur = :marqueur";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':marqueur',$idMarqueur);
    $stmt->execute();
    $data = $stmt->fetch();
    $idCarte = $data["ID_cartes"];

    $query = "UPDATE `cartes`
    SET `marqueur` = :marqueur
    WHERE `cartes`.`ID_cartes` = :carte ";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':carte',$idCarte);
    $stmt->bindValue(':marqueur',$newIdMarqueur);
    $stmt->execute();
  }

  public function setPlageCarteFromID($idCarte, $newNomMarqueur)
  {
    // code...
  }

  public function addMarqueurCarte($nomCarte, $newNomMarqueur)
  {
    $Marqueurs = new MarqueurClass;
    $marqueur = $Marqueurs->getMarqueurByNom($newNomMarqueur);
    var_dump($marqueur);

    $bdd = connectDBS();
    $query = "INSERT INTO `cartes` (`nom_carte`, `ID_marqueur`)
    VALUES (:carte, :marqueur) ";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':carte',$nomCarte);
    $stmt->bindValue(':marqueur',$marqueur["ID_marqueur"]);
    $stmt->execute();
  }

}


 ?>
