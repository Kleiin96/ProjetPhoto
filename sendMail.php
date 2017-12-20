<?php

    $regex = "/[a-z0-9'_-]+(?:\.[a-z0-9'_-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])/";

    if(isset($_POST['date'])){
        if(preg_match($regex, $_POST['from']) != false){
            $to = "rikiki.33@hotmail.fr" . "\n";
            $subject = "Réservation de séance" . "\n";
            $txt = "Le " . $_POST['date'] . " de " . $_POST['timeDebut'] . " à " . $_POST['timeFin'] . "\n" . $_POST['message'] . "\n";
            $headers = "From: " . $_POST['from'] ."\r\n" .
                $_POST['nom'];
                
            mail($to,$subject,$txt,$headers);
        }
        else {
            echo "No";
        }
    }
    else{
        if(preg_match($regex, $_POST['from']) != false){
            $to = "rikiki.33@hotmail.fr"  . "\n";
            $subject = $_POST['sujet']  . "\n";
            $txt = $_POST['message']  . "\n";
            $headers = "From: " . $_POST['from'] ."\r\n" .
                $_POST['nom'];
                
            mail($to,$subject,$txt,$headers);
        }
        else {
            echo "No";
        }
    }
   
    
?> 