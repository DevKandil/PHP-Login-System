<?php

    // Database Connection

    include_once 'classes/DB.php';
    $con = DB::setConnection();



    // Routes

    $css     = 'assets/css/';            // Css Directory
    $js      = 'assets/js/';             // Js Directory



    // Include The Important Files

    include_once 'functions.php';
    include ('header.php');