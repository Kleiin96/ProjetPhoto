<?php
/**
 * Created by PhpStorm.
 * User: Greninja
 * Date: 2017-11-29
 * Time: 13:29
 */

class dbConnection
{
    public function DbConnnection(){

    }

    public function getdbconnect(){
        $conn = mysqli_connect("localhost","root","","bgphotographie") or die("Couldn't connect");
        if ($conn->connect_error) {
            die('Connect Error: ' . $conn->connect_error);
        }
        return $conn;
    }
}