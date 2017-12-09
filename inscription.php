<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slideshow.css">
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

include "header.php"
?>


<?php
if(isset($_SESSION["username"])) {

    ?>
    <h1 class="title">Vous êtes inscrit</h1>
    <?php
}else {
    ?>

    <h1 class="title">Inscription</h1>

    Courriel : <input type="text" name="courriel" id="courriel" class="email"/><br/>
    Mot de Passe : <input type="text" name="password" id="passwor" class="email"/><br/>
    Prénom :<input type="text" name="prenom" id="prenom" class="email"/><br/>
    Nom : <input type="text" name="nom" id="nom" class="email"/><br/>
    <button type="submit" id="allo" class="btn2">s'inscrire</button><br/>

    <?php
}

?>
<script>
$(document).ready(function(){
   $('#allo').click(function(){
      var courriel = $('#courriel').val();
      var password = $('#passwor').val();
      var prenom = $('#prenom').val();
      var nom = $('#nom').val();
      if (courriel != '' && password != ''){
          $.ajax({
             url:"inscriptionAdd.php",
             method:"POST",
             data:{courriel:courriel, password:password, prenom:prenom, nom:nom} ,
              success:function(data){
                 location.reload();
              }
          });
      }
   });
});
</script>
</body>
</html>
