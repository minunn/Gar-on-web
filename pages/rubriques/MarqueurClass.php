<?php
/**
 *
 */
include_once 'bdd_util.php';
class MarqueurClass
{
  public $nom = '';
  public $latitude = 0;
  public $longitude = 0;
  public $texte;
  public $image;
  public $imagetype; // NOTE: on va peut-être changer l'endroit où sont stockés les images
                    // On n'aura donc pas besoin de préciser le type de l'image dans ce cas


  public function setNom($newNom)
  {
    $this->nom = $newNom;
    return true;
  }

  public function setPosition($newLatitude, $newLongitude)
  {
    $this->latitude = $newLatitude;
    $this->longitude = $newLongitude;
    return true;
  }

  public function setTexte($newTexte)
  {
    $this->texte = $newTexte;
    return true;
  }

  public function setImage($newImage, $newImageType)
  {
    $this->image = $newImage;
    $this->imagetype = $newImageType;
    return true;
  }

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

  public function createNewMarqueur($value='')
  {
    // code...
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
