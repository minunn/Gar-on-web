
<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/ico" href="images/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title>Cartographie | France | Ami Garonne</title>
        <script src="js/index.js"></script>
        <!-- API Leaflet -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    </head>

    <body onload="initialize()">
        <header>
            <div id="connexion"> <!-- Renvoie vers la page de connexion administrateur -->
                <p><a href="pages/login.php">Connexion</a></p>
            </div>

            <div id="langues"> <!-- Choix de la langue -->
                <!-- Les balises div servent à organiser les éléments avec flexbox -->
                <div id="fr"><a href=""><img src="images/drapeau_fr.jpg" class="drapeaux" alt="Drapeau français">FR</a></div>
                <div id="en"><a href=""><img src="images/drapeau_en.jpg" class="drapeaux" alt="Drapeau anglais">EN</a></div>
                <div id="nl"><a href=""><img src="images/drapeau_nl.png" class="drapeaux" alt="Drapeau néerlandais">NL</a></div>
            </div>

            <div id="navigation"> <!-- Menu de navigation -->
                <!-- Les balises div servent à organiser les éléments avec flexbox -->
                <a href=""><div class="elements"><p>Accueil</p></div></a>
                <a href=""><div class="elements"><p>L'association</p></div></a>
                <a href=""><div class="elements"><p>Nos actions</p></div></a>
                <a href=""><div class="elements"><p>Actualités</p></div></a>
                <a href=""><div class="elements"><p>Infos pratiques</p></div></a>
                <a href=""><div class="elements"><p>Blog</p></div></a>
                <a href=""><div class="elements"><p>Contact</p></div></a>
                <a href=""><div class="elements"><p>Réservation</p></div></a>
                <a href=""><div class="elements"><p>Membres</p></div></a>
            </div>

            <div id="titre"> <!-- Titre de la page avec logo de l'association et page Facebook -->
                <img src="images/logo_AMI.png" id="asso" alt="Logo association">
                <h1>Cartographie</h1>
                <img src="images/logo_facebook.png" id="fb" alt="Logo Facebook">
            </div>
        </header>
        <article id="background">
            <div id="carte"> <!-- Carte navigable -->
                <h2>La carte interactive</h2>
                <div id="map"></div>
            </div>

            <div id="legende"> <!-- Légende de la carte -->
                <h3>Légende</h3><br>
                <!-- Chaque élément sera représenté par son icône et une rapide description -->
                <img src="" id="element1" alt="element 1"></img><p>Description élément 1</p><br>
                <img src="" id="element2" alt="element 2"></img><p>Description élément 2</p>
            </div>

            <div id="texte"> <!-- Si le commanditaire souhaite apporter des explications sur la carte ou autre texte -->
                <h3>Titre</h3><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div id="telecharger"> <!-- Section pour télécharger la carte dans tous ces formats -->
                <h3>Télecharger la carte</h3><br>
                <p>Cliquez sur un bouton ci-dessous pour télécharger la carte au format souhaité.</p>
                <div class="boutons">
                    <div class="formats"><a href="">KMZ</a></div>
                    <div class="formats"><a href="">KML</a></div>
                </div>
                <div class="boutons">
                    <div class="formats"><a href="">S57</a></div>
                    <div class="formats"><a href="">Open CPN</a></div>
                </div>
            </div>
            <footer>
                <a href="#connexion"><div id="retour">Haut de page</div></a>
            </footer>
        </article>
    </body>
</html>