<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="shortcut icon" type="image/ico" href="index/images/favicon.png"> <!-- favicon -->
    <link rel="stylesheet" href="css/style.css">

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
  <?php include '../map.php'; ?>
</html>
