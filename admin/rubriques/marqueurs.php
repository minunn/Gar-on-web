<!DOCTYPE html>
<html>
<?php
//appel des fichier pour check si l'utilisateur est connecter 
require_once '../../database/db.php';
require_once 'auth_check.php';
?>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/ico" href="index/images/favicon.png"> <!-- favicon -->
    <title>admin</title>
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>

    <style>
    #map {
        height: 250px;
    }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <a href="../admin.php">
                <h1>Administration</h1>
            </a>
            <button>Déconnection</button>
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
            for ($indexPK = 1; $indexPK <= 16; $indexPK++) {
                echo "
                    <a href='marqueurs.php?PK$indexPK'><div id='PK$indexPK' class='maindiv'>
                        <h2>PK$indexPK</h2>
                    </div></a>";
                if (isset($_GET["PK$indexPK"])) {
                    for ($indexMarqueurs = 1; $indexMarqueurs <= 3; $indexMarqueurs++) {
                        echo "
                            <a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs'><div class='maindiv marqueurs'>
                                <h3>Marqueur $indexMarqueurs</h3>
                            </div></a>";
                        if (isset($_GET["marqueur$indexMarqueurs"])) {
                            echo "<a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs&changerPosition'><div class='maindiv marqueurs'>Changer de position</div></a>";
                            if (isset($_GET['changerPosition'])) {
                                echo "
                                    <div class='maindiv marqueurs'>
                                        <form action='changerPos' method='post'>
                                            X : <input type='text' name='posX' id='posX'><br>
                                            Y : <input type='text' name='posY' id='posY'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>
                                    ";
                            }
                            echo "<a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs&changerTexte'><div class='maindiv marqueurs'>Changer texte du marqueur</div></a>";
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
                            echo "<a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs&changerImage'><div class='maindiv marqueurs'>Changer image</div></a>";
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
<script defer>
var divMap = document.getElementById('map')
console.log(divMap);
var map = L.map(divMap).setView([44.4563, 0.1325], 10);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([44.5501, 0.0051]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();

L.circle([44.57873, -0.03416], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(mymap);
</script>
<script>
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
var elementToScrollTo = document.getElementById(paramKeys[0])
elementToScrollTo.scrollIntoView()
</script>

</html>