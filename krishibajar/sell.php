<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    header("Location: sell.php");

    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sellpage</title>
    <link rel="stylesheet" href="style/sell.css">
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/settings.css">


</head>
<body>
    <?php
    // sell.php
$documentRoot = $_SERVER['DOCUMENT_ROOT'];
$bootstrapPath = '/project/krishibajar/bootstrap/unsplashimage.php';


    
    require_once $documentRoot . $bootstrapPath;
    ?>
<div class="sellnav">
<div id="backpage" class ="backpage">
   <?php include "elements/triangle.php"?>
   </div>
    <h1>sell page</h1>
</div>


    <form  method="POST">
        <input type="text" placeholder="product-name" name="product-name" id="product-name" required>
       <?php include_once "category.php";?>

        <input type="textarea" name="product-descriptini" id="product-description" required>
        <input type="file" name="product-image" id="product-image" placeholder="upload-image">
        <div id="quantitydiv" class="flex-row">
       <?php
       include_once "quantity.php";
       
       ?>
        <input type="number" name="quantity-number" id="quantity-number" placeholder ="quantity">
        </div>
        <label>upload-image -optional</label> 
        <div id="product-image-div"></div>
        <input type="submit" onclick="sellalert()" id = "sell-button" value ="sell" name = "sell">

    </form>


    <script>
var backpage = document.getElementById("backpage");
backpage.addEventListener("click",function(){

    window.location.href = "index.php";
});

   var input = document.getElementsByTagName(input);

    function sellalert(){

        confirm("sell-product");



    }
    function formOperation(){
        var productName = document.getElementById("product-name");
    var xmlrequest  = new XMLHttpRequest();
    xmlrequest.open("POST","sell_operation.php",true);
    xml.setRequestheader("Content-Type","application/x-www-form-urlencoded");
    xml.onreadystatechange=function(){
        if(xmlrequest.readyState===4 &&xmlrequest.status ===200){
            document.getElementbyId("result").innerHTML=xmlrequest.responseText;
        }
    };
    xmlrequest.send("action = create*prouct_name="+encodeURIComponent(productName));
    return false;

}

</script>

    <?php
 $con = new mysqli("localhost","root","","krishibajar");


// // $getconnection->query("INSERT INTO product-details(name) VALUE($product_name) ");
// // error_reporting(0);
//  include __DIR__ . '/bootstrap/bootstrap.php';
// // session_start();
// // $name =$_POST['product-name'];
// // $connection=new Connection();
if($_SERVER["REQUEST_METHOD"]="POST"){
    $product_name = $_POST["product-name"];
    $sql = "INSERT INTO `product-details` (name) VALUES ('$product_name')";
      $con->query($sql);}


?>
</body>
</html>