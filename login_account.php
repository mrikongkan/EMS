<?php
include "dbconn.php";
//Log In Form Database Query Start Here
try {
    if (isset($_POST['LoginButton'])) {
        $usrname = trim(strtolower($_POST['LogInEmail']));
        $usr_email = trim(strtolower($_POST['LogInEmail']));
        $usr_password = md5($_POST['LogInPassword']);

        //$stmnt = "SELECT * FROM `users` WHERE `nickname`= '$usrname' AND `user_pass` ='$usr_password' LIMIT 1";
        $stmnt = "SELECT * FROM `ems`.`users` WHERE `user_email`='$usr_email' OR `nickname`= '$usrname' OR `user_pass` ='$usr_password' LIMIT 1";
        $result = $conn->prepare($stmnt);

        // $result->bindParam(':user_email', $usr_email, PDO::PARAM_STR);
        // $result->bindParam(':user_pass', $usr_password, PDO::PARAM_STR);        
        $result->execute();
        $count = $result->rowCount();
        //echo $count;
        $row = $result->fetch(PDO::FETCH_ASSOC);
        //print_r($row);   


        if ($row) {
            if ($row['nickname'] != $usrname) {
                $_SESSION['name_errmsg'] = "<p style='color:red;'>Your Username Doesn't Match!</p>";
                header('location:index.php');
            } elseif ($row['user_pass'] != $usr_password) {
                $_SESSION['pass_errmsg'] = "<p style='color:red;'>Your Paswword Doesn't Match!</p>";
                header('location:index.php');
            } else {
                $_SESSION['usr_id'] = $row['user_id'];
                $_SESSION['usr_email'] = $row['user_email'];
                $_SESSION['usr_name'] = $row['user_name'];
                $_SESSION['username'] = $row['nickname'];
                $_SESSION['logout'] = " <li class='ms-2'><a href='/ems/logout.php' style='color:#fff;' class='btn btn-secondary mt-3' href='/ems/logout.php' 
                    role='button' aria-haspopup='true' aria-expanded='false'>Log out</a></li>";
                if ($row['user_role'] === 'Admin') {
                    $_SESSION['dashboard'] =  "<a class='nav-link' href='../ems/admin/dashboard.php'>Dashboard</a>";
                    header('location:admin/dashboard.php');
                } else {
                    $_SESSION['dashboard'] = "<a class='nav-link' href='../ems/users/dashboard.php'>Dashboard</a>";
                    header('location:users/dashboard.php');
                }
            }
        } else {
            $_SESSION['name_errmsg'] = "<p style='color:red;'>Your Username Doesn't Match!</p>";
            $_SESSION['pass_errmsg'] = "<p style='color:red;'>Your Paswword Doesn't Match!</p>";
            header('location:login.php');
        }
    }
} catch (PDOException $e) {
    echo "Log In failed : " . $e->getMessage();
}



// <?php
// 	session_start();
 
// 	require_once 'conn.php';
 
// 	if(ISSET($_POST['login'])){
// 		if($_POST['username'] != "" || $_POST['password'] != ""){
// 			$username = $_POST['username'];
// 			$password = $_POST['password'];
// 			$sql = "SELECT * FROM `member` WHERE `username`=? AND `password`=? ";
// 			$query = $conn->prepare($sql);
// 			$query->execute(array($username,$password));
// 			$row = $query->rowCount();
// 			$fetch = $query->fetch();
// 			if($row > 0) {
// 				$_SESSION['user'] = $fetch['mem_id'];
// 				header("location: home.php");
// 			} else{
// 				echo "
// 				<script>alert('Invalid username or password')</script>
// 				<script>window.location = 'index.php'</script>
// 				";
// 			}
// 		}else{
// 			echo "
// 				<script>alert('Please complete the required field!')</script>
// 				<script>window.location = 'index.php'</script>
// 			";
// 		}
// 	}

?>
