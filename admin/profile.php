<?php

session_start();
$pageTitle = 'Profile';
include('inc/config.php');

if (isset($_SESSION['name'])) {

    $email = $_SESSION['email'];

    $stmt = $con->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
    $stmt->execute(array($email));
    $row = $stmt->fetch();

?>
<div class="d-flex" id="wrapper">
    <?php include ('inc/sidebar.php') ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <?php include ('inc/navbar.php') ?>
        <div class="container-fluid">

            <!-- page content starts from here -->

            <div class="card o-hidden border-0">
                <div class="col-lg-7 col-xl-7 offset-xl-2">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Edit Your Profile !</h4>
                        </div>
                        <form class="user">
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['name']; ?>" class="form-control form-control-user" id="exampleInputName"  placeholder="Your Name" name="name" />
                            </div>
                            <div class="form-group">
                                <input type="email" value="<?php echo $row['email']; ?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email" />
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" id="examplePasswordInput" placeholder="Password" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="passwordrepeat" class="form-control form-control-user" id="exampleRepeatPasswordInput" placeholder="Repeat Password" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="hidden" name="passwordrepeat" value="<?php echo $row['password']; ?>" />
                                </div>
                            </div>
                            <hr />
                            <button class="btn btn-primary btn-block text-white btn-user" type="submit">Update Profile</button>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>


        </div> <!-- page content ends here -->
    </div>
</div> <!-- /#wrapper -->
<?php

    include ('inc/footer.php');
} else {
    header("Location: 404.php");
}
?>









