<?php include 'header.php' ?>
<?php
if (isset($_SESSION['usr_id'])) {
    header('location:index.php');
}

?>
<section class="content-bg-color">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8 offset-sm-2 offset-md-2 offset-lg-2">
                <!-- Registration Form start From Here--------------------------------------------------------------------------------->
                <form class="mt-5 mb-5" method="post" action="add_user.php" onsubmit="return dataValidate();" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Registration</legend>
                        <div class="form-group">
                            <label for="UserName" class="form-label mt-4">User Name</label>
                            <input type="text" class="form-control" id="UserName" name="UserName" aria-describedby="UserName" placeholder="Enter User Name">
                            <small id="UserName" class="form-text text-muted"><?php
                                                                                if (isset($_SESSION['username_exits'])) {
                                                                                    echo $_SESSION['username_exits'];
                                                                                    unset($_SESSION['username_exits']);
                                                                                } else {
                                                                                    echo "Please Use an Unique User Name.";
                                                                                }
                                                                                ?></small>
                        </div>

                        <div class="form-group">
                            <label for="InputName" class="form-label mt-4">Your Name</label>
                            <input type="text" class="form-control" id="InputName" name="InputName" aria-describedby="emailHelp" placeholder="Enter Your Name">
                            <small id="NameHelp" class="form-text text-muted">Please Enter Your Real Name!</small>



                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted"><?php
                                                                                if (isset($_SESSION['email_exits'])) {
                                                                                    echo $_SESSION['email_exits'];
                                                                                    unset($_SESSION['email_exits']);
                                                                                } else {
                                                                                    echo "We'll never share your data with anyone else.";
                                                                                }
                                                                                ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="form-label mt-4">Password</label>
                            <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="form-label mt-4">Default file input example</label>
                            <input class="form-control" type="file" name="image" id="InputImage" id="formFile">
                        </div>
                        <fieldset class="form-group">
                            <legend class="mt-4">Role</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="UserRole" id="UserRole" value="Admin" checked="">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="UserRole" id="UserRole" value="User">
                                    User
                                </label>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <legend class="mt-4">Department</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="department" id="department" value="Web Design" checked="">
                                    Web Design
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="department" id="department" value="Search Engine Optimozation">
                                    Search Engine Optimozation
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="department" id="department" value="Graphics Design">
                                    Graphics Design
                                </label>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <legend class="mt-4">Gender</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="Gender" value="Male" checked="">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="Gender" value="Femlae">
                                    Female
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="Gender" value="Other">
                                    Other
                                </label>
                            </div>
                        </fieldset>
                        <div class="form-group mt-3">
                            <button type="reset" class="btn btn-secondary" name="cancelButton">Reset</button>
                            <button type="submit" class="btn btn-primary" name="registrationButton" id="registrationButton">Submit</button>
                        </div>

                    </fieldset>
                </form>
                <!-- Registration Form End  Here--------------------------------------------------------------------------------->
            </div>
        </div>
    </div>

</section>
<!-- Registration Form Validation Start From Here--------------------------------------------------------------------------------->

<script type="text/javascript">
    function dataValidate() {
        var username = $('#UserName').val();
        if (username == " ") {
            alert("Enter Your User Name Here!");
            return false;
        }
        var name = $('#InputName').val();
        if (name == "") {
            alert("Enter Your Full Name Here!");
            return false;
        }
        var email = $('#InputEmail').val();
        if (email == "") {
            alert("Enter Your email Here!");
            return false;
        }
        var password = $('#InputPassword').val();
        var passLength = $('#InputPassword').val().length;
        if (password == "") {
            alert("Enter The Password Here!");
            return false;
        } else if (passLength <= 4) {
            alert("Enter Min. 5 digit Password Here!");
            return false;
        }
        var image = $('#image').val();
        if (image == "") {
            alert("Enter Your Image Here!");
            return false;
        }
        var userrole = $('#UserRole').val();
        if (userrole == "") {
            alert("Select Your Role!");
            return false;
        }
        var department = $('#department').val();
        if (department == "") {
            alert("Select a Department!");
            return false;
        }
        var gender = $('#Gender').val();
        if (gender == "") {
            alert("Select Your Gender!");
            return false;
        }
    }
</script>
<!-- Registration Form Validation End Here--------------------------------------------------------------------------------->
<?php include 'footer.php' ?>