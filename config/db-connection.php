<?php

require(__dir__ . '/load-env.php');

$host = getenv('DB_HOST');
$dbname = getenv('DB_DATABASE');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli -> connect_errno){
    die("Connection error: " . $mysqli->connect_error);
} 

return $mysqli;