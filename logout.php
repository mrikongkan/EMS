<?php
session_start();
unset( $_SESSION['usr_id']);
unset($_SESSION['usr_name']);
unset($_SESSION['logout']);
unset($_SESSION['dashboard']);
unset($_SESSION['user_newid']);
header("Location:index.php");
?>