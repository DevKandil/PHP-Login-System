<?php 

  session_start();
  include ('config.php');
    

    include ('inc/header.php'); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $email = $_POST['email'];
      $password = sha1($_POST['password']);

      if (isset($email,$password)) {
        
        $stmt = $con->prepare("SELECT * FROM admin WHERE email=? AND password=?");
        $stmt->execute(array($email,$password));
        $data = $stmt->fetch();

        if ($data > 0 ) {
          
          $_SESSION['name'] = $data['name'];
          $_SESSION['email'] = $data['email'];

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
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember password</label>
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