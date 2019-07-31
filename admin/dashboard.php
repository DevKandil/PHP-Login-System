<?php 

session_start();

include('config.php');

if (isset($_SESSION['name'])) {

include ('inc/header.php'); 

?>
<div class="d-flex" id="wrapper">
    <?php include ('inc/sidebar.php') ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <?php include ('inc/navbar.php') ?>
        <div class="container-fluid">
            <!-- page content starts from here -->



            <h1 class="mt-4">Welcome <?php echo $_SESSION['name']; ?> To Dashboard</h1>
            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on
                larger screens. When toggled using the button below, the menu will change.</p>
            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is
                optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which
                will toggle the menu when clicked.</p>



        </div> <!-- page content ends here -->
    </div> 
</div> <!-- /#wrapper -->
<?php 

    include ('inc/footer.php'); 
} else {
    header("Location: 404.php");
}
?>