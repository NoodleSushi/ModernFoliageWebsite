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
  <link rel="stylesheet" href="../src/css/orderStyles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Modern Foliage Homepage</title>
</head>
    
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #314529;">
            <a class="logo-text" href="admininventory.php" style="color: white; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:x-large;">Modern Foliage</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent;">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active" style="color: white;">
                </li>
              </ul>
    
              <a href="admininventory.php"><button name="btninvent" class="btn btn-secondary btn-lg" style="margin-right: 2%; background-color: transparent; border: none;">Inventory</button></a>
              <a href="adminpending.php"><button name="btnpendingorders" class="btn btn-secondary btn-lg" style="margin-right: 2%; background-color: transparent; border: none;">Pending Order</button></a>
              <a href="admincompleted.php"><button name="btncomporders" class="btn btn-secondary btn-lg" style="margin-right: 2%; background-color: transparent; border: none;">Completed Order</button></a>
              <!-- need signout php to function pa -->
              <button name="btnsignout" class="btn btn-secondary btn-lg" onclick="signoutClick(event)" style="background-color: transparent; border: none;">Sign Out</button>
              
            </div>
          </nav>
    </header>
    <article class="inventory-container">
        <div class="inventory">
            <div class="top">
                <div class="i-text">
                    <h2>INVENTORY</h2>
                </div>
                
                <div class="i-head">
                    <div class="i-search">
                        <form method="post" action=''>
                            <label for = "filter"> Sort By 
                                <select id="filter" name="filter">
                                    <option value="">Select One</option>
                                    <option value="1">Pots and Plants</option>
                                    <option value="2">Pots Only</option>
                                    <option value="3">Plants Onlys</option>
                                </select>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
              
                <div class="table">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Remaining Quantity</th>
                            <th>Running Balance</th>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        
    </article>
</body>
</html>