<?php
//permet de vérifier si l'utilisateur est connecté sur un compte
if (!isset($_SESSION['username'])) {
    //redirection vers la page login si utilisateur incorrect 
    header("location : ../login.php");
}