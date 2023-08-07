<?php
class DatabaseConnection{
public $server = "localhost";
public $database = "krishibajar";
public $user = "root";
public $pass = "";
public $connection; 
public function __construct(){
  $connection = new mysqli ("localhost","root","","krishibajar");

}
public function getConnection(){
    return $this->connection;
}

}
$databaseConnection = new DatabaseConnection();
$getConnection = $databaseConnection->getConnection();
?>