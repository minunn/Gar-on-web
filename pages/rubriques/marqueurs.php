<!DOCTYPE html>
<html>
<?php
//appel des fichier pour check si l'utilisateur est connecter
require_once '../db.php';
require_once 'auth_check.php';
?>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/ico" href="../../images/favicon.png"> <!-- favicon -->
    <title>admin</title>
    <link rel="stylesheet" href="../../css/adminstyle.css">


</head>

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
                echo "
                    <a href='marqueurs.php?PK$indexPK'><div id='PK$indexPK' class='maindiv'>
                        <h2>PK$indexPK</h2>
                    </div></a>";

                #Si l'admin a cliqué sur une des cartes, on affiche les marqueurs qu'il peut Modifier
                if (isset($_GET["PK$indexPK"])) {
                  $nombreMarqueurs = 3;
                    for ($indexMarqueurs = 1; $indexMarqueurs <= $nombreMarqueurs; $indexMarqueurs++) {
                        echo "
                            <a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs'><div class='maindiv marqueurs'>
                                <h3>Marqueur $indexMarqueurs</h3>
                            </div></a>";
                        #Si l'admin a cliqué sur un des marqueurs, on affiche les options
                        if (isset($_GET["marqueur$indexMarqueurs"])) {
                            #Option 1 : Position
                            echo "<a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs&changerPosition'><div class='maindiv marqueurs'>Changer de position</div></a>";
                            #Si l'admin a cliqué sur cette option, on affiche ce qu'il peut modifier
                            if (isset($_GET['changerPosition'])) {
                                echo "
                                    <div class='maindiv marqueurs'>
                                        <form action='changerPos' method='post'>
                                            Latitude :  <input type='text' name='posX' id='posX'><br>
                                            Longitude : <input type='text' name='posY' id='posY'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>
                                    ";
                            }
                            #Option 2 : Texte du marqueur
                            echo "<a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs&changerTexte'><div class='maindiv marqueurs'>Changer texte du marqueur</div></a>";
                            #Pareil pour cette option
                            if (isset($_GET['changerTexte'])) {
                                echo "
                                    <div class='maindiv marqueurs'>
                                        <form action='changerText' method='post'>
                                            <input type='text' name='texteMarqueur' id='texteMarqueur'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>
                                    ";
                            }
                            #Option 3 : Image du marqueur
                            echo "<a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs&changerImage'><div class='maindiv marqueurs'>Changer image</div></a>";
                            #Pareil pour cette option
                            if (isset($_GET['changerImage'])) {
                                echo "
                                    <div class='maindiv marqueurs'>
                                        <form action='changerImg' method='post'>
                                            <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                                            <input type='submit' value='Modifier'>
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
    </div>

</body>
<?php include '../../map.php'; ?>
<script>
//Script pour scroll directement sur la carte sélectionnée
//Sans ce code, à chaque fois que l'admin clique sur une option, ça le ramenera au haut de la page

//Cette fonction récupère une url et renvoie les paramètre de cette url
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

</html>
