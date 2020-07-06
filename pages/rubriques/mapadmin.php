<?php
#connexion à la base de données
# // TODO: créer un compte avec un mot de passe, pour plus de sécurité.
$db = new PDO('mysql:host=localhost;dbname=websitedatabase', 'root', '');

/*appel des fichier pour check si l'utilisateur est connecté
Provoque 2 erreurs car l'utilisateur n'est pas connecté lors de l'appel dans l'index
Mit en commentaire au cas où mais les fichiers ne semblent pas nécessaires*/

/*require_once 'pages/db.php';
require_once 'pages/rubriques/auth_check.php';*/
?>
<?php
  echo '
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
  <script type="text/javascript" defer>';
  echo "
  var divMap = document.getElementById('map')
  var map = L.map(divMap).setView([44.4563, 0.1325], 10);

  var blueIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
  });
  var yellowIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
  });

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    attribution: '&copy; <a href=`https://www.openstreetmap.org/copyright`>OpenStreetMap</a> contributors'
  }).addTo(map);"?>

<?php



  // NOTE: code copié collé du code pour les marqueurs, temporaire
  $sql_selectPlages = "SELECT * FROM plages";
  $result_plages = $db->prepare($sql_selectPlages);
  $result_plages -> execute();

  foreach ($result_plages as $plageActuelle) {
    $idPlage = $plageActuelle["ID_plage"];
    $latitudePlage = $plageActuelle["Latitude"];
    $longitudePlage = $plageActuelle["Longitude"];
    $textePlage = $plageActuelle["Texte"];
    $photoPlage = $plageActuelle["Photo"];
    $imagetypePlage = $plageActuelle["Image_type"];
    $polygonPlage = $plageActuelle["polygon"]; // TODO: au lieu d'utiliser des points pour les plages, utiliser les polygones

    $popup = '';
    if (isset($textePlage)) {
      $popup .= $textePlage;
    }
    if (isset($photoPlage) && isset($imagetypePlage)) {
      // TODO: changer pour qu'on utilise pas un lien absolu
      $imgSource = '"/Gar-On-Web/pages/rubriques/viewImage.php?image_id='.$idMarqueur.'"';
      $image = "<img src=$imgSource".' width="100%"/>';
      $popup .= " " .$image;
    }
    if ($popup == '') {
      echo"L.marker([$latitudePlage, $longitudePlage], {icon: yellowIcon}).addTo(map);";
    }
    else {
      echo"L.marker([$latitudePlage, $longitudePlage], {icon: yellowIcon}).addTo(map)
          .bindPopup('$popup',{
            maxWidth: 'auto'
          });
          ";
    }

  }

  $sql_selectMarqueurs = "SELECT * FROM marqueurs";
  $result_marqueur = $db->prepare($sql_selectMarqueurs);
  $result_marqueur -> execute();

  foreach ($result_marqueur as $marqueurActuel) {
    $idMarqueur = $marqueurActuel["ID_marqueur"];
    $latitudeMarqueur = $marqueurActuel["Latitude"];
    $longitudeMarqueur = $marqueurActuel["Longitude"];
    $texteMarqueur = $marqueurActuel["Texte"];
    $photoMarqueur = $marqueurActuel["Photo"];
    $imagetypeMarqueur = $marqueurActuel["Image_type"];

    $popup = '';
    if (isset($texteMarqueur)) {
      $popup .= $texteMarqueur;
    }
    if (isset($photoMarqueur) && isset($imagetypeMarqueur)) {
      // TODO: changer pour qu'on utilise pas un lien absolu
      $imgSource = '"/Gar-On-Web/pages/rubriques/viewImage.php?image_id='.$idMarqueur.'"';
      $image = "<img src=$imgSource".' width="100%"/>';
      $popup .= " " .$image;
    }
    if ($popup == '') {
      echo"var marqueur$idMarqueur = L.marker([$latitudeMarqueur, $longitudeMarqueur],{
        draggable:true,
        icon: blueIcon
      }).addTo(map);
      marqueur$idMarqueur.on('dragend',function(e) {
        newLatLong = marqueur$idMarqueur.getLatLng();
        marqueurForm = document.getElementById('form$idMarqueur');
        inputLat = marqueurForm.children[1].children[2];
        inputLong = marqueurForm.children[1].children[5];

        inputLat.value = newLatLong.lat;
        inputLong.value = newLatLong.lng;

        switchFormChildren('marqueur$idMarqueur')
      });";

      } else {
        echo"var marqueur$idMarqueur = L.marker([$latitudeMarqueur, $longitudeMarqueur],{
        draggable:true,
        icon: blueIcon
        }).addTo(map)
          .bindPopup('$popup',{
            maxWidth: 'auto'
        });
        marqueur$idMarqueur.on('dragend',function(e) {
          newLatLong = marqueur$idMarqueur.getLatLng()
          marqueurForm = document.getElementById('form$idMarqueur')
          inputLat = marqueurForm.children[1].children[2]
          inputLong = marqueurForm.children[1].children[5]

          inputLat.value = newLatLong.lat;
          inputLong.value = newLatLong.lng;

          switchFormChildren('marqueur$idMarqueur')
        });";
    }

  }

  #fonction afin d'éviter d'encombrer le code
  function sqlSelect($sql, $db){
    $sqlCode = $sql;
    $result = $db->prepare($sqlCode);
    $result -> execute();
    $data = $result -> fetchAll();
    return $data;
  }

  echo "</script>";
?>