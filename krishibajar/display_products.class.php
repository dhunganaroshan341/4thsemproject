<?php
include "database/sql/connection.php";
// class Products{
// function display(){
//     for($i =0;$i<=10;$i++){
//         echo" <div>
//     }
// }
// }
$select = "SELECT name FROM product-details";
echo $getConnection->query($select);

?>