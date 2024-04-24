
  <?php
        require('includes/auth.php');
        
        if (isset($_SESSION['user'])) {
            header("Location: admin-panel.php");
        }

        $title = "Login";
        require_once('./view/header.php'); 
    ?>

    <!-- Login Modal -->
    <div id="loginModal" class="modal fade loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2">
        
        <div class="modal-dialog modal-dialog-centered">    
            <div class="modal-content">
                
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Welcome Back!!</h5>
                    
                    <a href="index.php"><button type="button" class="btn-close" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button></a>
                </div>

                <?php if(isset($_SESSION['error']) && !empty(isset($_SESSION['error']))): ?>
                    <div class="alert alert-danger m-4">
                        <?= $_SESSION['error']; ?>
                    </div>
                <?php endif ?>
                
                <form method="post" action="includes/form-handler.php" novalidate>
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
                        <input type="submit" name="submit_login" class="submit-btn mx-4" value="Login">
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
    