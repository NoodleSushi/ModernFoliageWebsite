<?php
/*
Returns a list of product types

returns:
    {
        "product_types": [
            {
                "id: 1,
                "name": "Plant"
            },
            {
                "id: 2,
                "name": "Pot"
            }
        ]
        "success": true
    }

    {
        "product_types": {};
        "success": false
    }
*/

include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$product_types = array();

foreach (list_prodtype($con) as $row) {
    $product_types[] = array(
        "id" => intval($row["ProductTypeID"]),
        "name" => $row["Name"]
    );
}

$con->close();

echo json_encode(array(
    "product_types" => $product_types,
    "success" => true
));
