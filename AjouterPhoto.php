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
		<?php include "header.php" ?>
        <?php
        if(isset($_SESSION['username'])) {
        if ($_SESSION['admin'] == 1){
        ?>
        <div class="col-sm-6 padding-left">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input id='btnUpload' type="button" value="Ajouter" name="submit" class="btn2">
            <!--<form action="upload.php" method="post" enctype="multipart/form-data">
                Image:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br/>
                <input id='lul' type="submit" value="Ajouter" name="submit" class="btn2">
            </form>  -->
            <script>
                $(document).ready(function () {
                    $('#btnUpload').click(function () {

                        var data = new FormData();
                        jQuery.each(jQuery('#fileToUpload')[0].files, function (i, file) {
                            data.append('file-' + i, file);
                        });
                        if (data) {
                            $.ajax({
                                url: "upload.php",
                                method: "POST",
                                contentType: false,
                                processData: false,
                                data: data,
                                success: function (data) {
                                    alert('Photo Ajouté à la base de donnée!');
                                    console.log(data);
                                }
                            });
                        }
                    });
                });
            </script>
            <?php
            }
            }
            ?>
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

