<?php
if (isset($_GET['submitted']) && $_GET['submitted'] === 'true') {
    echo "Your form has been submitted.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishibajar-b2b</title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/settings.css">
<style>
  
    .body{display:grid;grid-template-columns: 90px 90px 90px;}
#settingselements{display:none;}
.unsplash-image
{
    z-index: -1;
    position:fixed;
   
    width:100%;
    height: 180vh;
  image-rendering:optimizeQuality;

}

.imagecontainer{
  width:max-content;

}
</style>
</head>
<body>
<div id="imagecontainer" class="imagecontainer">
<img src="" alt="unsplash-image" id ="unsplash-image" class = "unsplash-image"> 
</div>
    <section class="top" id="top">
        <div class="navParent" id="navParent">
            <div class="navElement" id="Home"><a href="#">Home</a></div>
              <div class="navElement" id="buy"><a href="buy.php">Buy</a></div>
            <div class="navElement" id="sell"><a href="sell.php">Sell</a></div>
            <div class="navElement" id="settings" onclick="settingFunction()"><a href="#">settings</a></div>
            <div class="navElement" id="settings"><a href="login-signup.php">login</a></div>
        </div>
       <div class="settingselements " id="settingselements">
        
        <?php
            include_once"settings.php";
            ?>
       </div>
    </section><script src="script/script.js"></script>
    <!-- <img src="image1.jpg" alt="background" class = "background"> -->
    <section class="body" id="body">


<?php include "products.php";?>
    
    </section>
    <section class="footersection">
  <?php include "footer.php";?>
    </section>
    <script>
        let settingselements = document.getElementById("settingselements");
        settingselements.style.scrollBehavior ="scrollable";
        function settingFunction(){
           let value = 1;
           let togglevalue  =document.getElementById("settingselements");
      if(togglevalue.style.display=="none"){
        togglevalue.style.display="block";
      }
else {
    togglevalue.style.display = "none";
}

        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    // Your Unsplash API access key (client ID)
    const accessKey = 'wf2BJfzE0LgHPQYAvnMmacJrX1H96LVg-ZJp9gh0rK8';

    // Function to fetch images from Unsplash API
    function fetchImage() {
      const apiUrl = 'https://api.unsplash.com/photos/random?client_id=' + accessKey;

      axios.get(apiUrl)
        .then(response => {
          const imageUrl = response.data.urls.regular;
          const imageElement = document.getElementById('unsplash-image');
          imageElement.setAttribute('src', imageUrl);
          imageElement.setAttribute('width', '800'); // Adjust width as needed
          imageElement.setAttribute('height', '600'); // Adjust height as needed
        })
        .catch(error => {
          console.error('Error fetching image:', error);
        });
    }

    // Call the fetchImage function to load an image on page load
    window.addEventListener('load', fetchImage);
  </script>
</body>

</html>
<!-- wf2BJfzE0LgHPQYAvnMmacJrX1H96LVg-ZJp9gh0rK8-->
<!---->