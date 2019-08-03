<?php 

    session_start();
    $pageTitle = 'Register';
    include ('inc/config.php');

    if (isset($_SESSION['name'])) {
        header('Location: dashboard.php');    // Redirect To Dashboard Page
    }

    // Check If User Coming From HTTP Request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get Variables From The Form
        $name   = $_POST['name'];
        $email  = $_POST['email'];
        $password   = sha1($_POST['password']);
        $confirmpassword = sha1($_POST['confirmpassword']);

        // Validate The Form
        $formErrors = array();

        if (empty($name)) {
            $formErrors[] = 'Name cannot be <strong>empty</strong>';
        }
        if (empty($email)) {
            $formErrors[] = 'Email cannot be <strong>empty</strong>';
        }
        if (empty($password)) {
            $formErrors[] = 'Password cannot be <strong>empty</strong>';
        }
        if ($password !== $confirmpassword) {
            $formErrors[] = 'Password Must be <strong>the Same</strong>';
        }
        foreach ($formErrors as $error) {
            $theMsg = '<div class="alert alert-danger">' . $error . '</div>';
            redirectTo($theMsg, "back");
        }

        // Check If There is No Errors Then Insert
        if (empty($formErrors)) {

            // Check If Email Is Exist In Database
            $check = checkItem("email", "users", $email);

            if ($check == 0) {

                // Insert The Database With This Info
                $stmt = $con->prepare("INSERT INTO users(name, email, password) 
                                                VALUES(:name, :email, :pass)");
                $stmt->bindparam(':name',$name);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':pass',$password);
                $stmt->execute();

                $stmnt = $con->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
                $stmnt->execute(array($email));
                $row = $stmnt->fetch();

                $_SESSION['id']   = $row['id'];           // Register Session Name
                $_SESSION['name']   = $name;           // Register Session Name
                $_SESSION['email']  = $email;          // Register Session Email

                header('Location: ../index.php');
                exit();

            } else {

                $theMsg = '<div class="alert alert-danger">Sorry This Email Is Exist</div>';

                redirectTo($theMsg, "back");

            }
        }
    }

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
                    <form class="form-signin" id="form-signin" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
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

                        <div class="js-error">
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Register</button>
                        <a class="d-block text-center mt-2 small" href="login.php">Login</a>
                        
                        <hr class="my-4">

                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit">
                            <i class="fa fa-facebook mr-2"></i>
                            Sign up with Facebook
                        </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include ('inc/footer.php');
?>