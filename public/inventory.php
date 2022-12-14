<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/styles.css">
    <title>Modern Foliage</title>
</head>
<body>
    <header class="header-container">
        <div class="header-content">
            <h1 class="logo-text">Modern Foliage</h1>
            <img class="cart-button" src="img/shopping-cart.png" alt="" width="64px">
        </div>
    </header>
    <article class="inventory-container">
        <div class="inventory">
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
                        <label for="search">Filter
                            <input id="search">
                        </label>
                    </form>
                </div>
              
                <div class="table">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Remaining Qty</th>
                            <th>Running Balance</th>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        
    </article>
</body>
</html>