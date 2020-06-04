<?php

/* Variable qui permet de démarrer la session */
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* Permet de se connecter à la base de donnée */ 
    $db = new PDO('mysql:host=localhost;dbname=websitedatabase', 'root', '');
    /* Requête qui permet de connecter un utilisateur */  
    $sql = "SELECT * FROM users where username = '$username'";
    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0) {
        $data = $result->fetchAll();
        /* Permet de vérifier si le mot de passe est bon */  /* Password_Verify est une alternative de SHA1 et permet de crypter un mot de passe */ 
        if (password_verify($password, $data[0]["password"])) {
            /* Affiche le message "Connexion effectuée" */ 
            echo "<center> <h1> Connexion effectuée </center> </h1>";
            /* Affiche se résultat si le mot de passe et le nom d'utilisateur correspondent  */ 
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            /* Redirige vers la page admin si la connexion s'effectue */ 
            header('Location: /Gar-On-Web/pages/admin.php');
            /* Exit de la fonction */ 
            exit();
        }
    }
}