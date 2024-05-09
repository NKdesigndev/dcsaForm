<?php

require(__dir__ . '/functions.php');
session_start();

if(isset($_POST['submit_application'])) {
    
    $request = $_POST;
    saveNomineeDetails($request);

    // Redirect after successful form submission
    $userId = $_SESSION['user']['id'];
    if (updateFormSubmittedStatus($userId) === true) {
        // Update successful
        $queryString = http_build_query(['success' => 'Form Submitted Successfully']);
        header("Location: ../admin-panel.php?$queryString");
        exit();
    } else {
        // Handle error
        $response['errors'][] = "Error updating form submission status";
        $queryString = http_build_query($response);
        header("Location: errors.php?$queryString");
        exit();
    }
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
