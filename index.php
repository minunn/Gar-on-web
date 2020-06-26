<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/ico" href="images/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title>Cartographie | France | Ami Garonne</title>
        <script src="js/index.js"></script>        
    </head>

    <body>
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
                <!-- Les scripts permettent de changer la couleur au survol, ils sont mis ici pour ne pas créer 2 fonctions pour chaque ligne dans le fichier JS -->
                <a href="https://www.amigaronne.com/"><div class="elements" onmouseover="sous_menus_off(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Accueil</p></div></a>
                <a href="https://www.amigaronne.com/l-association"><div class="elements" onmouseover="sous_menu_1_on(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>L'association</p></div></a>
                <a href="https://www.amigaronne.com/nos-actions"><div class="elements" onmouseover="sous_menu_2_on(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Nos actions</p></div></a>
                <a href="https://www.amigaronne.com/actualites2019"><div class="elements" onmouseover="sous_menu_3_on(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Actualités</p></div></a>
                <a href="https://www.amigaronne.com/infos-pratiques"><div class="elements" onmouseover="sous_menus_off(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Infos pratiques</p></div></a>
                <a href="https://www.amigaronne.com/blog"><div class="elements" onmouseover="sous_menus_off(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Blog</p></div></a>
                <a href="https://www.amigaronne.com/contact"><div class="elements" onmouseover="sous_menus_off(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Contact</p></div></a>
                <a href="https://www.amigaronne.com/reservation"><div class="elements" onmouseover="sous_menus_off(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Réservation</p></div></a>
                <a href="https://www.amigaronne.com/membres"><div class="elements" onmouseover="sous_menus_off(); this.style.backgroundColor = 'darkgray'" onmouseout="this.style.backgroundColor = 'lightgray'"><p>Membres</p></div></a>
            </div>

            <div id="sous-navigation"> <!-- Sous-menus de navigation -->
            <!-- Les scripts servent à changer la couleur de l'élément au survol -->
                <div id="sous-menu_1" class="sous-menu" onmouseover="sous_menu_1_on()" onmouseout="sous_menu_1_off()">
                    <div id="histoire" onmouseover="document.getElementById('histoire').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('histoire').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/notre-histoire">Notre histoire</a></div>
                    <div id="partenaires" onmouseover="document.getElementById('partenaires').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('partenaires').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/nos-partenaires">Nos partenaires</a></div>
                </div>
                <div id="sous-menu_2" class="sous-menu" onmouseover="sous_menu_2_on()" onmouseout="sous_menu_2_off()">
                    <div id="fluviale" onmouseover="document.getElementById('fluviale').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('fluviale').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/balade-fluviale">Balade fluviale</a></div>
                    <div id="visite" onmouseover="document.getElementById('visite').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('visite').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/balade-avec-visite">Balade avec visite guidée</a></div>
                    <div id="lagruere" onmouseover="document.getElementById('lagruere').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('lagruere').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/une-journee-a-lagruere">Une journée à Lagruère</a></div>
                    <div id="peche" onmouseover="document.getElementById('peche').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('peche').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/sortie-peche">Sortie pêche</a></div>
                    <div id="carto" onmouseover="document.getElementById('carto').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('carto').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/cartographie">Cartographie</a></div>
                    <div id="garo" onmouseover="document.getElementById('garo').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('garo').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/garo-challenge">Garo Challenge</a></div>
                </div>
                <div id="sous-menu_3" class="sous-menu" onmouseover="sous_menu_3_on()" onmouseout="sous_menu_3_off()">
                    <div id="galerie" onmouseover="document.getElementById('galerie').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('galerie').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/galerie">Galerie</a></div>
                    <div id="2019" onmouseover="document.getElementById('2019').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('2019').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/2019">2019</a></div>
                    <div id="2018" onmouseover="document.getElementById('2018').style.backgroundColor = 'darkgray'" onmouseout="document.getElementById('2018').style.backgroundColor = 'white'"><a href="https://www.amigaronne.com/2018">2018</a></div>
                </div>
            </div>

            <div id="titre" onmouseover="sous_menus_off()"> <!-- Titre de la page avec logo de l'association et page Facebook -->
            <!-- On ferme tous les sous-menus au cas où ça n'aurait pas été fait quand l'utilisateur descend sur la page -->
                <img src="images/logo_AMI.png" id="asso" alt="Logo association">
                <h1>Cartographie</h1>
                <a id="fb" href="https://www.facebook.com/amigaronne/"><img id="logo_fb" src="images/logo_facebook.png" alt="Logo Facebook"></a>
            </div>
        </header>
        <article>
            <div id="carte"> <!-- Carte navigable -->
                <h2>La carte interactive</h2>
                <div id="map"></div>
            </div>

            <div id="legende"> <!-- Légende de la carte -->
                <h3>Légende</h3><br>
                <!-- Chaque élément sera représenté par son icône et une rapide description -->
                <img src="" id="element1" alt="element 1"><p>Description élément 1</p><br>
                <img src="" id="element2" alt="element 2"><p>Description élément 2</p>
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
    <?php include 'map.php'; ?>
</html>