<?php
/**
 * Created by PhpStorm.
 * User: Greninja
 * Date: 2017-11-29
 * Time: 12:53
 */
require_once 'dbConnection.php';
class Utilisateur
{
    public $idUser = '';
    public $EmailUser = '';
    public $prenomUser = '';
    public $nameUser = '';
    public $passwordUser = '';



    public function Utilisateur($_email, $_prenom,$_name,$_password){
        $this->EmailUser = $_email;
        $this->prenomUser = $_prenom;
        $this->nameUser = $_name;
        $this->passwordUser = $_password;
    }

    public function addUser(){
        $test1= new DbConnection();
        $conn = $test1->getdbconnect();

        $stmt= $conn->prepare( "INSERT INTO utilisateur(courriel, password, nom, prenom) 
			Values (?,?,?,?) ") ;
        $stmt->bind_param("ssss", $this->EmailUser, $this->passwordUser , $this->nameUser,$this->prenomUser);



        $stmt->execute();
        $_SESSION["username"]= $this->EmailUser ;


        // Send an error message if the query failed.
        $stmt->close();

        $conn->close();
    }

    public function loginUser($username , $pwd){
        $test1= new DbConnection();
        $conn = $test1->getdbconnect();

        $stmt= $conn->prepare( "Select * from utilisateur WHERE courriel = ? AND password = ?") ;
        $stmt->bind_param("ss", $username, $pwd);



        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION["username"]=$username;
            echo 'Yes';
        } else {
            echo "No";
        }



        // Send an error message if the query failed.
        $stmt->close();

        $conn->close();
    }

    public function modifyUser(){

    }

    public function deleteUser(){

    }

    public function showUsers(){

    }



}
?>