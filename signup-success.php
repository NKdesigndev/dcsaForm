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
    
        <h1>We have sent you an email with a verification link. Please verify you email account using that link to continue to login.</h1>
        
        <p>Signup Successfull</p>

        <a href="login.php">Log in</a>
    </div>

</body> 
</html>
