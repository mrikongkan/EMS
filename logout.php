<?php
session_start();
unset( $_SESSION['usr_id']);
unset($_SESSION['usr_name']);
unset($_SESSION['logout']);
unset($_SESSION['dashboard']);
header("Location:login.php");
?>