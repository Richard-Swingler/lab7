<?php
	require_once('includes/predispatch.php');
	$_SESSION = array();
	session_destroy();
	print_r($_SESSION);
	