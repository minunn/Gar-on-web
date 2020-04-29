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
            <div class="sidebardiv" >Marqueurs</div>
            <div class="sidebardiv">Plages</div>
            <div class="sidebardiv">Itinéraires</div>
            <div class="sidebardiv">Autres</div>
            <hr>
        </div>
        <div id="main">
            <a href="admin.php?PK1"><div id="PK1" class="maindiv">
                <h2>PK1</h2>
            </div></a>
                <div class="maindiv marqueurs">
                    <h3>Marqueur 1</h3>
                </div>
                <div class="maindiv marqueurs">
                    <h3>Marqueur 2</h3>
                </div>
                <div class="maindiv marqueurs">
                    <h3>Marqueur 3</h3>
                </div>
                <div class="maindiv marqueurs">
                    <h3>+</h3>
                </div>
            <!--<div id="PK2" class="maindiv">
                <h2>PK2</h2>
            </div>
            <div id="PK3" class="maindiv">
                <h2>PK3</h2>
            </div>
            <div id="PK4" class="maindiv">
                <h2>PK4</h2>
            </div>-->
            <?php 
                if (isset($_GET['PK1'])){
                    echo "yes man";
                }
            ?>
        </div>
    </div>
    
</body>
</html>