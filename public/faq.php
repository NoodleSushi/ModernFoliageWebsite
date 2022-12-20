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
  <link rel="stylesheet" href="../src/css/faq.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Order Successfully Placed</title>
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
          <a href="cart.php"><button name="btncart" class="btn btn-secondary btn-lg" style="margin-right: 2%; background-color: transparent; border: none;">My Cart</button></a>
          <a href="order.php"><button name="btnorder" class="btn btn-secondary btn-lg"  style="margin-right: 2%; background-color: transparent; border: none;">My Orders</button></a>
          <button name="btnsignout" class="btn btn-secondary btn-lg" onclick="signoutClick(event)" style="background-color: transparent; border: none;">Sign Out</button>
          
        </div>
      </nav>

    <main class="faqmain">
      <div class="scroll">
        <div class="content" style="margin: 3%;">
        <h3 class="logo-text" style="font-size: 250%; text-align: center;">FAQ Page</h3>
            <div class="faqone">
                <hr class="border">
                <br>
                <div class="info logo-text" style="float: left;">
                    <h2>Who are we?</h2>
                    <p>We are Modern Foliage and our goal is to Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <img alt="plants" src="../img/faq1.png">
            </div>

            <br><hr class="border"><br>

            <div class="faqtwo">
                <div class="info logo-text" style="float: right; width: 50%;">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <img alt="plants" src="../img/faq2.png" style="width: 40%;">
            <div>
        </div>
      </div>
      

  <script type="text/javascript" src="../src/js/auth.js"></script>
</body>

</html>