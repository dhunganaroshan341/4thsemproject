
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy-Items</title>
    
    <link rel="stylesheet" href="style/buy.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php require_once "../krishibajar/bootstrap/bootstrap.php";?>
   <div class="container flex-row">
    <button><a href="index.php" class = "text-decoration-none">Homepage</a></button>
     <div class="categorycontainer">
     <?php
   
   include_once "category.php";
   //thankyou


   ?>
     </div>
      <div class="searchbarcontainer">
         <?php
         include_once "elements/searchbar.php";
         $barobj = new SearchBar;
         echo $barobj->get("search","searchitems","search-products");
         
         ?>
      </div>

<div class="recent">Recent</div>
  

</div> 
 

<section class="body" id ="buypagebody">
   <?php include "products.php"?>;
</section>
  
</body>
</html>