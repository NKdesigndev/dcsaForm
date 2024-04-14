<?php

require(__dir__ . '/functions.php');


if(isset($_POST['submit_application'])) {

    $request = $_POST;
    
    saveNomineeDetails($request);
}

if(isset($_POST['submit_login'])) {

    $request = $_POST;
    
    login($request);
}