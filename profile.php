<?php
	require_once("session.php");
	require_once("class.user.php");

	$auth_user = new USER();
	$user_id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php include("header.php"); ?>

<h1 class="welcomeMsg animated fadeInDown"> Welcome <?php print($userRow['user_name']); ?>! </h1>

<p class="welcomeSubMsg animated fadeInUp">You have successfully logged in!</p>

<p class="welcomeIcon animated fadeInUp"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>

<?php include("footer.php"); ?>
