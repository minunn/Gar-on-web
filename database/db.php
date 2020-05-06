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
            $_SESSION['email'] = $username;
        }
        else
        {
            echo "<center> <h1> Votre mot de passe est incorrect </center> </h1> ";
        }
    }
    else
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $req = $db->prepare($sql);
        $req -> execute();
        echo "<center> <h1> Enregistrement effectué </center> </h1>";
    }
}

?>