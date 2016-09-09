<?php
	session_start();

	require_once 'includes/class.user.php';
	$session = new USER();

	if(!$session->is_loggedin())
	{
		$session->redirect('login.php');
	}
?>
