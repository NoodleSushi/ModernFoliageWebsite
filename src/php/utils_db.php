<?php

// hybrid

function get_prod_info(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare(
        "SELECT prodt.Name AS ProductType, p.Name AS Name, Price, AvailQuantity, plas.Name AS PlantSpecies, potc.Name AS PotColor
        FROM product AS p
        JOIN producttype AS prodt
            ON prodt.ProductTypeID = p.ProductTypeID
        JOIN stockinfo AS si
            ON si.ProductID = p.ProductID
        LEFT JOIN plantproperties AS plap
            ON plap.ProductID = p.ProductID
        LEFT JOIN plantspecies AS plas
            ON plas.PlantSpeciesID = plap.PlantSpeciesID
        LEFT JOIN potproperties AS potp
            ON potp.ProductID = p.ProductID
        LEFT JOIN potcolor AS potc
            ON potc.PotColorID = potp.PotColorID
        WHERE p.ProductID = ?"
    );
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


// producttype

function get_prod_type(mysqli $con, int $id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM producttype WHERE ProductTypeID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function list_prod_type(mysqli $con): array
{
    $stmt = $con->prepare("SELECT * FROM producttype ORDER BY Name ASC");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


// product

function insert_prod(mysqli $con, int $prod_type_id, string $name, float $price): int
{
    $stmt = $con->prepare("INSERT INTO product (ProductTypeID, Name, Price) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $prod_type_id, $name, $price);
    $stmt->execute();
    return intval($con->insert_id);
}

function get_prod(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM product WHERE ProductID = ?");
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


// stockinfo

function insert_stockinfo(mysqli $con, int $prod_id, int $avail_quantity): int
{
    $stmt = $con->prepare("INSERT INTO stockinfo (ProductID, AvailQuantity) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $avail_quantity);
    $stmt->execute();
    return intval($con->insert_id);
}

function get_stockinfo(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM stockinfo WHERE ProductID = ?");
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


// plantproperties

function insert_plantproperties(mysqli $con, int $prod_id, int $plant_species_id): int
{
    $stmt = $con->prepare("INSERT INTO plantproperties (ProductID, PlantSpeciesID) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $plant_species_id);
    $stmt->execute();
    return intval($con->insert_id);
}

function get_plantproperties(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM plantproperties WHERE ProductID = ?");
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


// plantspecies

function list_plantspecies(mysqli $con): array
{
    $stmt = $con->prepare("SELECT * FROM plantspecies ORDER BY Name ASC");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


// potproperties

function insert_potproperties(mysqli $con, int $prod_id, int $pot_color_id): int
{
    $stmt = $con->prepare("INSERT INTO potproperties (ProductID, PotColorID) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $pot_color_id);
    $stmt->execute();
    return intval($con->insert_id);
}

function get_potproperties(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM potproperties WHERE ProductID = ?");
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


// potcolor

function list_potcolor(mysqli $con): array
{
    $stmt = $con->prepare("SELECT * FROM potcolor ORDER BY Name ASC");
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
