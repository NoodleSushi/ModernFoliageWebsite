<?php 
    session_start();
    session_destroy(); //destroy entire session 
    $myObj = array(
        'status' => 200,
        'message' => "Signout Successful"  
    );
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;
?>