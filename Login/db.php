<?php
 session_start();

If(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
    $sql = "SELECT * FROM user where username = '$username'";
    $result = $db->prepare($sql);
    $result -> execute();

    if ($result->rowCount() > 0 )
    {
        $data = $result-> fetchAll();
        if (password_verify($password, $data[0]["password"]))
        {
            echo "<center> <h1> Connexion effectuée </center> </h1>";
            $_SESSION['username'] = $username;
        }
        else
        {
            echo "<center> <h1> Votre mot de passe est incorrect </center> </h1> ";
        }
    }
    else
    {
        
        echo "<center> <h1> Compte Invalide </center> </h1>";
    }
}

?>