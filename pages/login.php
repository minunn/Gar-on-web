<!DOCTYPE html>
<html lang="fr">

    <?php require_once 'db.php';  ?>  <!-- Récupère les éléments de la BDD -->


    <head>
        <link rel="shortcut icon" type="image/ico" href="../index/images/favicon.png"> <!-- favicon -->
        <title> Login </title> <!-- Titre de la page -->
        <meta charset="utf-8"> <!-- Méta charset UTF-8 qui permet l'affichage de caractères spéciaux -->
        <link type="text/css" rel="stylesheet" href="../css/loginstyle.css"> <!-- CSS relié -->
        <script type="text/javascript" src="../js/login.js"></script> <!-- JS relié -->

    </head>

    <body>


        <img src="../images/fondcarte.png" class="fondcarte" alt="fond de carte"> <!-- Image du fond de carte -->
        <div class="loginbox"> <!-- DEBUT DE LA DIV LOGINBOX -->
            <img src="../images/loginpic.svg" class="avatar" alt="avatar"> <br>  <!-- Image qui représente un utilisateur -->
            <h1> Page Administrateur </h1> <!-- Titre : Page Administrateur  -->
            <form method="POST"> <!-- Méthode POST pour le formulaire -->

                <?php

                if (!empty($_POST)) {
                    extract($_POST);
                    $valid = true;
                    /* Si l'utilisateur ne rentre pas de nom d'utilisateur : Un message apparaît : "Veuillez renseigner un nom d'utilisateur !" */ 
                    if (empty($username)) {
                        $valid = false;
                        $error_username = "Veuillez renseigner un nom d'utilisateur !";
                    }
                    /* Si l'utilisateur ne rentre pas de mot de passe : Un message apparaît : "Veuillez renseigner un mot de passe !" */ 
                    if (empty($password)) {
                        $valid = false;
                        $error_password = "Veuillez renseigner un mot de passe !";
                    }
                }

                ?>
                <p> Nom d'utilisateur </p> <!-- NOM D'UTILISATEUR -->

                <?php

                /* Ici s'affiche : "Veuillez renseigner un nom d'utilisateur !" */ 
                if (isset($error_username)) {
                    echo "<br> <strong>" . $error_username . "</strong>";
                }
                ?>

                <!-- Champ pour rentrer le nom d'utilisateur -->
                <input type="text" name="username" placeholder="Entrez votre nom d'utilisateur">

                <p> Mot de Passe </p>  <!-- MOT DE PASSE -->

                <span class="eye" onclick="myFunction()">  <!-- Au clic la fonction JS se met en route / Cette fonction permet de masquer ou non le mot de passe que l'on rentre -->
                    <img src="../images/eye-slash-solid.svg" id="hide1" class=".fa.fa-check-circle" alt="oeil barré">  <!-- Image de l'oeil barré qui masque le mot de passe -->
                    <img src="../images/eye-solid.svg" id="hide2" alt="oeil ouvert">  <!-- Image de l'oeil -->
                </span>

                <?php
                /* Ici s'affiche : "Veuillez renseigner un mot de passe !" */ 
                if (isset($error_password)) {
                    echo "<br> <strong>" . $error_password . "</strong>";
                }
                ?>

                <!-- Champ pour rentrer le mot de passe -->
                <input type="password" name="password" placeholder="Entrez votre mot de passe" id="myInput">

                <!-- Bouton Retour à l'accueil -->
                <input type="button" name="button" onclick="window.location.href = '../cartographie.php'"
                    value=" Retour à l'accueil" href="../cartographie.php">

                <!-- Bouton Connexion -->
                <input type="submit" name="submit" value="Connexion">
            </form>
        </div> <!-- FIN DE LA DIV LOGINBOX -->

        <?php

        ?>

    </body>

</html>