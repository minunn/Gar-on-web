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

      //appel des classes pour les cartes et plages
      require_once 'CartesClass.php';
      require_once 'PlageClass.php';
      $Cartes = new CartesClass;
      $Plages = new PlageClass;

      // On vérifie si on a reçu une requête POST
      if (isset($_POST["modifPlage"])&&isset($_FILES["changerImage"]["name"])) {
        echo "modif";
        $Plages->updatePlage($_POST, $_FILES);
      }
      elseif (isset($_POST["modifPlage"])) {
        $Plages->updatePlage($_POST);
      }

      if (isset($_POST["ajoutPlage"])&&isset($_FILES["changerImage"]["name"])) {
        echo "ajout";
        $Plages->createNewPlage($_POST, $_FILES);
      }
      elseif (isset($_POST["ajoutPlage"])) {
        $Plages->createNewPlage($_POST);
      }

      if (isset($_POST["supprPlage"])) {
        $Plages->deletePlageById($_POST["ID"]);
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
                <div class="sidebardiv">Marqueurs</div>
            </a>
            <a href="plages.php">
                <div class="sidebardiv" style="background-color: darkgray;">Plages</div>
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

              // Pour chaque carte, on récupère les plages associés et on les affichent
              $plages = $Cartes->getPlageFromNomCarte($carteActuelle["nom_carte"]);

              foreach ($plages as $plagesCarteActuelle) {
                if($plagesCarteActuelle["ID_plage"] != NULL){
                  // Pour chaque plages, on récupère leurs informations et on les affichent
                  $plage = $Plages->getPlageById($plagesCarteActuelle["ID_plage"]);
                  echo '<div class="maindiv plages" hidden="true">';



                  foreach ($plage as $plageActuel) {
                    $idPlage = $plageActuel["ID_plage"];
                    $nom = $plageActuel["Nom"];
                    $latitude = $plageActuel["Latitude"];
                    $longitude = $plageActuel["Longitude"];
                    $texte = $plageActuel["Texte"];
                    $image = '';
                    echo "<h3>". $nom;
                    echo "<span onclick='switchFormChildren(this.id)' id='plage$idPlage' style='cursor: pointer;'>▼</span>";
                    echo "</h3>";
                    if (isset($plageActuel["Photo"]) && isset($plageActuel["Image_type"])) {
                      $imgSource = '"viewImage.php?image_id='.$idPlage.'"';
                      $image = "<img src=$imgSource".' width="100%"/>';
                    }

                    echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' id='form$idPlage' hidden='true'>";
                    echo"<div class='maindiv plages'>
                          <h4>Changer Nom</h4>
                          <input type='text' name='nomPlage' id='nomPlage' value='$nom' required><br>
                        </div>";
                    echo"<div class='maindiv plages'>
                          <h4>Changer Position</h4>
                          Latitude :  <br><input type='text' name='posX' id='posX' value='$latitude' required><br>
                          Longitude : <br><input type='text' name='posY' id='posY' value='$longitude' required><br>
                        </div>";
                    echo"<div class='maindiv plages'>
                          <h4>Changer Texte</h4>
                          <input type='text' name='textePlage' id='textePlage' value='$texte'><br>
                        </div>";
                    echo"<div class='maindiv plages'>
                          <h4>Changer Image</h4>
                          $image <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                        </div>";
                    $nomCarte = $carteActuelle["nom_carte"];
                    echo"<div class='maindiv plages'>
                          <input type='hidden' name='ID' value='$idPlage'>
                          <input type='hidden' name='nomCarte' value='$nomCarte'>
                          <input type='hidden' name='nnomPlage' value='$nom'>
                          <input type='submit' value='Modifier' name='modifPlage'>
                        </div>";
                    echo "<div class='maindiv plages'>
                            <input type='submit' value='Supprimer cette plage' name='supprPlage'>
                          </div>
                    ";
                    echo"</form>";
                  }

                  echo "</div>";
                }

              }
              // Ajouter un plage
              echo "<div class='maindiv plages' hidden='true'>";
              echo "<h3>Ajouter une plage ";
              echo "<span onclick='hideChildren(this)' style='cursor: pointer;'>+</span>";
              echo "</h3>";
              echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' hidden='true'>";
              echo"<div class='maindiv plages'>
                    <h4>Changer Nom</h4>
                    <input type='text' name='nomPlage' id='nomPlage' value='' required><br>
                  </div>";
              echo"<div class='maindiv plages'>
                    <h4>Changer Position</h4>
                    Latitude :  <br><input type='text' name='posX' id='posX' value='' required><br>
                    Longitude : <br><input type='text' name='posY' id='posY' value='' required><br>
                  </div>";
              echo"<div class='maindiv plages'>
                    <h4>Changer Texte</h4>
                    <input type='text' name='textePlage' id='textePlage' value=''><br>
                  </div>";
              echo"<div class='maindiv plages'>
                    <h4>Changer Image</h4>
                    <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                  </div>";
              $nomCarte = $carteActuelle["nom_carte"];
              echo"<div class='maindiv plages'>
                    <input type='hidden' name='nomCarte' value='$nomCarte'>
                    <input type='submit' value='Modifier' name='ajoutPlage'>
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
