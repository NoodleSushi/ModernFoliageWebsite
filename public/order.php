<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/orderStyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modern Foliage</title>
</head>
<body>
    <header class="header-container">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #314529;">
      <link rel="stylesheet" href="../src/css/orderStyles.css">
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
    </header>
    <main>
        <div class="card-cont">
            <div class="orderCard">
                <div class="one">
                    <div class="date"><p class="p">Sample Date</p></div>
                    <div class="products"><p class="p">Sample Products</p></div>
                    
                </div>
                <div class="two">
                    <div class="cost"><p class="p">Sample Cost</p></div>
                </div>
                
            </div>
        </div>
        <div class="card-cont">
            <div class="orderCard completed">
                    <div class="one">
                    <div class="date"><p class="p">Sample Date</p></div>
                    <div class="products"><p class="p">Sample Products</p></div>
                    
                </div>
                <div class="two">
                    <div class="cost"><p class="p">Sample Cost</p></div>
                </div>
            </div>
        </div>
        <div class="card-cont">
            <div class="orderCard completed">
            <div class="one">
                    <div class="date"><p class="p">Sample Date</p></div>
                    <div class="products"><p class="p">Sample Products</p></div>
                    
                </div>
                <div class="two">
                    <div class="cost"><p class="p">Sample Cost</p></div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>