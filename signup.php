<?php
	session_start();

	if(isset($_SESSION['usr_id'])) {
		header("Location: index.php");
	}

	include_once 'includes/config.php';

	//set validation error flag as false
	$error = false;

	//check if form is submitted
	if (isset($_POST['signup'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

		//name can contain only alpha characters and space
		if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
			$error = true;
			$username_error = "Username must contain only alphabets and space";
		}
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$email_error = "Please Enter Valid Email ID";
		}
		if(strlen($password) < 6) {
			$error = true;
			$password_error = "Password must be minimum of 6 characters";
		}
		if($password != $cpassword) {
			$error = true;
			$cpassword_error = "Password and Confirm Password doesn't match";
		}
		if (!$error) {
			if(mysqli_query($con, "INSERT INTO users(username,email,password) VALUES('" . $username . "', '" . $email . "', '" . md5($password) . "')")) {
				$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
			} else {
				$errormsg = "Error (add more logic here to explain)";
			}
		}
	}
?>

<?php include("header.php"); ?>

<div class="container signupContainer">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>

					<div class="form-group">
						<label for="name">Username</label>
						<input type="text" name="username" placeholder="Pick a username" required value="<?php if($error) echo $username; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($username_error)) echo $username_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your email address" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Create a password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-success loginButton" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>
