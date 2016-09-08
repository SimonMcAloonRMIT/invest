<?php
	session_start();
	include_once 'includes/config.php';

	if (!isset($_SESSION['usr_id'])) {
		header("Location: login.php");
	}
?>

<?php include("header.php"); ?>

<h1 class="animated tada welcomeMsg"> Welcome <?php echo $_SESSION['usr_name']; ?>! </h1>

<?php include("footer.php"); ?>
