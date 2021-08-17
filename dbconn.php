<?php
session_start();
$servername = "localhost";
$username = "root";
$pasword = "";
$dbname = "ems";

//PDO Connection for Database
try {
    $conn = new PDO("mysql:host = " . $servername . ";dbname =" . $dbname, $username, $pasword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($conn)) {
        echo "Connected successfully";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
