<?php 	require_once('includes/predispatch.php');
	//identifies user and provides logout button
	echo "<p class='nav-tabs'>Welcome ".$_SESSION['username'].", if this is not you please ";
	echo "<a href='../lab7/process-logout.php'>Logout</a></p>";
	?>