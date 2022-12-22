<?php
/*
Returns product information, varies depending on its product type

parameters:
    int prod_id - product(ProductID)

returns:
    {
        "product": {
            "product_type_id": 1,
            "product_type": "Pot",
            "name": "my pot",
            "price": 5.0,
            "avail_quantity": 3,
            "pot_color_id": 2,
            "pot_color": "green"
        },
        "success": true
    }

    "product": {
            "product_type_id": 2,
            "product_type": "Plant",
            "name": "my plant",
            "price": 5.0,
            "avail_quantity": 3,
            "plant_species_id": 5,
            "plant_species": "some plant species"
        },
        "success": true
    }

    {
        "product": {},
        "success": false
    }
*/

include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$success = true;

$prod_id = parse_param("i", "prod_id", $success);

$prod_row = array();
$prod = array();

if ($success) {
    $prod_row = get_prod_info($con, $prod_id);
    $success = !is_null($prod_row);
}

if ($success) {
    $prod_type = $prod_row["ProductType"];
    $prod["product_type_id"] = intval($prod_row["ProductTypeID"]);
    $prod["product_type"] = $prod_type;
    $prod["name"] = $prod_row["Name"];
    $prod["price"] = floatval($prod_row["Price"]);
    $prod["avail_quantity"] = intval($prod_row["AvailQuantity"]);
    if ($prod_type == "Plant") {
        $prod["plant_species_id"] = intval($prod_row["PlantSpeciesID"]);
        $prod["plant_species"] = $prod_row["PlantSpecies"];
    } else if ($prod_type == "Pot") {
        $prod["pot_color_id"] = intval($prod_row["PotColorID"]);
        $prod["pot_color"] = $prod_row["PotColor"];
    }
}

$con->close();

echo json_encode(array(
    "product" => $prod,
    "success" => $success
));
