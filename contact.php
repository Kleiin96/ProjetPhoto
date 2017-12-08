<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/slideshow.css">
		<script src="js/main.js"></script>

	</head>
	<body>
		<?php include "header.php" ?>
		<div class="proposMarge">
			<h1>Contactez nous</h1>
			<input type="text" name="nom" value="Nom" class="email" onclick="this.select();"/><br>
		  	<input type="email" name="email" value="Email" class="email" onclick="this.select();"/><br>
		  	<input type="text" name="sujet" value="Sujet" class="email" onclick="this.select();"/><br>
		  	<textarea name="message" class="message" onclick="this.select();"/>Message</textarea><br>
		</div>
		
		<footer class="text-center">
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-instagram"></a>
			<a href="#" class="fa fa-vimeo"></a>
		</footer>

	</body>
</html>