<html>
<<<<<<< HEAD
<?php require_once '../database/db.php';  ?>
<title> Login </title>
<meta charset="utf8">
<link type="text/css" rel="stylesheet" href="style.css">
<script type="text/javascript" src="login.js"></script>
=======

<head>
    <link rel="shortcut icon" type="image/ico" href="index/images/favicon.png"> <!-- favicon -->
    <title> Login </title>    
    <meta charset="utf8">
    <link type="text/css" rel="stylesheet" href="style.css">
    <script type="text/javascript" src="login.js"></script>
>>>>>>> 6da94244e65e658d94920f7ab8c516c10e1af296

</head>

<body>


    <img src="fondcarte.png" class="fondcarte">
    <div class="loginbox">
        <img src="loginpic.svg" class="avatar"> <br>
        <h1> Page Administrateur </h1>
        <form method="POST">
            <?php

            if (!empty($_POST)) {
                extract($_POST);
                $valid = true;

                if (empty($username)) {
                    $valid = false;
                    $error_username = "Veuillez renseigner un nom d'utilisateur !";
                }
                if (empty($password)) {
                    $valid = false;
                    $error_password = "Veuillez renseigner un mot de passe ! ";
                }
            }

            ?>
            <p> Nom d'utilisateur </p>
            <?php
            if (isset($error_username)) {
                echo "<br> <strong>" . $error_username . "</strong>";
            }
            ?>
            <input type="text" name="username" placeholder="Entrez votre nom d'utilisateur">

            <p> Mot de Passe </p>
            <span class="eye" onclick="myFunction()">
                <img src="eye-slash-solid.svg" id="hide1" class=".fa.fa-check-circle">
                <img src="eye-solid.svg" id="hide2">
            </span>
            <?php
            if (isset($error_password)) {
                echo "<br> <strong>" . $error_password . "</strong>";
            }
            ?>

            <input type="password" name="password" placeholder="Entrez votre mot de passe" id="myInput">

            <input type="button" name="button" onclick="window.location.href = '../index.php'"
                value=" Retour à l'accueil" href="../index.html">

            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>

    <?php

    ?>


</body>

</html>