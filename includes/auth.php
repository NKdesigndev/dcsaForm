<?php

require('functions.php');
session_start();

$_SESSION['user'] = getAuthUser();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    // If the user is not verified and the current page is not verify.php, redirect to verify.php
    if (!$user['is_verified']) {
        if (!isCurrentPage("verify.php")) {
            header('Location: verify.php');
            exit();
        }
    } else {
        // If the user is verified, check for other redirection conditions
        if (($user['role_id'] == 1 || $user['form_submited']) && !isCurrentPage("admin-panel.php") && !isCurrentPage("printView.php")) {
            header('Location: admin-panel.php');
            exit();
        }

        if ($user['role_id'] == 2 && !$user['form_submited'] && !isCurrentPage("application-form.php")) {
            header('Location: application-form.php');
            exit();
        }
    }
}
