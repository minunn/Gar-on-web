<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="shortcut icon" type="image/ico" href="../../index/images/favicon.png"> <!-- favicon -->
    <link rel="stylesheet" href="../../css/adminstyle.css">

    <script src="../../js/admin.js" charset="utf-8"></script>

    <?php
      //appel des fichier pour check si l'utilisateur est connecter
      require_once '../db.php';
      require_once 'auth_check.php';

      //appel des classes pour les cartes et marqueurs
      require_once 'CartesClass.php';
      require_once 'MarqueurClass.php';
      $Cartes = new CartesClass;
      $Marqueurs = new MarqueurClass;

      // On vérifie si on a reçu une requête POST
      if (isset($_POST["modifMarqueur"])&&isset($_FILES["changerImage"]["name"])) {
        echo "modif";
        $Marqueurs->updateMarqueur($_POST, $_FILES);
      }
      elseif (isset($_POST["modifMarqueur"])) {
        $Marqueurs->updateMarqueur($_POST);
      }

      if (isset($_POST["ajoutMarqueur"])&&isset($_FILES["changerImage"]["name"])) {
        echo "ajout";
        $Marqueurs->createNewMarqueur($_POST, $_FILES);
      }
      elseif (isset($_POST["ajoutMarqueur"])) {
        $Marqueurs->createNewMarqueur($_POST);
      }

      if (isset($_POST["supprMarqueur"])) {
        $Marqueurs->deleteMarqueurById($_POST["ID"]);
      }
    ?>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>Administration</h1>
            <?php
       if(isset($_GET['logout']))
              {
                session_destroy();
                header('Location: /Gar-On-Web/pages/login.php');
              }
    ?>

<form id="frm" method="post"  action="?logout" >
    <input class="testing" type="submit" value="logout" id="logout"/>
</form>

        </div>
        <div id="sidebar">
            <a href="marqueurs.php">
                <div class="sidebardiv" style="background-color: darkgray;">Marqueurs</div>
            </a>
            <a href="plages.php">
                <div class="sidebardiv">Plages</div>
            </a>
            <a href="users.php">
                <div class="sidebardiv">Utilisateurs</div>
            </a>
            <hr>
        </div>
        <div id="main">
            <div class="maindiv">
                <div id="map"></div>
            </div>
            <?php
            // On récupère toutes les cartes de la bdd et on les affichent
            $cartes = $Cartes->getCartes();
            foreach ($cartes as $carteActuelle) {
              echo "<div id='".$carteActuelle["nom_carte"]."' class='maindiv'>";
              echo "<h2>".$carteActuelle["nom_carte"];
              echo "<span onclick='switchDivChildren(this)' style='cursor: pointer;'>▼</span>";
              echo "</h2>";

              // Pour chaque carte, on récupère les marqueurs associés et on les affichent
              $marqueurs = $Cartes->getMarqueursFromNomCarte($carteActuelle["nom_carte"]);
              foreach ($marqueurs as $marqueursCarteActuelle) {
                if ($marqueursCarteActuelle["ID_marqueur"] != NULL) {
                  // Pour chaque marqueurs, on récupère leurs informations et on les affichent
                  $marqueur = $Marqueurs->getMarqueurById($marqueursCarteActuelle["ID_marqueur"]);

                  echo '<div class="maindiv marqueurs" hidden="true">';



                  foreach ($marqueur as $marqueurActuel) {
                    //var_dump($marqueurActuel);
                    $idMarqueur = $marqueurActuel["ID_marqueur"];
                    $nom = $marqueurActuel["Nom"];
                    $latitude = $marqueurActuel["Latitude"];
                    $longitude = $marqueurActuel["Longitude"];
                    $texte = $marqueurActuel["Texte"];
                    $image = '';
                    echo "<h3>". $nom;
                    echo "<span onclick='switchFormChildren(this.id)' id='marqueur$idMarqueur' style='cursor: pointer;'>▼</span>";
                    echo "</h3>";
                    if (isset($marqueurActuel["Photo"]) && isset($marqueurActuel["Image_type"])) {
                      $imgSource = '"viewImage.php?image_id='.$idMarqueur.'"';
                      $image = "<img src=$imgSource".' width="100%"/>';
                    }

                    echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' id='form$idMarqueur' hidden='true'>";
                    echo"<div class='maindiv marqueurs'>
                          <h4>Changer Nom</h4>
                          <input type='text' name='nomMarqueur' id='nomMarqueur' value='$nom' required><br>
                        </div>";
                    echo"<div class='maindiv marqueurs'>
                          <h4>Changer Position</h4>
                          Latitude :  <br><input type='text' name='posX' id='posX' value='$latitude' required><br>
                          Longitude : <br><input type='text' name='posY' id='posY' value='$longitude' required><br>
                        </div>";
                    echo"<div class='maindiv marqueurs'>
                          <h4>Changer Texte</h4>
                          <input type='text' name='texteMarqueur' id='texteMarqueur' value='$texte'><br>
                        </div>";
                    echo"<div class='maindiv marqueurs'>
                          <h4>Changer Image</h4>
                          $image <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                        </div>";
                    $nomCarte = $carteActuelle["nom_carte"];
                    echo"<div class='maindiv marqueurs'>
                          <input type='hidden' name='ID' value='$idMarqueur'>
                          <input type='hidden' name='nomCarte' value='$nomCarte'>
                          <input type='hidden' name='nnomMarqueur' value='$nom'>
                          <input type='submit' value='Modifier' name='modifMarqueur'>
                        </div>";
                    echo "<div class='maindiv marqueurs'>
                            <input type='submit' value='Supprimer ce marqueur' name='supprMarqueur'>
                          </div>
                    ";
                    echo"</form>";
                  }

                  echo "</div>";
                }
              }
              // Ajouter un marqueur
              echo "<div class='maindiv marqueurs' hidden='true'>";
              echo "<h3>Ajouter un marqueur ";
              echo "<span onclick='hideChildren(this)' style='cursor: pointer;'>+</span>";
              echo "</h3>";
              echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' hidden='true'>";
              echo"<div class='maindiv marqueurs'>
                    <h4>Changer Nom</h4>
                    <input type='text' name='nomMarqueur' id='nomMarqueur' value='' required><br>
                  </div>";
              echo"<div class='maindiv marqueurs'>
                    <h4>Changer Position</h4>
                    Latitude :  <br><input type='text' name='posX' id='posX' value='' required><br>
                    Longitude : <br><input type='text' name='posY' id='posY' value='' required><br>
                  </div>";
              echo"<div class='maindiv marqueurs'>
                    <h4>Changer Texte</h4>
                    <input type='text' name='texteMarqueur' id='texteMarqueur' value=''><br>
                  </div>";
              echo"<div class='maindiv marqueurs'>
                    <h4>Changer Image</h4>
                    <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                  </div>";
              $nomCarte = $carteActuelle["nom_carte"];
              echo"<div class='maindiv marqueurs'>
                    <input type='hidden' name='nomCarte' value='$nomCarte'>
                    <input type='submit' value='Modifier' name='ajoutMarqueur'>
                  </div>";
              echo"</form>";
              echo "</div>";


              echo "</div>";
            }

             ?>
        </div>

</body>
  <?php include 'mapadmin.php'; ?>
</html>
