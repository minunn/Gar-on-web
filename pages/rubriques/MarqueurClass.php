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
  public function updateMarqueur($value='')
  {
    // code...
  }
  public function deleteMarqueur($value='')
  {
    // code...
  }




}


 ?>
