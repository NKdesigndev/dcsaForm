<?php

require('functions.php');
session_start();

$_SESSION['user'] = getAuthUser();

if(isset($_SESSION['user'])) {

    if(($_SESSION['user']['role_id'] == 1 || $_SESSION['user']['form_submited']) && !isCurrentPage("admin-panel.php") && !isCurrentPage("printView.php")) {
        header('Location: admin-panel.php');
        return;
    }
    if($_SESSION['user']['role_id'] == 2 && !$_SESSION['user']['form_submited'] && !isCurrentPage("application-form.php")) {
        header('Location: application-form.php');
    }
}