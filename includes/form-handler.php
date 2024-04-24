<?php

require(__dir__ . '/functions.php');
session_start();

if(isset($_POST['submit_application'])) {

    $request = $_POST;
    
    saveNomineeDetails($request);
}

if(isset($_POST['submit_login'])) {

    $request = $_POST;
    if(empty($request['nomineeEmail']) || empty($request['nomineePassword'])) {
        $_SESSION['error'] = 'Please provide valid input';
        header('Location: ../login.php');
        exit();
    }
    else {
        login($request);
    }
}

if(isset($_POST['submit_signup'])) {

    $request = $_POST;
    
    if(empty($request['nomineeEmail']) || empty($request['nomineePassword']) || empty($request['nomineeName']) || empty($request['nomineePasswordConfirm'])) {
        $_SESSION['error'] = 'Please provide valid input';
        header('Location: ../signup.php');
    }
    else {
        signup($request);
    }
    
}

if(isset($_GET['print']) && $_GET['print']) {
    printCurrentApplication();
}
