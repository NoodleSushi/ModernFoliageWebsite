<?php
/*
Adds a new cart item associated to customer

params:
    int customer_id - customer(CustomerID)
    int prod_id     - product(ProductID)
    int? quantity   - quantity of products (optional, defaults to 0)
*/

include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$success = true;

$customer_id = parse_param("i", "customer_id", $success);
$prod_id = parse_param("i", "prod_id", $success);
$quantity = parse_param("i", "quantity", $success, true, 0);

$cart_item_id = -1;

if ($success) {
    $cart_item_id = insert_cartitem($con, $customer_id, $prod_id, $quantity);
}

$con->close();

echo json_encode(array(
    "cart_item_id" => $cart_item_id,
    "success" => $success
));
