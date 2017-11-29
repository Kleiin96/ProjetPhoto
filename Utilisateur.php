<?php
/**
 * Created by PhpStorm.
 * User: Greninja
 * Date: 2017-11-29
 * Time: 12:53
 */

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

    }

    public function modifyUser(){

    }

    public function deleteUser(){

    }

    public function showUsers(){

    }

    public function loginUser(){

    }

}
?>