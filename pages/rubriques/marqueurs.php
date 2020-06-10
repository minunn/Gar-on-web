<!DOCTYPE html>
<html>
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="shortcut icon" type="image/ico" href="../../index/images/favicon.png"> <!-- favicon -->
    <link rel="stylesheet" href="../../css/adminstyle.css">
=======
    <?php
    //appel des fichier pour check si l'utilisateur est connecter
    require_once '../db.php';
    require_once 'auth_check.php';

    $db = new PDO('mysql:host=localhost;dbname=websitedatabase', 'root', '');
    $sql_selectMarqueur = "SELECT * FROM marqueurs";
    $result_Marqueur = $db->prepare($sql_selectMarqueur);
    $result_Marqueur -> execute();
    $array_Marqueur = $result_Marqueur -> fetchAll();

    if (isset($_POST['position'])) {
        $newLatitude = $_POST['posX'];
        $newLongitude = $_POST['posY'];
        $IDaModifier = $_POST['ID'];
        $sql = "UPDATE `marqueurs` SET `Latitude` = '$newLatitude', `Longitude` = '$newLongitude' WHERE `marqueurs`.`ID_marqueur` = $IDaModifier";
        $modif = $db->prepare($sql);
        $modif -> execute();
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/ico" href="../../images/favicon.png"> <!-- favicon -->
        <title>admin</title>
        <link rel="stylesheet" href="../../css/adminstyle.css">
>>>>>>> fa537ae3e464f7b55012d7b969d5315b4027a0bd

    <script src="../../js/admin.js" charset="utf-8"></script>

    <?php
//appel des fichier pour check si l'utilisateur est connecter
require_once '../db.php';
require_once 'auth_check.php';

require_once 'MarqueurClass.php';
require_once 'CartesClass.php';
$Marqueurs = new MarqueurClass;
$Cartes = new CartesClass;


?>


    </head>

<<<<<<< HEAD
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
            <div class="maindiv" onclick='hideChildren(this)'>
                <div id="map"></div>
            </div>
            <?php
            $cartes = $Cartes->getCartes();
            foreach ($cartes as $carteActuelle) {
              echo "<div id='".$carteActuelle["nom_carte"]."' class='maindiv'>";
              echo "<h2>".$carteActuelle["nom_carte"]."<br>"."</h2>";


              $marqueurs = $Cartes->getMarqueursFromNomCarte($carteActuelle["nom_carte"]);
              //var_dump($marqueurs);
              foreach ($marqueurs as $marqueursCarteActuelle) {
                echo '<div class="maindiv marqueurs" onclick="hideChildren(this)">';
                echo "<h3>". $marqueursCarteActuelle["marqueur"] ."</h3>";

                $marqueur = $Marqueurs->getMarqueurByNom($marqueursCarteActuelle["marqueur"]);
                foreach ($marqueur as $marqueurActuel) {
                  //var_dump($marqueurActuel);
                  $idMarqueur = $marqueurActuel["ID_marqueur"];
                  $latitude = $marqueurActuel["Latitude"];
                  $longitude = $marqueurActuel["Longitude"];
                  $texte = $marqueurActuel["Texte"];
                  $image = '';
                  if (isset($marqueurActuel["Photo"]) && isset($marqueurActuel["Image_type"])) {
                    $imgSource = '"viewImage.php?image_id='.$idMarqueur.'"';
                    $image = "<img src=$imgSource".' width="100%"/>';
                  }

                  echo "<form action='".$_SERVER['PHP_SELF']."' method='post' hidden='true'>";
                  echo"<div class='maindiv marqueurs'>
                        <h4>Changer Position</h4>
                        Latitude :  <br><input type='text' name='posX' id='posX' value='$latitude'><br>
                        Longitude : <br><input type='text' name='posY' id='posY' value='$longitude'><br>
                        <input type='text' name='ID' value='' hidden>
                        <br><input type='submit' value='Modifier' name='position'>
                      </div>";
                  echo"<div class='maindiv marqueurs'>
                        <h4>Changer Texte</h4>
                        <input type='text' name='texteMarqueur' id='texteMarqueur' value='$texte'><br>
                        <input type='text' name='ID' value='' hidden>
                        <input type='submit' value='Modifier' name='texte'>
                      </div>";
                  echo"<div class='maindiv marqueurs'>
                        <h4>Changer Image</h4>
                        $image
                        <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                        <input type='text' name='ID' value='' hidden>
                        <input type='submit' value='Modifier' name='image'>
                      </div>";
                  echo "</form>";
                }

                echo "</div>";
              }
              echo "<div class='maindiv marqueurs'>";
              echo "<h3>Ajouter un marqueur</h3>";
              echo "</div>";
              echo "</div>";
            }

             ?>
=======
    <body>
        <div id="wrapper">
            <div id="header">
                <a href="../admin.php">
                    <h1>Administration</h1>
                </a>
                <?php
                if(isset($_GET['logout']))
                {
                    session_destroy();
                    header('Location: /Gar-On-Web/pages/login.php');
                }
                ?>

                <form id="frm" method="post"  action="?logout" >
                    <input class="testing" type="submit" value="logout" id="logout" style="border: none;outline: none;height: 50px;width: 200px;background: #3E3D3D;color: #fff;font-size: 18px;border-radius: 20px;position: absolute;right: 30px;"/>
                </form>
            </div>
            <div id="sidebar">
                <div class="sidebardiv" style="background-color: darkgray;">Marqueurs</div>
                <a href="plages.php">
                    <div class="sidebardiv">Plages</div>
                </a>
                <a href="users.php">
                    <div class="sidebardiv">utilisateurs</div>
                </a>
                <hr>
            </div>
            <div id="main">
                <div class="maindiv">
                    <div id="map"></div>
                </div>
                <?php
                $nombreCartes = 16;
                for ($indexPK = 1; $indexPK <= $nombreCartes; $indexPK++) {
                #On affiche toutes les cartes que l'admin peut modifier
                $phpself = $_SERVER['PHP_SELF'];
                $phpself .= "?PK$indexPK";
                    echo "
                    <a href='$phpself'><div id='PK$indexPK' class='maindiv'>
                    <h2>PK$indexPK</h2>
                    </div></a>";

                    #Si l'admin a cliqué sur une des cartes, on affiche les marqueurs qu'il peut Modifier
                    if (isset($_GET["PK$indexPK"])) {



                        for ($indexMarqueurs = 1; $indexMarqueurs <= count($array_Marqueur); $indexMarqueurs++) {
                            $IDactuel = $array_Marqueur[$indexMarqueurs - 1]["ID_marqueur"];
                            $newphpself = $phpself;
                            $newphpself .= "&marqueur$indexMarqueurs";
                            echo "
                            <a href='$newphpself'><div class='maindiv marqueurs'>
                            <h3>Marqueur $indexMarqueurs</h3>
                            </div></a>";
                            #Si l'admin a cliqué sur un des marqueurs, on affiche les options
                            if (isset($_GET["marqueur$indexMarqueurs"])) {

                                #Option 1 : Position
                                echo "<a href='$newphpself&changerPosition'><div class='maindiv marqueurs'>Changer de position</div></a>";
                                #Si l'admin a cliqué sur cette option, on affiche ce qu'il peut modifier
                                if (isset($_GET['changerPosition'])) {
                                    $latitudeActuel = $array_Marqueur[$indexMarqueurs - 1]["Latitude"];
                                    $longitudeActuel = $array_Marqueur[$indexMarqueurs - 1]["Longitude"];
                                    echo "
                                    <div class='maindiv marqueurs'>
                                    <form action='$newphpself&changerPosition' method='post'>
                                        Latitude :  <br><input type='text' name='posX' id='posX' value='$latitudeActuel'><br>
                                        Longitude : <br><input type='text' name='posY' id='posY' value='$longitudeActuel'><br>
                                        <input type='text' name='ID' value='$IDactuel' hidden>
                                        <br><input type='submit' value='Modifier' name='position'>
                                    </form>
                                    </div>
                                    ";
                                }
                                #Option 2 : Texte du marqueur
                                echo "<a href='$newphpself&changerTexte'><div class='maindiv marqueurs'>Changer texte du marqueur</div></a>";
                                #Pareil pour cette option
                                if (isset($_GET['changerTexte'])) {
                                $texteActuel = $array_Marqueur[$indexMarqueurs - 1]["Texte"];
                                    echo "
                                    <div class='maindiv marqueurs'>
                                    <form action='$newphpself&changerTexte' method='post'>
                                        <input type='text' name='texteMarqueur' id='texteMarqueur' value='$texteActuel'><br>
                                        <input type='text' name='ID' value='$IDactuel' hidden>
                                        <input type='submit' value='Modifier' name='texte'>
                                    </form>
                                    </div>
                                    ";
                                }
                                #Option 3 : Image du marqueur
                                echo "<a href='$newphpself&changerImage'><div class='maindiv marqueurs'>Changer image</div></a>";
                                #Pareil pour cette option
                                if (isset($_GET['changerImage'])) {
                                    echo "
                                    <div class='maindiv marqueurs'>
                                    <form action='$newphpself&changerImage' method='post'>
                                        <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                                        <input type='text' name='ID' value='$IDactuel' hidden>
                                        <input type='submit' value='Modifier' name='image'>
                                    </form>
                                    </div>
                                    ";
                                }
                            }
                        }
                    #// TODO: La possibilité de rajouter des marqueurs
                        echo "
                        <div class='maindiv marqueurs'>
                        <h3>+</h3>
                        </div>";
                    }
                }
                ?>
            </div>
>>>>>>> fa537ae3e464f7b55012d7b969d5315b4027a0bd
        </div>

<<<<<<< HEAD
</body>
  <?php include '../../map.php'; ?>
=======
    </body>
    <?php include '../../map.php'; ?>
        <script>
        //Script pour scroll directement sur la carte sélectionnée
        //Sans ce code, à chaque fois que l'admin clique sur une option, ça le ramenera au haut de la page

        //Cette fonction récupère un url et renvoie les paramètres de cet url
        var getParams = function(url) {
            var params = {};
            var parser = document.createElement('a');
            parser.href = url;
            var query = parser.search.substring(1);
            var vars = query.split('&');
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split('=');
                params[pair[0]] = decodeURIComponent(pair[1]);
            }
            return params;
        };
        var urlParams = getParams(window.location.href);
        var paramKeys = Object.keys(urlParams);
        //On récupère le premier paramètre de l'url, qui correspond à la carte sélectionnée
        var elementToScrollTo = document.getElementById(paramKeys[0])
        elementToScrollTo.scrollIntoView()
        </script>

>>>>>>> fa537ae3e464f7b55012d7b969d5315b4027a0bd
</html>
