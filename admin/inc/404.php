<?php 

session_start();

include('config.php');

include ('inc/header.php'); 

?>
<div class="d-flex" id="wrapper">
    <?php // include ('inc/sidebar.php') ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <?php // include ('inc/navbar.php') ?>
        <div class="container-fluid">
            <!-- page content starts from here -->


            <div class="text-center error">
                <h1 class="mt-4">Error 404 : Page Not Found</h1>
                <p>The starting state of the menu will appear collapsed on smaller screens</p>
                <a href="login.php" ><div class="btn btn-info"><i class="fa fa-home"></i> Home</div></a>
            </div>


        </div>
    </div> <!-- page content ends here -->
</div> <!-- /#wrapper -->
<?php 
include ('inc/footer.php'); 
?>