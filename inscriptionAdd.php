<html>

<head>

    <title>

        Inscription

    </title>

    <meta charset= "utf8"/>

</head>

<body>





<?php

require_once "Utilisateur.php";


$test1 = new Utilisateur($_POST['courriel'], $_POST['prenom'], $_POST['nom'], $_POST['password']);
//print_r($_POST);
$test1->addUser();
?>

<form action="accueil.html" method="post">

    <button type="submit">Retour</button>

</form>


</body>
</html>