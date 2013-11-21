<?php
	
	//destroys session after clearing data
	
	require_once('includes/predispatch.php');
	$_SESSION = array();
	session_destroy();
	print_r($_SESSION);
	echo "</br>You have now logged out return to <a href='index.php'>Homepage</a>";
	