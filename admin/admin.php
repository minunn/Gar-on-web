<!DOCTYPE html>
<?php

$db = new PDO('mysql:host=localhost;dbname=websitedatabase', 'root', '');


#$sql_marqueur_image = "SELECT * FROM marqueur_image";
#$result_marqueur_image = $db->prepare($sql_marqueur_image);
#$result_marqueur_image -> execute();
# // TODO: à ajouter la possibilité d'ajouter des images

//appel des fichier pour check si l'utilisateur est connecter 
require_once '../database/db.php';
require_once 'rubriques/auth_check.php';
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="shortcut icon" type="image/ico" href="index/images/favicon.png"> <!-- favicon -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

    <style>
    #map {
        height: 35vw;
    }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>Administration</h1>
            <?php
       if(isset($_GET['logout']))
              {
                  //permet de ce logout du compte 
                session_destroy();
                header("Location: ../login/login.php");
              }
    ?>
  <form id="frm" method="post"  action="?logout" >
    <input style='grid-column: 2;' type="submit" value="logout" id="logout " />
    </form>
        </div>
        <div id="sidebar">
            <a href="rubriques/marqueurs.php">
                <div class="sidebardiv">Marqueurs</div>
            </a>
            <a href="rubriques/plages.php">
                <div class="sidebardiv">Plages</div>
            </a>
            <a href="rubriques/users.php">
                <div class="sidebardiv">Utilisateurs</div>
            </a>
            <hr>
        </div>
        <div id="main">
            <div class="maindiv">
                <div id="map"></div>
            </div>
        </div>
    </div>

</body>
<script defer>

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

<?php
  $sql_selectID = "SELECT id FROM marqueur_position WHERE 1";
  $result_marqueurID = $db->prepare($sql_selectID);
  $result_marqueurID -> execute();
  foreach ($result_marqueurID as $marqueurActuel) {
    	$idMarqueurActuel = $marqueurActuel["id"];

      $data_marqueur_position = sqlSelect("SELECT * FROM marqueur_position WHERE id = $idMarqueurActuel", $db);

      $data_marqueur_texte = sqlSelect("SELECT * FROM marqueur_texte WHERE id = $idMarqueurActuel", $db);

      # SQL retourne une liste avec seulement un élément dedans, du coup, on sélectionne le premier élément de la liste
      $latitude = $data_marqueur_position[0]["X"];
      $longitude = $data_marqueur_position[0]["Y"];
      #echo "$latitude, $longitude <br>";

      $texte = $data_marqueur_texte[0]["texte"];
      #echo "$texte <br>";

      echo"L.marker([$latitude, $longitude]).addTo(map)
          .bindPopup('$texte')
          ";
  }

  function sqlSelect($sql, $db){
    $sqlCode = $sql;
    $result = $db->prepare($sqlCode);
    $result -> execute();
    $data = $result -> fetchAll();
    return $data;
  }
?>
</script>

</html>
