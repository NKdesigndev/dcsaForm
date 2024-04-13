<?php

// Validate form inputs
if(empty($_POST["nomineeName"])){
    die("Name is required");
}
if( ! filter_var($_POST["nomineeEmail"], FILTER_VALIDATE_EMAIL)){
    die("Vaild email is required");
}
if(strlen($_POST["nomineePassword"] < 8 )){
    die("Password must be at least 8 characters");
}
if(! preg_match("/[a-z]/i", $_POST["nomineePassword"])){
    die("Password must contain at least one letter");
}
if(! preg_match("/[0-9]/i", $_POST["nomineePassword"])){
    die("Password must contain at least one number");
}

if($_POST["nomineePassword"] !== $_POST["nomineePasswordConfirm"]){
    die("Password must match");
}

$password_hash = password_hash($_POST["nomineePassword"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/db-connection.php";


// PreparedStatements
$sql = "INSERT INTO user (name, email, password_hash) VALUES(?,?,?)";
$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)){
    die("SQL error:". $mysqli->error);
}

$stmt->bind_param("sss",
                    $_POST["nomineeName"],
                    $_POST["nomineeEmail"],
                    $password_hash);

if($stmt->execute()){
    
    header("Location: signup-success.php");
    exit;
}
else{
    if($mysqli->errno === 1062){
        die("Email already taken");
    }
    else{
        die($mysqli->error . " " . $mysqli->errno);
    }
}


print_r($_POST);
var_dump($password_hash);