<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../src/js/script.js">
    <link rel="stylesheet" href="../src/css/page_product.css">
    <title>Product Page</title>
</head>
<body>
    <header class="header-container">
        <div class="header-content">
            <h1 class="logo-text">Modern Foliage</h1>
            <img class="cart-button" src="img/shopping-cart.png" alt="" width="64px">
        </div>
    </header>
    <div class = "main_container">
        <div class="column">
            <img class="img_container" src="../img/plant.png">
        </div>
        
        <div class="column">
            <h2>Monstera Deliciosa</h2>
            <p class = "description">
                ₱500 
                <font color = "red">30% off </font> 
                <strong>| 470 in stock</strong>
            </p>
            <p class = "prize">₱350</p>
            <br>

            <p class = "column_text">
                Monstera deiliciosa, the Swiss cheese plant or split-leaf
                philodendron is a species of flowering plant native to tropical
                forests of southern Mexico, south to Panama. It has been
                introduced to many tropical areas, and has become a mildly 
                invasive species in Hawaii, Seychelles, Ascension Island and the
                Society Islands.
            </p>
            <br>
            <button class = "button">Buy Now</button>
            <button class = "button button2">Add to Cart</button>
        </div>
    </div>
    <article>
        
    </article>
</body>
</html>