<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../src/css/main.css">
  <link rel="stylesheet" href="../src/css/orderStyles.css">
  <script src="../src/js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <title>Modern Foliage Homepage</title>
</head>

<body onload="getData()">
  <div>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #314529;">
      <link rel="stylesheet" href="../src/css/orderStyles.css">
        <a class="logo-text" href="../src/public/home.php" style="color: white; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:x-large;">Modern Foliage</a>
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
    <main>


      <div class="content" style="margin: 3%;">
        <div class="pots">
          <div class="top">
          <h1 class="title">POTS</h1>
          <hr class="border">
          </div>
          <div id="pot">
            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/pot.png">
              <p class="desc" >MUSKOT Plant pot</p>
              <strong >₱450</strong>
            </div>

            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/pot.png">
              <p class="desc">MUSKOT Plant pot</p>
              <strong>₱450</strong>
            </div>
            
            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/pot.png">
              <p class="desc">MUSKOT Plant pot</p>
              <strong>₱450</strong>
            </div>

            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/pot.png">
              <p class="desc">MUSKOT Plant pot</p>
              <strong>₱450</strong>
            </div>

            <button name="btnfmorePots" class="browseMore" onclick="location.href='products.php'">
              <strong>Browse for more pots</strong>
              <img alt="Next Arrow" class="card_img" src="../img/arrow.png">
            </button>
          </div>
        </div>

        <div class="plants">
          <div class="top">
          <h1 class="title">PLANTS</h1>
          <hr class="border">
          </div>
        
          <div id="plant">
            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/homeplant.png">
              <p class="desc">FEJKA Artificial potted plant </p>
              <strong>₱450</strong>
            </div>

            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/homeplant.png">
              <p class="desc">FEJKA Artificial potted plant </p>
              <strong>₱400</strong>
            </div>

            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/homeplant.png">
              <p class="desc">FEJKA Artificial potted plant </p>
              <strong>₱400</strong>
            </div>

            <div class="card" type="button" onclick="location.href='page_product.php'">
              <img alt="MF Pot" class="card_img" src="../img/homeplant.png">
              <p class="desc">FEJKA Artificial potted plant </p>
              <strong>₱400</strong>
            </div>

            <button name="btnfmorePlants" class="browseMore" onclick="location.href='products.php'">
              <strong>Browse for more plants</strong>
              <img alt="Next Arrow" class="card_img" src="../img/arrow.png">
            </button>
          </div>
        </div>
        
      </div>
  </main>
  <script type="text/javascript" src="../src/js/auth.js"></script>
  <script>
    function showpot(id,title,content,status){
        $("#pot").append('        <div class="card" type="button" onclick="location.href=\'page_product.php\'">\
        <img alt="MF Pot" class="card_img" src="../img/pot.png">\
          <p class="desc">'+ description + '</p>\
          <strong>' + price + '</strong>\
        </div>');
    }

  </script>
</body>

</html>