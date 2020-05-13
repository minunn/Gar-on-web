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
            <a href="marqueurs.php">
                <div class="sidebardiv">Marqueurs</div>
            </a>
            <a href="plages.php">
                <div class="sidebardiv">Plages</div>
            </a>
            <div class="sidebardiv" style="background-color: darkgray;">utilisateurs</div>
            <hr>
        </div>
        <div id="main">
            <div class="maindiv">
                <div id="map"></div>
            </div>
            <?php
            for ($indexusers = 1; $indexusers <= 3; $indexusers++) {
                echo "
                            <a href='users.php?users$indexusers'><div class='maindiv users'>
                                <h3>users $indexusers</h3>
                            </div></a>";
                if (isset($_GET["users$indexusers"])) {
                    echo "<a href='users.php?users$indexusers&changerPosition'><div class='maindiv users'>Nom d'utilisateur</div></a>";
                    if (isset($_GET['changerPosition'])) {
                        echo "
                                    <div class='maindiv users'>
                                        <form action='changernomutilisateur' method='post'>
                                        <input type='text' name='texteusername' id='texteusername'><br>
                                        <input type='submit' value='Modifier le nom de utilisateur'>
                                        </form>
                                    </div>
                                    ";
                    }
                    echo "<a href='users.php?users$indexusers&changerTexte'><div class='maindiv users'>mot de passe</div></a>";
                    if (isset($_GET['changerTexte'])) {
                        echo "
                                    <div class='maindiv users'>
                                        <form action='changermotdepasse' method='post'>
                                            <input type='text' name='textepassword' id='textepassword'><br>
                                            <input type='submit' value='Modifier le mot de passe'>
                                        </form>
                                    </div>
                                    ";
                    }
                }
            }
            echo "
                        <div class='maindiv users'>
                            <h3>+</h3>
                        </div>";
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