<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" href="../style.css">
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
            <div class="sidebardiv" style="background-color: darkgray;">Plages</div>
            <a href="users.php"><a href="users.php">
                    <div class="sidebardiv">utilisateurs</div>
                </a></a>
            <hr>
        </div>
        <div id="main">
            <div class="maindiv">
                <img src="cartetmp.PNG" alt="">
            </div>
            <?php
                for ($indexPK=1; $indexPK <= 16; $indexPK++) {
                    echo "
                    <a href='plages.php?PK$indexPK'><div id='PK$indexPK' class='maindiv'>
                        <h2>PK$indexPK</h2>
                    </div></a>";
                    if (isset($_GET["PK$indexPK"])){
                        for ($indexplages=1; $indexplages <= 3 ; $indexplages++) {
                            echo "
                            <a href='plages.php?PK$indexPK&plages$indexplages'><div class='maindiv plages'>
                                <h3>plages $indexplages</h3>
                            </div></a>";
                            if (isset($_GET["plages$indexplages"])) {
                                echo "<a href='plages.php?PK$indexPK&plages$indexplages&changerPosition'><div class='maindiv plages'>Changer de position</div></a>";
                                if (isset($_GET['changerPosition'])){
                                    echo "
                                    <div class='maindiv plages'>
                                        <form action='changerPos' method='post'>
                                            X : <input type='text' name='posX' id='posX'><br>
                                            Y : <input type='text' name='posY' id='posY'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>
                                    ";
                                }
                                echo "<a href='plages.php?PK$indexPK&plages$indexplages&changerTexte'><div class='maindiv plages'>Changer texte de la plage</div></a>";
                                if (isset($_GET['changerTexte'])) {
                                    echo "
                                    <div class='maindiv plages'>
                                        <form action='changerText' method='post'>
                                            <input type='text' name='texteplages' id='texteplages'><br>
                                            <input type='submit' value='Modifier'>
                                        </form>
                                    </div>
                                    ";
                                }
                                echo "<a href='plages.php?PK$indexPK&plages$indexplages&changerImage'><div class='maindiv plages'>Changer image</div></a>";
                                if (isset($_GET['changerImage'])) {
                                    echo "
                                    <div class='maindiv plages'>
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
                        <div class='maindiv plages'>
                            <h3>+</h3>
                        </div>";
                    }
                }
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