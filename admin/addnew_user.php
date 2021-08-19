<?php
session_start();
date_default_timezone_set ("Asia/Calcutta");
include "dbconn.php";
//Query for Registration Page
try {
    if (isset($_POST['addnew_user'])) {
        $usr_nickname = trim(strtolower($_POST['new_user']));
        $usr_state = trim($_POST['checkstate']);
        $signup_date = date('Y-m-d h:i:sa');
        $expdate   = date('Y-m-d h:i:sa', strtotime('+30 days'));

        // first check the database to make sure
        // a user does not already exist with the same username and/or email
        $query = "SELECT * FROM `ems`.`adduser` WHERE `addusr_name`= '$usr_nickname' LIMIT 1";
        $results = $conn->prepare($query);

        // $result->bindParam(':user_email', $usr_email, PDO::PARAM_STR);
        // $result->bindParam(':user_pass', $usr_password, PDO::PARAM_STR);        
        $results->execute();
        $count = $results->rowCount();
        //echo $count;
        $row = $results->fetch(PDO::FETCH_ASSOC);
        //print_r($row['user_email']);
        if ($row) {
            if ($row['addusr_name'] == $usr_nickname) {
                $_SESSION['username_exits'] = "<p style='color:red;'>Username Already Exists</p>";
                header('location:dashboard.php');
            }
        } else {
            if ($usr_state == "Full") {
                $expdate   = date('Y-m-d h:i:sa', strtotime('+30 days'));                            
                
            } else {
                $expdate   = date('Y-m-d h:i:sa', strtotime('+3 days'));                       
            }           
          

            $stmnt = "INSERT INTO `ems`.`adduser`(`addusr_id`, `addusr_name`,`addusr_signup_date`,`addusr_state`,`addusr_exipre`) VALUES ('','$usr_nickname','$signup_date','$usr_state','$expdate')";
            //print_r($stmnt);
            $result = $conn->query($stmnt);
            if (!empty($result)) {
                $_SESSION['success'] = "<p class='ms-5' style='color:green;'> Data Inserted Successfully..</p>";               
                header("Location:dashboard.php");
            } else {
                $_SESSION['fail'] = "<p style='color:red;'> Data Inserted Failed..</p>";
            }
        }
    }
} catch (PDOException $e) {
    echo "Registration Failed" . $e->getMessage();
}
