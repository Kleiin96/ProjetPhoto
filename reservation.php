<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/slideshow.css">
		<link rel="stylesheet" href="lib/themes/default.css">
		<link rel="stylesheet" href="lib/themes/default.date.css">
		<link rel="stylesheet" href="lib/themes/default.time.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/main.js"></script>

	</head>
	<body>
		<?php include "header.php" ?>
		<div class="padding-left">
			<h1>Réserver un rendez-vous</h1>
			<input id="prenom" type="text" name="prenom" placeholder="Prénom" class="email"/>
			<input id="nom" type="text" name="nom" placeholder="Nom" class="email"/><br>
			<input id="email" type="email" name="email" placeholder="Email" class="email"/><br>
            Le <input id="date" class="datepicker email" name="date" type="text" placeholder="Date de la séance">
             de <input id="debut" class="timepicker email" name="time" type="time" placeholder="Heure de début">
             à <input id="fin" class="timepicker email" name="time" type="time" placeholder="Heure de fin">
            <textarea id="message" name="message" class="message" placeholder="Message/Informations spéciales"></textarea><br>
            <a id="btnEnvoyer" href="#" class="btn">Envoyer</a>
        	<div id="container"></div>
		</div>
		
		<?php include "footer.php" ?>
		
	<script src="lib/jquery.1.7.0.js"></script>
    <script src="lib/picker.js"></script>
    <script src="lib/picker.date.js"></script>
    <script src="lib/picker.time.js"></script>
    <script src="lib/legacy.js"></script>

    <script type="text/javascript">

        var $inputDate = $( '.datepicker' ).pickadate({
            formatSubmit: 'yyyy/mm/dd',
            min: Date(),
            container: '#container',
            closeOnSelect: true,
            closeOnClear: true,
            disable: [
                1, 7
              ],
        })
        
        var $inputTime1 = $( '#debut' ).pickatime({
        	interval: 30,
        	min: [8,0],
        	max: [20,0],
        })
        
        var $inputTime2 = $( '#fin' ).pickatime({
        	interval: 30,
        	min: [8,0],
        	max: [21,5],
        })
        
        timepicker_start = $inputTime1.pickatime('picker'),
   	 	timepicker_end = $inputTime2.pickatime('picker');
        
        if ( timepicker_start.get('value') ) {
        	timepicker_end.set('min', timepicker_start.get('select'))
        }
    	if ( timepicker_end.get('value') ) {
    		timepicker_start.set('max', timepicker_end.get('select'))
    	}

    	// When something is selected, update the “from” and “to” limits.
    	timepicker_start.on('set', function(event) {
    	  if ( event.select ) {
    		  timepicker_end.set('min', timepicker_start.get('select'))
    	  }
    	})
    	timepicker_end.on('set', function(event) {
    	  if ( event.select ) {
    		  timepicker_start.set('max', timepicker_end.get('select'))
    	  }
       	})

       	$(document).ready(function(){
            $('#btnEnvoyer').click(function(){

                var nom = $('#prenom').val() + " " + $('#nom').val();
                var from = $('#email').val();
                var date = $('#date').val();
                var timeDebut = $('#debut').val();
                var timeFin = $('#fin').val();
                var message= $('#message').val();
                
                if (nom != '' && from != '' && date != '' && timeDebut != '' && timeFin != '' && message != ''){
                    $.ajax({
                       url:"sendMail.php",
                       method:"POST",
                       data:{nom:nom, from:from, date:date, timeDebut:timeDebut, timeFin:timeFin, message:message},
                        success:function(data){
                           if (data == 'No '){
                               alert("Le email n'est pas valide");
                           }else{
                        	   alert("Votre message a été envoyer. Merci!");
                           }
                        }
                    });
                }
                else{
                	alert("Veuillez remplir tout les champs");
                }
            });
   
        });
    </script>
	</body>
</html>