<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>BG Photographie</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/slideshow.css">
		<script src="js/main.js"></script>
		<link rel="stylesheet" href="css/style.css">
		
	</head>
	<body>
		<?php include "header.php" ?>
		
		<div class="slideshow-container">
		
		  <div class="mySlides fade">
		    <div class="numbertext">1 / 3</div>
		    <img src="images/carrousel1.jpg" style="width:100%">
		    <div class="overlay"></div>
  		  	<div class="buttonReserver"><a href="#"> Réserver une séance </a></div>
		  </div>
		  
		
		  <div class="mySlides fade">
		    <div class="numbertext">2 / 3</div>
		    <img src="images/carrousel2.jpg" style="width:100%">
		    <div class="overlay"></div>
  		  	<div class="buttonReserver"><a href="#"> Réserver une séance </a></div>
		  </div>
		
		  <div class="mySlides fade">
		    <div class="numbertext">3 / 3</div>
		    <img src="images/carrousel3.jpg" style="width:100%">
		    <div class="overlay"></div>
  		  	<div class="buttonReserver"><a href="#"> Réserver une séance </a></div>
		  </div>
		
		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>
		
		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span>
		  <span class="dot" onclick="currentSlide(2)"></span>
		  <span class="dot" onclick="currentSlide(3)"></span>
		</div> 
	
		<footer class="text-center">
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-instagram"></a>
			<a href="#" class="fa fa-vimeo"></a>
		</footer>

	</body>
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);
		
		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}
		
		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}
		
		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  if (n > slides.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
		      slides[i].style.display = "none";  
		  }
		  for (i = 0; i < dots.length; i++) {
		      dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		}
	</script>
	 
</html>

