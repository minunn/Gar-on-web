<?php
//permet de check si l'utilisateur est connecter sur un compte
if (!isset($_SESSION['username'])) {
    //redirection vers la page login si utilisateur incorect 
    header("location : ../../Login/login.php");
}