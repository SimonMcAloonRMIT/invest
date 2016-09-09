<?php
session_start();
require_once("includes/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('profile.php');
}

if(isset($_POST['login']))
{
	$uname = strip_tags($_POST['email']);
	$umail = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);

	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('profile.php');
	}
	else
	{
		$errormsg = "Login failed, please try again";
	}
}
?>

<?php require_once("templates/header.php"); ?>

<div class="container loginContainer">
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

<?php require_once("templates/footer.php"); ?>
