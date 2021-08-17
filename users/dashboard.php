<?php session_start(); ?>
<?php include './header.php'; ?>
<section class="content-height">
    <div class="container mt-5">
        <div class=" row align-items-center">
        <?php
            if (isset($_SESSION['usr_id']) && isset($_SESSION['usr_name'])) {
                echo strtoupper('<h3> WELCOME TO YOUR DASHBOARD, ' . strtoupper($_SESSION['usr_name']) . "</h3>");
            } else {
                unset($_SESSION['usr_name']);
                unset($_SESSION['usr_id']);
                unset($_SESSION['usr_email']);
                header('location:login.php');
            }
            ?>
        </div>
    </div>

</section>
<?php include './footer.php'; ?>