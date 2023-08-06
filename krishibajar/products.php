<link rel="stylesheet" href="style/products.css">
<div class="product-grid-container" id="product-grid-container">
    <?php
    for ($i = 1; $i <= 10; $i++) {
        $griditem = "gridelement".$i;
        echo '<div class="gridelements" id =$griditem>Item ' . $i . $griditem.'</div>';
    }
    ?>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const animatedDiv = document.getElementById("product-grid-container");

    // Animate the div's opacity from 0 to 100%
    animatedDiv.style.transition = "opacity 1s"; // Set the transition property
    animatedDiv.style.opacity = "1"; // Set opacity to 1 for fading in
});


    </script>