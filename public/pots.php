<button?php
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
  <link rel="stylesheet" href="../src/css/orderStyles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Modern Foliage Homepage</title>
</head>

<body onload="ready()">
  <div>
    <main style="display: flexbox; position: relative; align-items: center; flex:auto;">
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

          <button name="btnfaq" class="btn btn-secondary btn-lg" onclick="faqClick(event)" style="margin-right: 2%; background-color: transparent; border: none;">FAQ</button>
          <button name="btncart" class="btn btn-secondary btn-lg" onclick="cartClick(event)" style="margin-right: 2%; background-color: transparent; border: none;">My Cart</button>
          <button name="btnorder" class="btn btn-secondary btn-lg" onclick="ordersClick(event)" style="margin-right: 2%; background-color: transparent; border: none;">My Orders</button>
          <button name="btnsignout" class="btn btn-secondary btn-lg" onclick="signoutClick(event)" style="background-color: transparent; border: none;">Sign Out</button>
          
        </div>
      </nav>

      <div class="content" style="margin: 3%;">
        <div>
          <h1 style="color: white; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 250%;">POTS</h1>
          <hr class="border">
          <center style="margin: 2%;">
            <div class="card" type="button" href="../src/public/page_product.php">
              <img alt="MF Pot" class="card_img" src="../img/pot.png">
              <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
              <strong style="color: red;">₱450</strong>
            </div>
            <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
              <div class="card" type="button" href="../src/public/page_product.php">
                <img alt="MF Pot" class="card_img" src="../img/pot.png">
                <p style="margin-bottom: 0%; margin-top: 1.5%;">MUSKOT Plant pot</p>
                <strong style="color: red;">₱450</strong>
              </div>
          </center>
        </div>
      </div>

  <script type="text/javascript" src="../src/js/auth.js"></script>
</body>

</html>