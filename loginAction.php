<?php
/**
 * Created by PhpStorm.
 * User: Greninja
 * Date: 2017-12-09
 * Time: 10:59
 */
session_start();
require_once 'Utilisateur.php';
if(isset($_POST['username'])) {
    $test = new Utilisateur('lul', 'lul', 'lul', 'lul');
    $test->loginUser($_POST['username'], $_POST['password']);
}

if(isset($_POST["action"])) {

    unset($_SESSION["username"]);
    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);
    unset($_SESSION["admin"]);
}
?>