<?php
    $is_invaild = false;

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require __DIR__ . "/db-connection.php";

        $sql = sprintf("SELECT * FROM user WHERE email= '%s'", 
                            $mysqli->real_escape_string($_POST["nomineeEmail"]));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if($user){
            if (password_verify($_POST["nomineePassword"], $user["password_hash"])){
                session_start();

                session_regenerate_id();

                $_SESSION["user_id"]=$user["id"];

                header("Location: admin-panel.php");
                exit;
            }
        }
        
        $is_invaild = true;
    }
?>

<?php
    session_start();

    if (isset($_SESSION["user_id"])){

        $mysqli = require __DIR__ . "/db-connection.php";

        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
    }
    // print_r($_SESSION)
?>
  <?php
        if (isset($user)) {
            header("Location: admin-panel.php");
        } else {
            // header("Location: login.php");
        }
    ?>

    <?php 
        $title = "Login";
        require_once('./view/header.php'); 
    ?>

    <!-- Login Modal -->
    <div class="modal fade loginModal" id="loginModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Welcome Back!!</h5>
                    <button type="button" class="btn-close" data-bs-target="#signupModal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <?php
                    if ($is_invaild): ?>
                    <em>Login invaild</em>
                    
                <?php endif; ?>
                <form method="post" novalidate>
                    <div class="modal-body">
                        <div class="application-form">
                            <div class="mt-3">
                                <label for="nomineeEmail" class="form-label">Email<span class="required-star">*</span></label>
                                <input type="email" class="form-control" id="nomineeEmail" placeholder="Email" name="nomineeEmail" required="true"
                                    value="<?= htmlspecialchars($_POST["nomineeEmail"] ?? "") ?>">
                            </div>
                            <div class="mt-3">
                                <label for="nomineePassword" class="form-label">Password<span class="required-star">*</span></label>
                                <input type="password" class="form-control" id="nomineePassword" placeholder="Password" name="nomineePassword" required="true">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3 justify-content-end flex-column">
                        <!-- <div class="col-lg-12 d-flex justify-content-center"> -->
                            <!-- Cancel button -->
                            <!-- <a href="javascript:void(0)" class="prev-btn"><button type="button" data-bs-dismiss="modal">Cancel</button></a> -->
                            <!-- Submit button -->
                            <input type="submit" class="submit-btn mx-4" value="Login">
                            <div class="text-center mt-2">
                                <!-- <span>or</span> <br> -->
                                <a href="signup.php">Don't have an Account? signup</a>
                            </div>
                        <!-- </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
        loginModal.show();
    </script>
</body>
</html>
    