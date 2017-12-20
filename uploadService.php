 <?php
 require_once "dbConnection.php";
            $bd = new dbConnection();
            $conn = $bd->getdbconnect();
           // $sql = "INSERT INTO service (nomService,prix) VALUES ('".$_POST['nomService']."',".$_POST['prixService'].")";
            $stmt = $conn->prepare("INSERT INTO service (nomService,prix) VALUES  (?, ?)");
            $stmt->bind_param("si", $_POST['nomService'], $_POST['prixService']);
            $stmt->execute();
            //echo $imagename."<br/>";
            //$db_insert=mysqli_query($conn,$sql);
           
                header('Location: Service.php');            
            