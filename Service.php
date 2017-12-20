<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/slideshow.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/main.js"></script>

	</head>
	<body>
		<?php include "header.php";
            require_once "dbConnection.php";
         ?>
        <?php
        if(isset($_SESSION['username'])) {
        if ($_SESSION['admin'] == 1){
        ?>
        <div class="col-sm-6 padding-left">
            
            <?php
            $bd = new dbConnection();
            $conn = $bd->getdbconnect();
            $sql="SELECT * FROM service";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while( $row= $result->fetch_assoc()){
                    echo "<div class='service'>";
                    echo "<a class='nomService'>".$row['nomService']."</a>";
                    echo "<br/>";
                    echo "<a class='prixService'>".$row['prix']."$</a>";
                    echo "</div>";
                }
            }
            }
            }
            ?>
            <a href="AjouterService.php"/> Ajouter Service </a>
		</div>

		<div class="col-sm-6 margin-bottom">
			<div class="photo fade"><img src="images/studio1.jpg"></div>
			<div class="photo fade"><img src="images/studio2.jpg"></div>
			<div class="photo fade"><img src="images/studio3.jpg"></div>
			<div class="photo fade"><img src="images/studio4.jpg"></div>
			<div class="photo fade"><img src="images/studio5.jpg"></div>
			<div class="photo fade"><img src="images/studio6.jpg"></div>
			<div class="photo fade"><img src="images/studio7.jpg"></div>
			<div class="photo fade"><img src="images/studio8.jpg"></div>
			<div class="photo fade"><img src="images/studio9.jpg"></div>
		</div>
		
		<footer class="text-center">
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-instagram"></a>
			<a href="#" class="fa fa-vimeo"></a>
		</footer>

	</body>
</html>

