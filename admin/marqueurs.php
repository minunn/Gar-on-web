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
                for ($indexPK=0; $indexPK < 16; $indexPK++) { 
                    echo "
                    <a href='marqueurs.php?PK$indexPK'><div id='PK$indexPK' class='maindiv'>
                        <h2>PK$indexPK</h2>
                    </div></a>";
                    if (isset($_GET["PK$indexPK"])){
                        for ($indexMarqueurs=1; $indexMarqueurs <= 3 ; $indexMarqueurs++) { 
                            echo "
                            <div class='maindiv marqueurs'>
                                <h3>Marqueur $indexMarqueurs</h3>
                            </div>";
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
</html>
