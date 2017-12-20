<?php
require_once "dbConnection.php";
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file-0"]["name"]);
print_r($_FILES);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["data"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file-0"]["size"] > 500000000000000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file-0"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
//$imagename= 'images/' + $_FILES["fileToUpload"]["name"];
//$imagetmp=addslashes (file_get_contents($_FILES['fileToUpload']['tmp_name']));

$bd = new dbConnection();
$conn = $bd->getdbconnect();
$idPhoto=0;
//$selectLastPhoto="SELECT cpt FROM compteur WHERE nomTable='photo'";
//$result=$conn->query($selectLastPhoto);
//$row = $result->fetch_assoc();
//$idPhoto=$row['cpt'];
//echo $idPhoto;
//$idPhoto++;
//echo "<br/>";
//echo $idPhoto;

/*$IncrementCompteur="Update compteur SET cpt=".$idPhoto." WHERE nomTable='photo'";
if (mysqli_query($conn, $IncrementCompteur)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}*/

$sql = "INSERT INTO photo (nomPhoto) VALUES ('$target_file')";
$stmt = $conn->prepare("INSERT INTO photo (nomPhoto) VALUES (?)");
$stmt->bind_param("s", $target_file);
$stmt->execute();

//echo $imagename."<br/>";

//$db_insert=mysqli_query($conn,$sql);
//  $last_id=$conn->insert_id;
// Send an error message if the query failed.
if (!$db_insert) {
    die("Database insert failed: " . mysqli_error($conn));

}
else{
    // $sql="INSERT INTO taalbumphoto (fkAlbum,fkPhoto) VALUES ('$album','$last_id')";
    // $db_insert=mysqli_query($conn,$sql);

}
?>