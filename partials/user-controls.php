<?php

	//checks if user is logged in and addapts nav bar accordingly
	
	require_once('includes/predispatch.php');
	if(isset($_SESSION['loggedIn'])){
		require('partials/logout.php');
	}
	else{
		require('partials/login.php');
	}
	

?>