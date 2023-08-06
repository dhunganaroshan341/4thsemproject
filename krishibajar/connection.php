<?php

class Connection{
    function __construct(){
        $connection = new mysqli("localhost","root","","krishibajar");
if($connection->connect_error){
    die ("error in connection ".$connection->connect_error);
}

    }
}

?>