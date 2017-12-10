<?php
require_once "Utilisateur.php";
session_start();

$test1 = new Utilisateur($_POST['courriel'], $_POST['prenom'], $_POST['nom'], $_POST['passwor']);
//print_r($_POST);
$test1->addUser();
?>
