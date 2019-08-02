<?php 

    session_start();
    $pageTitle = 'Login Page';

    if (isset($_SESSION['name'])) {
        header('Location: dashboard.php');    // Redirect To Dashboard Page
    }

    include ('inc/config.php');

    // Check If User Coming From HTTP Request

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $email = $_POST['email'];
      $password = sha1($_POST['password']);

      if (isset($email,$password)) {

        // Check If The User Exist In The Database

        $stmt = $con->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $stmt->execute(array($email,$password));
        $data = $stmt->fetch();

         // If $data > 0 This Mean The Database Contain Record About This Username

        if ($data > 0 && $email === $data['email'] && $password === $data['password']) {

          $_SESSION['id'] = $data['id'];        // Register Session ID
          $_SESSION['name'] = $data['name'];    // Register Session Name
          $_SESSION['email'] = $data['email'];  // Register Session Email

          header("Location: dashboard.php");
          exit();

        } else {
          echo "<div class='alert alert-danger'>Error : Your Email or Password is Not Found</div>";
        }
      }
    }
  
  ?>

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Welcome back!</h3>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="form-label-group">
                                    <input type="email" name="email" id="inputEmail" class="form-control"
                                        placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="password" id="inputPassword" class="form-control"
                                        placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>
                                <button
                                    class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                    type="submit">Sign in</button>
                                <div class="text-center">
                                    <a class="small" href="#">Forgot password?</a>
                                    <a class="small" href="register.php">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

include ('inc/footer.php'); 

?>