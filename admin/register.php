<?php 

  session_start();
  include ('config.php');
    

    include ('inc/header.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                    <!-- Background image for card set in CSS! -->
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Register</h5>
                    <form class="form-signin" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-label-group">
                            <input type="text" name="name" id="inputUserame" class="form-control" placeholder="Your Name" required
                                autofocus>
                            <label for="inputUserame">Your Name</label>
                        </div>

                        <div class="form-label-group">
                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"
                                required>
                            <label for="inputEmail">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                                required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="confirmpassword" id="inputConfirmPassword" class="form-control" placeholder="Password"
                                required>
                            <label for="inputConfirmPassword">Confirm password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Register</button>
                        <a class="d-block text-center mt-2 small" href="login.php">Login</a>
                        
                        <hr class="my-4">
                        <!--
                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                class="fab fa-google mr-2"></i> Sign up with Google</button>
                        -->
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    include ('inc/footer.php'); 