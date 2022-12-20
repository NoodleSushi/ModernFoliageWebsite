<?php
/*
Returns a list of all products

params:
    int? prod_type_id - producttype(ProductTypeID)

returns:
    {
        "products": [
            {
                "id: 1,
                "name": "my plant",
                "price": 50.4,
                "quantity": 10,
                "remaining_quantity": 6,
                "running_balance": 400
            },
            ...
        ]
        "success": true
    }

    {
        "products": {};
        "success": false
    }
*/

include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$prod_type_id = parse_param("i", "prod_type_id", $success, true, -1);

$query_list = ($prod_type_id == -1) ? list_prod($con) : list_prod_by_type($con, $prod_type_id);
$products = array();

foreach ($query_list as $row) {
    $products[] = array(
        "id" => intval($row["ProductID"]),
        "name" => $row["Name"],
        "price" => floatval($row["Price"]),
        "quantity" => intval($row["Name"]),
        "remaining_quantity" => intval($row["RemainingQuantity"]),
        "running_balance" => floatval($row["RunningBalance"]),
    );
}

$con->close();

echo json_encode(array(
    "products" => $products,
    "success" => true
));
