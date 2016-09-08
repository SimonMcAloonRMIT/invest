<?php
	session_start();

	if(isset($_SESSION['usr_id'])!="") {
		header("Location: index.php");
	}

	include_once 'includes/config.php';

	//check if form is submitted
	if (isset($_POST['login'])) {

		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['usr_id'] = $row['id'];
			$_SESSION['usr_name'] = $row['name'];
			header("Location: profile.php");
		} else {
			$errormsg = "Incorrect Email or Password!!!";
		}
	}
?>

<?php include("header.php"); ?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-success loginButton" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		New User? <a href="signup.php">Sign Up Here</a>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>
