<?php
	require_once("session.php");
	require_once("includes/class.user.php");

	$auth_user = new USER();
	$user_id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php require_once("templates/header.php"); ?>

<?php if (isset($_SESSION['signup'])) { ?>

	<h1 class="welcomeMsg animated fadeInDown"> Welcome <?php print($userRow['user_name']); ?>! </h1>
	<p class="welcomeSubMsg animated fadeInUp">Thanks for signing up. You have now been logged in!</p>
	<p class="welcomeIcon animated fadeInUp"><i class="fa fa-smile-o" aria-hidden="true"></i></p>

<?php } else { ?>

	<h1 class="welcomeMsg animated fadeInDown"> Hello <?php print($userRow['user_name']); ?>! </h1>
	<p class="welcomeSubMsg animated fadeInUp">Welcome back!</p>
	<p class="welcomeIcon animated fadeInUp"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>

<?php } ?>

<?php require_once("templates/footer.php"); ?>
