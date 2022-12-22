<?php
include_once("db_connect.php");
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
    $message = "Please fill all fields.";
}

// Check if email is valid or not
if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $message = "Invalid email.";
}

// Check if email already exists
if ($isValid) {
    $query = "SELECT * FROM customer WHERE Email = '{$email}' AND Password = '{$password}'";
    if ($con->connect_error) {
        $status = 201;
        $message = "test";
    }
    // if($result->num_rows > 0){
    else {
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        // $result = $sth->fetch();
        if ($row) {
            $status = 200;
            $message = "Login successful";
        }
        // } else {
        //     $retVal = "Invalid email or password.";
        // }
    }
}

$myObj = array(
    "status" => $status,
    "message" => $message
);
$myJSON = json_encode($myObj);
echo $myJSON;

$con->close();
?>