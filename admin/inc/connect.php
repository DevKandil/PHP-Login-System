<?php

$host       = "localhost";
$database   = "login-sys";
$dsn        = "mysql:host=$host;dbname=$database";
$user       = "root";
$pass       = "";

try {
    $con = new PDO($dsn,$user,$pass);
} catch (PDOExeption $e) {
    echo "Error :" . $e->getMessage;
}