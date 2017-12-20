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
require_once 'Utilisateur.php';
$test1= new DbConnection();
$conn = $test1->getdbconnect();
$sql = "SELECT nomPhoto FROM `photo` p inner join taalbumphoto t On p.idphoto = t.fkphoto 
inner join album a on t.fkAlbum = a.idAlbum WHERE a.idAlbum=4";
$result = $conn->query($sql);
?>


<div class="col-sm-6 padding-left">
    <div class="photoMain fade contain">
        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo ' <img  src="' . $row["nomPhoto"] . '" id="expandedImg" style="width: 100%" style="height: 100%">';
        }
        ?>

    </div>
    <div class="description">Studio</div>
</div>

<div class="col-sm-6 margin-bottom">
    <!--<div class="photo"><img src="images/studio1.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio2.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio3.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio4.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio5.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio6.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio7.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio8.jpg" onclick="openImg(this);"></div>
    <div class="photo"><img src="images/studio9.jpg" onclick="openImg(this);"></div>-->
    <?php
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo '<div class="photo"><img src="' . $row["nomPhoto"] . '" onclick="openImg(this);"></div>';
        }
    }
    $conn->close();
    ?>
</div>
<a href="#" class="col-sm-6 plusPhoto">En voir plus</a>

<script>
    function openImg(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        var imgText = document.getElementById("imgtext");
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        //imgText.innerHTML = imgs.alt;
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    }
</script>

<?php include "footer.php" ?>

</body>
</html>