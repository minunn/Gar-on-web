<?php 
   
if(!empty($_POST)){
    extract($_POST);
    $valid = true;

    if(empty($username)){
        $valid = false;
        $error_username = "Veuillez renseigner un nom d'utilisateur !";
        
    }
    if(empty($password)){
        $valid = false;
        $error_password = "Veuillez renseigner un mot de passe ! ";
    }
   
}

?> 


<html>

<head>
    <title> Login </title>
    <meta charset="utf8">
    <link type="text/css" rel="stylesheet" href="style.css">
    <script type="text/javascript" src="login.js"></script>

</head>

<body>

   
                <img src="fondcarte.png" class="fondcarte">
                    <div class="loginbox">
                        <img src="loginpic.svg" class="avatar"> <br>
                        <h1> Page Administrateur </h1>
                        <form method="POST" action="db.php">
                            <p> Nom d'utilisateur </p>
                            <?php 
                                if(isset($error_username)){
                                    echo "<br> <strong>". $error_username . "</strong>";
                                }
                            ?>
                            <input type="text" name="username" placeholder="Entrez votre nom d'utilisateur">

                            <p> Mot de Passe </p>
                            <span class="eye" onclick="myFunction()">
                                <img src="eye-slash-solid.svg" id="hide1" class=".fa.fa-check-circle">
                                <img src="eye-solid.svg" id="hide2">
                            </span>
                            <?php 
                                if(isset($error_password)){
                                    echo "<br> <strong>". $error_password . "</strong>";
                                }
                            ?>
                            <input type="password" name="password" placeholder="Entrez votre mot de passe" id="myInput" >
                            
                            <input type="button" name="button" value="Retour à l'accueil" href="../index.html">
                            
                            <input type="submit" name="submit" value="Connexion">
                        </form>
                    </div>

            <?php
        
    ?> 
    

</body>

</html>