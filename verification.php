<?php
ini_set('display_errors', 1);
session_start();
require __DIR__ . '/includes/functions.php';

if (isset($_GET['token'])) {
    global $mysqli;
    
    $token = $_GET['token'];

    // Verify the token
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE verification_token = ?");
    $stmt->bind_param('s', $token); // Bind the parameter
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Update the user to set is_verified to true and remove the token
        $stmt->close(); // Close the previous statement

        $stmt = $mysqli->prepare("UPDATE users SET is_verified = 1, verification_token = NULL WHERE id = ?");
        $stmt->bind_param('i', $user['id']); // Bind the parameter
        if ($stmt->execute()) {
            $_SESSION["success"] = 'Email verification successful. You can now login.';
        } else {
            $_SESSION["error"] = 'Email verification failed.';
        }
        $stmt->close(); // Close the statement
    } else {
        $_SESSION["error"] = 'Invalid verification token.';
    }
} else {
    $_SESSION["error"] = 'No verification token provided.';
}

if(isset($_SESSION["error"]) || isset($_SESSION["success"])) {
    header("location: login.php");
}

?>
