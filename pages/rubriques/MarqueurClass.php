<?php

include_once 'bdd_util.php';
require_once 'CartesClass.php';
class MarqueurClass
{
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

  // On utilise cette fonction dans la fonction update
  // Quand l'admin ne mettait pas de photo, ça enlevait l'image de la bdd
  // Du coup, si l'admin ne met pas d'image à update, il récupère l'image de la bdd
  // via cette fonction
  // C'est pas efficace, mais ça marche
  public function getImageMarqueurById($id)
  {
    $bdd = connectDBS();
    $query = "SELECT Photo,Image_type FROM `marqueurs` WHERE ID_marqueur = :id ";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    $data = $stmt->fetch();
    return $data;
  }

  public function createNewMarqueur($newMarqueur,$files = '')
  {
    // Pour créer un marqueur, on doit l'ajouter dans la table marqueur,
    // mais on doit également l'ajouter à la table cartes, car chaque marqueur
    // appartient à une carte

    // A quelle carte ce nouveau marqueur appartient
    $nomCarte = $newMarqueur["nomCarte"];

    // Ces trois valeurs sont obligatoires
    $newNom = $newMarqueur["nomMarqueur"];
    $newLatitude = $newMarqueur["posX"];
    $newLongitude = $newMarqueur["posY"];

    $bdd = connectDBS();
    $query = "INSERT INTO `marqueurs`
    (`Nom`, `Latitude`, `Longitude`, `Texte`, `Photo`, `Image_type`)
    VALUES (:nom, :latitude, :longitude, :texte, :photo, :imagetype)";

    // Le texte et la photo sont optionnels, on vérifie donc si ils existent
    // avant de les insérer dans la bdd
    if (isset($newMarqueur["texteMarqueur"])) {
      $newTexte = $newMarqueur["texteMarqueur"];
    }
    else {
      $newTexte = NULL;
    }
    if (isset($files)) {
      @$newImage = file_get_contents($_FILES['changerImage']['tmp_name']);
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
      // Avec PDO::PARAM_NULL, peu importe la valeur qu'on met, il intégrera une
      // valeur null dans la collonne
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

    // Pour éviter que le code soit encore plus encombré, j'ai fait une fonction
    // dans la class CartesClass qui se charge de la deuxième partie
    $Cartes = new CartesClass;
    $Cartes->addMarqueurCarte($nomCarte,$newNom);
  }
  public function updateMarqueur($newMarqueur,$files = '')
  {
    // Ici, pour update un marqueur, on doit update la table marqueur, puis
    // la table cartes

    // On a besoin de récupérer le nom actuel du marqueur pour le changer dans la table cartes
    // TODO: utiliser les id des marqueurs et pas les noms dans la table cartes
    $nomMarqueur = $newMarqueur["nnomMarqueur"];
    $nomCarte = $newMarqueur["nomCarte"];
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
      @$newImage = file_get_contents($_FILES['changerImage']['tmp_name']);
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
      // Avec PDO::PARAM_NULL, peu importe la valeur qu'on met, il intégrera une
      // valeur null dans la collonne
      $stmt->bindValue(':texte',$newTexte,PDO::PARAM_NULL);
    }
    else {
      $stmt->bindValue(':texte',$newTexte);
    }

    // Ici, on doit vérifier si l'admin n'a pas ajouté une nouvelle image à update
    // Sans cette étape, si il y avait déjà une image dans la bdd, elle sera supprimée
    if ($newImage == NULL) {
      $image = $this->getImageMarqueurById($idMarqueur);
      // Si il y a pas d'image dans la bdd, on peut rendre les collonnes null
      if ($image["Photo"] == NULL) {
        $stmt->bindValue(':photo',$newImage,PDO::PARAM_NULL);
        $stmt->bindValue(':imagetype',$newImageType,PDO::PARAM_NULL);
      }
      // Sinon, on récupère l'image et on la réinsére
      // Encore une fois, pas efficace, mais ça marche ¯\_(ツ)_/¯
      else {
        $stmt->bindValue(':photo',$image["Photo"]);
        $stmt->bindValue(':imagetype',$image["Image_type"]);
      }
    }
    else {
      $stmt->bindValue(':photo',$newImage);
      $stmt->bindValue(':imagetype',$newImageType);
    }
    $stmt->bindValue(':id',$idMarqueur);

    $stmt->execute();

    // Pour éviter que le code soit encore plus encombré, j'ai fait une fonction
    // dans la class CartesClass qui se charge de la deuxième partie
    $Cartes = new CartesClass;
    $Cartes->setMarqueurCarte($nomCarte,$nomMarqueur,$newNom);
  }
  public function deleteMarqueur($value='')
  {
    // TODO: récupérer id marqueur, supprimer dans table marqueurs et cartes
  }
}
?>
