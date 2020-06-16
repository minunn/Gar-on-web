<?php
/**
 *
 */
include_once 'bdd_util.php';
require_once 'CartesClass.php';
class MarqueurClass
{
  public $nom = '';
  public $latitude = 0;
  public $longitude = 0;
  public $texte;
  public $image;
  public $imagetype; // NOTE: on va peut-être changer l'endroit où sont stockés les images
                    // On n'aura donc pas besoin de préciser le type de l'image dans ce cas


  public function getMarqueurByNom($nomMarqueur)
  {
    $bdd = connectDBS();
    $query = "SELECT * FROM `marqueurs` WHERE Nom = :nomMarqueur";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':nomMarqueur',$nomMarqueur);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }

  public function createNewMarqueur($newMarqueur,$files = '')
  {
    $nomCarte = $newMarqueur["nomCarte"];

    $newNom = $newMarqueur["nomMarqueur"];
    $newLatitude = $newMarqueur["posX"];
    $newLongitude = $newMarqueur["posY"];

    $bdd = connectDBS();
    $query = "INSERT INTO `marqueurs`
    (`Nom`, `Latitude`, `Longitude`, `Texte`, `Photo`, `Image_type`)
    VALUES (:nom, :latitude, :longitude, :texte, :photo, :imagetype)";

    if (isset($newMarqueur["texteMarqueur"])) {
      $newTexte = $newMarqueur["texteMarqueur"];
    }
    else {
      $newTexte = NULL;
    }
    if (isset($files)) {
      //$newImage = addslashes(file_get_contents($_FILES['changerImage']['tmp_name']));
      @$newImage = file_get_contents($_FILES['changerImage']['tmp_name']);
      //$newImage = $_FILES['changerImage']['tmp_name'];
      $newImageType = $_FILES['changerImage']['type'];
    }
    else {
      $newImage = NULL;
      $newImageType = NULL;
    }

    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':nom',$newNom);
    $stmt->bindValue(':latitude',$newLatitude);
    $stmt->bindValue(':longitude',$newLongitude);
    if ($newTexte == NULL) {
      $stmt->bindValue(':texte',$newTexte,PDO::PARAM_NULL);
    }
    else {
      $stmt->bindValue(':texte',$newTexte);
    }
    if ($newImage == NULL) {
      $stmt->bindValue(':photo',$newImage,PDO::PARAM_NULL);
      $stmt->bindValue(':imagetype',$newImageType,PDO::PARAM_NULL);
    }
    else {
      $stmt->bindValue(':photo',$newImage);
      $stmt->bindValue(':imagetype',$newImageType);
    }
    $stmt->execute();


    $Cartes = new CartesClass;
    $Cartes->addMarqueurCarte($nomCarte,$newNom);
  }
  public function updateMarqueur($newMarqueur,$files = '')
  {
    $idMarqueur = $newMarqueur["ID"];

    $newNom = $newMarqueur["nomMarqueur"];
    $newLatitude = $newMarqueur["posX"];
    $newLongitude = $newMarqueur["posY"];

    $bdd = connectDBS();
    $query = "UPDATE `marqueurs` SET
    `Nom` = :nom, `Latitude` = :latitude, `Longitude` = :longitude,
    `Texte` = :texte,
    `Photo` = :photo, `Image_type` = :imagetype
    WHERE `marqueurs`.`ID_marqueur` = :id ";

    if (isset($newMarqueur["texteMarqueur"])) {
      $newTexte = $newMarqueur["texteMarqueur"];
    }
    else {
      $newTexte = NULL;
    }
    if (isset($files)) {
      //$newImage = addslashes(file_get_contents($_FILES['changerImage']['tmp_name']));
      $newImage = file_get_contents($_FILES['changerImage']['tmp_name']);
      //$newImage = $_FILES['changerImage']['tmp_name'];
      $newImageType = $_FILES['changerImage']['type'];
    }
    else {
      $newImage = NULL;
      $newImageType = NULL;
    }
    var_dump($newImage);

    $query .= " ";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':nom',$newNom);
    $stmt->bindValue(':latitude',$newLatitude);
    $stmt->bindValue(':longitude',$newLongitude);
    if ($newTexte == NULL) {
      $stmt->bindValue(':texte',$newTexte,PDO::PARAM_NULL);
    }
    else {
      $stmt->bindValue(':texte',$newTexte);
    }
    if ($newImage == NULL) {
      $stmt->bindValue(':photo',$newImage,PDO::PARAM_NULL);
      $stmt->bindValue(':imagetype',$newImageType,PDO::PARAM_NULL);
    }
    else {
      $stmt->bindValue(':photo',$newImage);
      $stmt->bindValue(':imagetype',$newImageType);
    }
    $stmt->bindValue(':id',$idMarqueur);

    $stmt->execute();
    //return ($stmt > 0) ? true : false;
  }
  public function deleteMarqueur($value='')
  {
    // code...
  }




}


 ?>
