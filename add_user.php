<?php
include "dbconn.php";
//Query for Registration Page
try {
    if (isset($_POST['registrationButton'])) {
        $usr_nickname = trim(strtolower($_POST['UserName']));
        $usr_name = trim($_POST['InputName']);
        $usr_email = trim(strtolower($_POST['InputEmail']));
        $usr_password = md5($_POST['InputPassword']);
        // $usr_image = $_POST['InputImage'];
        $usr_role = trim($_POST['UserRole']);
        $usr_dept = trim($_POST['department']);
        $usr_gen = trim($_POST['gender']);


        // first check the database to make sure
        // a user does not already exist with the same username and/or email
        $query = "SELECT * FROM `ems`.`users` WHERE `nickname`= '$usr_nickname' OR `user_email`='$usr_email' LIMIT 1";
        $results = $conn->prepare($query);

        // $result->bindParam(':user_email', $usr_email, PDO::PARAM_STR);
        // $result->bindParam(':user_pass', $usr_password, PDO::PARAM_STR);        
        $results->execute();
        $count = $results->rowCount();
        //echo $count;
        $row = $results->fetch(PDO::FETCH_ASSOC);
        //print_r($row['user_email']);
        if ($row) {
            if ($row['nickname'] == $usr_nickname) {
                $_SESSION['username_exits'] = "<p style='color:red;'>Username Already Exists</p>";
                header('location:registration.php');
            }
            if ($row['user_email'] == $usr_email) {
                $_SESSION['email_exits'] = "<p style='color:red;'>Email Already Exists</p>";
                header('location:registration.php');
            }
        } else {
            $stmnt = "INSERT INTO `ems`.`users`(`user_id`, `nickname`,`user_name`, `user_email`, `user_pass`,`user_role`,`user_dept`, `user_gen`) VALUES ('','$usr_nickname','$usr_name','$usr_email',
                '$usr_password','$usr_role','$usr_dept','$usr_gen')";
            //print_r($stmnt);
            $result = $conn->query($stmnt);
            if (!empty($result)) {
                $_SESSION['success'] = "<p style='color:green;'> Data Inserted Successfully..</p>";
                header("Location:login.php");
            } else {
                $_SESSION['fail'] = "<p style='color:red;'> Data Inserted Failed..</p>";
            }
        }
    }
} catch (PDOException $e) {
    echo "Registration Failed" . $e->getMessage();
}
