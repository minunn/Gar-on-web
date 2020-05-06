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

</html>
