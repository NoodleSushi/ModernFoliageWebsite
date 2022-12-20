<?php
include_once("db_connect.php");
$retVal = "";
$isValid = true;
$status = 400;
$data = [];

$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);
// $email = 'admin@gmail.com';
// $password = 'adminpass';
// Check fields are empty or not
if (empty($email) || empty($password)) {
    $isValid = false;
    $retVal = "Please fill all fields.";
}

// Check if email is valid or not
if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $retVal = "Invalid email.";
}

// Check if email already exists
if ($isValid) {
    $query = "SELECT * FROM customer WHERE Email = ? AND Password = ?";
    if ($con->connect_error) {
        $status = 201;
        $retVal = "The sky is falling";
        $data = "test";
    }
    // if($result->num_rows > 0){
    else {
        $sth = $con->prepare($query);
        $sth->execute(array($email, $password));
        $result = $sth->fetch();
        if ($result) {
            $status = 200;
            $retVal = "Login successful.";
            $data = "test";
        }
        // } else {
        //     $retVal = "Invalid email or password.";
        // }
    }
}

$myObj = array(
    "status" => $status,
    "data" => $data,
    "message" => $retVal
);
$myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
echo $myJSON;

$con->close();
?>