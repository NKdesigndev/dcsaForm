<?php

$host = "localhost";
$dbname = "dcsa";
$username = "root";
$password = "Anviam@123";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli -> connect_errno){
    die("Connection error: " . $mysqli->connect_error);
} 

return $mysqli;