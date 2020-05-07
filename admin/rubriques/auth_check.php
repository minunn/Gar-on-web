<?php
if (!isset($_SESSION['username'])) {
    header("location : ../../Login/login.php");
}