<?php


session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new PDO('mysql:host=localhost;dbname=websitedatabase', 'root', '');
    $sql = "SELECT * FROM users where username = '$username'";
    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0) {
        $data = $result->fetchAll();
        if (password_verify($password, $data[0]["password"])) {
            echo "<center> <h1> Connexion effectuée </center> </h1>";
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location: /Gar-On-Web/admin/admin.php');
            exit();
        }
    }
}