<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Administration</h1>
            <button>Déconnection</button>
        </div>
        <div id="sidebar">
            <div class="sidebardiv" style="background-color: darkgray;">Marqueurs</div>
            <div class="sidebardiv">Plages</div>
            <div class="sidebardiv">Autres</div>
            <hr>
        </div>
        <div id="main">
            <div class="maindiv">
                <img src="cartetmp.PNG" alt="">
            </div>
            <?php
                for ($indexPK=1; $indexPK <= 16; $indexPK++) {
                    echo "
                    <a href='marqueurs.php?PK$indexPK'><div id='PK$indexPK' class='maindiv'>
                        <h2>PK$indexPK</h2>
                    </div></a>";
                    if (isset($_GET["PK$indexPK"])){
                        for ($indexMarqueurs=1; $indexMarqueurs <= 3 ; $indexMarqueurs++) {
                            echo "
                            <a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs'><div class='maindiv marqueurs'>
                                <h3>Marqueur $indexMarqueurs</h3>
                            </div></a>";
                            if (isset($_GET["marqueur$indexMarqueurs"])) {
                                echo "<a href='marqueurs.php?PK$indexPK&marqueur$indexMarqueurs&changerPosition'><div class='maindiv marqueurs'>Changer de position</div></a>";
                                if (isset($_GET['changerPosition'])){
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
<script>
    var getParams = function (url) {
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
