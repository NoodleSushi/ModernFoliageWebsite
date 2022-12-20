<?php
/*
Returns a list of pot colors

returns:
    {
        "pot_colors": [
            {
                "id: 1,
                "name": "red"
            },
            {
                "id: 2,
                "name": "blue"
            }
            {
                "id: 3,
                "name": "green"
            }
        ]
        "success": true
    }

    {
        "pot_colors": {};
        "success": false
    }
*/

include_once("utils.php");
include_once("db_connect.php");
include_once("utils_db.php");

$pot_colors = array();

foreach (list_potcolor($con) as $row) {
    $pot_colors[] = array(
        "id" => $row["PotColorID"],
        "name" => $row["Name"]
    );
}

$con->close();

echo json_encode(array(
    "pot_colors" => $pot_colors,
    "success" => $success
));
