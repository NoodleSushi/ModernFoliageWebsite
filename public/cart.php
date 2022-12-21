<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../src/css/main.css">
  <link rel="stylesheet" href="../src/css/cart.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>MF My Cart</title>
</head>

<body onload="ready()">
  <div>
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
          <a href="cart.php"><button name="btncart" class="btn btn-secondary btn-lg"  style="margin-right: 2%; background-color: transparent; border: none;">My Cart</button></a>
          <a href="order.php"><button name="btnorder" class="btn btn-secondary btn-lg"  style="margin-right: 2%; background-color: transparent; border: none;">My Orders</button></a>
          <button name="btnsignout" class="btn btn-secondary btn-lg" onclick="signoutClick(event)" style="background-color: transparent; border: none;">Sign Out</button>
          
        </div>
      </nav>

    <main >
      <div class="scroll">
        <div class="content" style="margin: 3%;">
            <h3 class="logo-text" style="font-size: 250%;">My Cart</h3>
            <div class="items">
                <!-- to add code for getting the item infos they placed in the cart -->
                <p>
                  the times they add to cart should show here so for now, its empty sah since
                  we dont have the data stuffies yet or atleast idk how TT soo
                   Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when a
                    n unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of 
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                    software like Aldus PageMaker including versions of Lorem Ipsum. It is a long 
                    established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a 
                    more-or-less normal distribution of letters, as opposed to using 'Content here, 
                    content here', making it look like readable English. Many desktop publishing packages
                    and web page editors now use Lorem Ipsum as their default model text, and a search 
                    for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
            </div>
            <hr class="border">
            <h3 class="logo-text" style="font-size: 250%;">Mode of Payment</h3>
            <label class="logo-text" for="mop">Select mode of payment:</label>
            <select name="mop" id="mop">
              <option value="COD" selected>Cash on Delivery (COD)</option>
              <option value="Gcash">Gcash</option>
            </select>
            <div style="width: auto; margin-left: 2%;">
              <p style="color: white;">If you selected the Gcash MoP, please scan this QR Code to send your payment:</p>
              <p style="color: white;">Gcash Name: Caitlin Lindsay</p>
              <p style="color: white;">Gcash number: 09172634728</p>
              <img class="qr" alt="sample_qr" src="../img/sample_qr.png">
            </div>
            <hr class="border">
            <h3 class="logo-text" style="font-size: 250%;">Delivery Address:</h3>
            <div class="items">
              <!-- to add code for getting the item infos they placed in the cart -->
              <p>
                i think we use the php stuff to get the user's info & display them in here
                like for delivery and all
              </p>
            </div>
            <hr class="border">
            <h3 class="logo-text" style="font-size: 250%;">Shipping Option</h3>
            <label class="logo-text" for="mop">Select shipping option:</label>
            <select name="mop" id="mop">
              <option value="pickup" selected>In Store Pickup</option>
              <option value="maxim">Lalamove</option>
            </select>
            <hr class="border">
            <h3 class="logo-text" style="font-size: 200%;">Partial Total (exclusing delivery fee if applicable): (to use php stuff to get the total of their cart items)</h3>
            <!-- needs an onclick func to redirect to order success page -->
            <button class="placeOrder" href="../public/orderSuccess.php">Place Order</button>
          </div>
      </div>
      

  <script type="text/javascript" src="../src/js/auth.js"></script>
</body>

</html>