<!DOCTYPE html>
<html>
<?php
//appel des fichiers pour check si l'utilisateur est connecté
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
