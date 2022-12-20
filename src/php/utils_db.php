<?php
function get_prod_type_row(mysqli $con, int $prod_type_id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM producttype WHERE ProductTypeID = ?");
    $stmt->bind_param("i", $prod_type_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function insert_prod(mysqli $con, int $prod_type_id, string $name, float $price): int
{
    $stmt = $con->prepare("INSERT INTO product (ProductTypeID, Name, Price) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $prod_type_id, $name, $price);
    $stmt->execute();
    return intval($con->insert_id);
}

function insert_stockinfo(mysqli $con, int $prod_id, int $avail_quantity): int
{
    $stmt = $con->prepare("INSERT INTO stockinfo (ProductID, AvailQuantity) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $avail_quantity);
    $stmt->execute();
    return intval($con->insert_id);
}

function insert_plantproperties(mysqli $con, int $prod_id, int $plant_species_id): int
{
    $stmt = $con->prepare("INSERT INTO plantproperties (ProductID, PlantSpeciesID) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $plant_species_id);
    $stmt->execute();
    return intval($con->insert_id);
}

function insert_potproperties(mysqli $con, int $prod_id, int $pot_color_id): int
{
    $stmt = $con->prepare("INSERT INTO potproperties (ProductID, PotColorID) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $pot_color_id);
    $stmt->execute();
    return intval($con->insert_id);
}
