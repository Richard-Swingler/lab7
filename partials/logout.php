<?php 	require_once('includes/predispatch.php');
	//identifies user and provides logout button
	echo "<p>Welcome ".$_SESSION['username'].", if this is not you please logout</p>";
	echo "<p><a href='../lab7/process-logout.php'>Logout</a></p>";
	?>