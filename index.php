<?php
	session_start();
	include_once 'includes/config.php';

	if (!isset($_SESSION['usr_id'])) {
		header("Location: login.php");
	}
?>
