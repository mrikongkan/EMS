<?php include 'header.php' ?>
<?php
if (isset($_SESSION['usr_id'])) {
	header('location:index.php');
}

?>
<style>
	.field-step {
		display: none;
	}

	.step.active {
		opacity: 1;
	}

	.step.finish {
		background-color: #04AA6D;
	}

	input.invalid {
		background-color: #ffdddd;
	}
</style>

<body class="app app-signup p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="index.php"><img class="logo-icon me-2" src="images/ems.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign Up to Portal</h2>

					<div class="auth-form-container text-start mx-auto">
						<!-- Registration Form start From Here--------------------------------------------------------------------------------->
						<form id="regForm" class="auth-form auth-signup-form" method="post" action="add_user.php" onsubmit="//return dataValidate();" enctype="multipart/form-data">
							<div class="field-step">
								<div class="username mb-3">
									<label class="sr-only" for="UserName">User Name</label>
									<input id="UserName" name="UserName" type="text" class="form-control signup-name" placeholder="User Name">
									<small id="UserName" class="form-text text-muted"><?php
																						if (isset($_SESSION['username_exits'])) {
																							echo $_SESSION['username_exits'];
																							unset($_SESSION['username_exits']);
																						} else {
																							echo "Please Use an Unique User Name.";
																						}
																						?></small>
								</div>
								<div class="name mb-3">
									<label class="sr-only" for="InputName">Your Name</label>
									<input id="InputName" name="InputName" type="text" class="form-control signup-name" placeholder="Enter Your Full Name">
									<small id="NameHelp" class="form-text text-muted">Please Enter Your Real Name!</small>
								</div>
								<div class="email mb-3">
									<label class="sr-only" for="InputEmail1">Email address</label>
									<input id="InputEmail" name="InputEmail" type="email" class="form-control signup-email" placeholder="Enter Your email">
									<small id="emailHelp" class="form-text text-muted"><?php
																						if (isset($_SESSION['email_exits'])) {
																							echo $_SESSION['email_exits'];
																							unset($_SESSION['email_exits']);
																						} else {
																							echo "Please Enter Your Valid Unique Email.";
																						}
																						?></small>
								</div>
								<div class="image mb-3">
									<label class="sr-only" for="image">Browse Your Image</label>
									<input id="InputImage" name="InputImage" type="file" class="form-control signup-file">
								</div>
								<div class="password mb-3">
									<label class="sr-only" for="signup-password">Password</label>
									<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
								</div>
							</div>

							<div class="field-step">
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


								<div class="extra mb-3">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
										<label class="form-check-label" for="RememberPassword">
											I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
										</label>
									</div>
								</div>
							</div>


							<!--//extra-->

							<div class="text-center">
								<div style="overflow:auto;">
									<div style="float:right;">
										<button type="button" id="prevBtn" class="btn app-btn-primary" onclick="nextPreview(-1)">Previous</button>
										<button type="button" id="nextBtn" name="registrationButton" class="btn app-btn-primary " onclick="nextPreview(1)">Next</button>
									</div>
								</div>
								<a href="login.php" class="btn app-btn-primary w-100 theme-btn mx-auto mt-3">Log In</a>
							</div>
							<div style="text-align:center;margin-top:40px;">
								<span class="step"></span>
								<span class="step"></span>
								<span class="step"></span>
								<span class="step"></span>
								<style>
									.step {
										height: 15px;
										width: 15px;
										margin: 0 2px;
										background-color: #bbb;
										border: none;
										border-radius: 50%;
										display: inline-block;
										opacity: 0.5;
									}
								</style>

							</div>
						</form>
						<!-- Registration Form End  Here--------------------------------------------------------------------------------->


					</div>
					<!--//auth-form-container-->



				</div>
				<!--//auth-body-->

			</div>
			<!--//flex-column-->
		</div>
		<!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
					<!-- <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div> -->
				</div>
			</div>
			<!--//auth-background-overlay-->
		</div>
		<!--//auth-background-col-->

	</div>
	<!--//row-->


	<script type="text/javascript">
		var currenttab = 0;
		ShowTab(currenttab);

		function ShowTab(n) {
			var tab = document.getElementsByClassName("field-step");
			tab[n].style.display = "block";

			if (n == 0) {
				document.getElementById("prevBtn").style.display = "none";
			} else {
				document.getElementById("prevBtn").style.display = "inline";
			}
			if (n == (tab.length - 1)) {
				document.getElementById("nextBtn").innerHTML = "Sign Up";
			} else {
				document.getElementById("nextBtn").innerHTML = "Next";
			}
			FixedStepIndicator(n);
		}

		function ValidateForm() {
			var x, y, i, valid = true;
			x = document.getElementsByClassName("field-step");
			y = x[currenttab].getElementsByTagName("input");
			for (i = 0; i < y.length; i++) {
				if (y[i].value == "") {
					y[i].className += " invalid";
					valid = false;
				}
			}
			if (valid) {
				document.getElementsByClassName("step")[currenttab].className += " finish";
			}
			return valid;
		}

		function nextPreview(n) {
			var x = document.getElementsByClassName("field-step");
			if (n == 1 && !ValidateForm()) {
				return false;
			}
			x[currenttab].style.display = "none";
			currenttab = currenttab + n;
			if (currenttab >= x.length) {
				document.getElementById("regForm").submit();
				return false;
			}
			ShowTab(currenttab);

		}

		function FixedStepIndicator(n) {
			var i, x = document.getElementsByClassName("step");
			for (i = 0; i < x.length; i++) {
				x[i].className = x[i].className.replace(" active", "");
			}
			x[n].className += " active";
		}
	</script>

	<?php include "footer.php" ?>