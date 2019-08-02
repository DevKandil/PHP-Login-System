<?php 

session_start();
$pageTitle = 'Not Found';
include('inc/config.php');

?>
<div class="d-flex" id="wrapper">
    <div id="page-content-wrapper">
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