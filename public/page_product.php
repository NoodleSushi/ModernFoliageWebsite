<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/main.css">
    <script src="../src/js/script.js"></script>
    <link rel="stylesheet" href="../src/css/page_product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Product Page</title>
</head>

<!-- how do i get the product id?? (below is just a sample) -->
<body onload="getProdInfo(1)">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #314529;">
        <a class="logo-text" href="home.php" style="color: white; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:x-large;">Modern Foliage</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent;">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active" style="color: white;">
            </li>
          </ul>

          <a href="faq.php"><button name="btnfaq" class="btn btn-secondary btn-lg"  style="margin-right: 2%; background-color: transparent; border: none;">FAQ</button></a>
          <a href="cart.php"><button name="btncart" class="btn btn-secondary btn-lg" style="margin-right: 2%; background-color: transparent; border: none;">My Cart</button></a>
          <a href="order.php"><button name="btnorder" class="btn btn-secondary btn-lg"  style="margin-right: 2%; background-color: transparent; border: none;">My Orders</button></a>
          <button name="btnsignout" class="btn btn-secondary btn-lg" onclick="signoutClick(event)" style="background-color: transparent; border: none;">Sign Out</button>
          
        </div>
      </nav>
      <!-- still gotta figure out a way on how to display the specific product info using the php stuff + js -->
    <div id="prod" class = "main_container">
        <div class="column">
            <img alt="Plant" class="img_container" src="../img/plant.png">
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
            <!-- <button class = "button">Buy Now</button> maybe we wont need this lng for now? -->
            <button class = "button button2" onclick="addCart(2, 1, 1)">Add to Cart</button> <!--needs work on how to get the params-->
        </div>
    </div>
    <article>
        
    </article>

    <script>
      // function to add the item to cart (to test)
      function addCartItem(customerId, prodId, quantity) {
        // Create an XHR object
        const xhr = new XMLHttpRequest();

        // Set the URL for the request
        const url = 'add_cartitem.php';

        // Set the parameters for the POST request
        const params = new URLSearchParams();
        params.append('customer_id', customerId);
        params.append('prod_id', prodId);
        params.append('quantity', quantity);

        // Send the POST request to the server
        xhr.open('POST', url, true);
        xhr.send(params);

        // Wait for the server's response
        xhr.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            // Parse the server's response
            const res = JSON.parse(this.responseText);
            console.log(res['cart_item_id']);
            console.log(res['success']);
          }
        };
      }


      // to revise?
      function showpot(description, price){
        console.log(description);
          $("#productCards").append('        <div class="card" type="button" onclick="location.href=\'page_product.php\'">\
          <img alt="MF Pot" class="card_img" src="../img/pot.png">\
            <p class="desc">'+ description + '</p>\
            <strong>' + price + '</strong>\
          </div>');
      }

      //! how do i get the product ID T.T
      // TO TEST
      function getProdInfo(productId) {
        // Set the parameters for the POST request
        const params = new URLSearchParams();
        params.append('productId', productId);

        // Send the POST request to the server
        xhttp.open('POST', '../src/php/prod_get.php', true);
        xhttp.send(params);

        // Wait for the server's response
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            // Parse the server's response
            const res = JSON.parse(this.responseText);
            console.log(res['products'][0]['id']);
            if (res['success'] === true) {
              // Iterate over the products array
              let x;
              for (x = 0; x < res['products'].length; x++) {
                // Display the product information
                showpot(res['products'][x]['name'], res['products'][x]['price']);
              }
            }
          }
        };
      }
    
    </script>
</body>
</html>
