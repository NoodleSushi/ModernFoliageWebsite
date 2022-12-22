<?php
/*
Returns a list of cart items based on the customer id

params:
    int customer_id - customer(CustomerID)

returns:
    {
        "cart_items": [
            {
                "cart_item_id": 1,
                "product_id": 3,
                "name": "pot",
                "thumb_path": "img/pot.png",
                "quantity": 3,
                "price_each": 2.0,
                "price_total": 9.0
            },
            ...
        ],
        "price_total": 10.0,
        "success": true
    }

    {
        "cart_items": [],
        "price_total": -1.0,
        "success": false
    }
*/

include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$success = true;

$customer_id = parse_param("i", "customer_id", $success);

$cartitem_list = array();
$cart_items = array();
$price_total = -1.0;

if ($success) {
    $cartitem_list = list_cartitem($con, $customer_id);
    $success = !is_null($cartitem_list);
}

if ($success) {
    $price_total = 0.0;
    foreach ($cartitem_list as $row) {
        $item_price_total = floatval($row["PriceTotal"]);
        $cart_items[] = array(
            "cart_item_id" => intval($row["CartItemID"]),
            "product_id" => intval($row["ProductID"]),
            "name" => $row["Name"],
            "thumb_path" => $row["ThumbPath"],
            "quantity" => intval($row["Quantity"]),
            "price_each" => floatval($row["PriceEach"]),
            "price_total" => $item_price_total
        );
        $price_total += $item_price_total;
    }
}

echo json_encode(array(
    "cart_items" => $cart_items,
    "price_total" => $price_total,
    "success" => true
));

$con->close();
