<?php

// require(__dir__ . '/../config/functions.php');
session_start();

if((!isset($_SESSION['user']) || empty($_SESSION['user'])) && $_SERVER['REQUEST_URI'] != '/login.php') {
    header('Location: login.php');
}

// else if(!$_SESSION['user']['form_submited'] && $_SERVER['REQUEST_URI'] != '/application-from.php') {
//     header('Location: application-from.php');
// }

// else if($_SESSION['user']['form_submited'] && $_SERVER['REQUEST_URI'] == '/application-from.php') {
//     header('Location: admin-panel.php');
// }