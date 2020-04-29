<?php 
    session_start();
?> 


<html>

<head>
    <title> Login </title>
    <meta charset="utf8">
    <link type="text/css" rel="stylesheet" href="style.css">
    <script type="text/javascript" src="login.js"></script>

</head>

<body>

    <?php
        if(isset($_SESSION['username']))
        {
            echo '<center> <h1> Vous êtes connecté en tant que : ' . $_SESSION['username'] . ' </center> </h1>' ;
        }
        else
        {
            ?>
                <img src="fondcarte.png" class="fondcarte">
                    <div class="loginbox">
                        <img src="loginpic.svg" class="avatar"> <br>
                        <h1> Page Administrateur </h1>
                        <form method="POST" action="db.php">
                            <p> Nom d'utilisateur </p>
                            <input type="text" name="username" placeholder="Entrez votre nom d'utilisateur">

                            <p> Mot de Passe </p>
                            <span class="eye" onclick="myFunction()">
                                <img src="eye-slash-solid.svg" id="hide1" class=".fa.fa-check-circle">
                                <img src="eye-solid.svg" id="hide2">
                            </span>
                            <input type="password" name="password" placeholder="Entrez votre mot de passe" id="myInput">
                            <input type="button" name="" value="Retour à l'accueil">
                            <input type="submit" name="submit" value="Connexion">
                        </form>
                    </div>

            <?php
        }
    ?> 

    

</body>

</html>