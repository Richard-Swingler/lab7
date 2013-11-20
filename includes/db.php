<?php

// database credentials
$dbHost		 = 'comp2203.ecs.soton.ac.uk';
$dbUsername	 = 'comp2203-lab7';
$dbPassword	 = 's515288TEM5376J6w5b544uC6Yv41eufd2I8M13mz';
$dbSchema	 = 'comp2203-lab7';

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbSchema);

// check if the database connection failed
if($db->connect_errno){
	echo "Failed to connect to MySQL: " . $db->connect_error;
}