<?php
/*
Returns a list of pot species

returns:
    {
        "pot_species": [
            {
                "id: 1,
                "name": "Aglaonema"
            },
            {
                "id: 2,
                "name": "Alocasia"
            }
            {
                "id: 3,
                "name": "Anthurium"
            }
        ]
        "success": true
    }

    {
        "pot_species": {};
        "success": false
    }
*/

include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$pot_species = array();

foreach (list_plantspecies($con) as $row) {
    $pot_species[] = array(
        "id" => intval($row["PlantSpeciesID"]),
        "name" => $row["Name"]
    );
}

$con->close();

echo json_encode(array(
    "pot_species" => $pot_species,
    "success" => true
));
