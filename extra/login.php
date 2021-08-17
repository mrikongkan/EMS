<?php include 'header.php' ?>
<?php
if (isset($_SESSION['usr_id'])) {
    header('location:index.php');
}

?>
<section class="content-height">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 offset-sm-3 offset-md-3 offset-lg-3">
                <!-- Log In Form start From Here--------------------------------------------------------------------------------->
                <form class="mt-5 mb-5" method="post" action="login_account.php" onsubmit="return dataValidatelogIn();" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Log In</legend>
                        <?php
                        if (isset($_SESSION['success'])) {
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                        ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Email ID/User Name</label>
                            <input type="text" class="form-control" id="LogInEmail" name="LogInEmail" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">
                                <?php
                                if (isset($_SESSION['name_errmsg'])) {
                                    echo $_SESSION['name_errmsg'];
                                    unset($_SESSION['name_errmsg']);
                                } else {
                                    echo "Please Use Your Email Address or User Name for Log In.";
                                }
                                ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="form-label mt-4">Password</label>
                            <input type="password" class="form-control" id="LogInPassword" name="LogInPassword" placeholder="Password">
                            <small id="passwordHelp" class="form-text text-muted">
                                <?php
                                if (isset($_SESSION['pass_errmsg'])) {
                                    echo  $_SESSION['pass_errmsg'];
                                    unset($_SESSION['pass_errmsg']);
                                } else {
                                    echo "Please Use Your Password for Log In.";
                                }
                                ?>
                            </small>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary" name="LoginButton" id="LoginButton">Log In</button>
                            <a href="/ems/registration.php" class="btn btn-primary">Create A New Account</a>
                        </div>

                    </fieldset>
                </form>
                <!-- Log In Form End  Here--------------------------------------------------------------------------------->
            </div>
        </div>
    </div>
</section>

<!-- Log In Form Validation Start From Here--------------------------------------------------------------------------------->

<script type="text/javascript">
    function dataValidatelogIn() {
        var email = $('#LogInEmail').val();
        if (email == "") {
            alert("Enter Your email or user name Here!");
            return false;
        }
        var password = $('#LogInPassword').val();

        if (password == "") {
            alert("Enter The Password Here!");
            return false;
        }
    }
</script>
<!-- Registration Form Validation End Here--------------------------------------------------------------------------------->
<?php include 'footer.php' ?>