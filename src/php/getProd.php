<?php
    include_once("db_connect.php");
    $isValid = true;
    $status = 400;
    $data = array();
    $count = 0;
    
    $myObj = array(
        'status' => $status,
        'data' => $data,
        'count' => $count
    );
    
    $myJSON = json_encode($myObj);
    echo $myJSON;
    
    $con->close();
?>