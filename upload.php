<?php
require_once "dbConnection.php";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Le fichier ne peut pas être plus de 50Mo.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Le fichier doit être soit un jpg soit un png soit un jpeg.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $imagename=$_FILES["fileToUpload"]["name"];
        
        //Get the content of the image and then add slashes to it
        $imagetmp=addslashes (file_get_contents($_FILES['fileToUpload']['tmp_name']));
        $bd = new dbConnection();
        $conn = $bd->getdbconnect();
        $idPhoto=0;
        $selectLastPhoto="SELECT cpt FROM compteur WHERE nomTable='photo'";
        $result=$conn->query($selectLastPhoto);
        $row = $result->fetch_assoc();
        $idPhoto=$row['cpt'];
        echo $idPhoto;
        $idPhoto++;
        echo "<br/>";
        echo $idPhoto;
        
        $IncrementCompteur="Update compteur SET cpt=".$idPhoto." WHERE nomTable='photo'";
        if (mysqli_query($conn, $IncrementCompteur)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        
        $sql = "INSERT INTO photo (idPhoto,nomPhoto,imagePhoto) VALUES ($idPhoto,'$imagename','$imagetmp')";
        echo $imagename."<br/>";
        
        $db_insert=mysqli_query($conn,$sql);
        // Send an error message if the query failed.
        if (!$db_insert) {
            die("Database insert failed: " . mysqli_error($conn));
        }
        
    }
?>