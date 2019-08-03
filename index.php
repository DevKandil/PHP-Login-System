<?php
session_start();
include ('inc/header.php');
include ('inc/navbar.php');

?>

<!-- Page Content -->
<section class="py-5" style="margin-top: 150px">
    <div class="container">
        <h1 class="display-5">PHP Login System with Registration</h1>
        <p class="lead">A Simple PHP Login System With User Registration Coded with Love By: <a href="#">Kandil</a></p>
        <?php
            if (isset($_SESSION['name'])) {
                echo '<p class="lead">Welcome <strong>' . $_SESSION['name'].'</strong></p>';
            }
        ?>

        <h5>Bugs:</h5>
        <p class="lead">[+] - Empty.</p>

    </div>
</section>

<?php 
    include ('inc/footer.php'); 
?>