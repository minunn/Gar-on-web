<?php
#connexion à la base de données
# // TODO: créer un compte avec un mot de passe, pour plus de sécurité.
$db = new PDO('mysql:host=localhost;dbname=websitedatabase', 'root', '');

//appel des fichier pour check si l'utilisateur est connecter
require_once 'database/db.php';
require_once 'admin/rubriques/auth_check.php';
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


  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    attribution: '&copy; <a href=`https://www.openstreetmap.org/copyright`>OpenStreetMap</a> contributors'
  }).addTo(map);"?>

<?php
  #Au début, on veut juste récupérer les ID de chaque marqueurs.
  #Le problème que j'avais c'était que chaque parties des marqueurs (position, texte, image)
  #sont séparé, je pouvais pas savoir quels textes allait sur quels marqueurs,
  #exemple, le marqueur à tel position doit afficher tel texte.
  $sql_selectID = "SELECT id FROM marqueur_position WHERE 1";
  #On récupère les ID dans la table marqueur_position parce que même si le marqueur
  #n'a pas de texte ou d'images à afficher, on doit forcement récupérer récupérer sa position
  #pour l'ajouter à la carte.
  $result_marqueurID = $db->prepare($sql_selectID);
  $result_marqueurID -> execute();
  #Pour chaque ID, on récupère la position, le texte et l'image du marqueur correspondant
  foreach ($result_marqueurID as $marqueurActuel) {
    	$idMarqueurActuel = $marqueurActuel["id"];

      $data_marqueur_position = sqlSelect("SELECT * FROM marqueur_position WHERE id = $idMarqueurActuel", $db);

      $data_marqueur_texte = sqlSelect("SELECT * FROM marqueur_texte WHERE id = $idMarqueurActuel", $db);

      #// TODO: ajouter pouvoir ajouter des images
      #$data_marqueur_image = sqlSelect("SELECT * FROM marqueur_imageWHERE id = $idMarqueurActuel", $db);

      # SQL retourne une liste avec seulement un élément dedans, du coup, on sélectionne le premier élément de la liste
      $latitude = $data_marqueur_position[0]["X"];
      $longitude = $data_marqueur_position[0]["Y"];

      $texte = $data_marqueur_texte[0]["texte"];

      echo"L.marker([$latitude, $longitude]).addTo(map)
          .bindPopup('$texte')
          ";
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
