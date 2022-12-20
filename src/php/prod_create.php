<?php
include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$success = true;

$prod_type_id =     parse_param("i", "prod_type_id", $success);
$name =             parse_param("s", "name", $success);
$price =            parse_param("d", "price", $success, true, 0);
$avail_quantity =   parse_param("i", "avail_quantity", $success, true, 0);
$plant_species_id = parse_param("i", "plant_species_id", $success, true);
$pot_color_id =     parse_param("i", "pot_color_id", $success, true);

$prod_type_row = null;
$prod_id = -1;

// check if prod_type is valid
if ($success) {
    $prod_type_row = get_prod_type_row($con, $prod_type_id);
    $success = !is_null($prod_type_row);
}

if ($success) {
    // Plant or Pot
    $prod_type = $prod_type_row["Name"];
    if ($prod_type == "Plant" && !is_null($plant_species_id)) {
        $prod_id = insert_prod($con, $prod_type_id, $name, $price);
        insert_stockinfo($con, $prod_id, $avail_quantity);
        insert_plantproperties($con, $prod_id, $plant_species_id);
    } else if ($prod_type == "Pot" && !is_null($pot_color_id)) {
        $prod_id = insert_prod($con, $prod_type_id, $name, $price);
        insert_stockinfo($con, $prod_id, $avail_quantity);
        insert_potproperties($con, $prod_id, $pot_color_id);
    } else {
        $success = false;
    }
}

$con->close();

echo json_encode(array(
    "product_id" => $prod_id,
    "success" => $success
));
