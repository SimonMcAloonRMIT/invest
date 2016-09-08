<?php
	session_start();
	include_once 'includes/config.php';

	if (!isset($_SESSION['usr_id'])) {
		header("Location: login.php");
	}
?>

<?php include("header.php"); ?>

<h1 class="welcomeMsg animated fadeInLeft"> Welcome <?php echo $_SESSION['usr_name']; ?>! </h1>

<p class="welcomeSubMsg animated fadeInRight">You have successfully logged in!</p>

<p class="welcomeIcon animated fadeInUp"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>

<?php include("footer.php"); ?>
