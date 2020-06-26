<!DOCTYPE html>
<html lang="fr">
    <?php
    //appel des fichiers pour vérifier si l'utilisateur est connecté
    require_once '../db.php';
    require_once 'auth_check.php';

    // TODO: tout
    ?>

    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <link rel="shortcut icon" type="image/ico" href="../../images/favicon.png"> <!-- favicon -->
        <link rel="stylesheet" href="../../css/adminstyle.css">


    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <a href="../admin.php">
                    <h1>Administration</h1>
                </a>
                <?php
                if(isset($_GET['logout'])) {
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
                <div class="sidebardiv" style="background-color: darkgray;">Plages</div>
                <a href="users.php"><a href="users.php">
                    <div class="sidebardiv">utilisateurs</div>
                </a></a>
                <hr>
            </div>
            <div id="main">
                <div class="maindiv">
                    <div id="map"></div>
                </div>
                <?php
                //ajout des onglet PK 1 à pk16
                for ($indexPK = 1; $indexPK <= 16; $indexPK++) {
                    echo "
                        <a href='plages.php?PK$indexPK'><div id='PK$indexPK' class='maindiv'>
                            <h2>PK$indexPK</h2>
                        </div></a>";
                    if (isset($_GET["PK$indexPK"])) {
                        //ajout des onglet plages
                        for ($indexplages = 1; $indexplages <= 3; $indexplages++) {
                            echo "
                                <a href='plages.php?PK$indexPK&plages$indexplages'><div class='maindiv plages'>
                                    <h3>plages $indexplages</h3>
                                </div></a>";
                            if (isset($_GET["plages$indexplages"])) {
                                echo "<a href='plages.php?PK$indexPK&plages$indexplages&changerPosition'><div class='maindiv plages'>Changer de position</div></a>";
                                if (isset($_GET['changerPosition'])) {
                                    echo "<div class='maindiv plages'>
                                        <form action='changerPos' method='post'>
                                            X : <input type='text' name='posX' id='posX'><br>
                                            Y : <input type='text' name='posY' id='posY'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>";
                                }
                                echo "<a href='plages.php?PK$indexPK&plages$indexplages&changerTexte'><div class='maindiv plages'>Changer texte de la plage</div></a>";
                                if (isset($_GET['changerTexte'])) {
                                    echo "<div class='maindiv plages'>
                                        <form action='changerText' method='post'>
                                            <input type='text' name='texteplages' id='texteplages'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>";
                                }
                                echo "<a href='plages.php?PK$indexPK&plages$indexplages&changerImage'><div class='maindiv plages'>Changer image</div></a>";
                                if (isset($_GET['changerImage'])) {
                                    echo "<div class='maindiv plages'>
                                        <form action='changerImg' method='post'>
                                            <input type='file' name='changerImage' id='changerImage' accept='image/*'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>";
                                }
                            }
                        }
                        echo "<div class='maindiv plages'>
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
