<?php

// hybrid

function get_prod_info(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare(
        "SELECT
            prodt.ProductTypeID AS ProductTypeID,
            prodt.Name AS ProductType,
            p.Name AS Name, 
            Price, 
            AvailQuantity, 
            plas.PlantSpeciesID AS PlantSpeciesID,
            plas.Name AS PlantSpecies,
            potc.PotColorID AS PotColorID,
            potc.Name AS PotColor
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

function list_prod(mysqli $con): array
{
    $stmt = $con->prepare(
        "SELECT
            p.ProductID AS ProductID,
            p.Name AS Name, 
            Price, 
            AvailQuantity AS Quantity,
            COALESCE((
                SELECT (SELECT AvailQuantity FROM stockinfo AS si WHERE si.ProductID = p.ProductID) - SUM(oi.Quantity)
                FROM orderitem AS oi
                WHERE	
                    oi.ProductID = p.ProductID
            ), 0) AS RemainingQuantity,
            COALESCE((
                SELECT SUM(oi.Quantity * oi.PriceEach)
                FROM orderitem AS oi
                WHERE	
                    oi.ProductID = p.ProductID
            ), 0) AS RunningBalance
        FROM product AS p
        JOIN stockinfo AS si
            ON si.ProductID = p.ProductID
        ORDER BY Name ASC"
    );
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function list_prod_by_type(mysqli $con, int $prod_type_id): array
{
    $stmt = $con->prepare(
        "SELECT
            p.ProductID AS ProductID,
            p.Name AS Name, 
            Price, 
            AvailQuantity AS Quantity,
            COALESCE((
                SELECT (SELECT AvailQuantity FROM stockinfo AS si WHERE si.ProductID = p.ProductID) - SUM(oi.Quantity)
                FROM orderitem AS oi
                WHERE	
                    oi.ProductID = p.ProductID
            ), 0) AS RemainingQuantity,
            COALESCE((
                SELECT SUM(oi.Quantity * oi.PriceEach)
                FROM orderitem AS oi
                WHERE	
                    oi.ProductID = p.ProductID
            ), 0) AS RunningBalance
        FROM product AS p
        JOIN producttype AS prodt
            ON prodt.ProductTypeID = p.ProductTypeID
        JOIN stockinfo AS si
            ON si.ProductID = p.ProductID
        WHERE
            prodt.ProductTypeID = ?
        ORDER BY Name ASC"
    );
    $stmt->bind_param("i", $prod_type_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


// producttype

function get_prodtype(mysqli $con, int $id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM producttype WHERE ProductTypeID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function list_prodtype(mysqli $con): array
{
    return $con->query("SELECT * FROM producttype ORDER BY Name ASC")->fetch_all(MYSQLI_ASSOC);
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

function insert_plantprop(mysqli $con, int $prod_id, int $plant_species_id): int
{
    $stmt = $con->prepare("INSERT INTO plantproperties (ProductID, PlantSpeciesID) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $plant_species_id);
    $stmt->execute();
    return intval($con->insert_id);
}

function get_plantprop(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM plantproperties WHERE ProductID = ?");
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


// plantspecies

function list_plantspecies(mysqli $con): array
{
    return $con->query("SELECT * FROM plantspecies ORDER BY Name ASC")->fetch_all(MYSQLI_ASSOC);
}


// potproperties

function insert_potprop(mysqli $con, int $prod_id, int $pot_color_id): int
{
    $stmt = $con->prepare("INSERT INTO potproperties (ProductID, PotColorID) VALUES (?, ?)");
    $stmt->bind_param("ii", $prod_id, $pot_color_id);
    $stmt->execute();
    return intval($con->insert_id);
}

function get_potprop(mysqli $con, int $prod_id): array|false|null
{
    $stmt = $con->prepare("SELECT * FROM potproperties WHERE ProductID = ?");
    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


// potcolor

function list_potcolor(mysqli $con): array
{
    return $con->query("SELECT * FROM potcolor ORDER BY Name ASC")->fetch_all(MYSQLI_ASSOC);
}


// cart

function establish_cart(mysqli $con, int $customer_id): void
{
    $stmt = $con->prepare("CALL establishCart(?)");
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
}

function get_cart_id(mysqli $con, int $customer_id): int
{
    establish_cart($con, $customer_id);
    $stmt = $con->prepare("SELECT CartID FROM cart WHERE CustomerID = ?");
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    return intval($stmt->get_result()->fetch_assoc()["CartID"]) ?? -1;
}

// cartitem

function insert_cartitem(mysqli $con, int $customer_id, int $prod_id, int $quantity): int
{

    $stmt = $con->prepare("INSERT INTO cartitem (CartID, ProductID, Quantity) VALUES (?, ?)");
    $stmt->bind_param("iii", get_cart_id($con, $customer_id), $prod_id, $quantity);
    $stmt->execute();
    return intval($con->insert_id);
}

function list_cartitem(mysqli $con, int $customer_id): array
{
    establish_cart($con, $customer_id);
    $stmt = $con->prepare(
        "SELECT 
            ci.CartItemID AS CartItemID, 
            ci.ProductID AS ProductID,
            COALESCE(pd.Name, p.Name) AS Name,
            COALESCE(pd.ThumbPath, '') AS ThumbPath,
            ci.Quantity AS Quantity, 
            p.Price AS PriceEach, 
            ci.Quantity * p.Price AS PriceTotal,
        FROM cart AS c
        JOIN cartitem AS ci
            ON ci.CartID = c.CartID
        JOIN product AS p
            ON p.ProductID = ci.ProductID
        LEFT JOIN productdisplay AS pd
            ON pd.ProductID = p.ProductID
        WHERE
            c.CustomerID = ?"
    );
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
