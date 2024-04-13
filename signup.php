    <?php 
        $title = "SignUp";
        require_once('./view/header.php'); 
    ?>

    <!-- signup Modal -->
    <div class="modal fade signupModal" id="signupModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="staticBackdropLabel">Create your account</h5>
                        <p>To save your work</p>
                    </div>
                    <a href="index.php"><button type="button" class="btn-close me-2" data-bs-target="#signupModal" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close"></button></a>
                </div>
                <form action="process-signup.php" method="post" >
                    <div class="modal-body">
                        <div class="application-form">
                            <div class="mt-3">
                                <label for="nomineeName" class="form-label">Name<span class="required-star">*</span></label>
                                <input type="text" class="form-control" id="nomineeName" placeholder="Name" name="nomineeName">
                            </div>
                            <div class="mt-3">
                                <label for="nomineeEmail" class="form-label">Email<span class="required-star">*</span></label>
                                <input type="email" class="form-control" id="nomineeEmail" placeholder="Email" name="nomineeEmail" required="true">
                            </div>
                            <div class="mt-3">
                                <label for="nomineePassword" class="form-label">Password<span class="required-star">*</span></label>
                                <input type="password" class="form-control" id="nomineePassword" placeholder="Password" name="nomineePassword" required="true">
                            </div>
                            <div class="mt-3">
                                <label for="nomineePasswordConfirm" class="form-label">Confirm Password<span class="required-star">*</span></label>
                                <input type="password" class="form-control" id="nomineePasswordConfirm" placeholder="Confirm Password" name="nomineePasswordConfirm" required="true">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-3 justify-content-end flex-column">
                        <!-- <div class="col-lg-12 d-flex justify-content"> -->
                            <!-- Submit button -->
                            <input type="submit" class="submit-btn mx-4" value="signup">
                            <div class="text-center align-content-center ">
                                <span>or</span> <br>
                                <a href="login.php" >Already have an Account?</a>
                            </div>
                        <!-- </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        var signupModal = new bootstrap.Modal(document.getElementById("signupModal"));
        signupModal.show();
    </script>
</body>
</html>