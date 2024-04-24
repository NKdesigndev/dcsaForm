<?php 

        require('includes/auth.php');
                
        if (isset($_SESSION['user'])) {
            header("Location: admin-panel.php");
        }

    $title = "Signup Successfull";
    require_once('./view/header.php'); 
?>

    <div class="container">
        <h1>Greetings!!</h1>
    
        <p>Signup Successfull.
            You can now <a href="login.php">Log in</a>
        </p>
    </div>

</body> 
</html>
