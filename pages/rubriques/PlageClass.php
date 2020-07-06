<?php

/**
 *
 */

// TODO: IMPORTANT
// Dans la base de donnée, ce qu'on utilise est un polygone
// Pour modifier les plages, il faut chercher comment ajouter et modifier des polygones
include_once 'bdd_util.php';
require_once 'CartesClass.php';

// TEMP: Le code a été copié collé de PlageClass, avec le nom des variales changées
// C'est temporaire, mais il faut quelque chose à montrer
class PlageClass
{
  public function getPlageByNom($nomPlage)
  {
    $bdd = connectDBS();
    $query = "SELECT * FROM `plages` WHERE Nom = :nomPlage";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':nomPlage',$nomPlage);
    $stmt->execute();
    $data = $stmt->fetch();
    //var_dump($data);
    return $data;
  }
  public function getPlageById($id)
  {
    $bdd = connectDBS();
    $query = "SELECT * FROM `Plages` WHERE ID_plage = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }

  // On utilise cette fonction dans la fonction update
  // Quand l'admin ne mettait pas de photo, ça enlevait l'image de la bdd
  // Du coup, si l'admin ne met pas d'image à update, il récupère l'image de la bdd
  // via cette fonction
  // C'est pas efficace, mais ça marche
  public function getImagePlageById($id)
  {
    $bdd = connectDBS();
    $query = "SELECT Photo,Image_type FROM `Plages` WHERE ID_plage = :id ";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    $data = $stmt->fetch();
    return $data;
  }


  public function createNewPlage($newPlage,$files = '')
  {
    // Pour créer un plage, on doit l'ajouter dans la table plage,
    // mais on doit également l'ajouter à la table cartes, car chaque plage
    // appartient à une carte

    // A quelle carte ce nouveau plage appartient
    $nomCarte = $newPlage["nomCarte"];

    // Ces trois valeurs sont obligatoires
    $newNom = $newPlage["nomPlage"];
    $newLatitude = $newPlage["posX"];
    $newLongitude = $newPlage["posY"];

    $bdd = connectDBS();
    $query = "INSERT INTO `Plages`
    (`Nom`, `Latitude`, `Longitude`, `Texte`, `Photo`, `Image_type`)
    VALUES (:nom, :latitude, :longitude, :texte, :photo, :imagetype)";

    // Le texte et la photo sont optionnels, on vérifie donc si ils existent
    // avant de les insérer dans la bdd
    if (isset($newPlage["textePlage"])) {
      $newTexte = $newPlage["textePlage"];
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
    $Cartes->addPlageCarte($nomCarte,$newNom);
  }
  public function updatePlage($newPlage,$files = '')
  {
    // Ici, pour update un plage, on doit update la table plage, puis
    // la table cartes

    // On a besoin de récupérer le nom actuel du plage pour le changer dans la table cartes
    // TODO: utiliser les id des Plages et pas les noms dans la table cartes
    $nomPlage = $newPlage["nnomPlage"];
    $nomCarte = $newPlage["nomCarte"];
    $idPlage = $newPlage["ID"];

    $newNom = $newPlage["nomPlage"];
    $newLatitude = $newPlage["posX"];
    $newLongitude = $newPlage["posY"];

    $bdd = connectDBS();
    $query = "UPDATE `Plages` SET
    `Nom` = :nom, `Latitude` = :latitude, `Longitude` = :longitude,
    `Texte` = :texte,
    `Photo` = :photo, `Image_type` = :imagetype
    WHERE `Plages`.`ID_plage` = :id ";

    if (isset($newPlage["textePlage"])) {
      $newTexte = $newPlage["textePlage"];
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
      $image = $this->getImagePlageById($idPlage);
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
    $stmt->bindValue(':id',$idPlage);

    $stmt->execute();

    // Pour éviter que le code soit encore plus encombré, j'ai fait une fonction
    // dans la class CartesClass qui se charge de la deuxième partie
    //$Cartes = new CartesClass;
    //$Cartes->setPlageCarte($nomCarte,$idPlage,$newNom);
  }
  public function deletePlageById($id)
  {
    $bdd = connectDBS();
    $query = "DELETE FROM `Plages`
    WHERE `Plages`.`ID_plage` = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':id',$id);
    $stmt->execute();

    $Cartes = new CartesClass;
    $Cartes->deletePlageCarte($id);
  }
}
?>
