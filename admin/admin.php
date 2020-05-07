<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=admindb', 'root', '');




$sql_marqueur_image = "SELECT * FROM marqueur_image";
$result_marqueur_image = $db->prepare($sql_marqueur_image);
$result_marqueur_image -> execute();



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

    <style>
      #map{ height: 300px;}
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Administration</h1>
            <button>Déconnection</button>
        </div>
        <div id="sidebar">
            <a href="marqueurs.php"> <div class="sidebardiv">Marqueurs</div></a>
            <a href="plages.php"><div class="sidebardiv">Plages</div></a>
            <a href="users.php"><div class="sidebardiv">Autres</div></a>
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

  var divMap = document.getElementById('map')
  console.log(divMap);
  var map = L.map(divMap).setView([44.4563, 0.1325], 10);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

<?php
  $sql_selectID = "SELECT id FROM marqueur_position WHERE 1";
  $result_marqueurID = $db->prepare($sql_selectID);
  $result_marqueurID -> execute();
  foreach ($result_marqueurID as $valuee) {
    	$ab = $valuee["id"];
      #echo "$ab : ";
      $sql_marqueur_position = "SELECT * FROM marqueur_position WHERE id = $ab";
      $result_marqueur_position = $db->prepare($sql_marqueur_position);
      $result_marqueur_position -> execute();
      $data_marqueur_position = $result_marqueur_position -> fetchAll();

      $sql_marqueur_texte = "SELECT * FROM marqueur_texte WHERE id = $ab";
      $result_marqueur_texte = $db->prepare($sql_marqueur_texte);
      $result_marqueur_texte -> execute();
      $data_marqueur_texte = $result_marqueur_texte -> fetchAll();

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
?>


</script>

</html>
